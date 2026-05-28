<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
    // ambil input filter dari request
        $filterPembeli = $request->input('pembeli_id');

        // query transaksi dengan relasi pembeli
        $query = Transaksi::with('pembeli')->latest();

        // kalau ada filter pembeli
        if ($filterPembeli) {
            $query->where('pembeli_id', $filterPembeli);
        }

        // ambil hasil query (tanpa pagination sesuai permintaanmu)
        $transaksi = $query->get();

        return view('transaksi.index', [
            'title' => 'Transaksi',
            'transaksi' => $transaksi,
            'pembeli' => Pembeli::all(), // untuk dropdown filter
        ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('transaksi.create', [
            'title' => 'Tambah Transaksi',
            'pembeli' => Pembeli::all(), // kirim data pembeli untuk dropdown
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pembeli_id'        => 'required|integer|exists:pembelis,id',
            'kode_transaksi'    => 'required|string|max:50|unique:transaksis,kode_transaksi',
            'tanggal_transaksi' => 'required|date',
            'jumlah_barang'     => 'required|integer|min:1',
            'total_harga'       => 'required|numeric|min:0',
        ], [
            'kode_transaksi.unique' => 'Kode transaksi sudah digunakan, silakan isi kode lain.',
        ]);

        $pembeli = Pembeli::findOrFail($validated['pembeli_id']);
        $validated['nama_pembeli'] = $pembeli->nama;

        Transaksi::create($validated);

        return redirect()->route('transaksi.index')
            ->with('success', 'Data transaksi berhasil ditambahkan');
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
