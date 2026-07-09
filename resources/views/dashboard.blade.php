@extends('layouts.admin')

@section('content')
<!-- LINK BOOTSTRAP ICONS & CHART.JS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    :root {
        /* Palette Warna-Warni Nude Estetik */
        --bg-main: #FAF8F5;
        --nude-dark: #4E443C;
        --nude-primary: #C5A880; /* Caramel */
        
        /* 4 Varian Warna-Warni Nude untuk Kartu & Aksen */
        --nude-peach: #FCEFE9;      /* Pelanggan */
        --nude-peach-text: #B47B5F;
        
        --nude-sage: #EDF3EC;       /* Layanan */
        --nude-sage-text: #607955;
        
        --nude-lavender: #EFEFFA;   /* Transaksi */
        --nude-lavender-text: #6A6D9E;
        
        --nude-terracotta: #FAF0E6;  /* Pendapatan */
        --nude-terracotta-text: #9E7452;
    }

    body {
        background-color: var(--bg-main) !important;
        color: var(--nude-dark);
        font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
    }

    /* Card custom style */
    .card-aesthetic {
        background-color: #FFFFFF;
        border: 1px solid rgba(197, 168, 128, 0.15);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(78, 68, 60, 0.03) !important;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card-aesthetic:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(197, 168, 128, 0.08) !important;
    }

    /* Style warna-warni nude untuk kartu statistik */
    .card-stat-peach { background-color: var(--nude-peach); border-left: 5px solid var(--nude-peach-text); }
    .card-stat-sage { background-color: var(--nude-sage); border-left: 5px solid var(--nude-sage-text); }
    .card-stat-lavender { background-color: var(--nude-lavender); border-left: 5px solid var(--nude-lavender-text); }
    .card-stat-terracotta { background-color: var(--nude-terracotta); border-left: 5px solid var(--nude-terracotta-text); }

    /* Bulatan ikon di dalam kartu statistik */
    .icon-badge {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        background-color: #FFFFFF;
        box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    }

    /* Custom Buttons */
    .btn-nude-primary {
        background-color: var(--nude-primary);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        padding: 10px 20px;
        transition: all 0.2s ease;
    }

    .btn-nude-primary:hover {
        background-color: #B4966E;
        color: white;
        transform: translateY(-2px);
    }

    .btn-nude-outline {
        background-color: transparent;
        color: var(--nude-dark);
        border: 1.5px solid var(--nude-primary);
        border-radius: 12px;
        font-weight: 600;
        padding: 10px 20px;
        transition: all 0.2s ease;
    }

    .btn-nude-outline:hover {
        background-color: var(--nude-primary);
        color: white;
    }

    /* Table Styling */
    .table-aesthetic {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table-aesthetic thead th {
        background-color: #FAF8F5 !important;
        color: var(--nude-dark);
        font-weight: 600;
        border: none;
        padding: 14px;
    }

    .table-aesthetic tbody tr {
        background-color: #FFFFFF;
        box-shadow: 0 4px 12px rgba(78, 68, 60, 0.02);
        border-radius: 12px;
        transition: all 0.2s ease;
    }

    .table-aesthetic tbody tr:hover {
        background-color: #FDFCFB;
        transform: scale(1.005);
    }

    .table-aesthetic td {
        padding: 16px;
        border: none;
        vertical-align: middle;
    }

    .table-aesthetic td:first-child {
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }

    .table-aesthetic td:last-child {
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    /* Custom badges */
    .badge-aesthetic {
        padding: 6px 14px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.8rem;
        display: inline-block;
    }

    .badge-reguler { background-color: #E2ECE9; color: #517164; }
    .badge-express { background-color: #F9EFE6; color: #A47D5E; }
    .badge-setrika { background-color: #EFEFFA; color: #6A6D9E; }
    .badge-premium { background-color: #FCEFE9; color: #B47B5F; }

    /* Chart wrapper aspect ratio */
    .chart-container {
        position: relative;
        width: 100%;
        height: 280px;
    }
</style>

<div class="container-fluid py-4" style="background-color: var(--bg-main); min-height: 100vh;">

    <!-- Top Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color: var(--nude-dark); letter-spacing: -0.5px;">Dashboard Admin</h2>
            <p class="text-muted mb-0" style="font-size: 0.95rem;">Kelola data laundry Anda dengan warna-warni pastel yang menyenangkan!</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-nude-outline shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahLayanan">
                <i class="bi bi-box-seam me-2"></i> Tambah Paket
            </button>
            <button class="btn btn-nude-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahTransaksi">
                <i class="bi bi-plus-circle me-2"></i> Transaksi Baru
            </button>
        </div>
    </div>

    <!-- 4 Cards dengan Warna-Warni Nude Estetik -->
    <div class="row mb-4">
        <!-- Card 1: Total Pelanggan (Peach Nude) -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-aesthetic card-stat-peach border-0 h-100">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <p class="mb-1 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px; color: var(--nude-peach-text);">Total Pelanggan</p>
                        <h3 class="fw-bold mb-0" style="color: var(--nude-dark);">142 <span class="fs-6 fw-normal text-muted">orang</span></h3>
                    </div>
                    <div class="icon-badge" style="color: var(--nude-peach-text);">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Layanan (Sage Green Nude) -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-aesthetic card-stat-sage border-0 h-100">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <p class="mb-1 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px; color: var(--nude-sage-text);">Total Layanan</p>
                        <h3 class="fw-bold mb-0" style="color: var(--nude-dark);">4 <span class="fs-6 fw-normal text-muted">paket</span></h3>
                    </div>
                    <div class="icon-badge" style="color: var(--nude-sage-text);">
                        <i class="bi bi-tags-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Total Transaksi (Soft Lavender Nude) -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-aesthetic card-stat-lavender border-0 h-100">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <p class="mb-1 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px; color: var(--nude-lavender-text);">Total Transaksi</p>
                        <h3 class="fw-bold mb-0" style="color: var(--nude-dark);">89 <span class="fs-6 fw-normal text-muted">nota</span></h3>
                    </div>
                    <div class="icon-badge" style="color: var(--nude-lavender-text);">
                        <i class="bi bi-receipt"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Total Pendapatan (Terracotta Nude) -->
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card card-aesthetic card-stat-terracotta border-0 h-100">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <p class="mb-1 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.8px; color: var(--nude-terracotta-text);">Total Pendapatan</p>
                        <h3 class="fw-bold mb-0" style="color: var(--nude-dark); font-size: 1.45rem;">Rp 1.420.000</h3>
                    </div>
                    <div class="icon-badge" style="color: var(--nude-terracotta-text);">
                        <i class="bi bi-wallet2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dua Grafik untuk Visualisasi Maksimal -->
    <div class="row mb-4">
        <!-- Grafik 1: Tren Pendapatan (Line Chart) -->
        <div class="col-lg-8 mb-4">
            <div class="card card-aesthetic border-0 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-1" style="color: var(--nude-dark);">Grafik Tren Pendapatan</h5>
                        <p class="text-muted mb-0" style="font-size: 0.8rem;">Data omzet harian seminggu terakhir</p>
                    </div>
                    <span class="badge bg-white text-dark py-2 px-3 border rounded-pill" style="font-size: 0.75rem; border-color: var(--nude-primary) !important;">7 Hari Terakhir</span>
                </div>
                <!-- Tempat menggambar grafik utama -->
                <div class="chart-container">
                    <canvas id="revenueTrendChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Grafik 2: Distribusi Layanan Terpopuler (Doughnut Chart) -->
        <div class="col-lg-4 mb-4">
            <div class="card card-aesthetic border-0 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-1" style="color: var(--nude-dark);">Layanan Favorit</h5>
                        <p class="text-muted mb-0" style="font-size: 0.8rem;">Persentase orderan masuk</p>
                    </div>
                </div>
                <!-- Tempat menggambar grafik distribusi -->
                <div class="chart-container d-flex align-items-center justify-content-center">
                    <canvas id="serviceDistributionChart" style="max-height: 220px; max-width: 220px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Paket Laundry (Sesuai Permintaan) -->
    <div class="card card-aesthetic border-0 p-4 mb-4">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-3 mb-4">
            <div>
                <h5 class="fw-bold mb-1" style="color: var(--nude-dark);"><i class="bi bi-box-seam me-2 text-warning"></i>Daftar Paket Laundry</h5>
                <p class="text-muted mb-0" style="font-size: 0.85rem;">Daftar menu layanan laundry yang aktif saat ini.</p>
            </div>
            <button class="btn btn-nude-primary btn-sm px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahLayanan">
                <i class="bi bi-plus-lg me-1"></i> Tambah Paket Baru
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-aesthetic align-middle">
                <thead>
                    <tr>
                        <th style="width: 80px;" class="text-center">No</th>
                        <th>Nama Layanan</th>
                        <th>Harga / Kg</th>
                        <th>Estimasi Selesai</th>
                        <th class="text-center" style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item 1 -->
                    <tr>
                        <td class="text-center fw-bold text-muted">1</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="badge-aesthetic badge-reguler me-2"><i class="bi bi-sun"></i></span>
                                <span class="fw-bold" style="color: var(--nude-dark);">Cuci Kering Reguler</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark py-2 px-3 border rounded-pill fw-semibold">Rp 6.000</span>
                        </td>
                        <td>
                            <span class="text-muted"><i class="bi bi-clock me-1 text-info"></i> 2 Hari</span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light border text-primary me-1" title="Edit" style="border-radius: 8px;"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-light border text-danger" title="Hapus" style="border-radius: 8px;"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    <!-- Item 2 -->
                    <tr>
                        <td class="text-center fw-bold text-muted">2</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="badge-aesthetic badge-express me-2"><i class="bi bi-lightning-charge"></i></span>
                                <span class="fw-bold" style="color: var(--nude-dark);">Cuci Setrika Express</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark py-2 px-3 border rounded-pill fw-semibold">Rp 9.000</span>
                        </td>
                        <td>
                            <span class="text-muted"><i class="bi bi-clock me-1 text-warning"></i> 1 Hari</span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light border text-primary me-1" title="Edit" style="border-radius: 8px;"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-light border text-danger" title="Hapus" style="border-radius: 8px;"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    <!-- Item 3 -->
                    <tr>
                        <td class="text-center fw-bold text-muted">3</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="badge-aesthetic badge-setrika me-2"><i class="bi bi-wind"></i></span>
                                <span class="fw-bold" style="color: var(--nude-dark);">Setrika Saja</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark py-2 px-3 border rounded-pill fw-semibold">Rp 4.000</span>
                        </td>
                        <td>
                            <span class="text-muted"><i class="bi bi-clock me-1 text-secondary"></i> 1 Hari</span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light border text-primary me-1" title="Edit" style="border-radius: 8px;"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-light border text-danger" title="Hapus" style="border-radius: 8px;"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                    <!-- Item 4 -->
                    <tr>
                        <td class="text-center fw-bold text-muted">4</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="badge-aesthetic badge-premium me-2"><i class="bi bi-stars"></i></span>
                                <span class="fw-bold" style="color: var(--nude-dark);">Cuci Bedcover & Selimut</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark py-2 px-3 border rounded-pill fw-semibold">Rp 15.000</span>
                        </td>
                        <td>
                            <span class="text-muted"><i class="bi bi-clock me-1 text-danger"></i> 3 Hari</span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-light border text-primary me-1" title="Edit" style="border-radius: 8px;"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-light border text-danger" title="Hapus" style="border-radius: 8px;"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal Tambah Paket Layanan -->
<div class="modal fade" id="modalTambahLayanan" tabindex="-1" aria-labelledby="modalTambahLayananLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; background-color: #FAF8F5;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="modalTambahLayananLabel" style="color: var(--nude-dark);">Tambah Paket Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <div class="mb-3">
                        <label for="nama_layanan" class="form-label fw-semibold" style="color: var(--nude-dark);">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" placeholder="Contoh: Cuci Gorden Tebal" style="border-radius: 10px; border: 1.5px solid rgba(197, 168, 128, 0.3);">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label fw-semibold" style="color: var(--nude-dark);">Harga (Rp) / Kg atau Satuan</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: var(--nude-primary); color: white; border: none; border-radius: 10px 0 0 10px;">Rp</span>
                            <input type="number" class="form-control" id="harga" placeholder="12000" style="border-radius: 0 10px 10px 0; border: 1.5px solid rgba(197, 168, 128, 0.3);">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="estimasi" class="form-label fw-semibold" style="color: var(--nude-dark);">Estimasi Waktu</label>
                        <select class="form-select" id="estimasi" style="border-radius: 10px; border: 1.5px solid rgba(197, 168, 128, 0.3);">
                            <option value="1 Hari">1 Hari</option>
                            <option value="2 Hari">2 Hari</option>
                            <option value="3 Hari">3 Hari</option>
                            <option value="Express (6 Jam)">Express (6 Jam)</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-light border px-4" style="border-radius: 10px;" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-nude-primary px-4">Simpan Paket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Keamanan ekstra untuk memastikan Chart.js terinisialisasi dengan sempurna
        function initCharts() {
            if (typeof Chart === 'undefined') {
                console.log("Chart.js belum siap, mencoba memuat ulang dalam 200ms...");
                setTimeout(initCharts, 200);
                return;
            }

            // --- 1. TREN PENDAPATAN (LINE/AREA CHART) ---
            const ctxTrend = document.getElementById('revenueTrendChart').getContext('2d');
            
            // Membuat efek gradien terracotta-nude di bawah garis grafik
            const revenueGradient = ctxTrend.createLinearGradient(0, 0, 0, 250);
            revenueGradient.addColorStop(0, 'rgba(197, 168, 128, 0.45)');  // Nude Primary
            revenueGradient.addColorStop(1, 'rgba(250, 240, 230, 0.05)');  // Terracotta Light Faded

            new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    datasets: [{
                        label: 'Omset Harian (Rp)',
                        data: [120000, 190000, 155000, 280000, 210000, 340000, 395000],
                        borderColor: '#C5A880', /* Nude Primary */
                        backgroundColor: revenueGradient,
                        borderWidth: 4,
                        tension: 0.45, /* Memberikan efek lengkungan yang estetik */
                        fill: true,
                        pointBackgroundColor: '#4E443C',
                        pointBorderColor: '#FFF',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            grid: { color: 'rgba(197, 168, 128, 0.08)' },
                            ticks: {
                                color: '#8A7A6E',
                                font: { size: 11, family: 'Plus Jakarta Sans' },
                                callback: function(value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: '#8A7A6E',
                                font: { size: 11, family: 'Plus Jakarta Sans' }
                            }
                        }
                    }
                }
            });


            // --- 2. DISTRIBUSI LAYANAN (DOUGHNUT CHART) ---
            const ctxDist = document.getElementById('serviceDistributionChart').getContext('2d');
            new Chart(ctxDist, {
                type: 'doughnut',
                data: {
                    labels: ['Reguler', 'Express', 'Setrika Saja', 'Bedcover'],
                    datasets: [{
                        data: [45, 30, 15, 10], // Persentase order
                        backgroundColor: [
                            '#D2E4DE', // Sage pastel
                            '#F7E5DB', // Orange/peach pastel
                            '#E6E6FA', // Lavender pastel
                            '#FADBC8'  // Terracotta pastel
                        ],
                        borderColor: '#FFFFFF',
                        borderWidth: 3,
                        hoverOffset: 10
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#4E443C',
                                font: { size: 11, family: 'Plus Jakarta Sans', weight: 'bold' },
                                padding: 15,
                                usePointStyle: true
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.label + ': ' + context.raw + '% orderan';
                                }
                            }
                        }
                    },
                    cutout: '70%' // Membuat lubang tengah lebih lebar & minimalis
                }
            });
        }

        // Mulai memicu fungsi inisialisasi grafik
        initCharts();
    });
</script>
@endsection