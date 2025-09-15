<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // kasih tau Laravel nama tabel yang dipakai
    protected $table = 'transaksi'; 

    protected $fillable = [
        'produk_id',
        'jumlah',
        'total_harga',
    ];
}
