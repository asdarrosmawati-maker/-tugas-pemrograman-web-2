<?php

namespace App\Http\Controllers;

use App\Models\Tas;
use Illuminate\Http\Request;

class TasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk-tas1.index', [
            'title' => 'produk Tas',
            'datatas' => Tas::all(),
        ]);
    }
    /**
     *  show the form for create a new resource
     */
    public function create()
    {
        return view('produk-tas1.create', [
            'title' => 'Create produk Tas'
        ]);
    }
    /**
     * store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|max:255',
            'merek' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok'  => 'required|numeric|max:5',

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

        Tas::create($validated);

        return redirect()->route('tas.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(tas $tas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tas $tas)
    {
        return view('produk-tas1.edit', [
            'title' => 'Edit Tas',
            'tas' => $tas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tas $tas)
    {
        $validated = $request->validate([
            'name'  => 'required|max:255',
            'merek' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok'  => 'required|numeric|max:5',

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

        $tas->update($validated);

        return redirect()->route('tas.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tas $tas)
    {
        //
    }
}
