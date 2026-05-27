<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
    $filterPembeli = $request->input('pembeli_id');

    $query = Transaksi::with('pembeli')->latest();

    if ($keyword) {
        $query->where('kode_transaksi', 'like', "%{$keyword}%")
              ->orWhereHas('pembeli', function ($q) use ($keyword) {
                  $q->where('nama', 'like', "%{$keyword}%");
              });
    }

    if ($filterPembeli) {
        $query->where('pembeli_id', $filterPembeli);
    }

    $transaksi = $query->paginate(5)->withQueryString();

    return view('transaksi.index', [
        'title' => 'Data Transaksi',
        'transaksi' => $transaksi,
        'pembeli' => Pembeli::all(),
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
