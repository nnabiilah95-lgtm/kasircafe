@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Detail Produk</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Kode Barang</th>
                    <td>{{ $produk->kode_barang }}</td>
                </tr>
                <tr>
                    <th>Nama Produk</th>
                    <td>{{ $produk->nama_produk }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $produk->kategori }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Foto Produk</th>
                    <td>
                        @if($produk->foto_produk)
                            <img src="{{ asset('storage/' . $produk->foto_produk) }}" 
                                 alt="{{ $produk->nama_produk }}" 
                                 class="img-thumbnail" width="200">
                        @else
                            <span class="text-muted">Belum ada foto</span>
                        @endif
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">⬅ Kembali</a>
                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning">✏ Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
