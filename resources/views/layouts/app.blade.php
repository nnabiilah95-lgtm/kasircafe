<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kasir Nescaffe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
        }

       .sidebar {
        position: fixed;        /* selalu nempel di kiri */
        top: 0;
        left: 0;
        width: 220px;           /* sesuaikan lebar sidebar */
        height: 100%;           /* penuh sampai bawah halaman */
        background: #F5F5F5;
        display: flex;
        flex-direction: column;
    }

    .sidebar .nav-link {
        color: #0f0d0d;
        padding: 12px;
        border-radius: 8px;
        font-size: 23px;       /* atur ukuran font, coba 18px–20px */
        font-weight: 600;      /* biar lebih tegas */
        display: flex;         /* biar emoji dan teks rata */
        align-items: center;  
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
        background: #dc3545;
        color: #fff;
    }

    /* supaya konten tidak ketiban sidebar */
    main {
        margin-left: 220px; 
    }
        .logout {
            position: fixed;
            bottom: 20px;
            left: 30px;  /* sesuaikan dengan lebar sidebar */
            width: 160px;
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
                <img src="{{ asset('images/logo.nes.remove1.png') }}" width="170" height="70">
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">📊  Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('produk') ? 'active' : '' }}" href="/produk">🥤 Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('transaksi') ? 'active' : '' }}" href="/transaksi">🪙 Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('stok') ? 'active' : '' }}" href="/stok">📦 Stok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('laporan') ? 'active' : '' }}" href="/laporan">📑 Laporan</a>
                    </li>
                </ul>
            
                <div class="logout text-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 py-2">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Content -->
            <main class="col-md-10">
                <!-- Navbar -->
                
                <nav class="navbar px-3">
                    <li class="ms-auto profile">
                    <img src="{{ asset('images/pp.png') }}" alt="Foto Admin">
                    
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#gantiAkunModal">
                        Admin
                    </a>
                    </li>
                </nav>

                <!-- Page Content -->
                <div class="p-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Modal -->
        <div class="modal fade" id="gantiAkunModal" tabindex="-1" aria-labelledby="gantiAkunModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gantiAkunModalLabel">Pilih Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <a href="#" class="btn btn-primary w-100 mb-2">🔄 Ganti ke Kasir</a>
                <a href="#" class="btn btn-success w-100">🔄 Ganti ke Admin</a>
            </div>
            </div>
        </div>
        </div>

        <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>