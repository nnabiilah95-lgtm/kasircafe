<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // kasih tahu Laravel tabel yang dipakai
    protected $table = 'produk';

    protected $fillable = [
        'kode_barang',
        'nama_produk',
        'kategori',
        'harga',
        'foto'
    ];

    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }
}
