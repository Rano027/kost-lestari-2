<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Penyewa - Lestari Kost</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        h1 {
            margin: 0;
            font-size: 32px;
            color: #102a43;
        }

        .subtitle {
            margin-top: 8px;
            color: #64748b;
        }

        .back-link {
            text-decoration: none;
            color: #1e3a5f;
            font-weight: 600;
        }

        .table-wrapper {
            background: white;
            border: 1px solid #dbe4ee;
            border-radius: 16px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f1f5f9;
            text-align: left;
            padding: 16px;
            font-size: 14px;
            color: #334155;
        }

        td {
            padding: 16px;
            border-top: 1px solid #e2e8f0;
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }

        .active {
            background: #dcfce7;
            color: #166534;
        }

        .inactive {
            background: #e2e8f0;
            color: #475569;
        }

        .empty {
            padding: 40px;
            text-align: center;
            color: #64748b;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Data Penyewa</h1>
            <div class="subtitle">
                Kelola data penghuni Lestari Kost.
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">
            ← Dashboard
        </a>
    </div>

    <div class="table-wrapper">

        @if ($tenants->count() > 0)

            <table>
                <thead>
                    <tr>
                        <th>Kode Booking</th>
                        <th>Nama</th>
                        <th>WhatsApp</th>
                        <th>Kamar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($tenants as $tenant)

                        <tr>
                            <td>
                                <strong>
                                    {{ $tenant->booking->booking_code ?? '-' }}
                                </strong>
                            </td>

                            <td>
                                <strong>{{ $tenant->name }}</strong>
                            </td>

                            <td>
                                {{ $tenant->phone }}
                            </td>

                            <td>
                                {{ $tenant->room->room_number ?? '-' }}
                            </td>

                            <td>
                                {{ $tenant->move_in_date
                                    ? \Carbon\Carbon::parse($tenant->move_in_date)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                {{ $tenant->move_out_date
                                    ? \Carbon\Carbon::parse($tenant->move_out_date)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>

                                @if ($tenant->status === 'active')

                                    <span class="status active">
                                        Active
                                    </span>

                                @else

                                    <span class="status inactive">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </table>

        @else

            <div class="empty">
                Belum ada data penyewa.
            </div>

        @endif

    </div>

</div>

</body>
</html>