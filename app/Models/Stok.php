<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk; 

class Stok extends Model {
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'jenis',
        'jumlah',
        'keterangan'
    ];

    public function produk() {
        return $this->belongsTo(Produk::class);
    }
}