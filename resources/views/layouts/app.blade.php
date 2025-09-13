<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - Kasir Nescaffe</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; }
    .sidebar { height: 100vh; background: #1e1e2d; color: white; }
    .sidebar h4 { padding: 20px; font-size: 18px; text-align: center; }
    .sidebar .nav-link { color: #ddd; padding: 12px; border-radius: 8px; }
    .sidebar .nav-link:hover,
    .sidebar .nav-link.active { background: #dc3545; color: #fff; }
    .logout { position: absolute; bottom: 20px; width: 100%; }
    .navbar { background: #fff; border-bottom: 1px solid #ddd; }
    .profile { display: flex; align-items: center; }
    .profile img { width: 35px; height: 35px; border-radius: 50%; margin-right: 10px; }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 sidebar p-3">
      <h4>☕ Kasir Nescaffe</h4>
      <ul class="nav flex-column mt-4">
        <li class="nav-item"><a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">🏠 Dashboard</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('produk') ? 'active' : '' }}" href="/produk">📦 Menu</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('transaksi') ? 'active' : '' }}" href="/transaksi">💳 Transaksi</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->is('stok') ? 'active' : '' }}" href="/stok">📊 Stok</a></li>
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

      <!-- Page Content -->
      <div class="p-4">
        @yield('content')
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>