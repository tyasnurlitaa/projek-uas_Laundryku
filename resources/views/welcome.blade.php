<x-guest-layout>

    <style>
        :root {
            --bg-main: #FCFAF7;
            --text-dark: #4E443C;
            --text-muted: #8A7A6E;
            --nude-primary: #C5A880;
            --nude-primary-hover: #B4966E;
            --nude-peach: #FCEFE9;
            --nude-peach-text: #B47B5F;
            --nude-sage: #EDF3EC;
            --nude-sage-text: #607955;
            --nude-lavender: #EFEFFA;
            --border-color: #F0E6D8;
            --rose-text: #C07D7D;
        }

        body {
            background: linear-gradient(135deg, #F3EADD 0%, #FCFAF7 60%);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .login-page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.25rem;
        }

        .login-split-card {
            width: 100%;
            max-width: 980px;
            min-height: 620px;
            background: #FFFFFF;
            border-radius: 32px;
            display: flex;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(78, 68, 60, 0.12);
        }

        /* ===== LEFT PANEL ===== */
        .login-left-panel {
            flex: 1;
            background: linear-gradient(160deg, #EFE2CF 0%, #E4D3B8 100%);
            padding: 2.75rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .login-left-panel::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.25);
            top: -80px;
            right: -80px;
        }

        .brand-row {
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 2;
        }

        .brand-logo-badge {
            width: 46px;
            height: 46px;
            border-radius: 13px;
            background-color: #FFFFFF;
            color: var(--nude-primary-hover);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            box-shadow: 0 6px 16px rgba(78, 68, 60, 0.1);
        }

        .brand-name {
            font-weight: 800;
            font-size: 1.15rem;
            color: var(--text-dark);
            letter-spacing: -0.3px;
            line-height: 1.1;
        }

        .brand-subtitle {
            font-size: 0.78rem;
            color: var(--text-muted);
            font-weight: 600;
            margin-top: 2px;
        }

        .login-illustration {
            position: relative;
            z-index: 2;
            margin: 1.5rem auto;
            width: 100%;
            max-width: 260px;
        }

        .login-info-card {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 18px;
            padding: 1.25rem 1.4rem;
            position: relative;
            z-index: 2;
        }

        .login-info-card h6 {
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 6px;
            font-size: 0.95rem;
        }

        .login-info-card p {
            font-size: 0.82rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }

        /* ===== RIGHT PANEL ===== */
        .login-right-panel {
            flex: 1;
            padding: 2.75rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-top-link {
            text-align: right;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--nude-primary-hover);
            text-decoration: none;
            margin-bottom: 1.5rem;
        }

        .login-top-link:hover {
            color: var(--text-dark);
        }

        .login-heading {
            font-weight: 800;
            letter-spacing: -0.8px;
            color: var(--text-dark);
            font-size: 2.1rem;
            margin-bottom: 0.4rem;
        }

        .login-heading-sub {
            color: var(--text-muted);
            font-size: 0.92rem;
            margin-bottom: 2rem;
        }

        .form-label-aesthetic {
            font-weight: 700;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
            display: block;
        }

        .input-group-aesthetic {
            position: relative;
            margin-bottom: 1.1rem;
        }

        .input-group-aesthetic i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--nude-primary);
            font-size: 1rem;
        }

        .form-control-aesthetic {
            width: 100%;
            background-color: #FAF6F0;
            border: 1px solid var(--border-color);
            border-radius: 13px;
            padding: 13px 16px 13px 44px;
            font-size: 0.92rem;
            color: var(--text-dark);
            transition: all 0.2s ease;
        }

        .form-control-aesthetic:focus {
            outline: none;
            border-color: var(--nude-primary);
            background-color: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(197, 168, 128, 0.15);
        }

        .form-control-aesthetic::placeholder {
            color: #C9BFB2;
        }

        .input-error-aesthetic {
            color: var(--rose-text);
            font-size: 0.78rem;
            margin-top: 4px;
            font-weight: 600;
        }

        .login-footer-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.6rem;
        }

        .remember-label-aesthetic {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .remember-checkbox-aesthetic {
            width: 17px;
            height: 17px;
            accent-color: var(--nude-primary);
            border-radius: 5px;
            cursor: pointer;
        }

        .forgot-link-aesthetic {
            font-size: 0.83rem;
            font-weight: 700;
            color: var(--nude-primary-hover);
            text-decoration: none;
        }

        .forgot-link-aesthetic:hover {
            color: var(--text-dark);
            text-decoration: underline;
        }

        .btn-login-aesthetic {
            width: 100%;
            background-color: var(--nude-primary);
            color: #FFFFFF !important;
            border: none;
            border-radius: 13px;
            padding: 14px 20px;
            font-weight: 700;
            font-size: 0.95rem;
            box-shadow: 0 8px 20px rgba(197, 168, 128, 0.3);
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .btn-login-aesthetic:hover {
            background-color: var(--nude-primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(197, 168, 128, 0.4);
        }

        @media (max-width: 767px) {
            .login-split-card {
                flex-direction: column;
                min-height: unset;
            }
            .login-left-panel {
                padding: 2rem 1.75rem;
            }
            .login-illustration {
                max-width: 160px;
                margin: 1rem auto;
            }
            .login-right-panel {
                padding: 2rem 1.75rem;
            }
        }
    </style>

    <div class="login-page-wrapper">
        <div class="login-split-card">

            <!-- LEFT PANEL -->
            <div class="login-left-panel">
                <div class="brand-row">
                    <div class="brand-logo-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M5 3a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m1-1a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                            <path d="M8 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8m0-1a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            <path d="M8 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                        </svg>
                    </div>
                    <div>
                        <div class="brand-name">LAUNDRY<span style="color: var(--nude-primary-hover);">KU</span></div>
                        <div class="brand-subtitle">Sistem Informasi Laundry</div>
                    </div>
                </div>

                <!-- Ilustrasi mesin cuci -->
                <div class="login-illustration">
                    <svg viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="250" cy="250" r="180" fill="rgba(255,255,255,0.35)"/>
                        <circle cx="120" cy="140" r="15" fill="#EFEFFA"/>
                        <circle cx="380" cy="110" r="10" fill="#EDF3EC"/>
                        <circle cx="390" cy="220" r="22" fill="#FAF0E6"/>

                        <rect x="150" y="100" width="200" height="280" rx="24" fill="#FFFFFF" stroke="#B4966E" stroke-width="8"/>
                        <rect x="150" y="100" width="200" height="60" rx="4" fill="#FAF6F0"/>
                        <line x1="150" y1="160" x2="350" y2="160" stroke="#B4966E" stroke-width="4"/>

                        <circle cx="180" cy="130" r="8" fill="#B47B5F"/>
                        <circle cx="210" cy="130" r="4" fill="#8A6E99"/>
                        <circle cx="230" cy="130" r="4" fill="#738A67"/>
                        <rect x="290" y="122" width="40" height="16" rx="4" fill="#E8DFEE"/>

                        <circle cx="250" cy="260" r="80" fill="#FFFFFF" stroke="#B4966E" stroke-width="8"/>
                        <circle cx="250" cy="260" r="66" fill="#F0F6FF"/>

                        <path d="M210 260 C210 230, 290 230, 290 260 C290 290, 210 290, 210 260 Z" fill="#E0EDFF" opacity="0.8"/>
                        <circle cx="230" cy="245" r="10" fill="#FFFFFF" opacity="0.9"/>
                        <circle cx="270" cy="275" r="12" fill="#FFFFFF" opacity="0.9"/>
                        <circle cx="250" cy="235" r="6" fill="#FFFFFF" opacity="0.9"/>

                        <rect x="180" y="380" width="24" height="15" rx="6" fill="#4E443C"/>
                        <rect x="296" y="380" width="24" height="15" rx="6" fill="#4E443C"/>
                    </svg>
                </div>

                <div class="login-info-card">
                    <h6>Cucian Beres, Hidup Lebih Santai</h6>
                    <p>Kelola pesanan, pelanggan, dan status cucian dalam satu platform yang rapi dan mudah digunakan.</p>
                </div>
            </div>

            <!-- RIGHT PANEL -->
            <div class="login-right-panel">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="login-top-link">
                        Belum Punya Akun? Daftar
                    </a>
                @endif

                <h2 class="login-heading">Selamat Datang</h2>
                <p class="login-heading-sub">Silakan masuk ke akun Anda untuk melanjutkan akses.</p>

                <x-auth-session-status class="mb-3" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="form-label-aesthetic">{{ __('Email Address') }}</label>
                        <div class="input-group-aesthetic">
                            <i class="bi bi-envelope-fill"></i>
                            <input id="email" class="form-control-aesthetic" type="email" name="email"
                                   value="{{ old('email') }}" required autofocus autocomplete="username"
                                   placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <div class="input-error-aesthetic">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="form-label-aesthetic">{{ __('Password') }}</label>
                        <div class="input-group-aesthetic">
                            <i class="bi bi-lock-fill"></i>
                            <input id="password" class="form-control-aesthetic" type="password" name="password"
                                   required autocomplete="current-password" placeholder="••••••••">
                        </div>
                        @error('password')
                            <div class="input-error-aesthetic">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me + Forgot Password -->
                    <div class="login-footer-row">
                        <label for="remember_me" class="remember-label-aesthetic">
                            <input id="remember_me" type="checkbox" class="remember-checkbox-aesthetic" name="remember">
                            {{ __('Remember me') }}
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot-link-aesthetic" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn-login-aesthetic">
                        {{ __('Masuk Sekarang') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>