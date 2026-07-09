<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController; // <-- TAMBAHAN BARU
use App\Http\Controllers\LayananController;   // <-- TAMBAHAN BARU
use App\Http\Controllers\TransaksiController; // <-- TAMBAHAN BARU

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // ===========================
    // Pelanggan
    // ===========================
    Route::resource('pelanggan', PelangganController::class); 

    // ===========================
    // Layanan
    // ===========================
    Route::resource('layanan', LayananController::class);

    // ===========================
    // Transaksi
    // ===========================
    Route::resource('transaksi', TransaksiController::class);
    // ===========================
    // Laporan Bulanan & Cetak PDF
    // ===========================
    Route::get('/laporan', function (\Illuminate\Http\Request $request) {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        $transaksis = \App\Models\Transaksi::with(['pelanggan', 'layanan'])
            ->whereMonth('tanggal_masuk', $bulan)
            ->whereYear('tanggal_masuk', $tahun)
            ->orderBy('id', 'desc')
            ->get();

        $total_omset = $transaksis->sum('total_harga');

        return view('laporan.index', compact('transaksis', 'total_omset', 'bulan', 'tahun'));
    })->name('laporan.index');

    // Route baru khusus untuk cetak halaman polosan ke PDF
    Route::get('/laporan/cetak', function (\Illuminate\Http\Request $request) {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        $transaksis = \App\Models\Transaksi::with(['pelanggan', 'layanan'])
            ->whereMonth('tanggal_masuk', $bulan)
            ->whereYear('tanggal_masuk', $tahun)
            ->orderBy('id', 'desc')
            ->get();

        $total_omset = $transaksis->sum('total_harga');

        return view('laporan.cetak', compact('transaksis', 'total_omset', 'bulan', 'tahun'));
    })->name('laporan.cetak');
    // ===========================
    // Profile
    // ===========================
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
        Route::get('/init-migrasi-uas', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed --force');
        return "Database LaundryKu Berhasil Dimigrasi dan Di-seed! 🥳";
    } catch (\Exception $e) {
        return "Gagal migrasi: " . $e->getMessage();
    }
});
});

require __DIR__.'/auth.php';