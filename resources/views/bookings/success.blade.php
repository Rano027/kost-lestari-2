<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking Berhasil - Lestari Kost</title>

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

        .container {
            width: min(650px, 92%);
            margin: auto;
        }

        .success-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 100%;
            background: white;
            padding: 45px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            text-align: center;
        }

        .icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #dcfce7;
            color: #15803d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 12px;
            color: #172033;
        }

        p {
            color: #64748b;
            line-height: 1.7;
        }

        .code-box {
            margin: 30px 0;
            padding: 22px;
            background: #f1f5f9;
            border-radius: 12px;
        }

        .code-label {
            display: block;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .code {
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 1px;
            color: #1e3a5f;
        }

        .home-button {
            display: inline-block;
            background: #1e3a5f;
            color: white;
            padding: 14px 25px;
            border-radius: 9px;
            font-weight: 700;
        }
    </style>
</head>

<body>

    <section class="success-section">

        <div class="container">

            <div class="card">

                <div class="icon">
                    ✓
                </div>

                <h1>
                    Booking Berhasil!
                </h1>

                <p>
                    Pengajuan booking kamar kamu telah berhasil
                    dikirim dan sedang menunggu konfirmasi admin.
                </p>


                <div class="code-box">

                    <span class="code-label">
                        Kode Booking
                    </span>

                    <div class="code">
                        {{ $bookingCode }}
                    </div>

                </div>


                <p style="margin-bottom: 25px;">
                    Simpan kode booking ini untuk mengecek
                    status pengajuan kamu.
                </p>


                <a
                    href="{{ route('home') }}"
                    class="home-button"
                >
                    Kembali ke Beranda
                </a>

            </div>

        </div>

    </section>

</body>
</html>