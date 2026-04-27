<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'name',
    'merek',
    'jenis',
    'harga',
    'stok',
])]
class Tas extends Model
{
    /** @use HasFactory<\Database\Factories\TasFactory> */
    use HasFactory;

    //protected $fillable = ['name', 'merek', 'jenis', 'harga', 'stok'];

    //protected $guarded = ['id'];
}
