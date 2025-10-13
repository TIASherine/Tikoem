<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

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

Route::get('/redirect/{parameter}', [HomeController::class, 'redirectTo'])->name('redirect.to');

Route::get('/go/{tujuan}', [HomeController::class, 'redirectTo'])->name('go');

require __DIR__.'/auth.php';
