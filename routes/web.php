<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StokController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\LaporanController;

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
Route::get('/produk', [ProdukController::class, 'show'])->name('produk.show');


Route::resource('produk', ProdukController::class);



Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/grafik-transaksi', [LaporanController::class, 'grafikTransaksi'])->name('grafik.transaksi');


Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');







Route::resource('stok/index/create/store', StokController::class)->only(['index','create','store']);
Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
Route::resource('stok', StokController::class);

// Role views
Route::group(['middleware' => ['auth','checkrole:admin']], function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::group(['middleware' => ['auth','checkrole:kasir']], function() {
    Route::get('/kasir/dashboard', [KasirController::class, 'index'])->name('kasir.dashboard');
});

