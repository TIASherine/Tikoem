<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageData['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $pageData);
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
        $request->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'birthday'   => ['required', 'date'],
            'gender'     => ['required', 'in:Male,Female'],
            'email'      => ['required', 'email'],
            'phone'      => ['required', 'numeric'],
        ]);

        Pelanggan::create($request->only([
            'first_name', 'last_name', 'birthday', 'gender', 'email', 'phone',
        ]));

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataPelanggan'] = Pelanggan::findOrFail($param1);
        return view('admin.pelanggan.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'pelanggan_id' => ['required'],
            'first_name'   => ['required'],
            'last_name'    => ['required'],
            'birthday'     => ['required', 'date'],
            'gender'       => ['required', 'in:Male,Female'],
            'email'        => ['required', 'email'],
            'phone'        => ['required', 'numeric'],
        ]);

        $pelanggan_id = $request->pelanggan_id;
        $pelanggan    = Pelanggan::findOrFail($pelanggan_id);

        $pelanggan->first_name = $request->first_name;
        $pelanggan->last_name  = $request->last_name;
        $pelanggan->birthday   = $request->birthday;
        $pelanggan->gender     = $request->gender;
        $pelanggan->email      = $request->email;
        $pelanggan->phone      = $request->phone;

        $pelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $pelanggan = Pelanggan::findOrFail($param1);

        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Penghapusan Data Berhasil!');
    }
}
