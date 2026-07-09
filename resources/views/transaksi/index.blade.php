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

        /* Warna Status Pastel */
        --status-diterima-bg: #F3EFE9;
        --status-diterima-text: #7C6F85;
        --status-dicuci-bg: #FAF0E6;
        --status-dicuci-text: #9E7452;
        --status-disetrika-bg: #F0F5EE;
        --status-disetrika-text: #738A67;
        --status-siap-bg: #F6F1F9;
        --status-siap-text: #8A6E99;
        --status-selesai-bg: #EEF6F2;
        --status-selesai-text: #4E7E63;
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
        border-bottom: 1px solid rgba(232, 223, 238, 0.5);
        font-size: 0.95rem;
    }

    .table-aesthetic tr:last-child td {
        border-bottom: none;
    }

    /* Badges & Meta */
    .price-tag {
        font-weight: 800;
        color: var(--lavender-primary);
    }

    .meta-detail-text {
        font-size: 0.88rem;
        color: var(--text-muted);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    /* Status Badges Aesthetic */
    .badge-status-aesthetic {
        padding: 6px 14px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.82rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid transparent;
    }

    .status-diterima {
        background-color: var(--status-diterima-bg);
        color: var(--status-diterima-text);
        border-color: rgba(124, 111, 133, 0.15);
    }

    .status-dicuci {
        background-color: var(--status-dicuci-bg);
        color: var(--status-dicuci-text);
        border-color: rgba(158, 116, 82, 0.15);
    }

    .status-disetrika {
        background-color: var(--status-disetrika-bg);
        color: var(--status-disetrika-text);
        border-color: rgba(115, 138, 103, 0.15);
    }

    .status-siap {
        background-color: var(--status-siap-bg);
        color: var(--status-siap-text);
        border-color: rgba(138, 110, 153, 0.15);
    }

    .status-selesai {
        background-color: var(--status-selesai-bg);
        color: var(--status-selesai-text);
        border-color: rgba(78, 126, 99, 0.15);
    }

    /* Action Buttons */
    .btn-add-aesthetic {
        background-color: var(--lavender-primary);
        color: #FFFFFF !important;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 700;
        font-size: 0.9rem;
        border: none;
        box-shadow: 0 4px 14px rgba(138, 110, 153, 0.2);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-add-aesthetic:hover {
        background-color: var(--lavender-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(138, 110, 153, 0.3);
    }

    .btn-action-status {
        background-color: var(--lavender-light);
        color: var(--lavender-primary) !important;
        border: 1px solid rgba(138, 110, 153, 0.15);
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

    .btn-action-status:hover {
        background-color: var(--lavender-primary);
        color: #FFFFFF !important;
        box-shadow: 0 4px 12px rgba(138, 110, 153, 0.15);
        transform: translateY(-1px);
    }

    .btn-action-receipt {
        background-color: #FCFAF7;
        color: var(--lavender-primary) !important;
        border: 1px solid rgba(138, 110, 153, 0.2);
        padding: 8px 14px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-action-receipt:hover {
        background-color: var(--lavender-light);
        transform: translateY(-1px);
    }

    .btn-action-delete {
        background-color: #FBF0F0;
        color: #C07D7D;
        border: 1px solid rgba(192, 125, 125, 0.15);
        padding: 8px 12px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-action-delete:hover {
        background-color: #C07D7D;
        color: #FFFFFF;
        transform: translateY(-1px);
    }

    /* Custom Alert */
    .alert-lavender {
        background-color: var(--lavender-light) !important;
        border: 1px solid rgba(138, 110, 153, 0.15) !important;
        color: var(--lavender-primary) !important;
        border-radius: 14px;
        font-weight: 600;
        padding: 14px 20px;
        box-shadow: 0 4px 15px rgba(138, 110, 153, 0.04);
    }

    /* Empty State */
    .empty-state {
        padding: 3.5rem 2rem;
        text-align: center;
    }

    .empty-state-icon {
        width: 72px;
        height: 72px;
        background-color: var(--lavender-light);
        color: var(--lavender-primary);
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
        font-size: 1.8rem;
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

    /* CSS for Print View */
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>

<div class="container-fluid content-wrapper-aesthetic py-4">
    <!-- Header Page -->
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="page-title mb-1">Data Transaksi</h2>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Pantau status pengerjaan cucian masuk dan rekapitulasi keuangan transaksi</p>
        </div>
        <a href="{{ route('transaksi.create') }}" class="btn-add-aesthetic">
            <i class="bi bi-plus-lg"></i>
            Buat Transaksi Baru
        </a>
    </div>

    <!-- Alert / Notifikasi Sukses -->
    @if(session('success'))
    <div class="alert alert-lavender alert-dismissible fade show border-0 d-flex align-items-center gap-2 mb-4" role="alert">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close" style="filter: contrast(0.5);"></button>
    </div>
    @endif

    <!-- Card Tabel Daftar Transaksi -->
    <div class="card card-aesthetic">
        <div class="card-header-aesthetic">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-receipt-cutoff" style="color: var(--lavender-primary); font-size: 1.1rem;"></i>
                <h6 class="card-header-title">Daftar Order Laundry Aktif</h6>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-aesthetic table-hover align-middle">
                <thead>
                    <tr>
                        <th class="text-center" width="60">No</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Berat</th>
                        <th>Total Harga</th>
                        <th class="text-center" width="160">Status</th>
                        <th>Tgl Masuk</th>
                        <th>Estimasi Selesai</th>
                        <th class="text-end" width="240">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $key => $transaksi)
                    <tr>
                        <td class="text-center fw-bold text-muted">{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 38px; height: 38px; border-radius: 12px; background-color: var(--lavender-light); color: var(--lavender-primary); font-weight: 700;" class="d-flex align-items-center justify-content-center">
                                    {{ strtoupper(substr($transaksi->pelanggan->nama, 0, 1)) }}
                                </div>
                                <span class="fw-bold text-dark">{{ $transaksi->pelanggan->nama }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="meta-detail-text"><i class="bi bi-box-seam text-muted"></i> {{ $transaksi->layanan->nama_layanan }}</span>
                        </td>
                        <td>
                            <span class="meta-detail-text"><i class="bi bi-calculator text-muted"></i> {{ $transaksi->berat }} Kg</span>
                        </td>
                        <td>
                            <span class="price-tag">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
                        </td>
                        <td class="text-center">
                            @if($transaksi->status == 'Diterima')
                                <span class="badge-status-aesthetic status-diterima">
                                    <i class="bi bi-journal-check"></i> Diterima
                                </span>
                            @elseif($transaksi->status == 'Dicuci')
                                <span class="badge-status-aesthetic status-dicuci">
                                    <i class="bi bi-droplet"></i> Dicuci
                                </span>
                            @elseif($transaksi->status == 'Disetrika')
                                <span class="badge-status-aesthetic status-disetrika">
                                    <i class="bi bi-wind"></i> Disetrika
                                </span>
                            @elseif($transaksi->status == 'Siap Diambil')
                                <span class="badge-status-aesthetic status-siap">
                                    <i class="bi bi-gift"></i> Siap Diambil
                                </span>
                            @elseif($transaksi->status == 'Selesai')
                                <span class="badge-status-aesthetic status-selesai">
                                    <i class="bi bi-check-circle-fill"></i> Selesai
                                </span>
                            @endif
                        </td>
                        <td>
                            <span class="meta-detail-text"><i class="bi bi-calendar-event"></i> {{ date('d-m-Y', strtotime($transaksi->tanggal_masuk)) }}</span>
                        </td>
                        <td>
                            <span class="meta-detail-text" style="color: var(--lavender-primary); font-weight: 600;"><i class="bi bi-calendar-check"></i> {{ date('d-m-Y', strtotime($transaksi->tanggal_selesai)) }}</span>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-2">
                                <!-- Tombol Cetak Struk Kasir Instan -->
                                <button type="button" 
                                        class="btn-action-receipt" 
                                        onclick="bukaStrukModal('{{ $transaksi->id }}', '{{ $transaksi->pelanggan ? $transaksi->pelanggan->nama : 'Pelanggan Dihapus' }}', '{{ date('d-m-Y', strtotime($transaksi->tanggal_masuk)) }}', '{{ $transaksi->layanan ? $transaksi->layanan->nama_layanan : 'Layanan Dihapus' }}', '{{ $transaksi->berat }}', 'Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}')">
                                    <i class="bi bi-printer"></i> Struk
                                </button>

                               
                                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-delete" title="Batalkan Transaksi">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-receipt"></i>
                                </div>
                                <h5 class="fw-bold mb-1" style="color: var(--text-dark);">Belum Ada Transaksi Masuk</h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">Klik tombol "Buat Transaksi Baru" untuk mencatat orderan laundry pertama Anda.</p>
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
                    <i class="bi bi-printer-fill" style="color: var(--lavender-primary);"></i>
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
                        <p style="font-size: 0.75rem; font-style: italic;">Pakaian bersih, wangi, & rapi adalah prioritas kami</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light" style="border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;">
                <button type="button" class="btn btn-secondary rounded-pill px-4 fw-bold" style="font-size: 0.85rem;" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-add-aesthetic rounded-pill px-4" onclick="cetakStrukTermal()">
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