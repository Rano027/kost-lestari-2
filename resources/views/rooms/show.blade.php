<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $room->name ?? 'Kamar ' . $room->room_number }}
        - Lestari Kost
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1e293b;
            background: #f8fafc;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1100px, 92%);
            margin: auto;
        }

        /* Navbar */

        .navbar {
            height: 76px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }

        .nav-content {
            height: 100%;
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

        .back-link {
            color: #475569;
            font-weight: 600;
        }

        .back-link:hover {
            color: #1e3a5f;
        }

        /* Content */

        .detail-section {
            padding: 70px 0;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 45px;
            align-items: start;
        }

        .room-image {
            height: 430px;
            border-radius: 20px;
            background: linear-gradient(
                135deg,
                #dbeafe,
                #94a3b8
            );
        }

        .room-info {
            background: white;
            padding: 35px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
        }

        .room-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .room-title {
            font-size: 32px;
            color: #172033;
        }

        .status {
            background: #dcfce7;
            color: #15803d;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 700;
        }

        .price {
            font-size: 24px;
            font-weight: 800;
            color: #1e3a5f;
            margin-bottom: 25px;
        }

        .price small {
            font-size: 14px;
            font-weight: 500;
            color: #64748b;
        }

        .description {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .info-title {
            font-size: 18px;
            margin-bottom: 12px;
            color: #1e293b;
        }

        .facilities {
            background: #f8fafc;
            padding: 18px;
            border-radius: 12px;
            color: #64748b;
            margin-bottom: 30px;
            white-space: pre-line;
        }

        .booking-button {
            display: block;
            width: 100%;
            text-align: center;
            background: #1e3a5f;
            color: white;
            padding: 15px;
            border-radius: 9px;
            font-weight: 700;
        }

        .booking-button:hover {
            background: #294f79;
        }

        .unavailable {
            background: #e2e8f0;
            color: #64748b;
            cursor: not-allowed;
        }

        @media (max-width: 800px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .room-image {
                height: 300px;
            }

            .room-title {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="container nav-content">

            <a href="{{ route('home') }}" class="logo">
                Lestari<span>Kost</span>
            </a>

            <a href="{{ route('home') }}" class="back-link">
                ← Kembali
            </a>

        </div>
    </nav>


    {{-- DETAIL --}}
    <section class="detail-section">

        <div class="container">

            <div class="detail-grid">

                {{-- IMAGE --}}
                <div class="room-image"></div>


                {{-- INFORMATION --}}
                <div class="room-info">

                    <div class="room-header">

                        <h1 class="room-title">
                            {{ $room->name ?? 'Kamar ' . $room->room_number }}
                        </h1>

                        @if ($room->status === 'available')
                            <span class="status">
                                Tersedia
                            </span>
                        @endif

                    </div>


                    {{-- PRICE --}}
                    @if ($room->price)
                        <div class="price">
                            Rp {{ number_format($room->price, 0, ',', '.') }}

                            <small>
                                / bulan
                            </small>
                        </div>
                    @endif


                    {{-- DESCRIPTION --}}
                    <h3 class="info-title">
                        Deskripsi
                    </h3>

                    <p class="description">
                        {{ $room->description ?? 'Belum ada deskripsi kamar.' }}
                    </p>


                    {{-- FACILITIES --}}
                    <h3 class="info-title">
                        Fasilitas
                    </h3>

                    <div class="facilities">
                        {{ $room->facilities ?? 'Belum ada informasi fasilitas.' }}
                    </div>


                    {{-- BOOKING --}}
                    @if ($room->status === 'available')

                    <a
                    href="{{ route('bookings.create', $room) }}"
                    class="booking-button">
                        Booking Kamar
                    </a>

                    @else

                        <div class="booking-button unavailable">
                            Kamar Tidak Tersedia
                        </div>

                    @endif

                </div>

            </div>

        </div>

    </section>

</body>
</html>