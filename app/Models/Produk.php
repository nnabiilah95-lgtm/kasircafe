<?php

namespace App\Models;

use App\Http\Controllers\TransaksiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_produk',
        'kategori',
        'harga',
        'foto'
    ];

    public function transactions() {
        return $this->hasMany(TransaksiController::class);
    }
}