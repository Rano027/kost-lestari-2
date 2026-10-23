<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Penyewa - Lestari Kost</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }

        h1 {
            margin-bottom: 8px;
            color: #102a43;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border: 1px solid #dbe4ee;
            border-radius: 16px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input,
        select,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 11px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .button {
            background: #1e3a5f;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #1e3a5f;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Penyewa</h1>

    <div class="subtitle">
        Data penyewa dibuat berdasarkan booking yang telah disetujui.
    </div>

    <div class="card">

        <form action="{{ route('admin.tenants.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama</label>

                <input
                    type="text"
                    value="{{ $booking->name }}"
                    disabled
                >

                <input
                    type="hidden"
                    name="name"
                    value="{{ $booking->name }}"
                >
                <input
                    type="hidden"
                    name="booking_id"
                    value="{{ $booking->id }}"
                >
            </div>

            <div class="form-group">
                <label>WhatsApp</label>

                <input
                    type="text"
                    value="{{ $booking->phone }}"
                    disabled
                >

                <input
                    type="hidden"
                    name="phone"
                    value="{{ $booking->phone }}"
                >
            </div>

            <div class="form-group">
                <label>Kamar</label>

                <input
                    type="text"
                    value="{{ $booking->room->room_number }}"
                    disabled
                >

                <input
                    type="hidden"
                    name="room_id"
                    value="{{ $booking->room_id }}"
                >
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>

                <input
                    type="date"
                    name="move_in_date"
                    value="{{ \Carbon\Carbon::parse($booking->move_in_date)->format('Y-m-d') }}"                    required
                >
            </div>

            <div class="form-group">
                <label>Tanggal Keluar</label>

                <input
                    type="date"
                    name="move_out_date"
                >
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label>Catatan</label>

                <textarea
                    name="notes"
                    placeholder="Catatan tambahan jika diperlukan"
                ></textarea>
            </div>

            <button type="submit" class="button">
                Simpan Penyewa
            </button>

        </form>

        <a
            href="{{ route('admin.bookings.index') }}"
            class="back"
        >
            ← Kembali ke Data Booking
        </a>

    </div>

</div>

</body>
</html>