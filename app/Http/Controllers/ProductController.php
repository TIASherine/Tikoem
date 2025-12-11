<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['category', 'supplier'];
        $searchableColumns = ['search'];

        $user = Auth::user();

        $layout = $user->role === 'Admin'
            ? 'layouts.admin.app'
            : 'layouts.karyawan.app';

        $pageData['dataProduct'] = Product::filter($request, $filterableColumns, $searchableColumns)->simplePaginate(10)->withQueryString();
        return view('admin.product.index', $pageData,  compact('layout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required'],
            'category' => ['required'],
            'price'    => ['required'],
            'category' => ['required'],
            'stock'    => ['required'],
            'supplier' => ['required'],
        ]);

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $param1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataProduct'] = Product::findOrFail($param1);
        return view('admin.product.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'name'       => ['required'],
            'price'      => ['required'],
            'category'   => ['required'],
            'stock'      => ['required'],
            'supplier'   => ['required'],
        ]);

        $product_id = $request->product_id;
        $product    = product::findOrFail($product_id);

        $product->name     = $request->name;
        $product->price    = $request->price;
        $product->category = $request->category;
        $product->stock    = $request->stock;
        $product->supplier = $request->supplier;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function list()
    {
        $pageData['dataProduct'] = Product::all();
        return view('admin.product.home', $pageData);
    }
}
