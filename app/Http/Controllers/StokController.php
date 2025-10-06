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
        'produk_id' => 'required',
        'jenis' => 'required',
        'jumlah' => 'required|numeric',
    ]);

    Stok::create([
        'produk_id' => $request->produk_id,
        'jenis' => $request->jenis,
        'jumlah' => $request->jumlah,
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan');
}
public function edit($id)
{
    $stok = Stok::findOrFail($id);
    $produk = Produk::all();
    return view('stok.edit', compact('stok', 'produk'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'produk_id' => 'required',
        'jumlah' => 'required|integer|min:0',
    ]);

    $stok = \App\Models\Stok::findOrFail($id);
    $stok->update([
        'produk_id' => $request->produk_id,
        'jumlah' => $request->jumlah,
    ]);

    return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui');
}

public function destroy($id)
{
    $stok = Stok::findOrFail($id);
    $stok->delete();

    return redirect()->route('stok.index')->with('success', 'Data stok berhasil dihapus');
}



}