<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'kode_barang' => 'required|unique:produk',
            'nama_produk' => 'required',
            'kategori'    => 'nullable',
            'harga'       => 'required|numeric',
            'foto_produk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

       $data = $request->all();

        // jika ada file, simpan ke disk public/produk dan simpan path ke array
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('produk', 'public'); // menghasilkan "produk/xxxxx.jpg"
            $data['foto'] = $path; // **PENTING**: gunakan array syntax, bukan $data->foto
        }

    Produk::create($data);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
}

public function show($id)
{
    $produk = Produk::findOrFail($id);
    return view('produk.show', compact('produk'));
}

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
{
    $request->validate([
        'kode_barang' => "required|unique:produk,kode_barang,$produk->id",
        'nama_produk' => 'required',
        'kategori'    => 'required',
        'harga'       => 'required|numeric',
        'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only(['kode_barang','nama_produk','kategori','harga']);

    if ($request->hasFile('foto')) {
        // hapus foto lama kalau ada
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        // simpan foto baru
        $path = $request->file('foto')->store('produk', 'public');
        $data['foto'] = $path;
    }

    $produk->update($data);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
}
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
