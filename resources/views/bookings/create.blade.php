<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Kamar - Lestari Kost</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: min(850px, 92%);
            margin: auto;
        }

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

        .booking-section {
            padding: 60px 0;
        }

        .booking-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
        }

        .title {
            font-size: 32px;
            color: #172033;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .room-info {
            background: #f1f5f9;
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .room-info strong {
            color: #1e3a5f;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 700;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #4f7cac;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .submit-button {
            width: 100%;
            border: none;
            background: #1e3a5f;
            color: white;
            padding: 15px;
            border-radius: 9px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
        }

        .submit-button:hover {
            background: #294f79;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="container nav-content">

            <a href="{{ route('home') }}" class="logo">
                Lestari<span>Kost</span>
            </a>

            <a href="{{ route('rooms.show', $room) }}" class="back-link">
                ← Kembali
            </a>

        </div>
    </nav>


    <section class="booking-section">

        <div class="container">

            <div class="booking-card">

                <h1 class="title">
                    Ajukan Booking
                </h1>

                <p class="subtitle">
                    Isi data berikut untuk mengajukan booking kamar.
                </p>


                <div class="room-info">

                    <strong>
                        {{ $room->name ?? 'Kamar ' . $room->room_number }}
                    </strong>

                    @if ($room->price)
                        <br>
                        Rp {{ number_format($room->price, 0, ',', '.') }}
                        / bulan
                    @endif

                </div>


                @if ($errors->any())
                    <div class="error" style="margin-bottom: 20px;">
                        Terdapat kesalahan pada data yang kamu masukkan.
                    </div>
                @endif


                <form
                    action="{{ route('bookings.store', $room) }}"
                    method="POST"
                >

                    @csrf


                    <div class="form-group">

                        <label for="name">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                        >

                        @error('name')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="phone">
                            Nomor WhatsApp
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="Contoh: 081234567890"
                            required
                        >

                        @error('phone')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="move_in_date">
                            Tanggal Masuk
                        </label>

                        <input
                            type="date"
                            id="move_in_date"
                            name="move_in_date"
                            value="{{ old('move_in_date') }}"
                            required
                        >

                        @error('move_in_date')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="duration">
                            Durasi Tinggal
                        </label>

                        <select
                            id="duration"
                            name="duration"
                            required
                        >

                            <option value="">
                                Pilih durasi
                            </option>

                            <option value="1">
                                1 Bulan
                            </option>

                            <option value="3">
                                3 Bulan
                            </option>

                            <option value="6">
                                6 Bulan
                            </option>

                            <option value="12">
                                12 Bulan
                            </option>

                        </select>

                        @error('duration')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="notes">
                            Catatan
                        </label>

                        <textarea
                            id="notes"
                            name="notes"
                            placeholder="Catatan tambahan jika ada"
                        >{{ old('notes') }}</textarea>

                        @error('notes')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Ajukan Booking
                    </button>

                </form>

            </div>

        </div>

    </section>

</body>
</html>
