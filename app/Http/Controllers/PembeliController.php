<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::latest();
        $keyword = request('keyword'); // ambil input dari form

        if (!empty($keyword)) {
            $pembelis->where(function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%')
                      ->orWhere('no_hp', 'like', '%' . $keyword . '%');
            });
        }

        return view('pembeli.index', [
            'title' => 'Pembeli',
            'pembelis' => $pembelis->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembeli.create', [
        'title' => 'Tambah Pembeli'
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama' => 'required|string|max:100',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
    ]);

    Pembeli::create($validated);

    return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(Pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit', [
        'title' => 'Edit Pembeli',
        'pembeli' => $pembeli
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $validated = $request->validate([
        'nama' => 'required|string|max:100',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
    ]);

    $pembeli->update($validated);

    return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil diubah');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();
    return redirect()->route('pembeli.index')->with('success', 'Data pembeli berhasil dihapus');
}
    }

