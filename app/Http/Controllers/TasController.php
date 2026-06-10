<?php

namespace App\Http\Controllers;

use App\Models\Tas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk-tas1.index', [
            'title' => 'PRODUK TAS',
            'datatas' => Tas::all(),
        ]);
    }

    /**
     *  show the form for create a new resource
     */
    public function create()
    {
        return view('produk-tas1.create', [
            'title' => 'Create produk Tas',
        ]);
    }

    /**
     * store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'merek' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|max:5',

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'merek.required' => 'Merek tidak boleh kosong',
            'merek.max' => 'Merek tidak boleh lebih dari :max karakter',
            'jenis.required' => 'Jenis tidak boleh kosong',
            'jenis.max' => 'Jenis tidak boleh lebih dari :max karakter',
            'harga.required' => 'Harga wajib ada',
            'stok.required' => 'stok wajib ada',

        ]);
    DB::beginTransaction();
    try {
        Tas::create($request->all()); // simpan data produk tas
        DB::commit();
        return redirect()->route('produk-tas.index')->withSuccess('Data berhasil ditambahkan');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('produk-tas.create')->withError('Data gagal ditambahkan: ' . $e->getMessage());
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Tas $tas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tas $tas)
    {
        return view('produk-tas1.edit', [
            'title' => 'Edit produk Tas',
            'tas' => $tas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tas $tas)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'merek' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|max:5',

        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'merek.required' => 'Merek tidak boleh kosong',
            'merek.max' => 'Merek tidak boleh lebih dari :max karakter',
            'jenis.required' => 'Jenis tidak boleh kosong',
            'jenis.max' => 'Jenis tidak boleh lebih dari :max karakter',
            'harga.required' => 'Harga wajib ada',
            'stok.required' => 'stok wajib ada',

        ]);

        DB::beginTransaction();
    try {
        $tas->update($validated); // gunakan hasil validasi
        DB::commit();
        return redirect()->route('produk-tas.index')->withSuccess('Data berhasil diupdate');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('produk-tas.edit', $tas)->withError('Terjadi kesalahan saat mengupdate produk tas' . $e->getMessage());
    }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tas $tas)
    {
        $tas->delete();

        return redirect()->route('produk-tas.index')
            ->with('success', 'Data berhasil dihapus');
    }
    //soft delete
    public function trash()
    {
        return view('produk-tas1.trash', [
            'title' => 'Trash produk Tas',
            'datatas' => Tas::onlyTrashed()->get(),
        ]);
}
public function restore(Tas $tas)
    {
        $tas->restore();

        return redirect()->route('produk-tas.trash')
            ->with('success', 'Data berhasil dikembalikan');
    }
public function forceDelete(Tas $tas)
    {
        $tas->forceDelete();

        return redirect()->route('produk-tas.trash')
            ->with('success', 'Data berhasil dihapus permanen');
    }
}
