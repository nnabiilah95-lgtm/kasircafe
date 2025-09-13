<?php

namespace App\Models;

use App\Http\Controllers\ProdukController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    protected $fillable = ['tanggal','menu_id','jumlah','total','status'];

    public function product() {
        return $this->belongsTo(ProdukController::class);
    }
}