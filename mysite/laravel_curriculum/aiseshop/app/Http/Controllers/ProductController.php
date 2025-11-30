<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($shopId)
    {
        $shop = Shop::findOrFail($shopId);
        $products = $shop->products;

        return view('products.index', compact('shop', 'products'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($shopId)
    {
        $shop = Shop::findOrFail($shopId);
        return view('products.create', compact('shop'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $shopId)
    {
        $shop = Shop::findOrFail($shopId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products', 'public');
            $validated['image'] = $image;
        }

        $validated['shop_id'] = $shop->id;

        Product::create($validated);

        return redirect()->route('shops.products.index', $shop->id)->with('success', '商品を登録しました。');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($shopId, $productId)
    {
        $product = Product::where('shop_id', $shopId)->findOrFail($productId);
        return view('products.show', compact('product'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($shopId, $productId)
    {
        $shop = Shop::findOrFail($shopId);

        if (auth()->id() !== $shop->user_id) {
            abort(403, '権限がありません');
        }

        $product = Product::where('shop_id', $shopId)->findOrFail($productId);


        return view('products.edit', compact('product', 'shop'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $shopId, $productId)
    {
        $shop = Shop::findOrFail($shopId);
        if (auth()->id() !== $shop->user_id) {
            abort(403, '権限がありません');
        }
        $product = Product::where('shop_id', $shopId)->findOrFail($productId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',                       
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {

           if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $image = $request->file('image')->store('products', 'public');
            $validated['image'] = $image;
        }

        $product->update($validated);
        return redirect()->route('shops.products.index', $shopId)->with('success', '商品情報を更新しました。');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($shopId, $productId)
    {
        $shop = Shop::findOrFail($shopId);
        if (auth()->id() !== $shop->user_id) {
            abort(403, '権限がありません');
        }
        $product = Product::where('shop_id', $shopId)->findOrFail($productId);
        
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('shops.products.index', $shopId)->with('success', '商品を削除しました。');


        //
    }

    public function exportCsv(Shop $shop)
    {
        $products = Product::where('shop_id', $shop->id)->get();

        $csv = "商品名,価格,在庫\n";
        foreach ($products as $p) {
            $csv .= "{$p->name},{$p->price},{$p->stock}\n";
        }

        $fileName = "products_{$shop->id}.csv";

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename={$fileName}");
    }

}
