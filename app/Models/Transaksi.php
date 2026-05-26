<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'pembeli_id',
        'kode_transaksi',
        'tanggal_transaksi',
        'jumlah_barang',
        'total_harga',
    ];


    public function pembeli()
{
    return $this->belongsTo(Pembeli::class);
}

}
