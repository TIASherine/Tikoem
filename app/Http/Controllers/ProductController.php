<?php
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['category', 'supplier'];
        $searchableColumns = ['search'];

        $pageData['dataProduct'] = Products::filter($request, $filterableColumns, $searchableColumns)->simplePaginate(2)->withQueryString();
        return view('admin.product.index', $pageData);
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

        Products::create($data);

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
        $pageData['dataProduct'] = Products::findOrFail($param1);
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
        $product    = Products::findOrFail($product_id);

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
}
