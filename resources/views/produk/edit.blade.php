@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
  <h2 class="mb-3">✏️ Edit Produk</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Kode Barang --}}
        <div class="mb-3">
          <label for="kode_barang" class="form-label">Kode Barang</label>
          <input type="text" name="kode_barang" id="kode_barang" 
                 class="form-control @error('kode_barang') is-invalid @enderror"
                 value="{{ old('kode_barang', $produk->kode_barang) }}" required>
          @error('kode_barang')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Nama Produk --}}
        <div class="mb-3">
          <label for="nama_produk" class="form-label">Nama Produk</label>
          <input type="text" name="nama_produk" id="nama_produk" 
                 class="form-control @error('nama_produk') is-invalid @enderror"
                 value="{{ old('nama_produk', $produk->nama_produk) }}" required>
          @error('nama_produk')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <input type="text" name="kategori" id="kategori" 
                 class="form-control @error('kategori') is-invalid @enderror"
                 value="{{ old('kategori', $produk->kategori) }}">
          @error('kategori')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Harga --}}
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" name="harga" id="harga" 
                 class="form-control @error('harga') is-invalid @enderror"
                 value="{{ old('harga', $produk->harga) }}" required>
          @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Stok --}}
        <div class="mb-3">
          <label for="stok" class="form-label">Stok</label>
          <input type="number" name="stok" id="stok" 
                 class="form-control @error('stok') is-invalid @enderror"
                 value="{{ old('stok', $produk->stok) }}">
          @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Foto Produk --}}
        <div class="mb-3">
             @if ($produk->foto_produk)
                        <img src="{{ asset('images/' . $produk->foto_produk) }}" width="80">
                    @else
                        <small class="text-muted">No Image</small>
                    @endif
         
            </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('produk.index') }}" class="btn btn-secondary">⬅ Kembali</a>
          <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
@endsection
