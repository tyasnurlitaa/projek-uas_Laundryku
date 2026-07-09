@extends('layouts.admin')

@section('content')
<style>
    :root {
        /* Palet Warna Nude Layanan */
        --bg-main: #FCFAF7;          /* Background halaman krem ultra-soft */
        --card-bg: #FFFFFF;
        --border-color: #F0E6D8;     /* Garis pembatas tipis hangat */
        --text-dark: #4E443C;        /* Espresso brown */
        --text-muted: #8A7A6E;

        /* Warna Aksen Menu Layanan (Caramel Nude) */
        --caramel-primary: #9E7452;
        --caramel-light: #FAF0E6;
        --caramel-hover: #F0E2D3;
        --input-focus-shadow: rgba(158, 116, 82, 0.15);

        /* Warna Aksi Kembali (Warm Muted) */
        --gray-muted-bg: #F5EFEB;
        --gray-muted-text: #7A6F66;
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
        box-shadow: 0 10px 30px rgba(78, 68, 60, 0.04);
        overflow: hidden;
    }

    .card-header-aesthetic {
        background-color: #FAF6F0 !important;
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

    .form-control-aesthetic::placeholder {
        color: #C2B4A6;
    }

    .form-control-aesthetic:focus {
        background-color: #FFFFFF;
        border-color: var(--caramel-primary);
        box-shadow: 0 0 0 4px var(--input-focus-shadow);
        outline: none;
    }

    /* Error Validation styling */
    .form-control-aesthetic.is-invalid {
        border-color: #D29595;
        background-color: #FFF6F6;
    }

    .form-control-aesthetic.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(210, 149, 149, 0.15);
    }

    .invalid-feedback-aesthetic {
        color: #B46565;
        font-size: 0.8rem;
        font-weight: 600;
        margin-top: 0.35rem;
        display: block;
    }

    /* Aesthetic Buttons */
    .btn-submit-aesthetic {
        background-color: var(--caramel-primary);
        color: #FFFFFF !important;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 700;
        font-size: 0.95rem;
        border: none;
        box-shadow: 0 4px 14px rgba(158, 116, 82, 0.2);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-submit-aesthetic:hover {
        background-color: #8C6242;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(158, 116, 82, 0.3);
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
        font-size: 0.95rem;
    }

    .input-with-icon-left {
        padding-left: 42px !important;
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
</style>

<div class="container-fluid content-wrapper-aesthetic py-4">
    <!-- Header Page -->
    <div class="mb-4">
        <h2 class="page-title mb-1">Tambah Layanan Baru</h2>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Buat kategori paket cuci baru untuk ditawarkan kepada pelanggan Anda</p>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-8 col-xl-7">
            <div class="card card-aesthetic">
                <div class="card-header-aesthetic">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-plus-fill" style="color: var(--caramel-primary); font-size: 1.1rem;"></i>
                        <h6 class="card-header-title">Form Isian Paket Baru</h6>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('layanan.store') }}" method="POST">
                        @csrf
                        
                        <!-- Nama Layanan -->
                        <div class="form-group-aesthetic">
                            <label for="nama_layanan">Nama Layanan / Paket</label>
                            <input type="text" 
                                   class="form-control form-control-aesthetic @error('nama_layanan') is-invalid @enderror" 
                                   id="nama_layanan" 
                                   name="nama_layanan" 
                                   placeholder="Contoh: Cuci Setrika Express" 
                                   value="{{ old('nama_layanan') }}" 
                                   required>
                            @error('nama_layanan') 
                                <div class="invalid-feedback-aesthetic">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Harga Per Kg -->
                        <div class="form-group-aesthetic">
                            <label for="harga">Harga per Kg</label>
                            <div class="input-group-aesthetic">
                                <span class="input-icon-left">Rp</span>
                                <input type="number" 
                                       class="form-control form-control-aesthetic input-with-icon-left @error('harga') is-invalid @enderror" 
                                       id="harga" 
                                       name="harga" 
                                       placeholder="Contoh: 9000" 
                                       value="{{ old('harga') }}" 
                                       required>
                            </div>
                            @error('harga') 
                                <div class="invalid-feedback-aesthetic">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Estimasi Selesai -->
                        <div class="form-group-aesthetic">
                            <label for="estimasi_hari">Estimasi Selesai</label>
                            <div class="input-group-aesthetic">
                                <input type="number" 
                                       class="form-control form-control-aesthetic input-with-unit-right @error('estimasi_hari') is-invalid @enderror" 
                                       id="estimasi_hari" 
                                       name="estimasi_hari" 
                                       placeholder="Contoh: 1" 
                                       value="{{ old('estimasi_hari') }}" 
                                       required>
                                <span class="input-unit-right">Hari</span>
                            </div>
                            @error('estimasi_hari') 
                                <div class="invalid-feedback-aesthetic">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center gap-3 mt-4 pt-2">
                            <button type="submit" class="btn-submit-aesthetic">
                                <i class="bi bi-check-lg"></i>
                                Simpan Paket
                            </button>
                            <a href="{{ route('layanan.index') }}" class="btn-cancel-aesthetic">
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
@endsection