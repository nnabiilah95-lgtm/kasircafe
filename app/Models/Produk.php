<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; // jika nama tabel beda
    protected $fillable = ['kode_barang','nama_produk','kategori','harga','foto'];

    public function stok()
    {
        return $this->hasMany(Stok::class, 'menu_id'); 
        // kalau foreign key di migration pakai menu_id
        // kalau pakai produk_id → ganti jadi 'produk_id'
    }

    // Hitung total stok otomatis
    public function getTotalStokAttribute()
    {
        $masuk = $this->stok()->where('jenis', 'masuk')->sum('jumlah');
        $keluar = $this->stok()->where('jenis', 'keluar')->sum('jumlah');
        return $masuk - $keluar;
    }
}
