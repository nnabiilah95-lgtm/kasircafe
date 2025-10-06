@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Laporan Transaksi</h2>

    <!-- Filter Periode -->
    <form action="{{ route('laporan.index') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <!-- Tabel Laporan -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tanggal & Waktu</th>
                    <th>Kode Invoice</th>
                    <th>Total</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- nomor urut -->
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                        <td>{{ $item->kode_invoice }}</td>
                        <td>Rp{{ number_format($item->total, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada transaksi pada periode ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
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
