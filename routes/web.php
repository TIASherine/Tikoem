<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/auth', [AuthController::class, 'index'])->name('auth.login.show');

Route::get('/auth/signup', function () {
    return view('simple-home');
});

Route::post('/auth/signup', [AuthController::class, 'signup'])->name('auth.signup.post');

Route::get('/auth/login', [AuthController::class, 'index'])->name('auth.login.get');

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login.post');
