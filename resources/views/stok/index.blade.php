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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stok as $i => $m)
            <tr>
                <td>{{ $i + 1 }}</td>
                {{-- ambil nama produk dari relasi --}}
                <td>{{ $m->produk->nama_produk ?? '-' }}</td>
                {{-- jumlah stok dari field jumlah --}}
                <td>{{ $m->jumlah }}</td>
                <td>
                    @if($m->jumlah > 10)
                        <span class="badge bg-success">Aman</span>
                    @elseif($m->jumlah > 0)
                        <span class="badge bg-warning text-dark">Menipis</span>
                    @else
                        <span class="badge bg-danger">Habis</span>
                    @endif
                </td>
                <td>
                <form action="{{ route('stok.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Belum ada data stok</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
