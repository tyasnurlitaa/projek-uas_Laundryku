@extends('layouts.admin')

@section('content')
<style>
    :root {
        /* Palet Warna Nude Laporan (Soft Rose Clay) */
        --bg-main: #FCFAF7;          /* Background halaman krem ultra-soft */
        --card-bg: #FFFFFF;
        --border-color: #F5E6E6;     /* Garis pembatas mawar hangat */
        --text-dark: #4E3C3C;        /* Espresso rose */
        --text-muted: #8C7373;

        /* Warna Aksen Menu Laporan (Rose Clay Nude) */
        --rose-primary: #B27070;
        --rose-light: #FDF4F4;
        --rose-hover: #965B5B;
        --input-focus-shadow: rgba(178, 112, 112, 0.15);

        /* Warna Omset Sukses (Sage Green Nude) */
        --sage-success: #607955;
        --sage-success-bg: #EDF3EC;
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
        box-shadow: 0 10px 30px rgba(78, 60, 60, 0.04);
        overflow: hidden;
    }

    .card-header-aesthetic {
        background-color: #FAF2F2 !important;
        border-bottom: 1px solid var(--border-color);
        padding: 1.25rem 1.5rem !important;
    }

    .card-header-title {
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
        font-size: 1.1rem;
    }

    /* Financial Summary Card */
    .omset-card-aesthetic {
        background: linear-gradient(135deg, #FAF4F4 0%, #FFFFFF 100%);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(178, 112, 112, 0.03);
    }

    .omset-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .omset-amount {
        font-size: 2.2rem;
        font-weight: 900;
        color: var(--rose-primary);
        letter-spacing: -1px;
        margin-bottom: 0.5rem;
    }

    .omset-badge {
        background-color: var(--sage-success-bg);
        color: var(--sage-success);
        padding: 6px 12px;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
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
        border-bottom: 1px solid rgba(245, 230, 230, 0.6);
        font-size: 0.95rem;
    }

    .table-aesthetic tr:last-child td {
        border-bottom: none;
    }

    /* Meta & Badges */
    .price-tag {
        font-weight: 800;
        color: var(--rose-primary);
    }

    .meta-detail-text {
        font-size: 0.88rem;
        color: var(--text-muted);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .date-badge {
        background-color: #FDF9F9;
        color: var(--text-dark);
        border: 1px solid var(--border-color);
        padding: 6px 12px;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    /* Action & Navigation Buttons */
    .btn-action-print {
        background-color: var(--rose-primary);
        color: #FFFFFF !important;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        box-shadow: 0 4px 14px rgba(178, 112, 112, 0.2);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-action-print:hover {
        background-color: var(--rose-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(178, 112, 112, 0.3);
    }

    .btn-receipt-print {
        background-color: var(--rose-light);
        color: var(--rose-primary) !important;
        border: 1px solid rgba(178, 112, 112, 0.15);
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

    .btn-receipt-print:hover {
        background-color: var(--rose-primary);
        color: #FFFFFF !important;
        box-shadow: 0 4px 12px rgba(178, 112, 112, 0.15);
        transform: translateY(-1px);
    }

    /* Custom Alert */
    .alert-rose {
        background-color: var(--rose-light) !important;
        border: 1px solid rgba(178, 112, 112, 0.15) !important;
        color: var(--rose-primary) !important;
        border-radius: 14px;
        font-weight: 600;
        padding: 14px 20px;
        box-shadow: 0 4px 15px rgba(178, 112, 112, 0.04);
    }

    /* Struk kasir modal styles */
    .receipt-container {
        font-family: 'Courier New', Courier, monospace;
        color: #000000;
        padding: 20px;
        max-width: 350px;
        margin: 0 auto;
        background-color: #FFFFFF;
    }

    .receipt-header {
        text-align: center;
        margin-bottom: 15px;
    }

    .receipt-title {
        font-size: 1.4rem;
        font-weight: bold;
        margin: 0;
        letter-spacing: 1px;
    }

    .receipt-subtitle {
        font-size: 0.85rem;
        margin: 2px 0 0 0;
    }

    .receipt-divider {
        border-top: 1px dashed #000000;
        margin: 10px 0;
    }

    .receipt-row {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        margin-bottom: 4px;
    }

    .receipt-row.total {
        font-weight: bold;
        font-size: 1.05rem;
        margin-top: 8px;
    }

    /* Print Stylesheets Optimization */
    @media print {
        body * {
            visibility: hidden;
        }
        #printReportArea, #printReportArea * {
            visibility: visible;
        }
        #printReportArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            background-color: #FFFFFF !important;
        }
        .no-print {
            display: none !important;
        }
        .card-aesthetic {
            border: none !important;
            box-shadow: none !important;
        }
    }
</style>

<div class="container-fluid content-wrapper-aesthetic py-4" id="printReportArea">
    <!-- Header Page -->
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4 no-print">
        <div>
            <h2 class="page-title mb-1">Laporan Keuangan</h2>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Analisis pendapatan, rekonsiliasi kasir, dan cetak laporan fisik periodik</p>
        </div>
        <!-- Tombol Cetak PDF Laporan -->
        <button onclick="window.print()" class="btn-action-print">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            Cetak Laporan PDF
        </button>
    </div>

    <!-- Kotak Ringkasan Total Omset (Soft Rose Clay Card) -->
    <div class="row mb-4">
        <div class="col-lg-6 col-xl-5">
            <div class="omset-card-aesthetic">
                <p class="omset-label">Total Pendapatan Masuk</p>
                <h1 class="omset-amount">Rp {{ number_format($total_omset, 0, ',', '.') }}</h1>
                <div class="d-flex align-items-center gap-2">
                    <span class="omset-badge">
                        <i class="bi bi-graph-up-arrow"></i>
                        Kas Stabil
                    </span>
                    <span class="text-muted" style="font-size: 0.8rem; font-weight: 600;">Terhitung dari akumulasi transaksi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Riwayat Keuangan -->
    <div class="card card-aesthetic">
        <div class="card-header-aesthetic d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-journal-text" style="color: var(--rose-primary); font-size: 1.1rem;"></i>
                <h6 class="card-header-title">Riwayat Transaksi Masuk</h6>
            </div>
            <span class="badge no-print" style="background-color: var(--rose-light); color: var(--rose-primary); font-weight: 700;">{{ count($transaksis) }} Entri</span>
        </div>
        
        <div class="table-responsive">
            <table class="table table-aesthetic table-hover align-middle">
                <thead>
                    <tr>
                        <th class="text-center" width="60">No</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Pelanggan</th>
                        <th>Paket Layanan</th>
                        <th>Berat</th>
                        <th>Nominal Pembayaran</th>
                        <th class="text-end no-print" width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $key => $t)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $key + 1 }}</td>
                        <td>
                            <span class="date-badge">
                                <i class="bi bi-calendar3 text-muted"></i>
                                {{ date('d-m-Y', strtotime($t->tanggal_masuk)) }}
                            </span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark">{{ $t->pelanggan ? $t->pelanggan->nama : 'Pelanggan Dihapus' }}</span>
                        </td>
                        <td>
                            <span class="meta-detail-text">
                                <i class="bi bi-box-seam"></i>
                                {{ $t->layanan ? $t->layanan->nama_layanan : 'Layanan Dihapus' }}
                            </span>
                        </td>
                        <td>
                            <span class="meta-detail-text">
                                <i class="bi bi-calculator"></i>
                                {{ $t->berat }} Kg
                            </span>
                        </td>
                        <td>
                            <span class="price-tag">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</span>
                        </td>
                        <td class="text-end no-print">
                            <!-- Tombol Trigger Modal Cetak Struk Kasir -->
                            <button type="button" 
                                    class="btn-receipt-print" 
                                    onclick="bukaStrukModal('{{ $t->id }}', '{{ $t->pelanggan ? $t->pelanggan->nama : 'Pelanggan Dihapus' }}', '{{ date('d-m-Y', strtotime($t->tanggal_masuk)) }}', '{{ $t->layanan ? $t->layanan->nama_layanan : 'Layanan Dihapus' }}', '{{ $t->berat }}', 'Rp {{ number_format($t->total_harga, 0, ',', '.') }}')">
                                <i class="bi bi-printer"></i>
                                Struk
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="text-center py-5">
                                <i class="bi bi-folder-x fs-1 text-muted"></i>
                                <h5 class="fw-bold mt-2">Belum Ada Riwayat Transaksi</h5>
                                <p class="text-muted">Data pemasukan otomatis tampil setelah transaksi laundry diselesaikan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Dialog Struk Kasir Termal -->
