@extends('layouts.app')



@section('content')
<div class="container">
    <h2 class="mb-4">🧾 Nota Transaksi</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga) }}</p>
            <p><strong>Uang Bayar:</strong> Rp {{ number_format($transaksi->uang_bayar) }}</p>
            <p><strong>Kembalian:</strong> Rp {{ number_format($transaksi->kembalian) }}</p>

            <a href="{{ route('transaksi.create') }}" class="btn btn-primary mt-3">Transaksi Baru</a>
        </div>
    </div>
</div>
@endsection
