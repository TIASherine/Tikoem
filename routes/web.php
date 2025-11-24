<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

//One line routes
Route::get('/', function () {
    return view('login-form');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/redirect/{parameter}', [HomeController::class, 'redirectTo'])->name('redirect.to');

//Laravel
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Where user land based on role
Route::get('/home', function () {
    $role = session('role');
    $name = session('name');

    if ($role === 'Karyawan') {
        return view('admin.karyawan.home', compact('name', 'role'));
    } else if ($role === 'Owner') {
        return view('admin.admin-page', compact('name', 'role'));
    } else {
        return view('admin.pelanggan.home', compact('name', 'role'));
    }
})->name('home');

//Auth
Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('', 'index')->name('login.show');

    Route::post('login', 'login')->name('login.post');

    Route::get('signup', 'showSignupForm')->name('signup.show');

    Route::post('signup', 'signup')->name('signup.post');

    Route::get('success', 'signupSuccess')->name('signup.success');

    Route::post('logout', 'logout')->name('logout');
});

//Admin
Route::group([
    'middleware' => ['checkrole: Admin'],
    'prefix'     => 'admin',
    'as'         => 'admin.',
], function () {
    Route::get('', [AdminController::class, 'index'])->name('index');

    Route::get('tim', fn() => redirect()->route('karyawan.index'))->name('tim');
});

Route::controller(PelangganController::class)->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{param1}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::get('destroy/{param1}', 'destroy')->name('destroy');
});

Route::group([
    // CheckRole: Allows access if user is Admin OR Karyawan
    'middleware' => ['checkrole: Admin,Karyawan'],
    'prefix'     => 'karyawan',
    'as'         => 'karyawan.',
], function () {
    // We use explicit controller calls to prevent "Invalid route action" error
    Route::get('', [KaryawanController::class, 'index'])->name('index');
    Route::get('create', [KaryawanController::class, 'create'])->name('create');
    Route::post('store', [KaryawanController::class, 'store'])->name('store');
    Route::get('edit/{param1}', [KaryawanController::class, 'edit'])->name('edit');
    Route::post('update', [KaryawanController::class, 'update'])->name('update');
    Route::get('destroy/{param1}', [KaryawanController::class, 'destroy'])->name('destroy');
});

require __DIR__ . '/auth.php';
