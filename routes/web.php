<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('produk-tas1', function () {
    return view('produk-tas1.index', ['title' => 'produk tas']);
});
Route::get('produk-tas1/create', function () {
    return view('produk-tas1.create', ['title' => 'Create produk tas']);
});
