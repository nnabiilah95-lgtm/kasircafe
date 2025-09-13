@extends('layouts.app')

@section('title', 'Stok')

@section('content')
<h2>📊 Stok Produk</h2>
<p>Monitoring ketersediaan stok bahan & produk.</p>

<table class="table table-hover">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Stok Tersisa</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Kopi Hitam</td>
      <td>30</td>
      <td><span class="badge bg-success">Aman</span></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Roti Bakar</td>
      <td>5</td>
      <td><span class="badge bg-danger">Menipis</span></td>
    </tr>
  </tbody>
</table>
@endsection