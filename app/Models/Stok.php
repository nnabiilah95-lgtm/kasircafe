<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Stok extends Model
{
    use HasFactory;

    // kasih tau Laravel nama tabelnya
     protected $fillable = ['produk_id', 'total_stok'];
     protected $table = 'stok';


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}