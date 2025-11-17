<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login-form');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    $state = session('state');
    $name = session('name');
    $last_login = session('last_login');

    if ($state === 'Karyawan') {
        return view('admin.karyawan.home', compact('name', 'last_login', 'state'));
    }
    else if ($state === 'Admin') {
        return view('admin.admin-page', compact('name', 'last_login', 'state'));
    } else {
        return view('admin.pelanggan.home', compact('name', 'last_login', 'state'));
    }
}) ->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('', 'index')->name('login.show');

    Route::post('login', 'login')->name('login.post');

    Route::get('signup', 'showSignupForm')->name('signup.show');

    Route::post('signup', 'signup')->name('signup.post');

    Route::get('register', 'showRegisterForm')->name('register.show');

    Route::post('register', 'register')->name('register.post');

    Route::get('logout', 'logout')->name('logout');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/redirect/{parameter}', [HomeController::class, 'redirectTo'])->name('redirect.to');

Route::get('/go/{tujuan}', [HomeController::class, 'redirectTo'])->name('go');

Route::controller(PelangganController::class)->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('', 'index')->name('index');

    Route::get('create', 'create')->name('create');

    Route::post('store', 'store')->name('store');

    Route::get('edit/{param1}', 'edit')->name('edit');

    Route::post('update', 'update')->name('update');

    Route::get('destroy/{param1}', 'destroy')->name('destroy');
});

Route::controller(CustomerController::class)->prefix('customer')->name('customer.')->group(function () {
    Route::get('', 'index')->name('list');

    Route::get('create', 'create')->name('create');

    Route::post('store', 'store')->name('store');
});


require __DIR__.'/auth.php';
