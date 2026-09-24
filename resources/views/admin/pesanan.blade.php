<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Pizza Mozza</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f7f7f7;
            color: #222;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #171717;
            color: white;
            padding: 25px 16px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 35px;
            padding: 0 10px;
        }

        .logo-icon {
            font-size: 38px;
        }

        .logo h2 {
            font-size: 20px;
        }

        .logo span {
            color: #ffb300;
        }

        .tagline {
            color: #ff7043;
            font-size: 11px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            color: #ddd;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 13px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(90deg, #e9272e, #ff4d32);
            color: white;
        }

        .menu-icon {
            width: 24px;
            text-align: center;
            font-size: 18px;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        /* TOPBAR */
        .topbar {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            border-bottom: 1px solid #eee;
        }

        .search {
            width: 450px;
            background: #f4f4f4;
            padding: 12px 18px;
            border-radius: 12px;
            color: #999;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            background: #222;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin small {
            color: #888;
        }

        /* CONTENT */
        .content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 28px;
        }

        .page-header p {
            color: #888;
            margin-top: 6px;
        }

        .add-button {
            background: #e9272e;
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        /* STAT */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 22px;
        }

        .stat {
            background: white;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #eee;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .red {
            background: #ffe3e3;
        }

        .orange {
            background: #fff0d3;
        }

        .blue {
            background: #e4efff;
        }

        .green {
            background: #e2f7eb;
        }

        .stat small {
            color: #888;
        }

        .stat h2 {
            margin-top: 5px;
            font-size: 25px;
        }

        /* ORDER CARD */
        .order-card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            border: 1px solid #eee;
        }

        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 18px;
            border-radius: 20px;
            background: #f2f2f2;
            color: #666;
            font-size: 13px;
        }

        .tab.active {
            background: #e9272e;
            color: white;
        }

        .filters {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .filter {
            padding: 11px 15px;
            border: 1px solid #ddd;
            border-radius: 9px;
            background: white;
            color: #555;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            color: #888;
            font-size: 12px;
            padding: 14px 10px;
            background: #fafafa;
        }

        td {
            padding: 16px 10px;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        .customer {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .customer-avatar {
            width: 38px;
            height: 38px;
            background: #ffe6d4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .customer small {
            display: block;
            color: #999;
            margin-top: 3px;
        }

        .badge {
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .waiting {
            background: #fff0d2;
            color: #d47700;
        }

        .process {
            background: #e4efff;
            color: #2670c9;
        }

        .delivery {
            background: #eee4ff;
            color: #7540bd;
        }

        .success {
            background: #e1f7eb;
            color: #16854b;
        }

        .action {
            color: #e9272e;
            text-decoration: none;
            font-weight: bold;
        }

        @media(max-width: 1000px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .sidebar {
                width: 75px;
            }

            .logo h2,
            .tagline,
            .menu span {
                display: none;
            }

            .main {
                margin-left: 75px;
                width: calc(100% - 75px);
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">🍕</div>

            <div>
                <h2>PIZZA <span>MOZZA</span></h2>
                <div class="tagline">Good Pizza, Good Mood</div>
            </div>
        </div>

        <nav class="menu">

            <a href="/admin">
                <div class="menu-icon">🏠</div>
                <span>Dashboard</span>
            </a>

            <a href="/admin/pesanan" class="active">
                <div class="menu-icon">📦</div>
                <span>Pesanan</span>
            </a>

            <a href="#">
                <div class="menu-icon">🍕</div>
                <span>Produk / Menu</span>
            </a>

            <a href="#">
                <div class="menu-icon">🏷️</div>
                <span>Kategori</span>
            </a>

            <a href="#">
                <div class="menu-icon">📊</div>
                <span>Stok</span>
            </a>

            <a href="#">
                <div class="menu-icon">💰</div>
                <span>Laporan Keuangan</span>
            </a>

            <a href="#">
                <div class="menu-icon">🚚</div>
                <span>Pengiriman</span>
            </a>

            <a href="#">
                <div class="menu-icon">👥</div>
                <span>Karyawan</span>
            </a>

            <a href="#">
                <div class="menu-icon">📈</div>
                <span>SPK / TPK</span>
            </a>

            <a href="#">
                <div class="menu-icon">⚙️</div>
                <span>Pengaturan</span>
            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <header class="topbar">

            <div class="search">
                🔍 &nbsp; Cari nomor pesanan atau pelanggan...
            </div>

            <div class="admin">
                <div>🔔</div>

                <div class="avatar">👤</div>

                <div>
                    <strong>Admin</strong><br>
                    <small>Administrator</small>
                </div>

                <div>⌄</div>
            </div>

        </header>


        <section class="content">

            <!-- HEADER -->
            <div class="page-header">

                <div>
                    <h1>📦 Pesanan</h1>
                    <p>Kelola dan pantau seluruh pesanan Pizza Mozza.</p>
                </div>

                <a href="#" class="add-button">
                    + Pesanan Baru
                </a>

            </div>


            <!-- STAT -->
            <div class="stats">

                <div class="stat">
                    <div class="stat-icon orange">⏳</div>
                    <small>Menunggu Konfirmasi</small>
                    <h2>12</h2>
                </div>

                <div class="stat">
                    <div class="stat-icon blue">👨‍🍳</div>
                    <small>Sedang Diproses</small>
                    <h2>8</h2>
                </div>

                <div class="stat">
                    <div class="stat-icon red">🚚</div>
                    <small>Dalam Pengiriman</small>
                    <h2>5</h2>
                </div>

                <div class="stat">
                    <div class="stat-icon green">✓</div>
                    <small>Selesai Hari Ini</small>
                    <h2>27</h2>
                </div>

            </div>


            <!-- ORDERS -->
            <div class="order-card">

                <div class="tabs">
                    <div class="tab active">Semua Pesanan</div>
                    <div class="tab">Pesanan Langsung</div>
                    <div class="tab">Pre-Order</div>
                </div>


                <div class="filters">

                    <div class="filter">
                        📅 Hari Ini ▾
                    </div>

                    <div class="filter">
                        Semua Status ▾
                    </div>

                    <div class="filter">
                        Semua Pembayaran ▾
                    </div>

                </div>


                <table>

                    <thead>
                        <tr>
                            <th>NO. PESANAN</th>
                            <th>PELANGGAN</th>
                            <th>PRODUK</th>
                            <th>TOTAL</th>
                            <th>PEMBAYARAN</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                <strong>#PSN-00124</strong><br>
                                <small>18 Sep 2026 • 13:45</small>
                            </td>

                            <td>
                                <div class="customer">
                                    <div class="customer-avatar">👤</div>

                                    <div>
                                        <strong>Andi</strong>
                                        <small>Pelaihari</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Pizza Mozza Large ×1
                            </td>

                            <td>
                                <strong>Rp 55.000</strong>
                            </td>

                            <td>
                                QRIS
                            </td>

                            <td>
                                <span class="badge waiting">
                                    Menunggu
                                </span>
                            </td>

                            <td>
                                <a href="#" class="action">Detail →</a>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <strong>#PSN-00123</strong><br>
                                <small>18 Sep 2026 • 13:32</small>
                            </td>

                            <td>
                                <div class="customer">
                                    <div class="customer-avatar">👩</div>

                                    <div>
                                        <strong>Siti</strong>
                                        <small>Pelaihari</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Chicken BBQ ×2
                            </td>

                            <td>
                                <strong>Rp 106.000</strong>
                            </td>

                            <td>
                                Transfer
                            </td>

                            <td>
                                <span class="badge process">
                                    Diproses
                                </span>
                            </td>

                            <td>
                                <a href="#" class="action">Detail →</a>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <strong>#PSN-00122</strong><br>
                                <small>18 Sep 2026 • 12:50</small>
                            </td>

                            <td>
                                <div class="customer">
                                    <div class="customer-avatar">👨</div>

                                    <div>
                                        <strong>Rizky</strong>
                                        <small>Bajuin</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Beef Pepperoni ×1
                            </td>

                            <td>
                                <strong>Rp 62.000</strong>
                            </td>

                            <td>
                                QRIS
                            </td>

                            <td>
                                <span class="badge delivery">
                                    Dikirim
                                </span>
                            </td>

                            <td>
                                <a href="#" class="action">Detail →</a>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <strong>#PSN-00121</strong><br>
                                <small>18 Sep 2026 • 12:28</small>
                            </td>

                            <td>
                                <div class="customer">
                                    <div class="customer-avatar">👩</div>

                                    <div>
                                        <strong>Nadia</strong>
                                        <small>Pelaihari</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Cheese Lover ×1
                            </td>

                            <td>
                                <strong>Rp 50.000</strong>
                            </td>

                            <td>
                                COD
                            </td>

                            <td>
                                <span class="badge success">
                                    Selesai
                                </span>
                            </td>

                            <td>
                                <a href="#" class="action">Detail →</a>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <strong>#PSN-00120</strong><br>
                                <small>18 Sep 2026 • 11:57</small>
                            </td>

                            <td>
                                <div class="customer">
                                    <div class="customer-avatar">👨</div>

                                    <div>
                                        <strong>Fajar</strong>
                                        <small>Pelaihari</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                Hawaiian ×2
                            </td>

                            <td>
                                <strong>Rp 102.000</strong>
                            </td>

                            <td>
                                QRIS
                            </td>

                            <td>
                                <span class="badge success">
                                    Selesai
                                </span>
                            </td>

                            <td>
                                <a href="#" class="action">Detail →</a>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </section>

    </main>

</div>

</body>
</html>