<div class="modal fade no-print" id="strukModal" tabindex="-1" aria-labelledby="strukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 15px 50px rgba(0,0,0,0.1);">
            <div class="modal-header border-0 bg-light" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                <h6 class="modal-title fw-bold text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-printer-fill" style="color: var(--rose-primary);"></i>
                    Pratinjau Struk Pembayaran
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 bg-white">
                <!-- Template Struk Kasir Termal -->
                <div id="thermalReceipt" class="receipt-container">
                    <div class="receipt-header">
                        <p class="receipt-title">LAUNDRYKU</p>
                        <p class="receipt-subtitle">Premium Clean & Care</p>
                        <p style="font-size: 0.75rem; margin: 0;">Telp: 0812-3456-7890</p>
                    </div>
                    <div class="receipt-divider"></div>
                    <div class="receipt-row">
                        <span>No. Nota:</span>
                        <span id="st_nota" style="font-weight: bold;">#1001</span>
                    </div>
                    <div class="receipt-row">
                        <span>Tanggal:</span>
                        <span id="st_tanggal">09-07-2026</span>
                    </div>
                    <div class="receipt-row">
                        <span>Pelanggan:</span>
                        <span id="st_pelanggan" style="font-weight: bold;">Rian Anggara</span>
                    </div>
                    <div class="receipt-divider"></div>
                    <div class="receipt-row" style="font-weight: bold;">
                        <span>Keterangan</span>
                        <span>Total</span>
                    </div>
                    <div class="receipt-divider"></div>
                    <div class="receipt-row">
                        <span id="st_layanan">Cuci Setrika Express</span>
                        <span></span>
                    </div>
                    <div class="receipt-row">
                        <span id="st_berat">3.5 Kg</span>
                        <span id="st_total">Rp 31.500</span>
                    </div>
                    <div class="receipt-divider"></div>
                    <div class="receipt-row total">
                        <span>TOTAL BAYAR</span>
                        <span id="st_grandtotal">Rp 31.500</span>
                    </div>
                    <div class="receipt-divider" style="margin-top: 15px;"></div>
                    <div class="receipt-header" style="margin-top: 10px; margin-bottom: 0;">
                        <p style="font-size: 0.8rem; font-weight: bold;">TERIMA KASIH</p>
                        <p style="font-size: 0.7rem; font-style: italic;">Pakaian bersih, wangi, & rapi adalah prioritas kami</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light" style="border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;">
                <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" style="font-size: 0.85rem;" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn-action-print rounded-pill px-4" onclick="cetakStrukTermal()">
                    <i class="bi bi-printer"></i>
                    Cetak Struk
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Cetak Struk Termal & Interaksi Modal -->
<script>
    let modalInstance = null;

    function bukaStrukModal(notaId, pelanggan, tanggal, layanan, berat, total) {
        // Isi data ke dalam struk termal preview
        document.getElementById('st_nota').innerText = '#' + notaId;
        document.getElementById('st_pelanggan').innerText = pelanggan;
        document.getElementById('st_tanggal').innerText = tanggal;
        document.getElementById('st_layanan').innerText = layanan;
        document.getElementById('st_berat').innerText = berat + ' Kg';
        document.getElementById('st_total').innerText = total;
        document.getElementById('st_grandtotal').innerText = total;

        // Tampilkan modal Bootstrap 5
        const modalEl = document.getElementById('strukModal');
        modalInstance = new bootstrap.Modal(modalEl);
        modalInstance.show();
    }

    function cetakStrukTermal() {
        const printContent = document.getElementById('thermalReceipt').innerHTML;
        const originalContent = document.body.innerHTML;

        // Buat jendela cetak pop-up baru agar hanya struk termal yang dicetak tanpa elemen dashboard luar
        const printWindow = window.open('', '', 'height=600,width=400');
        printWindow.document.write('<html><head><title>Cetak Struk Laundry</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: "Courier New", Courier, monospace; color: #000; padding: 10px; width: 300px; }');
        printWindow.document.write('.receipt-header { text-align: center; margin-bottom: 15px; }');
        printWindow.document.write('.receipt-title { font-size: 1.3rem; font-weight: bold; margin: 0; }');
        printWindow.document.write('.receipt-subtitle { font-size: 0.8rem; margin: 2px 0 0 0; }');
        printWindow.document.write('.receipt-divider { border-top: 1px dashed #000; margin: 10px 0; }');
        printWindow.document.write('.receipt-row { display: flex; justify-content: space-between; font-size: 0.85rem; margin-bottom: 4px; }');
        printWindow.document.write('.receipt-row.total { font-weight: bold; font-size: 1rem; margin-top: 8px; }');
        printWindow.document.write('</style></head><body>');
        printWindow.document.write(printContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        // Triger pencetakan browser
        printWindow.print();
        printWindow.close();
    }
</script>
@endsection