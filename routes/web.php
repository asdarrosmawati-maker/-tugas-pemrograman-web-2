<?php

use App\Http\Controllers\TasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/produk-tas1', [TasController::class, 'index']);
Route::get('/produk-tas1/create',  [TasController::class, 'create']);
