<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $menus = Produk::with('stok')->get();
        return view('stok.index', compact('menus'));
    }

    public function create()
    {
        $menus = Produk::all();
        return view('stok.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        StokController::create($data);

        return redirect()->route('stok.index')->with('success','Data stok berhasil ditambahkan');
    }
}