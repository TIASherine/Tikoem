<?php
namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (!Auth::check()) {
            return view('login-form');
        }
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

    public function login(Request $request)
    {
        $user = $request->validate([
            'name'     => 'required|string|max:100',
            'password' => 'required|string|min:3|max:100',
        ]);

        $user = Users::where('name', $request->name)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()->with('status', 'error')->withInput();
        }

        Auth::login($user);

        session([
            'name'      => $user->name,
            'role'      => $user->role,
            'logged_in' => true,
        ]);

        return redirect('/home')->with('status', 'success');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email',
            'password' => 'required|string|min:3|max:100',
        ]);

        $request->validate([
            'confirmPassword' => 'required|same:password',
        ]);

        $email = $request->email;

        $role = match (true) {
            str_ends_with($email, '@staff.pcr.tikoem.id') => 'Karyawan',
            str_ends_with($email, '@owner.pcr.tikoem.id') => 'Owner',
            default                                       => 'Pelanggan',
        };

        $data['role'] = $role;

        $data['password'] = Hash::make($data['password']);

        $user = Users::create($data);

        session([
            'name'      => $user->name,
            'email'     => $user->email,
            'role'      => $user->role,
            'logged_in' => true,
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
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
