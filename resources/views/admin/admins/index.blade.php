
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Admin | Pizza Mozza</title>

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
            max-width: 1350px;
            width: 100%;
            margin: auto;
            padding: 35px;
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
            gap: 16px;
        }

        .brand-icon {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #b91c1c, #ef4444);
            border-radius: 20px;
            font-size: 35px;
            box-shadow: 0 8px 20px #dc262633;
        }

        .brand h1 {
            color: #991b1b;
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand p {
            margin-top: 7px;
            color: #78716c;
            font-size: 14px;
        }

        /* HEADER BUTTONS */
        .header-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 18px;
            border-radius: 12px;
            border: none;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
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

        /* STATISTIC */
        .stats {
            margin-bottom: 28px;
        }

        .stat-card {
            width: 100%;
            max-width: 360px;
            display: flex;
            align-items: center;
            gap: 18px;
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
            background: #fee2e2;
            border-radius: 16px;
            font-size: 27px;
        }

        .stat-title {
            color: #78716c;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .stat-value {
            color: #292524;
            font-size: 28px;
            font-weight: 800;
        }

        /* SUCCESS MESSAGE */
        .success {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 12px;
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            font-size: 14px;
            font-weight: 600;
        }

        /* MAIN CARD */
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
            padding: 25px 28px;
            color: white;
            background: linear-gradient(135deg, #b91c1c, #ef4444);
        }

        .card-heading h2 {
            font-size: 21px;
            font-weight: 800;
        }

        .card-heading p {
            margin-top: 6px;
            color: #fee2e2;
            font-size: 13px;
        }

        .heading-badge {
            padding: 9px 14px;
            border: 1px solid #ffffff40;
            border-radius: 30px;
            background: #ffffff25;
            color: white;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* TABLE */
        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        thead {
            background: #fff7ed;
        }

        th {
            padding: 18px 22px;
            border-bottom: 1px solid #fed7aa;
            color: #78716c;
            font-size: 12px;
            font-weight: 800;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        td {
            padding: 19px 22px;
            border-bottom: 1px solid #f5f5f4;
            font-size: 14px;
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
            color: #a8a29e;
            font-weight: 700;
        }

        /* ADMIN NAME */
        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 190px;
        }

        .avatar {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 13px;
            font-size: 16px;
            font-weight: 800;
        }

        .admin-name {
            color: #292524;
            font-weight: 800;
        }

        .admin-label {
            margin-top: 3px;
            color: #a8a29e;
            font-size: 11px;
        }

        .email {
            color: #78716c;
        }

        .position {
            display: inline-flex;
            align-items: center;
            padding: 7px 12px;
            border-radius: 30px;
            background: #ffedd5;
            color: #c2410c;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .phone {
            color: #57534e;
            white-space: nowrap;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 7px;
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
            transition: 0.2s ease;
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

        /* EMPTY DATA */
        .empty {
            padding: 65px 20px;
            color: #78716c;
            text-align: center;
        }

        .empty-icon {
            margin-bottom: 14px;
            font-size: 52px;
        }

        .empty h3 {
            margin-bottom: 8px;
            color: #44403c;
            font-size: 18px;
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
            padding: 24px 5px;
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
                font-size: 23px;
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
                <h1>Data Admin</h1>

                <p>
                    Kelola administrator Pizza Mozza
                </p>
            </div>

        </div>

        <div class="header-actions">

            <!-- TAMBAH ADMIN -->
            <a href="{{ route('admin.admins.create') }}"
               class="btn btn-add">
                ➕ Tambah Admin
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

    <!-- STATISTIK -->
    <section class="stats">

        <div class="stat-card">

            <div class="stat-icon">
                👤
            </div>

            <div>

                <p class="stat-title">
                    Total Admin
                </p>

                <p class="stat-value">
                    {{ $admins->count() }}
                </p>

            </div>

        </div>

    </section>

    <!-- DATA ADMIN -->
    <section class="main-card">

        <!-- CARD HEADER -->
        <div class="card-heading">

            <div>

                <h2>
                    👤 Daftar Administrator
                </h2>

                <p>
                    Informasi administrator yang terdaftar dalam sistem
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
                        <th>Nama Admin</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($admins as $admin)

                        <tr>

                            <!-- NOMOR -->
                            <td class="number">
                                {{ $loop->iteration }}
                            </td>

                            <!-- NAMA -->
                            <td>

                                <div class="admin-profile">

                                    <div class="avatar">
                                        {{ strtoupper(substr($admin->nama, 0, 1)) }}
                                    </div>

                                    <div>

                                        <div class="admin-name">
                                            {{ $admin->nama }}
                                        </div>

                                        <div class="admin-label">
                                            Administrator Pizza Mozza
                                        </div>

                                    </div>

                                </div>

                            </td>

                            <!-- EMAIL -->
                            <td class="email">
                                {{ $admin->email }}
                            </td>

                            <!-- JABATAN -->
                            <td>

                                <span class="position">
                                    {{ $admin->jabatan }}
                                </span>

                            </td>

                            <!-- NO HP -->
                            <td class="phone">
                                {{ $admin->no_hp ?? '-' }}
                            </td>

                            <!-- AKSI -->
                            <td>

                                <div class="actions">

                                    <!-- DETAIL -->
                                    <a href="{{ route('admin.admins.show', $admin->id) }}"
                                       class="action-btn action-detail">
                                        👁 Detail
                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                       class="action-btn action-edit">
                                        ✏️ Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <form action="{{ route('admin.admins.destroy', $admin->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus admin ini?')">

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
                                        👤
                                    </div>

                                    <h3>
                                        Belum Ada Data Admin
                                    </h3>

                                    <p>
                                        Silakan tambahkan administrator baru.
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