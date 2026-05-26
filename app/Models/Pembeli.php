<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
    ];

    public function transaksis()
{
    return $this->hasMany(Transaksi::class);
}

}
