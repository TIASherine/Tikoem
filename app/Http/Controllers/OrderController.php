<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $filterableColumns = ['status', 'payment_method'];

        if ($user->role === 'Pelanggan') {
            $query  = Order::where('user_id', $user->user_id)->get();
        } else {
            $query  = Order::all();
        }

        $query = $query->filter($request, $filterableColumns);

        $pageData['dataOrder'] = $query->simplePaginate(10)->withQueryString();

        return view('admin.order.index', $pageData);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {
        $pageData['dataOrder'] = Order::with('items.product')->findOrFail($order_id);

        return view('admin.order.show', $pageData);
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
    public function update(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Status berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function keranjang(Request $request)
    {
        $user = auth()->user();

        $cart = Cart::where('user_id', $user->user_id)->first();
        if (!$cart) return back()->with('error', 'Keranjang kosong.');

        $cartItems = $cart->items()->with('product')->get();
        if ($cartItems->isEmpty()) return back()->with('error', 'Tidak ada item di keranjang.');

        $paymentMethod = $request->payment_method;

        // hitung total
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $buktiQrisPath = null;
        if ($paymentMethod === 'qris' && $request->hasFile('bukti_qris')) {
            $buktiQrisPath = $request->file('bukti_qris')->store('bukti_qris', 'public');
        }

        // buat order
        $order = Order::create([
            'user_id'       => $user->user_id,
            'total_price'   => $total,
            'status'        => 'pending',
            'payment_method' => $paymentMethod,
        'bukti_qris'      => $buktiQrisPath,
        ]);


        // simpan item
        foreach ($cartItems as $item) {
            $product = $item->product;

            OrderItem::create([
                'order_id'    => $order->order_id,
                'product_id'  => $item->product_id,
                'quantity'    => $item->quantity,
                'price'       => $product->price,
                'total_price' => $item->quantity * $product->price
            ]);
        }

        // hapus keranjang
        $cart->items()->delete();

        return redirect()->route('home')
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
