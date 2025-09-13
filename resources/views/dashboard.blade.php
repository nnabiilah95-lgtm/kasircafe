<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Kasir Nescaffe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f8f9fa;
    }
    .sidebar {
      height: 100vh;
      background: #1e1e2d;
      color: white;
    }
    .sidebar h4 {
      padding: 20px;
      font-size: 18px;
      text-align: center;
    }
    .sidebar .nav-link {
      color: #ddd;
      padding: 12px;
      border-radius: 8px;
    }
    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background: #dc3545;
      color: #fff;
    }
    .content {
      padding: 20px;
    }
    .card {
      border-radius: 12px;
    }
    .logout {
      position: absolute;
      bottom: 20px;
      width: 100%;
    }
    .navbar {
      background: #fff;
      border-bottom: 1px solid #ddd;
    }
    .profile {
      display: flex;
      align-items: center;
    }
    .profile img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      margin-right: 10px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 sidebar p-3">
      <h4>☕ Kasir Nescaffe</h4>
      <ul class="nav flex-column mt-4">
        <li class="nav-item"><a class="nav-link active" href="#">🏠 Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="#">📦 Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#">💳 Transaksi</a></li>
        <li class="nav-item"><a class="nav-link" href="#">📊 Stok</a></li>
      </ul>
      <div class="logout">
        <a class="nav-link text-danger" href="/logout">🚪 Logout</a>
      </div>
    </nav>

    <!-- Content -->
    <main class="col-md-10">
      <!-- Navbar -->
      <nav class="navbar px-3">
        <div class="ms-auto profile">
          <img src="https://i.pravatar.cc/150?img=3" alt="Admin">
          <span>Admin</span>
        </div>
      </nav>

      <!-- Dashboard Content -->
      <div class="content">
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
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</body>
</html>