<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lestari Kost - Kost Nyaman di Lohbener</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1e293b;
            background: #ffffff;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1180px, 92%);
            margin: auto;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #e5e7eb;
            backdrop-filter: blur(10px);
        }

        .nav-content {
            height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            color: #1e3a5f;
        }

        .logo span {
            color: #4f7cac;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-menu a {
            color: #475569;
            transition: 0.2s;
        }

        .nav-menu a:hover {
            color: #1e3a5f;
        }

        .nav-button {
            background: #1e3a5f !important;
            color: white !important;
            padding: 11px 20px;
            border-radius: 8px;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            background: #f8fafc;
            padding: 80px 0;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 60px;
            align-items: center;
        }

        .hero-label {
            display: inline-block;
            background: #e8f0f8;
            color: #1e3a5f;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(40px, 5vw, 62px);
            line-height: 1.08;
            color: #172033;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: #4f7cac;
        }

        .hero-text {
            color: #64748b;
            font-size: 17px;
            max-width: 560px;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            background: #1e3a5f;
            color: white;
            padding: 14px 24px;
            border-radius: 9px;
            font-weight: 700;
            transition: 0.2s;
        }

        .btn-primary:hover {
            background: #294f79;
            transform: translateY(-2px);
        }

        .btn-secondary {
            display: inline-block;
            border: 1px solid #cbd5e1;
            color: #1e3a5f;
            padding: 14px 24px;
            border-radius: 9px;
            font-weight: 700;
            background: white;
        }

        .hero-image {
            min-height: 440px;
            border-radius: 24px;
            background:
                linear-gradient(rgba(30, 58, 95, .15), rgba(30, 58, 95, .15)),
                linear-gradient(135deg, #dbeafe, #94a3b8);
            display: flex;
            align-items: flex-end;
            padding: 28px;
            overflow: hidden;
        }

        .hero-card {
            background: rgba(255,255,255,.95);
            padding: 18px 20px;
            border-radius: 14px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .12);
        }

        .hero-card strong {
            display: block;
            font-size: 17px;
            margin-bottom: 4px;
        }

        .hero-card small {
            color: #64748b;
        }

        /* =========================
           SEARCH
        ========================= */

        .search-wrapper {
            margin-top: -35px;
            position: relative;
            z-index: 5;
        }

        .search-box {
            background: white;
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(15, 23, 42, .12);
            border: 1px solid #e5e7eb;
        }

        .search-box h3 {
            margin-bottom: 15px;
            color: #1e293b;
        }

        .search-form {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 12px;
        }

        .search-form input,
        .search-form select {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            background: white;
        }

        .search-form input:focus,
        .search-form select:focus {
            border-color: #4f7cac;
        }

        .search-form button {
            border: none;
            cursor: pointer;
            padding: 13px 24px;
            border-radius: 8px;
            background: #1e3a5f;
            color: white;
            font-weight: 700;
        }

        /* =========================
           SECTION
        ========================= */

        .section {
            padding: 90px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-header h2 {
            font-size: 36px;
            color: #172033;
            margin-bottom: 10px;
        }

        .section-header p {
            color: #64748b;
        }

        /* =========================
           ROOM
        ========================= */

        .room-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .room-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            transition: .2s;
        }

        .room-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .08);
        }

        .room-image {
            height: 210px;
            background: linear-gradient(135deg, #dbeafe, #cbd5e1);
        }

        .room-body {
            padding: 20px;
        }

        .room-top {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            align-items: center;
            margin-bottom: 12px;
        }

        .room-title {
            font-size: 19px;
            font-weight: 800;
            color: #1e293b;
        }

        .status {
            font-size: 12px;
            padding: 5px 9px;
            border-radius: 20px;
            font-weight: 700;
        }

        .status.available {
            background: #dcfce7;
            color: #15803d;
        }

        .room-price {
            color: #1e3a5f;
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .room-description {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .room-link {
            display: block;
            text-align: center;
            padding: 11px;
            background: #f1f5f9;
            color: #1e3a5f;
            border-radius: 8px;
            font-weight: 700;
        }

        /* =========================
           FEATURES
        ========================= */

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature-card {
            padding: 28px 22px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: white;
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #e8f0f8;
            color: #1e3a5f;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .feature-card h3 {
            margin-bottom: 8px;
        }

        .feature-card p {
            color: #64748b;
            font-size: 14px;
        }

        /* =========================
           ABOUT
        ========================= */

        .about {
            background: #f8fafc;
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-box {
            height: 360px;
            border-radius: 20px;
            background: linear-gradient(135deg, #1e3a5f, #4f7cac);
        }

        .about-text h2 {
            font-size: 36px;
            margin-bottom: 18px;
        }

        .about-text p {
            color: #64748b;
            margin-bottom: 15px;
        }

        /* =========================
           LOCATION
        ========================= */

        .location-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .location-info {
            padding: 30px;
            background: #f8fafc;
            border-radius: 16px;
        }

        .location-info h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .location-info p {
            color: #64748b;
            margin-bottom: 10px;
        }

        .map-placeholder {
            min-height: 280px;
            border-radius: 16px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            font-weight: 700;
        }

        /* =========================
           CTA
        ========================= */

        .cta {
            padding: 80px 0;
        }

        .cta-box {
            background: #1e3a5f;
            color: white;
            border-radius: 22px;
            padding: 55px;
            text-align: center;
        }

        .cta-box h2 {
            font-size: 34px;
            margin-bottom: 12px;
        }

        .cta-box p {
            color: #dbeafe;
            margin-bottom: 25px;
        }

        .btn-white {
            display: inline-block;
            background: white;
            color: #1e3a5f;
            padding: 14px 25px;
            border-radius: 9px;
            font-weight: 800;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #172033;
            color: white;
            padding: 45px 0 25px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        .footer-brand h3 {
            margin-bottom: 8px;
        }

        .footer-brand p {
            color: #94a3b8;
            max-width: 420px;
        }

        .footer-links {
            display: flex;
            gap: 22px;
            color: #cbd5e1;
            font-size: 14px;
        }

        .copyright {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #334155;
            color: #94a3b8;
            font-size: 13px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .hero-content,
            .about-content,
            .location-content {
                grid-template-columns: 1fr;
            }

            .room-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            .nav-menu {
                display: none;
            }

            .hero {
                padding: 55px 0;
            }

            .hero-image {
                min-height: 300px;
            }

            .search-form {
                grid-template-columns: 1fr;
            }

            .room-grid,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 65px 0;
            }

            .cta-box {
                padding: 35px 20px;
            }

            .footer-content {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
        NAVBAR
    ========================== --}}
    <nav class="navbar">
        <div class="container nav-content">
            <a href="{{ route('home') }}" class="logo">
                Lestari<span>Kost</span>
            </a>

            <div class="nav-menu">
                <a href="#home">Beranda</a>
                <a href="#rooms">Kamar</a>
                <a href="#facilities">Fasilitas</a>
                <a href="#about">Tentang</a>
                <a href="#location">Lokasi</a>

                <a href="#rooms" class="nav-button">
                    Cari Kamar
                </a>
            </div>
        </div>
    </nav>


    {{-- =========================
        HERO
    ========================== --}}
    <section class="hero" id="home">
        <div class="container hero-content">

            <div>
                <span class="hero-label">
                    Kost Nyaman di Lohbener, Indramayu
                </span>

                <h1>
                    Temukan tempat tinggal yang
                    <span>nyaman untukmu.</span>
                </h1>

                <p class="hero-text">
                    Lestari Kost menyediakan tempat tinggal yang nyaman,
                    aman, dan strategis bagi mahasiswa maupun pekerja
                    di sekitar Lohbener dan Indramayu.
                </p>

                <div class="hero-buttons">
                    <a href="#rooms" class="btn-primary">
                        Lihat Kamar
                    </a>

                    <a href="#location" class="btn-secondary">
                        Lihat Lokasi
                    </a>
                </div>
            </div>

            <div class="hero-image">
                <div class="hero-card">
                    <strong>Lestari Kost 2</strong>
                    <small>
                        Jl. Simpang Lohbener, Indramayu
                    </small>
                </div>
            </div>

        </div>
    </section>


    {{-- =========================
        SEARCH
    ========================== --}}
    <section class="search-wrapper">
        <div class="container">
            <div class="search-box">

                <h3>Cari kamar yang sesuai</h3>

                <form class="search-form" action="#rooms">

                    <input
                        type="text"
                        placeholder="Cari nomor atau nama kamar..."
                    >

                    <select>
                        <option value="">Semua status</option>
                        <option value="available">Tersedia</option>
                    </select>

                    <button type="submit">
                        Cari Kamar
                    </button>

                </form>

            </div>
        </div>
    </section>


    {{-- =========================
        ROOMS
    ========================== --}}
    <section class="section" id="rooms">
        <div class="container">

            <div class="section-header">
                <h2>Kamar Tersedia</h2>
                <p>
                    Pilih kamar yang sesuai dengan kebutuhanmu.
                </p>
            </div>

            <div class="room-grid">

                @forelse ($rooms as $room)

                    <div class="room-card">

                        <div class="room-image"></div>

                        <div class="room-body">

                            <div class="room-top">
                                <div class="room-title">
                                    {{ $room->name ?? 'Kamar ' . $room->room_number }}
                                </div>

                                <span class="status available">
                                    Tersedia
                                </span>
                            </div>

                            @if ($room->price)
                                <div class="room-price">
                                    Rp {{ number_format($room->price, 0, ',', '.') }}
                                    <small>/ bulan</small>
                                </div>
                            @endif

                            <p class="room-description">
                                {{ $room->description ?? 'Kamar nyaman untuk tempat tinggal.' }}
                            </p>

                            <a href="{{ route('rooms.show', $room) }}" class="room-link">
                                 Lihat Detail
                            </a>

                        </div>

                    </div>

                @empty

                    <div style="grid-column: 1 / -1; text-align:center; padding:50px;">
                        <h3>Belum ada kamar tersedia</h3>
                        <p style="color:#64748b;">
                            Silakan cek kembali beberapa saat lagi.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>


    {{-- =========================
        FACILITIES
    ========================== --}}
    <section class="section" id="facilities">
        <div class="container">

            <div class="section-header">
                <h2>Fasilitas Kost</h2>
                <p>
                    Fasilitas yang mendukung kenyamanan penghuni.
                </p>
            </div>

            <div class="feature-grid">

                <div class="feature-card">
                    <div class="feature-icon">📶</div>
                    <h3>WiFi</h3>
                    <p>
                        Koneksi internet untuk mendukung aktivitas
                        belajar dan bekerja.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏠</div>
                    <h3>Kamar Nyaman</h3>
                    <p>
                        Tempat tinggal yang nyaman untuk kebutuhan
                        sehari-hari.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📍</div>
                    <h3>Lokasi Strategis</h3>
                    <p>
                        Berada di kawasan Lohbener yang mudah
                        diakses.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Lingkungan Aman</h3>
                    <p>
                        Lingkungan kost yang mendukung kenyamanan
                        penghuni.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- =========================
        ABOUT
    ========================== --}}
    <section class="section about" id="about">
        <div class="container about-content">

            <div class="about-box"></div>

            <div class="about-text">
                <h2>Tentang Lestari Kost</h2>

                <p>
                    Lestari Kost merupakan tempat tinggal yang berada
                    di kawasan Lohbener, Indramayu dan ditujukan untuk
                    mahasiswa maupun masyarakat yang membutuhkan
                    tempat tinggal.
                </p>

                <p>
                    Website ini dikembangkan untuk memudahkan calon
                    penyewa dalam mendapatkan informasi kamar dan
                    mengajukan booking secara lebih praktis.
                </p>

                <a href="#rooms" class="btn-primary">
                    Lihat Kamar
                </a>
            </div>

        </div>
    </section>


    {{-- =========================
        LOCATION
    ========================== --}}
    <section class="section" id="location">
        <div class="container">

            <div class="section-header">
                <h2>Lokasi Kami</h2>
                <p>
                    Temukan lokasi Lestari Kost dengan mudah.
                </p>
            </div>

            <div class="location-content">

                <div class="location-info">
                    <h3>Lestari Kost 2</h3>

                    <p>
                        📍 Jl. Simpang Lohbener RT 22/RW 05,
                        Lohbener, Indramayu
                    </p>

                    <p>
                        Lokasi strategis dan mudah dijangkau
                        dari berbagai area di sekitar Lohbener.
                    </p>
                </div>

                <div class="map-placeholder">
                    Google Maps
                </div>

            </div>

        </div>
    </section>


    {{-- =========================
        CTA
    ========================== --}}
    <section class="cta">
        <div class="container">

            <div class="cta-box">

                <h2>Butuh informasi lebih lanjut?</h2>

                <p>
                    Hubungi pengelola Lestari Kost melalui WhatsApp
                    untuk mendapatkan informasi kamar.
                </p>

                <a
                    href="https://wa.me/"
                    target="_blank"
                    class="btn-white"
                >
                    Hubungi via WhatsApp
                </a>

            </div>

        </div>
    </section>


    {{-- =========================
        FOOTER
    ========================== --}}
    <footer>

        <div class="container">

            <div class="footer-content">

                <div class="footer-brand">
                    <h3>Lestari Kost</h3>

                    <p>
                        Tempat tinggal nyaman dan strategis
                        di Lohbener, Indramayu.
                    </p>
                </div>

                <div class="footer-links">
                    <a href="#home">Beranda</a>
                    <a href="#rooms">Kamar</a>
                    <a href="#facilities">Fasilitas</a>
                    <a href="#location">Lokasi</a>
                </div>

            </div>

            <div class="copyright">
                © {{ date('Y') }} Lestari Kost. All rights reserved.
            </div>

        </div>

    </footer>

</body>
</html>