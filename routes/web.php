<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StokController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('home.index');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk', [ProdukController::class, 'edit'])->name('produk.edit');


Route::resource('produk', ProdukController::class);




Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::resource('stok/index/create/store', StokController::class)->only(['index','create','store']);
Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
Route::resource('stok', StokController::class);

// Role views
Route::middleware(['auth', 'checkrole:administrator'])->get('/administrator', function () {
    return view('administrator');
});

Route::middleware(['auth', 'checkrole:kasir'])->get('/kasir', function () {
    return view('kasir');
});