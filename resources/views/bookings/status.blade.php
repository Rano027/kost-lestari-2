<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Status Booking - Lestari Kost</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .navbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 9%;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #1e3a5f;
        }

        .logo span {
            color: #4f7cac;
        }

        .back {
            color: #1e3a5f;
            text-decoration: none;
            font-weight: 600;
        }

        .container {
            max-width: 700px;
            margin: 70px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 40px;
        }

        h1 {
            margin-top: 0;
            color: #172033;
        }

        .code {
            background: #f1f5f9;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin: 25px 0;
        }

        .code-label {
            color: #64748b;
            margin-bottom: 8px;
        }

        .code-value {
            font-size: 25px;
            font-weight: 700;
            color: #1e3a5f;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .label {
            color: #64748b;
        }

        .value {
            font-weight: 600;
        }

        .status {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-weight: 600;
            text-transform: capitalize;
        }

        .button {
            display: block;
            text-align: center;
            margin-top: 30px;
            padding: 14px;
            background: #1e3a5f;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">
        Lestari<span>Kost</span>
    </div>

    <a href="{{ url('/') }}" class="back">
        ← Beranda
    </a>
</nav>

<div class="container">

    <div class="card">

        <h1>Status Booking</h1>

        <div class="code">
            <div class="code-label">
                Kode Booking
            </div>

            <div class="code-value">
                {{ $booking->booking_code }}
            </div>
        </div>

        <div class="row">
            <span class="label">Nama</span>
            <span class="value">{{ $booking->name }}</span>
        </div>

        <div class="row">
            <span class="label">Nomor WhatsApp</span>
            <span class="value">{{ $booking->phone }}</span>
        </div>

        <div class="row">
            <span class="label">Kamar</span>
            <span class="value">
                {{ $booking->room->room_number }}
            </span>
        </div>

        <div class="row">
            <span class="label">Tanggal Masuk</span>
            <span class="value">
                {{ \Carbon\Carbon::parse($booking->move_in_date)->format('d/m/Y') }}
            </span>
        </div>

        <div class="row">
            <span class="label">Durasi</span>
            <span class="value">
                {{ $booking->duration }} bulan
            </span>
        </div>

        <div class="row">
            <span class="label">Status</span>
            <span class="status">
                {{ $booking->status }}
            </span>
        </div>

        <a href="{{ route('booking.check') }}" class="button">
            Cek Booking Lain
        </a>

    </div>

</div>

</body>
</html>