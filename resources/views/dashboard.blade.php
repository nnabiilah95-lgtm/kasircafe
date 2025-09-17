@extends('layouts.app')

@section('title', 'Dashboard Kasir Nescaffe')

@section('content')
  <h2 class="mb-2">Dashboard</h2>
  <p>Selamat datang di sistem kasir café yang simple & efisien.</p>

  <div class="row">
    <div class="col-md-4">
      <div class="card shadow-sm mb-3">
        <div class="card-body">
          <h6 class="card-title">Menu</h6>
          <p class="card-text fs-3 fw-bold">20</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm mb-3">
        <div class="card-body">
          <h6 class="card-title">Transaksi Hari Ini</h6>
          <p class="card-text fs-3 fw-bold">15</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm mb-3">
        <div class="card-body">
          <h6 class="card-title">Stok Menipis</h6>
          <p class="card-text fs-3 fw-bold">5</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Grafik -->
  <div class="card shadow-sm mt-4">
    <div class="card-body">
      <h6 class="card-title">Grafik Transaksi Mingguan</h6>
      <canvas id="myChart"></canvas>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'],
      datasets: [{
        label: 'Jumlah Transaksi',
        data: [10, 12, 15, 18, 14, 10, 6],
        backgroundColor: 'rgba(220,53,69,0.7)',
        borderRadius: 5
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true } }
    }
  });
</script>
@endpush