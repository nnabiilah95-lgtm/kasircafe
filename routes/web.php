<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Role views
Route::middleware(['auth', 'checkrole:administrator'])->get('/administrator', function () {
    return view('administrator');
});

Route::middleware(['auth', 'checkrole:kasir'])->get('/kasir', function () {
    return view('kasir');
});