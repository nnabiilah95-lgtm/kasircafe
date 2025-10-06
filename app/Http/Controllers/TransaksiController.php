<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;

class TransaksiController extends Controller
{
  public function index()
{
    $transaksi = \App\Models\Transaksi::latest()->get();
    return view('transaksi.index', compact('transaksi'));
}
public function create() {
    $produk = Produk::all();
    return view('transaksi.create', compact('produk'));
}

    public function store(Request $request)
{
    $request->validate([
        'produk_id'   => 'required',
        'total_harga' => 'required|numeric',
        'uang_bayar'  => 'required|numeric',
    ]);

    $kembalian = $request->uang_bayar - $request->total_harga;

    $transaksi = Transaksi::create([
        'produk_id'   => $request->produk_id,
        'kode_invoice'=> 'INV-' . time(),
        'total_harga' => $request->total_harga,
        'uang_bayar'  => $request->uang_bayar,
        'kembalian'   => $kembalian,
    ]);

    return redirect()->route('laporan.index')->with('success', 'Transaksi berhasil disimpan!');
}
}