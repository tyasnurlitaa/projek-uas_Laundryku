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

        /* Warna Notifikasi & Sukses (Sage Green) */
        --sage-bg: #EDF3EC;
        --sage-text: #607955;
        --sage-border: #E1ECE0;

        /* Warna Aksi Edit (Peach Nude) */
        --peach-bg: #FCEFE9;
        --peach-text: #B47B5F;

        /* Warna Aksi Hapus (Rose Clay) */
        --rose-bg: #FBF0F0;
        --rose-text: #C07D7D;
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

    /* Table Customizations */
    .table-aesthetic {
        margin-bottom: 0;
    }

    .table-aesthetic th {
        background-color: #FCFAF7;
        color: var(--text-muted);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.8px;
        padding: 14px 20px;
        border-bottom: 2px solid var(--border-color) !important;
    }

    .table-aesthetic td {
        padding: 16px 20px;
        vertical-align: middle;
        color: var(--text-dark);
        border-bottom: 1px solid rgba(240, 230, 216, 0.7);
        font-size: 0.95rem;
    }

    .table-aesthetic tr:last-child td {
        border-bottom: none;
    }

    /* Badge & Info */
    .price-tag {
        font-weight: 700;
        color: var(--caramel-primary);
    }

    .duration-badge {
        background-color: var(--caramel-light);
        color: var(--caramel-primary);
        padding: 6px 14px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        display: inline-block;
    }

    /* Aesthetic Buttons */
    .btn-add-aesthetic {
        background-color: var(--caramel-primary);
        color: #FFFFFF !important;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        box-shadow: 0 4px 14px rgba(158, 116, 82, 0.2);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-add-aesthetic:hover {
        background-color: #8C6242;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(158, 116, 82, 0.3);
    }

    /* Action Buttons (Edit & Delete) */
    .btn-action-edit {
        background-color: var(--peach-bg);
        color: var(--peach-text) !important;
        border: 1px solid rgba(180, 123, 95, 0.15);
        padding: 8px 14px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }

    .btn-action-edit:hover {
        background-color: #B47B5F;
        color: #FFFFFF !important;
        box-shadow: 0 4px 12px rgba(180, 123, 95, 0.15);
        transform: translateY(-1px);
    }

    .btn-action-delete {
        background-color: var(--rose-bg);
        color: var(--rose-text) !important;
        border: 1px solid rgba(192, 125, 125, 0.15);
        padding: 8px 14px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: none;
    }

    .btn-action-delete:hover {
        background-color: #C07D7D;
        color: #FFFFFF !important;
        box-shadow: 0 4px 12px rgba(192, 125, 125, 0.15);
        transform: translateY(-1px);
    }

    /* Custom Alert Sage Green */
    .alert-sage {
        background-color: var(--sage-bg) !important;
        border: 1px solid var(--sage-border) !important;
        color: var(--sage-text) !important;
        border-radius: 14px;
        font-weight: 600;
        padding: 14px 20px;
        box-shadow: 0 4px 15px rgba(96, 121, 85, 0.04);
    }

    .alert-sage .btn-close {
        filter: grayscale(1) invert(0.2) sepia(0.5) hue-rotate(50deg);
    }

    /* Empty State Illustration */
    .empty-state {
        padding: 3.5rem 2rem;
        text-align: center;
    }

    .empty-state-icon {
        width: 72px;
        height: 72px;
        background-color: var(--caramel-light);
        color: var(--caramel-primary);
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
        font-size: 1.8rem;
    }
</style>

<div class="container-fluid content-wrapper-aesthetic py-4">
    <!-- Header Page -->
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="page-title mb-1">Data Layanan / Paket</h2>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Kelola opsi paket cuci dan estimasi waktu penyelesaian laundry Anda</p>
        </div>
        <a href="{{ route('layanan.create') }}" class="btn-add-aesthetic">
            <i class="bi bi-plus-lg"></i>
            Tambah Layanan Baru
        </a>
    </div>

    <!-- Alert / Notifikasi Sukses (Warna Sage Green Nude) -->
    @if(session('success'))
    <div class="alert alert-sage alert-dismissible fade show border-0 d-flex align-items-center gap-2 mb-4" role="alert">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Card Tabel Daftar Layanan -->
    <div class="card card-aesthetic">
        <div class="card-header-aesthetic">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-collection-fill" style="color: var(--caramel-primary); font-size: 1.1rem;"></i>
                <h6 class="card-header-title">Daftar Paket Laundry Aktif</h6>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-aesthetic table-hover align-middle">
                <thead>
                    <tr>
                        <th class="text-center" width="80">No</th>
                        <th>Nama Layanan</th>
                        <th>Harga / Kg</th>
                        <th>Estimasi Selesai</th>
                        <th class="text-end" width="220">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanans as $key => $l)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 8px; height: 8px; border-radius: 50%; background-color: var(--caramel-primary);"></div>
                                <span class="fw-bold text-dark">{{ $l->nama_layanan }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="price-tag">Rp {{ number_format($l->harga, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            <span class="duration-badge">
                                <i class="bi bi-clock-history me-1"></i>
                                {{ $l->estimasi_hari }} Hari
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('layanan.edit', $l->id) }}" class="btn-action-edit">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('layanan.destroy', $l->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus paket layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete">
                                        <i class="bi bi-trash3"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-folder-x"></i>
                                </div>
                                <h5 class="fw-bold mb-1" style="color: var(--text-dark);">Belum Ada Data Layanan</h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">Klik tombol "Tambah Layanan Baru" untuk mengisi daftar paket laundry Anda.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection