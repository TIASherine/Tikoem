<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageData['dataPelanggan'] = Users::all();
        return view('admin.pelanggan.home', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email'      => ['required', 'email'],
            'password'      => ['required'],
            'role'     => ['required'],
        ]);

        $data['password'] = Hash::make($request->password);

        Users::create($data);

        return redirect()->route('pelanggan.home')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataPelanggan'] = Users::findOrFail($param1);
        return view('admin.pelanggan.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'name'   => ['required'],
            'email'        => ['required', 'email'],
            'password'        => ['required'],
            'role'   => ['required'],
        ]);

        $pelanggan_id = $request->user_id;
        $pelanggan    = Users::findOrFail($pelanggan_id);

        $pelanggan->name = $request->name;
        $pelanggan->email      = $request->email;
        $pelanggan->password      = $request->password;
        $pelanggan->role      = $request->role ?? 'Pelanggan';

        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $pelanggan = Users::findOrFail($param1);

        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Penghapusan Data Berhasil!');
    }

    public function list()
    {
        $pageData['dataPelanggan'] = Users::all();
        return view('admin.pelanggan.index', $pageData);
    }

    public function riwayat()
    {
        $user = Auth::user();

        $pageData['dataOrder'] = Order::where('user_id', $user->user_id)
            ->with('items.product')
            ->latest()
            ->get();

        return view('admin.pelanggan.riwayat', $pageData);
    }
}
