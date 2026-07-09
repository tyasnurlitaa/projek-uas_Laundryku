<style>
    :root {
        /* Palet Warna Nude Utama Sidebar */
        --sidebar-bg: #FAF6F0;       /* Warna krem linen hangat */
        --sidebar-border: #F0E6D8;   /* Garis pembatas lembut */
        --text-nude-dark: #4E443C;   /* Espresso brown untuk keterbacaan teks */
        --nude-muted: #8A7A6E;       /* Cokelat muda untuk info sekunder */
        
        /* 5 Varian Hover/Active Nude Warna-warni */
        --peach-bg: #FCEFE9; --peach-text: #B47B5F;
        --sage-bg: #EDF3EC; --sage-text: #607955;
        --caramel-bg: #FAF0E6; --caramel-text: #9E7452;
        --lavender-bg: #EFEFFA; --lavender-text: #6A6D9E;
        --rose-bg: #FBF0F0; --rose-text: #C07D7D;
    }

    /* Container Sidebar */
    .sidebar-aesthetic {
        background-color: var(--sidebar-bg) !important;
        border-right: 1px solid var(--sidebar-border);
        color: var(--text-nude-dark) !important;
        min-height: 100vh;
        padding: 1.5rem 1rem !important;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Pembatas (Divider) */
    .sidebar-divider {
        border-top: 1px solid rgba(78, 68, 60, 0.08);
        margin: 1.25rem 0;
        opacity: 1;
    }

    /* Navigasi List */
    .nav-aesthetic .nav-item {
        margin-bottom: 8px;
    }

    /* Desain Dasar Tombol Menu */
    .nav-link-aesthetic {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px !important;
        color: var(--text-nude-dark) !important;
        font-weight: 600;
        font-size: 0.95rem;
        border-radius: 14px;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
    }

    /* Efek Icon Badge di Sebelah Teks */
    .nav-link-aesthetic i {
        font-size: 1.15rem;
        transition: transform 0.2s ease;
    }

    .nav-link-aesthetic:hover i {
        transform: scale(1.15);
    }

    /* --- EFek Warna-warni Nude Berbeda per Menu saat Hover / Active --- */
    
    /* 1. Dashboard (Peach Nude) */
    .nav-link-dashboard:hover, .nav-link-dashboard.active {
        background-color: var(--peach-bg) !important;
        color: var(--peach-text) !important;
        box-shadow: 0 4px 12px rgba(180, 123, 95, 0.06);
    }

    /* 2. Pelanggan (Sage Green Nude) */
    .nav-link-pelanggan:hover, .nav-link-pelanggan.active {
        background-color: var(--sage-bg) !important;
        color: var(--sage-text) !important;
        box-shadow: 0 4px 12px rgba(96, 121, 85, 0.06);
    }

    /* 3. Layanan (Caramel Nude) */
    .nav-link-layanan:hover, .nav-link-layanan.active {
        background-color: var(--caramel-bg) !important;
        color: var(--caramel-text) !important;
        box-shadow: 0 4px 12px rgba(158, 116, 82, 0.06);
    }

    /* 4. Transaksi (Lavender Nude) */
    .nav-link-transaksi:hover, .nav-link-transaksi.active {
        background-color: var(--lavender-bg) !important;
        color: var(--lavender-text) !important;
        box-shadow: 0 4px 12px rgba(106, 109, 158, 0.06);
    }

    /* 5. Laporan (Rose Nude) */
    .nav-link-laporan:hover, .nav-link-laporan.active {
        background-color: var(--rose-bg) !important;
        color: var(--rose-text) !important;
        box-shadow: 0 4px 12px rgba(192, 125, 125, 0.06);
    }

    /* Logo Badge Styling */
    .logo-container {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 0.5rem 0.5rem 1.5rem 0.5rem;
    }

    .logo-icon-badge {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: linear-gradient(135deg, #FAF0E6, #DAC0A3);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 16px rgba(197, 168, 128, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.6);
    }

    .brand-text h4 {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--text-nude-dark);
        font-weight: 800;
        font-size: 1.2rem;
        letter-spacing: -0.5px;
        margin-bottom: 0;
    }

    .brand-text span {
        font-size: 0.65rem;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1.5px;
        color: var(--nude-muted);
        display: block;
        margin-top: -2px;
    }

    /* Custom Logout Button */
    .btn-logout-nude {
        background-color: #F5E6E3;
        color: #C07D7D;
        border: 1px solid rgba(192, 125, 125, 0.15);
        border-radius: 12px;
        font-weight: 700;
        padding: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.25s ease;
    }

    .btn-logout-nude:hover {
        background-color: #E8A399;
        color: white;
        box-shadow: 0 6px 15px rgba(232, 163, 153, 0.25);
        transform: translateY(-2px);
    }
</style>

<div class="col-md-2 sidebar-aesthetic min-vh-100 d-flex flex-column justify-content-between">
    <div>
        <!-- Logo Brand Premium LaundryKu -->
        <div class="logo-container">
            <div class="logo-icon-badge">
                <!-- SVG Icon: Desain Mesin Cuci Minimalis Premium -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#8C7355" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <!-- Rangka Mesin Cuci -->
                    <rect x="4" y="3" width="16" height="18" rx="2.5" />
                    <!-- Garis Panel Kontrol Atas -->
                    <line x1="4" y1="8" x2="20" y2="8" />
                    <!-- Tombol Putar Kontrol -->
                    <circle cx="8" cy="5.5" r="1" fill="#8C7355" />
                    <circle cx="12" cy="5.5" r="0.75" fill="#8C7355" />
                    <!-- Pintu Kaca Bulat Utama -->
                    <circle cx="12" cy="14.5" r="4.5" />
                    <!-- Efek Air/Putaran di Dalam Mesin Cuci -->
                    <path d="M10.5 14.5a1.5 1.5 0 0 1 3 0" />
                </svg>
            </div>
            <div class="brand-text">
                <h4>Laundry<span style="color: #C5A880;">Ku</span></h4>
                <span>Premium Care</span>
            </div>
        </div>

        <hr class="sidebar-divider">

        <!-- Navigation Menu -->
        <ul class="nav flex-column nav-aesthetic">
            <!-- Menu 1: Dashboard (Peach Nude) -->
            <li class="nav-item">
                <!-- Tambahkan class 'active' secara dinamis berdasarkan route di Laravel -->
                <a href="{{ route('dashboard') }}" class="nav-link-aesthetic nav-link-dashboard {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>

            <!-- Menu 2: Pelanggan (Sage Green Nude) -->
            <li class="nav-item">
                <a href="{{ route('pelanggan.index') }}" class="nav-link-aesthetic nav-link-pelanggan {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    Pelanggan
                </a>
            </li>

            <!-- Menu 3: Layanan (Caramel Nude) -->
            <li class="nav-item">
                <a href="{{ route('layanan.index') }}" class="nav-link-aesthetic nav-link-layanan {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
                    <i class="bi bi-basket"></i>
                    Layanan
                </a>
            </li>

            <!-- Menu 4: Transaksi (Lavender Nude) -->
            <li class="nav-item">
                <a href="{{ route('transaksi.index') }}" class="nav-link-aesthetic nav-link-transaksi {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                    <i class="bi bi-receipt"></i>
                    Transaksi
                </a>
            </li>

            <!-- Menu 5: Laporan (Rose Nude) -->
            <li class="nav-item">
                <a href="{{ route('laporan.index') }}" class="nav-link-aesthetic nav-link-laporan {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i>
                    Laporan
                </a>
            </li>
        </ul>
    </div>

    <!-- Bagian Bawah: Tombol Logout -->
    <div>
        <hr class="sidebar-divider">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout-nude w-100 shadow-sm border-0">
                <i class="bi bi-box-arrow-right"></i>
                Keluar Aplikasi
            </button>
        </form>
    </div>
</div>