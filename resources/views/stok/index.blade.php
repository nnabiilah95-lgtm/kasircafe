{{-- resources/views/stok/index.blade.php --}}
@extends('layouts.app')

@section('title','Stok Produk')

@section('content')
<div class="container">
    <h2>📊 Stok Produk</h2>
    <a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">+ Tambah Stok</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Stok Tersisa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stok as $i => $m)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->produk->nama_produk ?? '-' }}</td>
                <td>{{ $m->total_stok }}</td>
                <td>
                    @if($m->total_stok > 10)
                        <span class="badge bg-success">Aman</span>
                    @elseif($m->total_stok > 0)
                        <span class="badge bg-warning text-dark">Menipis</span>
                    @else
                        <span class="badge bg-danger">Habis</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
