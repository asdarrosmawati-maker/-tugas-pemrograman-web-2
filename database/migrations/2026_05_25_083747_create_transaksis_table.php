<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transaksis', function (Blueprint $table) {
        $table->id();

        // relasi ke tabel pembelis
        $table->unsignedBigInteger('pembeli_id');
        $table->foreign('pembeli_id')
              ->references('id')
              ->on('pembelis')
              ->onDelete('cascade');

        // kolom transaksi
        $table->string('nama_pembeli');
        $table->string('kode_transaksi')->unique();
        $table->date('tanggal_transaksi');
        $table->integer('jumlah_barang');
        $table->decimal('total_harga', 15, 2);

        $table->timestamps();
    });
    }

    public function down(): void {
        Schema::dropIfExists('transaksis');
    }
};
