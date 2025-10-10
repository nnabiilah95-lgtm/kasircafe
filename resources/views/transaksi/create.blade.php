@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Transaksi</h3>

    {{-- Form Transaksi --}}
    <form action="{{ route('transaksi.store') }}" method="POST" id="formTransaksi">
        @csrf

        <!-- Pilih Produk -->
        <div class="mb-3">
            <label for="produk" class="form-label">Pilih Produk:</label>
            <select id="produk" class="form-select">
                <option value="">-- 🛒 Pilih Produk --</option>
                @foreach($produk as $item)
                    <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">
                        {{ $item->nama_produk }} - Rp{{ number_format($item->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tabel Pesanan -->
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
                        <!-- Pesanan ditambahkan dengan JS -->
                    </tbody>
                </table>

                <!-- Total dan Pembayaran -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="total" class="form-label">Total Harga</label>
                        <input type="text" id="total" class="form-control" value="Rp0" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="bayar" class="form-label">Uang Pembayaran</label>
                        <input type="number" id="bayar" class="form-control">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100" id="btnBayar">Bayar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden Input (dikirim ke controller) -->
        <input type="hidden" name="produk_id" id="produk_id">
        <input type="hidden" name="total_harga" id="total_harga">
        <input type="hidden" name="uang_bayar" id="uang_bayar">
        <input type="hidden" name="kembalian" id="kembalian">
    </form>
</div>

<!-- Script JS -->
<script>
    const produkSelect = document.getElementById('produk');
    const tabelBody = document.querySelector('#tabelPesanan tbody');
    const totalInput = document.getElementById('total');
    let totalHarga = 0;
    let produkDipilih = [];

    // Tambah produk ke tabel
    produkSelect.addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        if (!selected.value) return;

        const nama = selected.text.split('-')[0].trim();
        const harga = parseInt(selected.dataset.harga);
        const id = selected.value;

       

        // Buat row baru
        const row = document.createElement('tr');
        row.innerHTML = `
    <td>
        ${nama}
        <input type="hidden" name="produk_id[]" value="${id}">
    </td>
    <td>Rp${harga.toLocaleString("id-ID")}</td>
    <td>
        1
        <input type="hidden" name="jumlah[]" value="1">
    </td>
    <td class="subtotal" data-subtotal="${harga}">${harga}</td>
    <td><button type="button" class="btn btn-danger btn-sm btnHapus">X</button></td>
`;
        tabelBody.appendChild(row);

        // Simpan produk id
        produkDipilih.push(id);

        // Update total
        totalHarga += harga;
        totalInput.value = "Rp" + totalHarga.toLocaleString("id-ID");

        // Reset dropdown
        this.value = '';
    });

    // Hapus produk dari tabel
    tabelBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('btnHapus')) {
            const row = e.target.closest('tr');
            const subtotal = parseInt(row.querySelector('.subtotal').dataset.subtotal);
            totalHarga -= subtotal;
            totalInput.value = "Rp" + totalHarga.toLocaleString("id-ID");
            produkDipilih = [];
            row.remove();
        }
    });

    // Proses pembayaran
    document.getElementById('btnBayar').addEventListener('click', function (e) {
        e.preventDefault();

        const bayar = parseInt(document.getElementById('bayar').value);
        if (isNaN(bayar) || bayar <= 0) {
            alert('Masukkan nominal pembayaran!');
            return;
        }

        if (bayar < totalHarga) {
            alert('Uang tidak cukup!');
            return;
        }

        const kembalian = bayar - totalHarga;

        // Isi hidden input
        document.getElementById('produk_id').value = produkDipilih[0] ?? ''; 
        document.getElementById('total_harga').value = totalHarga;
        document.getElementById('uang_bayar').value = bayar;
        document.getElementById('kembalian').value = kembalian;

        // Submit form
        document.getElementById('formTransaksi').submit();
    });

</script>


@endsection