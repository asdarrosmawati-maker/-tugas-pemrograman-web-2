<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // nama tabel (opsional kalau sesuai konvensi)
    protected $table = 'transaksis';

    // kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'pembeli_nama',
        'kode_transaksi',
        'tanggal_transaksi',
        'jumlah_barang',
        'total_harga',
    ];

    // relasi ke model Pembeli (many-to-one)
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class);
    }
}
