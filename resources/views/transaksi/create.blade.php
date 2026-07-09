@extends('layouts.admin')

@section('content')
<style>
    :root {
        /* Palet Warna Nude Transaksi (Soft Lavender Nude) */
        --bg-main: #FCFAF7;          /* Background halaman krem ultra-soft */
        --card-bg: #FFFFFF;
        --border-color: #E8DFEE;     /* Garis pembatas lavender hangat */
        --text-dark: #463C4E;        /* Espresso plum */
        --text-muted: #7C6F85;

        /* Warna Aksen Menu Transaksi (Lavender Nude) */
        --lavender-primary: #8A6E99;
        --lavender-light: #F6F1F9;
        --lavender-hover: #735981;
        --input-focus-shadow: rgba(138, 110, 153, 0.15);

        /* Warna Aksi Kembali (Warm Muted) */
        --gray-muted-bg: #F5EFEB;
        --gray-muted-text: #7A6F66;

        /* Kalkulator Box Accent */
        --calc-bg: #FAF6FB;
        --calc-border: #ECDFF4;
    }

    /* Container Styling */
    .content-wrapper-aesthetic {
        background-color: var(--bg-main);
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--text-dark);
    }

    /* Title Styling */
    .page-title {
        font-weight: 800;
        letter-spacing: -0.5px;
        color: var(--text-dark);
    }

    /* Card Board styling */
    .card-aesthetic {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(70, 60, 78, 0.04);
        overflow: hidden;
    }

    .card-header-aesthetic {
        background-color: #FAF6FA !important;
        border-bottom: 1px solid var(--border-color);
        padding: 1.25rem 1.5rem !important;
    }

    .card-header-title {
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
        font-size: 1.1rem;
    }

    /* Form Fields Styling */
    .form-group-aesthetic {
        margin-bottom: 1.5rem;
    }

    .form-group-aesthetic label {
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-muted);
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control-aesthetic {
        background-color: #FCFAF7;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 12px 16px;
        color: var(--text-dark);
        font-size: 0.95rem;
        transition: all 0.2s ease;
        box-shadow: none;
    }

    /* Custom select arrow */
    select.form-control-aesthetic {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%237C6F85' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 12px;
        padding-right: 40px !important;
    }

    .form-control-aesthetic::placeholder {
        color: #C2B4A6;
    }

    .form-control-aesthetic:focus {
        background-color: #FFFFFF;
        border-color: var(--lavender-primary);
        box-shadow: 0 0 0 4px var(--input-focus-shadow);
        outline: none;
    }

    /* Input Addon Icon styling */
    .input-group-aesthetic {
        position: relative;
    }

    .input-icon-left {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        pointer-events: none;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
    }

    .input-with-icon-left {
        padding-left: 45px !important;
    }

    .input-unit-right {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-weight: 700;
        font-size: 0.85rem;
        pointer-events: none;
    }

    .input-with-unit-right {
        padding-right: 60px !important;
    }

    /* Live Calculator Box */
    .calculator-box {
        background-color: var(--calc-bg);
        border: 1px dashed var(--calc-border);
        border-radius: 16px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .calculator-title {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--lavender-primary);
        font-weight: 800;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .calculator-result-label {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin: 0;
    }

    .calculator-price {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--lavender-primary);
        margin: 0;
    }

    /* Aesthetic Buttons */
    .btn-submit-aesthetic {
        background-color: var(--lavender-primary);
        color: #FFFFFF !important;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 700;
        font-size: 0.95rem;
        border: none;
        box-shadow: 0 4px 14px rgba(138, 110, 153, 0.2);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-submit-aesthetic:hover {
        background-color: var(--lavender-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(138, 110, 153, 0.3);
    }

    .btn-cancel-aesthetic {
        background-color: var(--gray-muted-bg);
        color: var(--gray-muted-text) !important;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 700;
        font-size: 0.95rem;
        border: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-cancel-aesthetic:hover {
        background-color: #EBE1DB;
        transform: translateY(-2px);
    }
</style>

<div class="container-fluid content-wrapper-aesthetic py-4">
    <!-- Header Page -->
    <div class="mb-4">
        <h2 class="page-title mb-1">Tambah Transaksi Baru</h2>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Buat pesanan masuk baru, pilih paket laundry, dan hitung estimasi biaya</p>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-8 col-xl-7">
            <div class="card card-aesthetic">
                <div class="card-header-aesthetic">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-receipt-cutoff" style="color: var(--lavender-primary); font-size: 1.1rem;"></i>
                        <h6 class="card-header-title">Form Input Transaksi Masuk</h6>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        
                        <!-- Pilih Pelanggan -->
                        <div class="form-group-aesthetic">
                            <label for="pelanggan_id">Pilih Pelanggan</label>
                            <div class="input-group-aesthetic">
                                <span class="input-icon-left"><i class="bi bi-person-heart"></i></span>
                                <select class="form-control form-control-aesthetic input-with-icon-left" id="pelanggan_id" name="pelanggan_id" required>
                                    <option value="">-- Pilih Pelanggan Terdaftar --</option>
                                    @foreach($pelanggans as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->telepon }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Pilih Paket Layanan -->
                        <div class="form-group-aesthetic">
                            <label for="layanan_id">Pilih Paket Layanan</label>
                            <div class="input-group-aesthetic">
                                <span class="input-icon-left"><i class="bi bi-box2-heart"></i></span>
                                <select class="form-control form-control-aesthetic input-with-icon-left" id="layanan_id" name="layanan_id" required>
                                    <option value="" data-harga="0">-- Pilih Paket (Harga / Kg) --</option>
                                    @foreach($layanans as $l)
                                        <option value="{{ $l->id }}" data-harga="{{ $l->harga }}">{{ $l->nama_layanan }} - Rp {{ number_format($l->harga, 0, ',', '.') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Berat Cucian -->
                        <div class="form-group-aesthetic">
                            <label for="berat">Berat Cucian</label>
                            <div class="input-group-aesthetic">
                                <span class="input-icon-left"><i class="bi bi-calculator"></i></span>
                                <input type="number" 
                                       step="0.1" 
                                       class="form-control form-control-aesthetic input-with-icon-left input-with-unit-right" 
                                       id="berat" 
                                       name="berat" 
                                       placeholder="Contoh: 3.5" 
                                       required>
                                <span class="input-unit-right">Kg</span>
                            </div>
                        </div>

                        <!-- Live Calculator Box -->
                        <div class="calculator-box">
                            <div class="calculator-title">
                                <i class="bi bi-info-circle-fill"></i>
                                Estimasi Tagihan Pesanan
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <p class="calculator-result-label">Total Pembayaran:</p>
                                <p class="calculator-price" id="live_total">Rp 0</p>
                            </div>
                        </div>

                        <!-- Tanggal Masuk -->
                        <div class="form-group-aesthetic">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <div class="input-group-aesthetic">
                                <span class="input-icon-left"><i class="bi bi-calendar3"></i></span>
                                <input type="date" 
                                       class="form-control form-control-aesthetic input-with-icon-left" 
                                       id="tanggal_masuk" 
                                       name="tanggal_masuk" 
                                       value="{{ date('Y-m-d') }}" 
                                       required>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center gap-3 mt-4 pt-2">
                            <button type="submit" class="btn-submit-aesthetic">
                                <i class="bi bi-check-lg"></i>
                                Simpan Transaksi
                            </button>
                            <a href="{{ route('transaksi.index') }}" class="btn-cancel-aesthetic">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Kalkulator Estimasi Biaya Otomatis -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const layananSelect = document.getElementById('layanan_id');
        const beratInput = document.getElementById('berat');
        const totalOutput = document.getElementById('live_total');

        function hitungEstimasi() {
            const selectedOption = layananSelect.options[layananSelect.selectedIndex];
            const hargaPerKg = parseFloat(selectedOption.getAttribute('data-harga')) || 0;
            const berat = parseFloat(beratInput.value) || 0;
            
            const total = hargaPerKg * berat;
            
            // Format Rupiah
            const formattedTotal = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(total);

            totalOutput.textContent = formattedTotal;
        }

        layananSelect.addEventListener('change', hitungEstimasi);
        beratInput.addEventListener('input', hitungEstimasi);
    });
</script>
@endsection