@extends('layouts.app')

@section('title', 'Edit Stok Produk')

@section('content')
<div class="container mt-4">
    <h2>✏️ Edit Stok Produk</h2>
    <hr>

    {{-- Pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Pilihan Produk --}}
        <div class="mb-3">
            <label for="produk_id" class="form-label">Nama Menu</label>
            <select name="produk_id" id="produk_id" class="form-select" required>
                <option value="">-- Pilih Menu --</option>
                @foreach($produk as $p)
                    <option value="{{ $p->id }}" {{ $stok->produk_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama ?? $p->nama_produk ?? 'Tanpa Nama' }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Input jumlah stok --}}
        <div class="mb-3">
            <label for="jumlah" class="form-label">Stok Tersisa</label>
            <input 
                type="number" 
                name="jumlah" 
                id="jumlah" 
                class="form-control" 
                value="{{ old('jumlah', $stok->jumlah) }}" 
                required>
        </div>
        {{-- Status stok --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status Stok</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="Aman" {{ $stok->status == 'Aman' ? 'selected' : '' }}>Aman</option>
                <option value="Menipis" {{ $stok->status == 'Menipis' ? 'selected' : '' }}>Menipis</option>
                <option value="Habis" {{ $stok->status == 'Habis' ? 'selected' : '' }}>Habis</option>
            </select>
        </div>

        {{-- Tombol aksi --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">💾 Simpan</button>
            <a href="{{ route('stok.index') }}" class="btn btn-secondary">↩️ Batal</a>
        </div>
    </form>
</div>
@endsection