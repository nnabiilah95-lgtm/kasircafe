@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
  <h2 class="mb-3">➕ Tambah Produk</h2>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="kode_barang" class="form-label">Kode Barang</label>
          <input type="text" name="kode_barang" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="nama_produk" class="form-label">Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" required>
        </div>

        <!-- Tambahan kategori -->
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select name="kategori" id="kategori" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Fashion">Fashion</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label">Foto Produk</label>
          <input type="file" name="foto" id="foto" class="form-control" accept="image/*" onchange="previewImage(event)">
          <br>
          <img id="preview" src="" alt="Preview Foto" style="max-width: 150px; display:none; border:1px solid #ddd; padding:5px; border-radius:5px;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>

  {{-- Script untuk preview --}}
  <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
@endsection