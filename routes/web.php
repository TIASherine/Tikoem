<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;

use Illuminate\Support\Facades\Route;

//One line routes
Route::get('/', function () {
    return view('login-form');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/redirect/{parameter}', [HomeController::class, 'redirectTo'])->name('redirect.to');

Route::get('/go/{tujuan}', [HomeController::class, 'redirectTo'])->name('go');


//Laravel
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Where user land based on role
Route::get('/home', function () {
    $user = Auth::user();

    if ($user->role === 'Karyawan') {
        return redirect()->route('karyawan.index');
    } else if ($user->role === 'Admin') {
        return redirect()->route('admin.index'); 
    } else {
        return redirect()->route('pelanggan.index');
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
Route::group(['middleware' => CheckRole::class . ':Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('list', [AdminController::class, 'showListK'])->name('list');
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
    Route::get('riwayat', 'riwayat')->name('riwayat');
});

// Karyawan
Route::group([
    'middleware' =>  CheckRole::class . ':Admin,Karyawan',
    'prefix' => 'karyawan',
    'as' => 'karyawan.'
], function () {
    Route::get('', [KaryawanController::class, 'index'])->name('index');
    Route::get('create', [KaryawanController::class, 'create'])->name('create');
    Route::post('store', [KaryawanController::class, 'store'])->name('store');
    Route::get('edit/{param1}', [KaryawanController::class, 'edit'])->name('edit');
    Route::post('update', [KaryawanController::class, 'update'])->name('update');
    Route::get('destroy/{param1}', [KaryawanController::class, 'destroy'])->name('destroy');
    Route::get('api/home', [KaryawanController::class, 'apiHome'])->name('apiHome');
    Route::get('dashboard', [KaryawanController::class, 'dashboard'])->name('dashboard');
});

//Product
Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{param1}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::get('destroy/{param1}', 'destroy')->name('destroy');
    Route::get('list', 'list')->name('list');
});

//Order
Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('order/{param1}', 'show')->name('show');
    Route::post('keranjang', 'keranjang')->name('keranjang');
});

//Cart
Route::middleware('auth')->group(function () {
    Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::post('update/{param1}', 'update')->name('update');
        Route::delete('destroy/{param1}', 'destroy')->name('destroy');
        Route::delete('remove', 'remove')->name('remove');
        Route::post('decrease/{param1}', 'decrease')->name('decrease');
    });
});

require __DIR__ . '/auth.php';
