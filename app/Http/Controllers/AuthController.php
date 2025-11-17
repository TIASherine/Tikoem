<?php
namespace App\Http\Controllers;

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
            'name'           => 'required|string|max:100',
            'password' => 'required|string|min:3|max:100',
        ]);
        $users = session()->get('users', []);

        if (isset($users[$request->name]) && $users[$request->name]['password'] === $request->password) {
            session(['username' => $request->name]);
            session(['state' => $request->name]);
            return redirect('/home')->with('status', 'success');
        } else {
            return Redirect::back()->with('status', 'error')->withInput();
        }
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:100',
            'password' => 'required|string|min:3|max:100',
            'email'           => 'required|email',
            'confirmPassword' => 'required|same:password',
        ], [
            'confirmPassword.same' => 'Konfirmasi Password tidak sesuai.',
        ]);

        $users                   = session()->get('users', []);
        $users[$request['name']] = [
            'email'    => $request['email'],
            'password' => $request['password'],
        ];
        session()->put('users', $users);
        session(['name' => $request->name]);
        session(['state' => $request->name]);

        return view('signup-success', $request);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }

    public function showSignupForm()
    {
        return view('signup-form');
    }
}
