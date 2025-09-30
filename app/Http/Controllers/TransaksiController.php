<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;


class TransaksiController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::with('produk')->get();
        return view('transaksi.index', compact('produk', 'transaksi'));
    }

    public function store(Request $request)
    {
    // Simpan transaksi ke database
    $transaksi = Transaksi::create([
        'total_harga' => $request->total_harga,
        'uang_bayar' => $request->uang_bayar,
        'kembalian' => $request->uang_bayar - $request->total_harga,
    ]);

    // Redirect ke halaman sukses
     return redirect()->route('transaksi.nota', $transaksi->id);


}

public function nota($id)
{
    $transaksi = Transaksi::findOrFail($id);

    return view('transaksi.nota', compact('transaksi'));
}


}
