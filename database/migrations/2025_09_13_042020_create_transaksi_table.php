<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transaksi', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('produk_id');
    $table->string('kode_invoice')->unique();
    $table->integer('total_harga');
    $table->integer('uang_bayar');
    $table->integer('kembalian');
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
