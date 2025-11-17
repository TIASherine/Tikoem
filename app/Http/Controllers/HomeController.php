<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session(['state' => session('Admin') ?? session('Karyawan') ?? session('Pelanggan')]);
        session(['name' => session('name')]);
        session(['last_login' => date('j M, H:i')]);

        return redirect('/home');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function redirectTo($tujuan)
    {
        $tujuan = strtolower($tujuan);

        if ($tujuan === "register") {
            return redirect()->route('auth.register.show');
        } elseif ($tujuan === "order") {
            return redirect()->away('https://shopee.co.id/');
        } else {
            return redirect()->route('home')->with('info', 'Selamat Datang!');
        }
    }
}
