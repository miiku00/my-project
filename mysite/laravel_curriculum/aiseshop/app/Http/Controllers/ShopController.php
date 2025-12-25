<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shops = \App\Models\Shop::all();

        return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'owner') {
            abort(403, 'ショップの作成権限がありません。');
        }
        //
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (auth()->user()->role !== 'owner') {
            abort(403, 'ショップの作成権限がありません。');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('shops', 'public');
        }

        \App\Models\Shop::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('shops.index')->with('success', 'ショップを作成しました。');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shop::findOrFail($id);

        return view('shops.show', compact('shop'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shop = Shop::findOrFail($id);

        return view('shops.edit', compact('shop'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $shop = Shop::findOrFail($id);

        $shop->name = $validated['name'];
        $shop->description = $validated['description'] ?? $shop->description;

        if ($request->hasFile('image')) {

            if ($shop->image) {
            Storage::disk('public')->delete($shop->image);
            }

       
            $imagePath = $request->file('image')->store('shops', 'public');
            $shop->image = $imagePath;
        }

        $shop->save();

        return redirect()->route('shops.show', $shop->id)->with('success', 'ショップ情報を更新しました。');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shop = Shop::findOrFail($id);
        if ($shop->image) {
            Storage::disk('public')->delete($shop->image);
        }
        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'ショップを削除しました。');
        //
    }

    public function myShops()
    {
        $shops = auth()->user()->shops;
        return view('shops.my', compact('shops'));
        
    }
}