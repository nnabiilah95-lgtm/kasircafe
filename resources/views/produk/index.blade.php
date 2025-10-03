@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Daftar Produk</h3>

        <!-- Pesan sukses -->
        @if (session('success'))
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
                        @foreach ($produk as $index => $produk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $produk->kode_barang }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->kategori }}</td>
                                <td>{{ number_format($produk->harga, 2) }}</td>
                                <td>
    @if ($produk->foto)
        <img src="{{ asset('storage/' . $produk->foto) }}" 
             alt="{{ $produk->nama_produk }}" 
             style="max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 5px;">
    @else
        <span class="text-muted">Tidak ada foto</span>
    @endif
</td>
                                <td>
                                    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">👁 Detail</a>
                                    <a href="{{ route('produk.edit', $produk->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                        style="display:inline-block;" onsubmit="return confirm('Yakin hapus produk ini?')">
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
