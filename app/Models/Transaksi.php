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
        'pembeli_id',
        'nama_pembeli',
        'kode_transaksi',
        'tanggal_transaksi',
        'jumlah_barang',
        'total_harga',
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_id');
    }
}
