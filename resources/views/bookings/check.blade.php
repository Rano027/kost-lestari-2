<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cek Status Booking - Lestari Kost</title>

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
            max-width: 650px;
            margin: 80px auto;
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
            font-size: 32px;
            color: #172033;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #1e3a5f;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">
        Lestari<span>Kost</span>
    </div>

    <a href="{{ url('/') }}" class="back">
        ← Kembali
    </a>
</nav>

<div class="container">

    <div class="card">

        <h1>Cek Status Booking</h1>

        <p class="subtitle">
            Masukkan kode booking yang kamu dapatkan setelah mengajukan booking.
        </p>

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('booking.check.status') }}" method="POST">
            @csrf

            <label for="booking_code">
                Kode Booking
            </label>

            <input
                type="text"
                id="booking_code"
                name="booking_code"
                value="{{ old('booking_code') }}"
                placeholder="Contoh: LK-20261008-0001"
                required
            >

            <button type="submit">
                Cek Status Booking
            </button>
        </form>

    </div>

</div>

</body>
</html>