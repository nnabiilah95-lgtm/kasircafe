@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Daftar Transaksi</h3>

    <!-- Pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol tambah transaksi -->
    <div class="mb-3">
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">+ Tambah Transaksi</a>
    </div>

    <!-- Tabel daftar transaksi -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Kode Invoice</th>
                        <th>Total Harga</th>
                        <th>Uang Bayar</th>
                        <th>Kembalian</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- nomor urut -->
                            <td>{{ $item->kode_invoice }}</td>
                            <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($item->uang_bayar, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($item->kembalian, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif

        </div>
    </div>
</div>
@endsection