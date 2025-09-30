<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
   public function index()
{
    $stok = Stok::with('produk')->get();
    return view('stok.index', compact('stok'));
}

    public function create()
{
   $produk = Produk::all();
return view('stok.create', compact('produk'));

}

   public function store(Request $request)
{
    $request->validate([
        'produk_id' => 'required|exists:produk,id',
        'total_stok' => 'required|integer|min:0',
    ]);

    Stok::create([
        'produk_id' => $request->produk_id,
        'total_stok' => $request->total_stok,
    ]);

   return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan');

}
}