<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Karyawan - Pizza Mozza</title>

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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #e63946;
        }

        .error {
            color: #d62828;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        button,
        .back-button {
            padding: 13px 20px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        button {
            background: #d62828;
            color: white;
            flex: 1;
        }

        button:hover {
            background: #b51f1f;
        }

        .back-button {
            background: #eee;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>✏️ Edit Karyawan</h1>

        <p class="subtitle">
            Perbarui informasi karyawan Pizza Mozza.
        </p>

        @if ($errors->any())
            <div class="error" style="margin-bottom: 20px;">
                <strong>Terjadi kesalahan:</strong>

                <ul style="margin-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('karyawan.update', $karyawan->id) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama Karyawan</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $karyawan->nama) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $karyawan->email) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>

                <input
                    type="text"
                    id="jabatan"
                    name="jabatan"
                    value="{{ old('jabatan', $karyawan->jabatan) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>

                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp', $karyawan->no_hp) }}"
                >
            </div>

            <div class="buttons">
                <a
                    href="{{ route('karyawan.index') }}"
                    class="back-button"
                >
                    Kembali
                </a>

                <button type="submit">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</body>
</html>