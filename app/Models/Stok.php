<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk; 

class Stok extends Model
{
    protected $table = 'stok'; // karena bukan plural default
    protected $fillable = ['menu_id','jenis','jumlah','keterangan'];

    public function menu()
    {
        return $this->belongsTo(Produk::class);
    }
}