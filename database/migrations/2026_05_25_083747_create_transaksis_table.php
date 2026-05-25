<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembeli_id'); // foreign key
            $table->string('kode_transaksi');
            $table->date('tanggal_transaksi');
            $table->integer('jumlah_barang');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();

            $table->foreign('pembeli_id')->references('id')->on('pembelis')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('transaksis');
    }
};
