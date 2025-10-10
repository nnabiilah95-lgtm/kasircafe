@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>

    <!-- ✅ Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ✅ Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        
        .product-image {
            height: 180px;             /* tinggi seragam untuk semua gambar */
            width: 100%;
            object-fit: contain;       /* menampilkan seluruh gambar tanpa terpotong */
            background-color: #fff;    /* beri latar belakang putih agar rapi */
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 5px;              /* beri jarak agar tidak nempel */
        }

        body {
            background-color: #f8f9fa;
        }

        h3.fw-bold {
            color: #222;
        }

        .card {
            transition: all 0.3s ease;
            border-radius: 12px;
            border: none;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
        }

        .card img {
            border-radius: 12px 12px 0 0;
        }

        .card-body h5 {
            color: #212529;
        }

        .badge {
            font-size: 0.85rem;
        }

        .btn {
            border-radius: 20px;
            font-weight: 500;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-warning {
            background-color: #f0ad4e;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .container {
            max-width: 1100px;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"> Daftar Produk</h3>
        <a href="{{ route('produk.create') }}" class="btn btn-primary shadow-sm">
            + Tambah Produk
        </a>
    </div>

    <div class="row g-4">
        @foreach ($produk as $item)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/'.$item->foto) }}"
                    alt="{{ $item->nama_produk }}"
                    class="card-img-top product-image">

                    <div class="card-body text-center">
                        <h6 class="text-muted mb-1">{{ $item->kode_barang }}</h6>
                        <h5 class="fw-bold">{{ $item->nama_produk }}</h5>
                        <span class="badge bg-success mb-2">{{ $item->kategori }}</span>
                        <p class="text-dark fw-semibold mb-0">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="card-footer bg-white border-0 d-flex justify-content-between px-3 pb-3">
                        <a href="{{ route('produk.show', $item->id) }}" class="btn btn-primary btn-sm text-white shadow-sm">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm text-white shadow-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('stok.destroy', $item->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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

</body>
</html>
@endsection
