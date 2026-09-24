
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Karyawan - Pizza Mozza</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #fff5ed;
            padding: 40px 20px;
            color: #333;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #d62828;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .data-box {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .data-item {
            padding: 15px;
            background: #fff5ed;
            border-radius: 10px;
        }

        .data-item strong {
            display: block;
            color: #777;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .data-item span {
            font-size: 16px;
            font-weight: bold;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .button {
            padding: 13px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }

        .back-button {
            background: #eee;
            color: #333;
        }

        .edit-button {
            background: #d62828;
            color: white;
            flex: 1;
        }

        .button:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>👤 Detail Karyawan</h1>

        <p class="subtitle">
            Informasi lengkap karyawan Pizza Mozza.
        </p>

        <div class="data-box">

            <div class="data-item">
                <strong>ID Karyawan</strong>
                <span>{{ $karyawan->id }}</span>
            </div>

            <div class="data-item">
                <strong>Nama Karyawan</strong>
                <span>{{ $karyawan->nama }}</span>
            </div>

            <div class="data-item">
                <strong>Email</strong>
                <span>{{ $karyawan->email }}</span>
            </div>

            <div class="data-item">
                <strong>Jabatan</strong>
                <span>{{ $karyawan->jabatan }}</span>
            </div>

            <div class="data-item">
                <strong>Nomor HP</strong>
                <span>{{ $karyawan->no_hp ?: '-' }}</span>
            </div>

            <div class="data-item">
                <strong>Terdaftar Pada</strong>
                <span>
                    {{ $karyawan->created_at?->format('d-m-Y H:i') }}
                </span>
            </div>

        </div>

        <div class="buttons">

            <a
                href="{{ route('karyawan.index') }}"
                class="button back-button"
            >
                Kembali
            </a>

            <a
                href="{{ route('karyawan.edit', $karyawan->id) }}"
                class="button edit-button"
            >
                Edit Data
            </a>

        </div>

    </div>
</body>
</html>