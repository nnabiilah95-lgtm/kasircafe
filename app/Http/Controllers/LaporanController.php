<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index(Request $request)
{
    $start = $request->start_date;
    $end = $request->end_date;

    $query = \App\Models\Transaksi::query();

    if ($start && $end) {
        $query->whereBetween('created_at', [$start . " 00:00:00", $end . " 23:59:59"]);
    }

    $transaksi = $query->get();

    return view('laporan.index', compact('transaksi'));
}
}
