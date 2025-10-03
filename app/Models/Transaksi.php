<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

     protected $table = "transaksi";

    protected $fillable = [
        'produk_id',
        'kode_invoice',
        'total_harga',
        'uang_bayar',
        'kembalian',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}