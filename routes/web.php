<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthLoginController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthLoginController::class, 'login']);
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

// Role views
Route::middleware(['auth', 'checkrole:administrator'])->get('/administrator', function () {
    return view('administrator');
});

Route::middleware(['auth', 'checkrole:kasir'])->get('/kasir', function () {
    return view('kasir');
});
