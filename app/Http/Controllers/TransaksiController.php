<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        $transaksi = Transaksi::with('produk')->get();
        return view('transaksi.index', compact('produks', 'transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah'    => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $subtotal = $produk->harga * $request->jumlah;

        Transaksi::create([
            'produk_id' => $produk->id,
            'jumlah'    => $request->jumlah,
            'subtotal'  => $subtotal,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
