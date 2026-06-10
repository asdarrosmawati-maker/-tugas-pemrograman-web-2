<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'name',
    'merek',
    'jenis',
    'harga',
    'stok',
    'keterangan'
])]
class Tas extends Model
{
    /** @use HasFactory<\Database\Factories\TasFactory> */
    use HasFactory, SoftDeletes;

    //protected $fillable = ['name', 'merek', 'jenis', 'harga', 'stok'];

    //protected $guarded = ['id'];
}
