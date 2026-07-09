<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Ambil data transaksi terbaru beserta relasi pelanggan dan layanan
        $transaksis = Transaksi::with(['pelanggan', 'layanan'])->orderBy('id', 'desc')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $layanans = Layanan::all();
        return view('transaksi.create', compact('pelanggans', 'layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:0.1',
            'tanggal_masuk' => 'required|date',
        ]);

        // Ambil harga dari layanan yang dipilih
        $layanan = Layanan::findOrFail($request->layanan_id);
        
        // Hitung total harga otomatis
        $total_harga = $request->berat * $layanan->harga;

        // Hitung estimasi tanggal selesai
        $tanggal_selesai = date('Y-m-d', strtotime($request->tanggal_masuk . ' + ' . $layanan->estimasi_hari . ' days'));

        Transaksi::create([
            'pelanggan_id' => $request->pelanggan_id,
            'layanan_id' => $request->layanan_id,
            'berat' => $request->berat,
            'total_harga' => $total_harga,
            'status' => 'Diterima',
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_selesai' => $tanggal_selesai,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diterima,Dicuci,Disetrika,Siap Diambil,Selesai',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'status' => $request->status
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Status transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}