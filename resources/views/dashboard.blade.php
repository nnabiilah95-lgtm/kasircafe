@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Dashboard</h3>
    <p>Selamat datang di sistem kasir Nescaffé</p>

    <div class="row">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5>Menu</h5>
                <h2>{{ $totalMenu }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5>Transaksi Hari Ini</h5>
                <h2>{{ $transaksiHariIni }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5>Stok Menipis</h5>
                <h2>{{ $stokMenipis }}</h2>
            </div>
        </div>
    </div>
</div>


    <!-- Grafik -->
   <div class="card mt-4">
    <div class="card-header">Grafik Transaksi Mingguan</div>
    <div class="card-body">
        <canvas id="chartMingguan" height="100"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chartMingguan').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($tanggalMingguan),
            datasets: [{
                label: 'Jumlah Transaksi',
                data: @json($dataMingguan),
                borderColor: 'rgba(220, 53, 69, 1)',       // 🔴 merah (garis)
                backgroundColor: 'rgba(220, 53, 69, 0.3)', // 🔴 merah transparan (area isi)
                tension: 0.4,
                fill: true
            }]
        }
    });
</script>

@endsection
