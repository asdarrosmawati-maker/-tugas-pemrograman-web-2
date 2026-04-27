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
            'title' => 'produk tas',
            'datatas' => Tas::all(),
        ]);
    }
    /**
     *  show the form for create a new resource
     */
    public function create()
    {
        return view('produk-tas1.create', [
            'title' => 'Create produk tas'
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
    public function edit(tas $tas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tas $tas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tas $tas)
    {
        //
    }
}
