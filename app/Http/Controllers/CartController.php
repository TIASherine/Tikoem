<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        $cart = Cart::firstOrCreate(['user_id' => $user->user_id]);
        $items = $cart->items()->with('product')->get();

        return view('admin.pelanggan.cart.index', compact('cart', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity'   => 'required|integer|min:1'
        ]);

        $user = Auth::user();
        $cart = Cart::firstOrCreate(['user_id' => $user->user_id]);

        $product = Product::findOrFail($request->product_id);

        // check if item already exists
        $item = CartItem::where('cart_id', $cart->cart_id)
            ->where('product_id', $product->product_id)
            ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
        } else {
            CartItem::create([
                'cart_id'    => $cart->cart_id,
                'product_id' => $product->product_id,
                'quantity'   => $request->quantity,
                'price'      => $product->price,
            ]);
        }

        return back()->with('success', 'Produk Ditambah ke Keranjang!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item = CartItem::findOrFail($id);
        $item->quantity = $request->quantity;
        $item->save();

        return back()->with('success', 'Keranjang Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CartItem::findOrFail($id)->delete();
        return back()->with('success', 'Produk Dihapus!');
    }

    public function remove(string $id)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->user_id)->first();

        if ($cart) {
            $cart->items()->delete();
        }

        return back()->with('success', 'Keranjang Dibersihkan!');
    }

    public function decrease($id)
    {
        $item = CartItem::findOrFail($id);

        if ($item->quantity <= 1) {
            $item->delete();
        } else {
            $item->quantity -= 1;
            $item->save();
        }

        return redirect()->back()->with('success', '');
    }
}
