<?php

use App\Http\Controllers\TasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    echo 'ok';
});


Route::get('/', [TasController::class, 'index'])->name('produk-tas.index');

Route::get('/produk-tas1', [TasController::class, 'index'])->name('produk-tas.index');
Route::get('/produk-tas1/create',  [TasController::class, 'create'])->name('produk-tas.create');
Route::post('/produk-tas1/store',  [TasController::class, 'store'])->name('produk-tas.store');
Route::get('/produk-tas1/{tas}edit',  [TasController::class, 'edit'])->name('produk-tas.edit');
Route::put('/produk-tas1/{tas}',  [TasController::class, 'update'])->name('produk-tas.update');
Route::delete('/produk-tas1/{tas}',  [TasController::class, 'destroy'])->name('produk-tas.destroy');

//soft delete
Route::get('/produk-tas1/trash', [TasController::class, 'trash'])->name('produk-tas.trash');
Route::put('/produk-tas1/restore/{tas}', [TasController::class, 'restore'])->name('produk-tas.restore')->withTrashed();


Route::resource('pembeli', PembeliController::class);
Route::resource('transaksi', TransaksiController::class);
