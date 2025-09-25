@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Transaksi</h3>

    <!-- Pilih produk -->
    <div class="mb-3">
        <label for="produk" class="form-label">Pilih Produk:</label>
        <select id="produk" class="form-select">
            <option value="">-- Pilih Produk --</option>
            @foreach($produk as $produk)
                <option value="{{ $produk->id }}"
                        data-harga="{{ $produk->harga }}">
                    {{ $produk->nama_produk }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Tabel pesanan -->
    <div class="card shadow">
        <div class="card-body">
            <h5 class="mb-3">Daftar Produk</h5>
            <table class="table table-bordered text-center align-middle" id="tabelPesanan">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Pesanan akan ditambahkan dengan JS -->
                </tbody>
            </table>

            <!-- Total dan pembayaran -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="total" class="form-label">Total Harga</label>
                    <input type="text" id="total" class="form-control" value="0" readonly>
                </div>
                <div class="col-md-4">
                    <label for="bayar" class="form-label">Uang Pembayaran</label>
                    <input type="number" id="bayar" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button class="btn btn-success w-100" id="btnBayar">Bayar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script JS sederhana -->
<script>
    const produkSelect = document.getElementById('produk');
    const tabelBody = document.querySelector('#tabelPesanan tbody');
    const totalInput = document.getElementById('total');
    let totalHarga = 0;

    produkSelect.addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const nama = selected.text.split('-')[0].trim();
        const harga = parseInt(selected.dataset.harga);

        if (!selected.value) return;

        // Tambah row baru
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${nama}</td>
            <td>Rp${harga.toLocaleString()}</td>
            <td>1</td>
            <td>Rp${harga.toLocaleString()}</td>
            <td><button class="btn btn-danger btn-sm btnHapus">X</button></td>
        `;
        tabelBody.appendChild(row);

        // Update total
        totalHarga += harga;
        totalInput.value = totalHarga;

        // Reset dropdown
        this.value = '';
    });

    // Hapus item
    tabelBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('btnHapus')) {
            const row = e.target.closest('tr');
            const subtotal = row.children[3].innerText.replace(/[^\d]/g, '');
            totalHarga -= parseInt(subtotal);
            totalInput.value = totalHarga;
            row.remove();
        }
    });

    // Bayar
    document.getElementById('btnBayar').addEventListener('click', function () {
        const bayar = parseInt(document.getElementById('bayar').value);
        if (bayar < totalHarga) {
            alert('Uang tidak cukup!');
        } else {
            const kembalian = bayar - totalHarga;
            alert('Pembayaran berhasil! Kembalian: Rp' + kembalian.toLocaleString());
            // Reset transaksi
            tabelBody.innerHTML = '';
            totalHarga = 0;
            totalInput.value = 0;
            document.getElementById('bayar').value = '';
        }
    });
</script>
@endsection
