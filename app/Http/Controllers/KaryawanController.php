<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Order;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesananBaru = Order::where('status', 'pending')->count();

        $pendapatanHarian = Order::where('status', 'Selesai')
            ->whereDate('created_at', today())
            ->sum('total_price');

        $totalOrders = Order::count();
        $dataOrder = Order::latest()->simplePaginate(10)->withQueryString();
        $startNumber = $totalOrders - ($dataOrder->currentPage() - 1) * $dataOrder->perPage();

        return view('admin.karyawan.home', compact('pesananBaru', 'pendapatanHarian', 'dataOrder', 'startNumber'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required'],
            'role'     => ['required'],
        ]);

        Users::create($request->only([
            'name',
            'email',
            'password',
            'role',
        ]));

        return redirect()->route('karyawan.index')->with('success', 'Penambahan Data Berhasil!');
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
    public function edit(string $param1)
    {
        $pageData['dataKaryawan'] = Users::findOrFail($param1);
        return view('admin.karyawan.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'name'    => ['required'],
            'email'   => ['required', 'email'],
        ]);

        $karyawan_id = $request->user_id;
        $karyawan    = Users::findOrFail($karyawan_id);

        $karyawan->name  = $request->name;
        $karyawan->email = $request->email;

        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Perubahan Data Berhasil!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $karyawan = Users::findOrFail($param1);

        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Penghapusan Data Berhasil!');
    }

    public function apiDashboard()
    {
        $pesananBaru = Order::where('status', 'pending')->count();

        $pendapatanHarian = Order::where('status', 'Selesai')
            ->whereDate('created_at', today())
            ->sum('total_price');

        return response()->json([
            'pesananBaru' => $pesananBaru,
            'pendapatanHarian' => $pendapatanHarian
        ]);
    }
}
