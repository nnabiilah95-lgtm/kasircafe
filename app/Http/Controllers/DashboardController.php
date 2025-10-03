<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Contoh data dummy transaksi 7 hari terakhir
        $tanggalMingguan = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $transaksiMingguan = [5, 7, 3, 6, 8, 4, 9]; // jumlah transaksi tiap hari

        // Kirim data ke view
        return view('dashboard', compact('tanggalMingguan', 'transaksiMingguan'));
    }
}
