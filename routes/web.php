<?php

use App\Http\Controllers\TasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tas', TasController::class);

Route::get('/produk-tas1', [TasController::class, 'index'])->name('produk-tas.index');
Route::get('/produk-tas1/create',  [TasController::class, 'create'])->name('produk-tas.craete');
Route::post('/produk-tas1/store',  [TasController::class, 'store'])->name('produk-tas.store');
