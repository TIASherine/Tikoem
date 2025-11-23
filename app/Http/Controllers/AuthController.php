<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('login-form');
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

    public function old(Request $request)
    {
        $pageData['name']     = $request->name;
        $pageData['email']    = $request->email;
        $pageData['password'] = '';
    }

    public function login(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'password' => 'required|string|min:3|max:100',
        ]);

        $user = Users::where('name', $request->name)->first();

        if (!$user || $user->password !== $request->password) {
            return Redirect::back()->with('status', 'error')->withInput();
        }

        session([
            'name' => $user->name,
            'role'     => $user->role,
            'logged_in' => true
        ]);

        return redirect('/home')->with('status', 'success');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:100',
            'email'           => 'required|email',
            'password'        => 'required|string|min:3|max:100',
            'confirmPassword' => 'required|same:password',
        ]);

        $email = $request->email;

        $role = match (true) {
            str_ends_with($email, '@staff.pcr.tikoem.id') => 'Karyawan',
            str_ends_with($email, '@owner.pcr.tikoem.id') => 'Owner',
            default => 'Pelanggan',
        };

        $user = Users::create([
            'name'     => $request->name,
            'email'    => $email,
            'password' => $request->password,
            'role'     => $role
        ]);

        session([
            'name' => $user->name,
            'password' => $user->password,
            'email' => $user->email,
            'role'     => $user->role,
            'logged_in' => true
        ]);

        return redirect()->route('auth.signup.success');
    }

    public function showSignupForm()
    {
        return view('signup-form');
    }

    public function signupSuccess()
    {
        return view('signup-success');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }
}
