@extends('layouts.admin')

@section('content')
<style>
    :root {
        /* Palet Warna Nude Pelanggan */
        --bg-main: #FCFAF7;          /* Background halaman krem ultra-soft */
        --card-bg: #FFFFFF;
        --border-color: #F0E6D8;     /* Garis pembatas hangat */
        --text-dark: #4E443C;        /* Espresso brown */
        --text-muted: #8A7A6E;

        /* Warna Aksen Menu Pelanggan (Sage Green Nude) */
        --sage-primary: #738A67;
        --sage-light: #F0F5EE;
        --sage-hover: #5F7354;
        --input-focus-shadow: rgba(115, 138, 103, 0.15);

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
        border-color: var(--sage-primary);
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
        background-color: var(--sage-primary);
        color: #FFFFFF !important;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 700;
        font-size: 0.95rem;
        border: none;
        box-shadow: 0 4px 14px rgba(115, 138, 103, 0.2);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-submit-aesthetic:hover {
        background-color: var(--sage-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(115, 138, 103, 0.3);
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
        font-size: 1.1rem;
    }

    .input-with-icon-left {
        padding-left: 45px !important;
    }
</style>

<div class="container-fluid content-wrapper-aesthetic py-4">
    <!-- Header Page -->
    <div class="mb-4">
        <h2 class="page-title mb-1">Edit Profil Pelanggan</h2>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">Ubah informasi kontak atau alamat terbaru dari pelanggan terpilih</p>
    </div>

    <!-- Form Card -->
    <div class="row">
        <div class="col-lg-8 col-xl-7">
            <div class="card card-aesthetic">
                <div class="card-header-aesthetic">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-pencil-square" style="color: var(--sage-primary); font-size: 1.1rem;"></i>
                        <h6 class="card-header-title">Form Edit Pelanggan: {{ $pelanggan->nama }}</h6>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Nama Lengkap -->
                        <div class="form-group-aesthetic">
                            <label for="nama">Nama Lengkap</label>
                            <div class="input-group-aesthetic">
                                <span class="input-icon-left"><i class="bi bi-person"></i></span>
                                <input type="text" 
                                       class="form-control form-control-aesthetic input-with-icon-left @error('nama') is-invalid @enderror" 
                                       id="nama" 
                                       name="nama" 
                                       value="{{ old('nama', $pelanggan->nama) }}" 
                                       required>
                            </div>
                            @error('nama') 
                                <div class="invalid-feedback-aesthetic">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- No Telepon -->
                        <div class="form-group-aesthetic">
                            <label for="telepon">No. Telepon / WhatsApp</label>
                            <div class="input-group-aesthetic">
                                <span class="input-icon-left"><i class="bi bi-telephone"></i></span>
                                <input type="text" 
                                       class="form-control form-control-aesthetic input-with-icon-left @error('telepon') is-invalid @enderror" 
                                       id="telepon" 
                                       name="telepon" 
                                       value="{{ old('telepon', $peloggan->telepon ?? $pelanggan->telepon) }}" 
                                       required>
                            </div>
                            @error('telepon') 
                                <div class="invalid-feedback-aesthetic">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group-aesthetic">
                            <label for="alamat">Alamat Tinggal</label>
                            <div class="input-group-aesthetic" style="align-items: flex-start;">
                                <span class="input-icon-left" style="top: 24px;"><i class="bi bi-geo-alt"></i></span>
                                <textarea class="form-control form-control-aesthetic input-with-icon-left @error('alamat') is-invalid @enderror" 
                                          id="alamat" 
                                          name="alamat" 
                                          rows="3" 
                                          required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                            </div>
                            @error('alamat') 
                                <div class="invalid-feedback-aesthetic">{{ $message }}</div> 
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex align-items-center gap-3 mt-4 pt-2">
                            <button type="submit" class="btn-submit-aesthetic">
                                <i class="bi bi-arrow-up-circle"></i>
                                Perbarui Profil
                            </button>
                            <a href="{{ route('pelanggan.index') }}" class="btn-cancel-aesthetic">
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