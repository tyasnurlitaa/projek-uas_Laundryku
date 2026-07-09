<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'estimasi_hari' => 'required|integer|min:1',
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Data layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanan.edit', compact('layanan'));
    }
public function update(Request $request, $id)
{
    $request->validate([
        'nama_layanan' => 'required|string|max:255',
        'harga'        => 'required|numeric',
        'estimasi_hari'=> 'required|numeric',
    ]);

    $layanan = Layanan::findOrFail($id);

    $layanan->update([
        'nama_layanan' => $request->nama_layanan,
        'harga'        => $request->harga,
        'estimasi_hari'=> $request->estimasi_hari,
    ]);

    return redirect()->route('layanan.index')
        ->with('success', 'Data layanan berhasil diperbarui!');
}


public function destroy($id)
{
    $layanan = Layanan::findOrFail($id);

    $layanan->delete();

    return redirect()->route('layanan.index')
        ->with('success', 'Data layanan berhasil dihapus!');
}


}