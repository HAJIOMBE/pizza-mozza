<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - Pizza Mozza</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #fff9f0; 
            color: #333; 
            margin: 0; 
            padding: 30px; 
        }
        .container { 
            max-width: 650px; 
            margin: auto; 
            background: #ffffff; 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(212, 38, 38, 0.15); 
            border-top: 6px solid #d42626; 
        }
        h2 { 
            color: #d42626; 
            margin-top: 10px; 
            font-size: 26px; 
            text-transform: uppercase; 
            letter-spacing: 0.5px;
        }
        .back { 
            display: inline-block; 
            margin-bottom: 15px; 
            text-decoration: none; 
            color: #d42626; 
            font-weight: bold;
            transition: color 0.2s;
        }
        .back:hover {
            color: #a81c1c;
        }
        .form-group { 
            margin-bottom: 20px; 
        }
        label { 
            display: block; 
            margin-bottom: 6px; 
            font-weight: 600; 
            color: #444; 
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea { 
            width: 100%; 
            padding: 10px 12px; 
            box-sizing: border-box; 
            border: 1px solid #ddd; 
            border-radius: 6px; 
            font-size: 14px;
            background-color: #fafafa;
            font-family: inherit;
        }
        input:focus, textarea:focus {
            border-color: #d42626;
            outline: none;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(212, 38, 38, 0.1);
        }
        button { 
            background: #ffcc00; 
            color: #1a1a1a; 
            padding: 12px 20px; 
            border: none; 
            cursor: pointer; 
            border-radius: 6px; 
            font-weight: bold; 
            font-size: 15px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: background 0.2s;
        }
        button:hover { 
            background: #e6b800; 
        }
        .alert-error { 
            background: #ffeaea; 
            color: #d42626; 
            padding: 12px; 
            margin-bottom: 20px; 
            border-radius: 6px; 
            border-left: 4px solid #d42626;
        }
        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('produk.index') }}" class="back">&larr; Kembali ke Daftar Produk</a>
        <h2>🍕 Edit Produk Pizza</h2>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>ID Produk:</label>
                <input type="text" name="id_produk" value="{{ old('id_produk', $produk->id_produk) }}" readonly style="background-color: #e9ecef; cursor: not-allowed;">
            </div>

            <div class="form-group">
                <label>Nama Produk:</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div class="form-group">
                <label>Harga Saat Ini (Rp):</label>
                <input type="number" name="harga_saat_ini" value="{{ old('harga_saat_ini', $produk->harga_saat_ini) }}" required>
            </div>

            <div class="form-group">
                <label>Stok:</label>
                <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" required>
            </div>

            <div class="form-group">
                <label>Kategori:</label>
                <input type="text" name="kategori" value="{{ old('kategori', $produk->kategori) }}" required>
            </div>

            <div class="form-group">
                <label>Gambar Produk (Biarkan kosong jika tidak ingin mengubah gambar):</label>
                @if($produk->gambar_produk)
                    <div style="margin-bottom: 8px;">
                        <img src="{{ asset('storage/' . $produk->gambar_produk) }}" alt="Preview" width="80" style="border-radius: 4px;">
                    </div>
                @endif
                <input type="file" name="gambar_produk">
            </div>

            <button type="submit">Perbarui Produk</button>
        </form>
    </div>
</body>
</html>