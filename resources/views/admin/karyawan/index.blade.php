
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Karyawan | Pizza Mozza</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #fff7f0;
            color: #292524;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        .page {
            width: 100%;
            max-width: 1450px;
            margin: auto;
            padding: 32px;
        }

        /* HEADER */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dc2626;
            color: white;
            border-radius: 20px;
            font-size: 34px;
            box-shadow: 0 8px 20px #dc262633;
        }

        .brand h1 {
            font-size: 32px;
            font-weight: 800;
            color: #b91c1c;
            letter-spacing: -1px;
        }

        .brand p {
            margin-top: 6px;
            color: #78716c;
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* BUTTON */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 18px;
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 15px #00000018;
        }

        .btn-add {
            background: #ea580c;
        }

        .btn-add:hover {
            background: #c2410c;
        }

        .btn-home {
            background: #57534e;
        }

        .btn-home:hover {
            background: #292524;
        }

        /* STATISTIK */
        .stats {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 18px;
            max-width: 400px;
            padding: 24px;
            background: white;
            border: 1px solid #fed7aa;
            border-radius: 20px;
            box-shadow: 0 5px 20px #7c2d1210;
        }

        .stat-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            font-size: 27px;
            background: #fee2e2;
        }

        .stat-title {
            color: #78716c;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .stat-value {
            color: #292524;
            font-size: 27px;
            font-weight: 800;
        }

        /* PESAN SUKSES */
        .success {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 14px;
            font-weight: 600;
        }

        /* CARD TABEL */
        .main-card {
            background: white;
            border: 1px solid #fed7aa;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 8px 30px #7c2d1212;
        }

        .card-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 24px 28px;
            background: linear-gradient(135deg, #b91c1c, #ef4444);
            color: white;
        }

        .card-heading h2 {
            font-size: 21px;
            font-weight: 800;
        }

        .card-heading p {
            font-size: 13px;
            color: #fee2e2;
            margin-top: 5px;
        }

        .heading-badge {
            background: #ffffff25;
            border: 1px solid #ffffff40;
            padding: 9px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* TABEL */
        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 950px;
            border-collapse: collapse;
        }

        thead {
            background: #fff7ed;
        }

        th {
            padding: 18px 22px;
            color: #78716c;
            font-size: 12px;
            font-weight: 800;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #fed7aa;
            white-space: nowrap;
        }

        td {
            padding: 19px 22px;
            font-size: 14px;
            border-bottom: 1px solid #f5f5f4;
            vertical-align: middle;
        }

        tbody tr {
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: #fffaf5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .number {
            width: 60px;
            color: #a8a29e;
            font-weight: 700;
        }

        /* DATA KARYAWAN */
        .employee {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 190px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 13px;
            font-weight: 800;
            font-size: 16px;
        }

        .employee-name {
            color: #292524;
            font-weight: 800;
        }

        .employee-label {
            color: #a8a29e;
            font-size: 11px;
            margin-top: 3px;
        }

        .email {
            color: #78716c;
        }

        .position {
            display: inline-flex;
            align-items: center;
            background: #ffedd5;
            color: #c2410c;
            padding: 7px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .phone {
            color: #57534e;
            white-space: nowrap;
        }

        /* TOMBOL AKSI */
        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 9px 12px;
            border: none;
            border-radius: 9px;
            color: white;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px #00000018;
        }

        .action-detail {
            background: #2563eb;
        }

        .action-detail:hover {
            background: #1d4ed8;
        }

        .action-edit {
            background: #f59e0b;
        }

        .action-edit:hover {
            background: #d97706;
        }

        .action-delete {
            background: #dc2626;
        }

        .action-delete:hover {
            background: #b91c1c;
        }

        .actions form {
            display: inline;
            margin: 0;
        }

        /* DATA KOSONG */
        .empty {
            text-align: center;
            padding: 65px 20px;
            color: #78716c;
        }

        .empty-icon {
            font-size: 52px;
            margin-bottom: 14px;
        }

        .empty h3 {
            color: #44403c;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .empty p {
            font-size: 14px;
        }

        /* FOOTER */
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            padding: 22px 5px;
            color: #a8a29e;
            font-size: 13px;
        }

        .footer a {
            color: #b91c1c;
            font-weight: 800;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {

            .page {
                padding: 20px;
            }

            .top-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions .btn {
                flex: 1;
            }

            .brand h1 {
                font-size: 26px;
            }

            .card-heading {
                padding: 20px;
            }
        }

        @media (max-width: 500px) {

            .page {
                padding: 14px;
            }

            .brand-icon {
                width: 52px;
                height: 52px;
                font-size: 27px;
            }

            .brand h1 {
                font-size: 22px;
            }

            .brand p {
                font-size: 12px;
            }

            .btn {
                padding: 11px 12px;
                font-size: 12px;
            }

            .card-heading {
                align-items: flex-start;
                flex-direction: column;
            }

        }
    </style>
</head>

<body>

<div class="page">

    <!-- HEADER -->
    <header class="top-header">

        <div class="brand">

            <div class="brand-icon">
                🍕
            </div>

            <div>
                <h1>Data Karyawan</h1>

                <p>
                    Kelola dan pantau data karyawan Pizza Mozza
                </p>
            </div>

        </div>

        <div class="header-actions">

            <!-- TAMBAH KARYAWAN -->
            <a href="{{ route('karyawan.create') }}"
               class="btn btn-add">
                ➕ Tambah Karyawan
            </a>

            <!-- DASHBOARD -->
            <a href="{{ url('/admin') }}"
               class="btn btn-home">
                🏠 Dashboard
            </a>

        </div>

    </header>

    <!-- PESAN SUKSES -->
    @if(session('success'))

        <div class="success">
            ✅ {{ session('success') }}
        </div>

    @endif

    <!-- STATISTIK: HANYA TOTAL KARYAWAN -->
    <section class="stats">

        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <div>

                <p class="stat-title">
                    Total Karyawan
                </p>

                <p class="stat-value">
                    {{ $karyawans->count() }}
                </p>

            </div>

        </div>

    </section>

    <!-- TABEL DATA KARYAWAN -->
    <section class="main-card">

        <!-- HEADER TABEL -->
        <div class="card-heading">

            <div>

                <h2>
                    👥 Daftar Karyawan
                </h2>

                <p>
                    Informasi karyawan yang terdaftar dalam sistem
                </p>

            </div>

            <div class="heading-badge">
                🍕 Pizza Mozza
            </div>

        </div>

        <!-- TABLE -->
        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>No. HP</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($karyawans as $karyawan)

                        <tr>

                            <!-- NOMOR -->
                            <td class="number">
                                {{ $loop->iteration }}
                            </td>

                            <!-- NAMA -->
                            <td>

                                <div class="employee">

                                    <div class="avatar">
                                        {{ strtoupper(substr($karyawan->nama, 0, 1)) }}
                                    </div>

                                    <div>

                                        <div class="employee-name">
                                            {{ $karyawan->nama }}
                                        </div>

                                        <div class="employee-label">
                                            Karyawan Pizza Mozza
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <!-- EMAIL -->
                            <td class="email">
                                {{ $karyawan->email }}
                            </td>

                            <!-- JABATAN -->
                            <td>

                                <span class="position">
                                    {{ $karyawan->jabatan }}
                                </span>

                            </td>

                            <!-- NOMOR HP -->
                            <td class="phone">
                                {{ $karyawan->no_hp ?? '-' }}
                            </td>

                            <!-- AKSI -->
                            <td>

                                <div class="actions">

                                    <!-- LIHAT -->
                                    <a href="{{ route('karyawan.show', $karyawan->id) }}"
                                       class="action-btn action-detail">
                                        👁 Lihat
                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('karyawan.edit', $karyawan->id) }}"
                                       class="action-btn action-edit">
                                        ✏️ Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="action-btn action-delete">
                                            🗑 Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty">

                                    <div class="empty-icon">
                                        👥
                                    </div>

                                    <h3>
                                        Belum Ada Data Karyawan
                                    </h3>

                                    <p>
                                        Silakan tambahkan data karyawan baru.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <span>
            © {{ date('Y') }} Pizza Mozza
        </span>

        <a href="{{ url('/admin') }}">
            ← Kembali ke Dashboard
        </a>

    </footer>

</div>

</body>

</html>