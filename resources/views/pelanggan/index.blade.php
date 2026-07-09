@extends('layouts.admin')

@section('content')
<style>
    :root {
        /* Palet Warna Nude Pelanggan (Soft Sage Green) */
        --bg-main: #FCFAF7;          /* Background halaman krem ultra-soft */
        --card-bg: #FFFFFF;
        --border-color: #F0E6D8;     /* Garis pembatas hangat */
        --text-dark: #4E443C;        /* Espresso brown */
        --text-muted: #8A7A6E;

        /* Warna Aksen Menu Pelanggan (Sage Green Nude) */
        --sage-primary: #738A67;
        --sage-light: #F0F5EE;
        --sage-hover: #5F7354;

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

    /* Info Badges */
    .phone-badge {
        background-color: #F3EFE9;
        color: var(--text-dark);
        padding: 6px 12px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .address-text {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: var(--text-muted);
    }

    /* Aesthetic Buttons */
    .btn-add-aesthetic {
        background-color: var(--sage-primary);
        color: #FFFFFF !important;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        box-shadow: 0 4px 14px rgba(115, 138, 103, 0.2);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-add-aesthetic:hover {
        background-color: var(--sage-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(115, 138, 103, 0.3);
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
        background-color: var(--sage-light) !important;
        border: 1px solid rgba(115, 138, 103, 0.15) !important;
        color: var(--sage-primary) !important;
        border-radius: 14px;
        font-weight: 600;
        padding: 14px 20px;
        box-shadow: 0 4px 15px rgba(115, 138, 103, 0.04);
    }

    /* Empty State */
    .empty-state {
        padding: 3.5rem 2rem;
        text-align: center;
    }

    .empty-state-icon {
        width: 72px;
        height: 72px;
        background-color: var(--sage-light);
        color: var(--sage-primary);
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
            <h2 class="page-title mb-1">Data Pelanggan</h2>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Kelola seluruh profil, data kontak, dan alamat pelanggan laundry Anda</p>
        </div>
        <a href="{{ route('pelanggan.create') }}" class="btn-add-aesthetic">
            <i class="bi bi-person-plus-fill"></i>
            Tambah Pelanggan Baru
        </a>
    </div>

    <!-- Alert / Notifikasi Sukses -->
    @if(session('success'))
    <div class="alert alert-sage alert-dismissible fade show border-0 d-flex align-items-center gap-2 mb-4" role="alert">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style="filter: contrast(0.5);"></button>
    </div>
    @endif

    <!-- Card Tabel Daftar Pelanggan -->
    <div class="card card-aesthetic">
        <div class="card-header-aesthetic">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-people-fill" style="color: var(--sage-primary); font-size: 1.1rem;"></i>
                <h6 class="card-header-title">Daftar Pelanggan Laundry Aktif</h6>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-aesthetic table-hover align-middle">
                <thead>
                    <tr>
                        <th class="text-center" width="80">No</th>
                        <th>Nama Lengkap</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th class="text-end" width="220">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggans as $key => $p)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <!-- Avatar dinamis estetik menggunakan huruf pertama nama pelanggan -->
                                <div style="width: 38px; height: 38px; border-radius: 12px; background-color: var(--sage-light); color: var(--sage-primary); font-weight: 700;" class="d-flex align-items-center justify-content-center">
                                    {{ strtoupper(substr($p->nama, 0, 1)) }}
                                </div>
                                <span class="fw-bold text-dark">{{ $p->nama }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="phone-badge">
                                <i class="bi bi-telephone-fill text-muted" style="font-size: 0.8rem;"></i>
                                {{ $p->telepon }}
                            </span>
                        </td>
                        <td>
                            <div class="address-text" title="{{ $p->alamat }}">
                                <i class="bi bi-geo-alt-fill me-1" style="color: var(--text-muted);"></i>
                                {{ $p->alamat }}
                            </div>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn-action-edit">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data pelanggan ini?')">
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
                                    <i class="bi bi-people"></i>
                                </div>
                                <h5 class="fw-bold mb-1" style="color: var(--text-dark);">Belum Ada Data Pelanggan</h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">Klik tombol "Tambah Pelanggan Baru" untuk mendaftarkan pelanggan pertama Anda.</p>
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