{{-- resources/views/stok/create.blade.php --}}
@extends('layouts.app')

@section('title','Tambah Stok')

@section('content')
<div class="container">
    <h2>Tambah Data Stok</h2>

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Menu</label>
            <select name="menu_id" class="form-select" required>
                <option value="">-- Pilih Menu --</option>
                @foreach($menus as $m)
                <option value="{{ $m->id }}">{{ $m->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis</label>
            <select name="jenis" class="form-select" required>
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('stok.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
