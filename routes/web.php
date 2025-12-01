<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;

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
    } else if ($role === 'Admin') {
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
    Route::get('redirect-google', 'redirectToGoogle')->name('redirect.google');
    Route::get('oauthcallback', 'handleGoogleCallback');
});

//Admin
    Route::group([
        'middleware' => ['checkrole: Admin'],
        'prefix'     => 'admin',
        'as'         => 'admin.',
    ], function () {
        Route::get('', [AdminController::class, 'index'])->name('index');
    });

//Pelanggan
Route::controller(PelangganController::class)->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{param1}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::get('destroy/{param1}', 'destroy')->name('destroy');
    Route::get('list', 'list')->name('list');
});

//Karyawan
Route::controller(KaryawanController::class)->prefix('karyawan')->name('karyawan.')->group(function () {
    Route::get('','index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{param1}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::get('destroy/{param1}', 'destroy')->name('destroy');
});

//Product
Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('','index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{param1}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::get('destroy/{param1}', 'destroy')->name('destroy');
});

require __DIR__ . '/auth.php';
