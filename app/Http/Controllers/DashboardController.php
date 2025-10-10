<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Stok;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // ✅ tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Hitung total menu
        $totalMenu = Produk::count();

        // Hitung transaksi hari ini
        $transaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();

        // Hitung stok menipis
        $stokMenipis = Stok::where('jumlah', '<=', 5)->count();

        // Data grafik mingguan (opsional)
        $tanggalMingguan = [];
        $dataMingguan = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i)->format('d M');
            $tanggalMingguan[] = $tanggal;

            $jumlah = Transaksi::whereDate('created_at', Carbon::today()->subDays($i))->count();
            $dataMingguan[] = $jumlah;
        }

        return view('dashboard', compact(
            'user',
            'totalMenu',
            'transaksiHariIni',
            'stokMenipis',
            'tanggalMingguan',
            'dataMingguan',
        ));
    }
}
