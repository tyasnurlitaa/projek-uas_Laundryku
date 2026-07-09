<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $fillable = [
        'pelanggan_id', 
        'layanan_id', 
        'berat', 
        'total_harga', 
        'status', 
        'tanggal_masuk', 
        'tanggal_selesai'
    ];

    // Hubungkan ke model Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // Hubungkan ke model Layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}