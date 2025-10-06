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
                    @if ($m->jumlah == 0)
                        <span class="badge bg-danger">Habis</span>
                    @elseif ($m->jumlah <= 50)
                        <span class="badge bg-warning text-dark">Menipis</span>
                    @else
                        <span class="badge bg-success">Aman</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('stok.edit', $m->id) }}" class="btn btn-warning btn-sm d-inline-block">Edit</a>
                    <form action="{{ route('stok.destroy', $m->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            let form = this.closest('form');

            Swal.fire({
                title: 'Yakin hapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
</script>

@endsection
