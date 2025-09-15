@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Produk - Kasir Nescaffe</h3>

    <!-- Tombol tambah produk -->
    <div class="mb-3">
        <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Foto Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produk as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->kode_barang }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->kategori }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$produk->foto) }}" width="50" height="50">
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
