<?php

namespace App\Http\Controllers;

use App\Traits\CartTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    use CartTrait;

    public function index()
    {
        $cartItems = $this->getCart();
        $total = 0;
        return view('cart.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $product = [
            'id' => $request->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ];

        $this->addToCart($product);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang belanja.');
    }

    public function update(Request $request)
    {
        $this->updateCart($request->itemId, $request->quantity);

        return redirect()->route('cart.index')->with('success', 'Keranjang belanja diperbarui.');
    }

    public function destroy(Request $request)
    {
        $this->removeFromCart($request->itemId);

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang belanja.');
    }
}
