@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Produk</h3>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                   @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>
                                        @if($item->foto_produk)
                                            <img src="{{ asset('storage/' . $item->foto_produk) }}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
