<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking - Admin Lestari Kost</title>

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

        .container {
            width: min(1200px, 94%);
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            margin: 0;
            color: #172033;
        }

        .back {
            text-decoration: none;
            color: #1e3a5f;
            font-weight: 600;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f1f5f9;
            color: #475569;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .approved {
            background: #dcfce7;
            color: #166534;
        }

        .rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .completed {
            background: #dbeafe;
            color: #1e40af;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #64748b;
        }
        @if(session('success'))
    <div style="
        background: #dcfce7;
        color: #166534;
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
    ">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="
        background: #fee2e2;
        color: #991b1b;
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
    ">
        {{ session('error') }}
    </div>
@endif
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Data Booking</h1>
            <p style="color: #64748b;">
                Kelola pengajuan booking kamar Lestari Kost.
            </p>
        </div>

        <a href="{{ route('dashboard') }}" class="back">
            ← Dashboard
        </a>

    </div>


    <div class="card">

@if ($bookings->count() > 0)

    <table>
        <thead>
            <tr>
                <th>Kode Booking</th>
                <th>Nama</th>
                <th>WhatsApp</th>
                <th>Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Durasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>
                        <strong>{{ $booking->booking_code }}</strong>
                    </td>

                    <td>
                        {{ $booking->name }}
                    </td>

                    <td>
                        {{ $booking->phone }}
                    </td>

                    <td>
                        {{ $booking->room->room_number }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($booking->move_in_date)->format('d/m/Y') }}
                    </td>

                    <td>
                        {{ $booking->duration }} bulan
                    </td>

                    <td>
                        @if ($booking->status === 'pending')
                            <span class="status pending">
                                Pending
                            </span>
                        @elseif ($booking->status === 'approved')
                            <span class="status approved">
                                Approved
                            </span>
                        @elseif ($booking->status === 'rejected')
                            <span class="status rejected">
                                Rejected
                            </span>
                        @elseif ($booking->status === 'completed')
                            <span class="status completed">
                                Completed
                            </span>
                        @endif
                    </td>

                    <td>
                        @if ($booking->status === 'pending')

                            <div style="display: flex; gap: 8px;">

                                <form
                                    action="{{ route('admin.bookings.approve', $booking->id) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        style="
                                            background: #16a34a;
                                            color: white;
                                            border: none;
                                            padding: 7px 12px;
                                            border-radius: 8px;
                                            cursor: pointer;
                                        "
                                    >
                                        Approve
                                    </button>
                                </form>

                                <form
                                    action="{{ route('admin.bookings.reject', $booking->id) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        style="
                                            background: #dc2626;
                                            color: white;
                                            border: none;
                                            padding: 7px 12px;
                                            border-radius: 8px;
                                            cursor: pointer;
                                        "
                                    >
                                        Reject
                                    </button>
                                </form>

                            </div>

                       @else

    @if ($booking->status === 'approved')

        <a
            href="{{ route('admin.tenants.create', $booking->id) }}"
            style="
                display: inline-block;
                background: #1e3a5f;
                color: white;
                text-decoration: none;
                padding: 7px 12px;
                border-radius: 8px;
                font-size: 13px;
            "
        >
            Jadikan Penyewa
        </a>

    @else

        <span style="color: #64748b;">
            Sudah diproses
        </span>

    @endif

@endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@else

    <div>
        Belum ada data booking.
    </div>

@endif

    </div>

</div>

</body>
</html>