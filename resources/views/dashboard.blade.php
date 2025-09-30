@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Dashboard</h3>
    <p>Selamat datang di sistem kasir café yang simple & efisien.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Menu</h6>
                    <h2>20</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Transaksi Hari Ini</h6>
                    <h2>15</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Stok Menipis</h6>
                    <h2>5</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="mb-3">Grafik Transaksi Mingguan</h5>
            <canvas id="grafikTransaksi" height="100"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikTransaksi').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($tanggalMingguan), // data label dari controller
            datasets: [{
                label: 'Jumlah Transaksi',
                data: @json($transaksiMingguan), // data transaksi dari controller
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                title: { display: true, text: 'Transaksi Mingguan' }
            },
            scales: {
                y: { beginAtZero: true, precision: 0 }
            }
        }
    });
</script>
@endsection
