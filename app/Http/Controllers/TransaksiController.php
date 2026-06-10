<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksis = Transaksi::with('pembeli')->latest();
        $keyword = $request->input('keyword'); // ambil input dari form
        $pembeliId = $request->input('pembeli_id');

        if (!empty($keyword)) {
            $transaksis->where(function ($query) use ($keyword) {
                $query->where('kode_transaksi', 'like', '%' . $keyword . '%')
                      ->orWhereHas('pembeli', function ($q) use ($keyword) {
                          $q->where('nama', 'like', '%' . $keyword . '%');
                      });
            });
        }

        if (!empty($pembeliId)) {
            $transaksis->where('pembeli_id', $pembeliId);
        }

        return view('transaksi.index', [
            'title' => 'Transaksi',
            'pembeli' => Pembeli::all(),
            'transaksis' => $transaksis->paginate(15)->withQueryString(),
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
        return view('transaksi.show', [
        'title' => 'Detail Transaksi',
        'transaksi' => $transaksi,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
         return view('transaksi.edit', [
        'title' => 'Edit Transaksi',
        'transaksi' => $transaksi,
        'pembeli' => Pembeli::all(), // kirim data pembeli untuk dropdown
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validated = $request->validate([
            'pembeli_id'        => 'required|exists:pembelis,id',
            'kode_transaksi'    => 'required|string|max:50|unique:transaksis,kode_transaksi,' . $transaksi->id,
            'tanggal_transaksi' => 'required|date',
            'jumlah_barang'     => 'required|integer|min:1',
            'total_harga'       => 'required|numeric|min:0',
        ]);

        $pembeli = Pembeli::findOrFail($validated['pembeli_id']);
        $validated['nama_pembeli'] = $pembeli->nama;

        $transaksi->update($validated);

        return redirect()->route('transaksi.index')
            ->with('success', 'Data transaksi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

    return redirect()->route('transaksi.index')
    ->with('success', 'Data transaksi berhasil dihapus');
    }
}
