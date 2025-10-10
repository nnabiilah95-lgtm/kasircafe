<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Stok;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total menu
        $totalMenu = Produk::count();

        // Hitung transaksi hari ini
        $transaksiHariIni = Transaksi::whereDate('created_at', Carbon::today())->count();

        // Hitung stok menipis
        $stokMenipis = Stok::where('jumlah', '<', 10)->count(); // ganti <10 sesuai kebutuhan

        // Ambil data transaksi 7 hari terakhir
        $tanggalMingguan = [];
        $dataMingguan = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i)->format('d M');
            $jumlah = Transaksi::whereDate('created_at', Carbon::today()->subDays($i))->count();

            $tanggalMingguan[] = $tanggal;
            $dataMingguan[] = $jumlah;
        }

        return view('dashboard', compact(
            'totalMenu',
            'transaksiHariIni',
            'stokMenipis',
            'tanggalMingguan',
            'dataMingguan'
        ));
    }
}
