@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')
<h2>💳 Transaksi Hari Ini</h2>
<p>Catatan transaksi penjualan.</p>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Produk</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>2025-09-11</td>
      <td>Kopi Hitam</td>
      <td>2</td>
      <td>Rp 30.000</td>
      <td><span class="badge bg-success">Lunas</span></td>
    </tr>
    <tr>
      <td>2</td>
      <td>2025-09-11</td>
      <td>Roti Bakar</td>
      <td>1</td>
      <td>Rp 20.000</td>
      <td><span class="badge bg-success">Lunas</span></td>
    </tr>
  </tbody>
</table>
@endsection