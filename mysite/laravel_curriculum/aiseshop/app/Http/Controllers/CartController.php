<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;


class CartController extends Controller
{
    public function index()
    {

        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $productId = $product->id;

        session(['cart_return_url' => url()->previous()]);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'カートに追加しました');
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            
        }

        session()->put('cart', $cart);

       return redirect()->route('cart.index')->with('success', 'カートから削除しました');
    }
    //

    public function update(Request $request, $productId)
    {
        $cart = session('cart', []);

        if (!isset($cart[$productId])) return back();

        if ($request->type === 'plus') {
            $cart[$productId]['quantity']++;
        }

        if ($request->type === 'minus') {
            $cart[$productId]['quantity']--;
            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }
        }

        session()->put('cart', $cart);

        return back();
    }

    public function purchase(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'カートが空です。');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $total,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $product = Product::find($item['id']);
            $product->stock -= $item['quantity'];
            $product->save();
        }

        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', '購入が完了しました。');
    }
  
}