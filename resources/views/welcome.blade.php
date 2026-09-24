<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Mozza - Admin Dashboard</title>

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
            transition: 0.2s;
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

        .sidebar-bottom {
            position: absolute;
            bottom: 25px;
            left: 25px;
            color: #ffb300;
            font-size: 20px;
            line-height: 1.5;
            font-weight: bold;
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
            padding: 25px 30px;
        }

        /* HERO */
        .hero {
            background: linear-gradient(100deg, #9f160c, #e53a1e);
            border-radius: 18px;
            min-height: 245px;
            padding: 35px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
        }

        .hero-text {
            max-width: 52%;
        }

        .hero h1 {
            font-size: 38px;
            margin: 8px 0 12px;
        }

        .hero p {
            color: #ffe8df;
            margin-bottom: 22px;
        }

        .hero-btn {
            display: inline-block;
            background: #ffb300;
            color: #5a2200;
            padding: 12px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
        }

        .pizza-large {
            font-size: 150px;
            transform: rotate(-8deg);
        }

        /* STAT CARDS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            border: 1px solid #eee;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .red {
            background: #ffe5e5;
        }

        .orange {
            background: #fff0d5;
        }

        .blue {
            background: #e4efff;
        }

        .green {
            background: #e1f7eb;
        }

        .stat-card h2 {
            font-size: 24px;
            margin-top: 12px;
        }

        .up {
            color: #20a55a;
            font-size: 12px;
        }

        .stat-card small {
            color: #999;
        }

        /* GRID */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            border: 1px solid #eee;
            padding: 20px;
        }

        .card-title {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card-title h3 {
            font-size: 18px;
        }

        .card-title a {
            color: #e52d27;
            text-decoration: none;
            font-size: 13px;
        }

        /* CHART */
        .chart {
            height: 220px;
            display: flex;
            align-items: end;
            justify-content: space-around;
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .bar-wrapper {
            height: 100%;
            display: flex;
            align-items: end;
            flex-direction: column;
            justify-content: end;
            gap: 8px;
        }

        .bar {
            width: 35px;
            background: linear-gradient(#ffb300, #ff6d00);
            border-radius: 7px 7px 0 0;
        }

        .bar.red-bar {
            background: linear-gradient(#ff5147, #e52424);
        }

        .day {
            font-size: 11px;
            color: #888;
        }

        /* ORDERS */
        .order {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 0;
            border-bottom: 1px solid #eee;
        }

        .order:last-child {
            border-bottom: none;
        }

        .order-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pizza-thumb {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: #fff0dc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .order-info strong {
            display: block;
            font-size: 13px;
        }

        .order-info small {
            color: #999;
        }

        .status {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .processing {
            background: #fff0d2;
            color: #d77900;
        }

        .delivery {
            background: #e2efff;
            color: #2470c9;
        }

        .done {
            background: #e2f7ea;
            color: #16854b;
        }

        /* PRODUCTS */
        .products {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .product {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 10px;
        }

        .product-img {
            height: 100px;
            background: linear-gradient(135deg, #ffcf70, #ff754d);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 55px;
        }

        .product h4 {
            margin-top: 8px;
            font-size: 13px;
        }

        .price {
            font-size: 12px;
            margin-top: 4px;
            color: #555;
        }

        .stock {
            display: inline-block;
            margin-top: 8px;
            background: #e1f7eb;
            color: #16854b;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 10px;
        }

        /* RESPONSIVE */
        @media(max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .products {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 800px) {
            .sidebar {
                width: 70px;
            }

            .logo h2,
            .logo .tagline,
            .menu span,
            .sidebar-bottom {
                display: none;
            }

            .main {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .search {
                width: 250px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
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

            <a href="#" class="active">
                <div class="menu-icon">🏠</div>
                <span>Dashboard</span>
            </a>

            <a href="#">
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

        <div class="sidebar-bottom">
            Lebih Banyak<br>
            Pizza,<br>
            Lebih Banyak<br>
            Bahagia 🍕
        </div>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <div class="search">
                🔍 &nbsp; Cari menu, pesanan, atau karyawan...
            </div>

            <div class="admin">

                <div>🔔</div>

                <div class="avatar">
                    👤
                </div>

                <div>
                    <strong>Admin</strong><br>
                    <small>Administrator</small>
                </div>

                <div>⌄</div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">

            <!-- HERO -->
            <div class="hero">

                <div class="hero-text">

                    <p>Selamat Datang di</p>

                    <h1>PIZZA MOZZA</h1>

                    <p>
                        Kelola pesanan, produk, dan karyawan
                        dengan mudah untuk operasional yang lebih efisien.
                    </p>

                    <a href="#" class="hero-btn">
                        🍕 Good Pizza, Good Mood
                    </a>

                </div>

                <div class="pizza-large">
                    🍕
                </div>

            </div>


            <!-- STATS -->
            <div class="stats">

                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon red">🛒</div>
                        <span class="up">↑ 12%</span>
                    </div>

                    <small>Total Pesanan</small>
                    <h2>124</h2>
                    <small>dari minggu lalu</small>

                </div>


                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon orange">🍕</div>
                        <span class="up">↑ 5%</span>
                    </div>

                    <small>Total Produk</small>
                    <h2>28</h2>
                    <small>dari bulan lalu</small>

                </div>


                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon blue">👥</div>
                        <span class="up">↑ 0%</span>
                    </div>

                    <small>Total Karyawan</small>
                    <h2>6</h2>
                    <small>aktif saat ini</small>

                </div>


                <div class="stat-card">

                    <div class="stat-top">
                        <div class="stat-icon green">💰</div>
                        <span class="up">↑ 15%</span>
                    </div>

                    <small>Pendapatan Hari Ini</small>
                    <h2>Rp 2.850.000</h2>
                    <small>dari kemarin</small>

                </div>

            </div>


            <!-- CHART + ORDERS -->
            <div class="dashboard-grid">

                <div class="card">

                    <div class="card-title">
                        <h3>Grafik Penjualan</h3>
                        <a href="#">7 Hari Terakhir ▼</a>
                    </div>

                    <div class="chart">

                        <div class="bar-wrapper">
                            <div class="bar" style="height: 35%;"></div>
                            <span class="day">12 Sep</span>
                        </div>

                        <div class="bar-wrapper">
                            <div class="bar" style="height: 50%;"></div>
                            <span class="day">13 Sep</span>
                        </div>

                        <div class="bar-wrapper">
                            <div class="bar" style="height: 68%;"></div>
                            <span class="day">14 Sep</span>
                        </div>

                        <div class="bar-wrapper">
                            <div class="bar" style="height: 60%;"></div>
                            <span class="day">15 Sep</span>
                        </div>

                        <div class="bar-wrapper">
                            <div class="bar" style="height: 75%;"></div>
                            <span class="day">16 Sep</span>
                        </div>

                        <div class="bar-wrapper">
                            <div class="bar" style="height: 70%;"></div>
                            <span class="day">17 Sep</span>
                        </div>

                        <div class="bar-wrapper">
                            <div class="bar red-bar" style="height: 90%;"></div>
                            <span class="day">18 Sep</span>
                        </div>

                    </div>

                </div>


                <!-- ORDERS -->
                <div class="card">

                    <div class="card-title">
                        <h3>Pesanan Terbaru</h3>
                        <a href="#">Lihat Semua →</a>
                    </div>

                    <div class="order">

                        <div class="order-left">
                            <div class="pizza-thumb">🍕</div>

                            <div class="order-info">
                                <strong>#PSN-00124</strong>
                                <small>Pizza Mozza Large ×1</small>
                            </div>
                        </div>

                        <span class="status processing">
                            Diproses
                        </span>

                    </div>


                    <div class="order">

                        <div class="order-left">
                            <div class="pizza-thumb">🍕</div>

                            <div class="order-info">
                                <strong>#PSN-00123</strong>
                                <small>Chicken BBQ ×2</small>
                            </div>
                        </div>

                        <span class="status delivery">
                            Dikirim
                        </span>

                    </div>


                    <div class="order">

                        <div class="order-left">
                            <div class="pizza-thumb">🍕</div>

                            <div class="order-info">
                                <strong>#PSN-00122</strong>
                                <small>Beef Pepperoni ×1</small>
                            </div>
                        </div>

                        <span class="status done">
                            Selesai
                        </span>

                    </div>


                    <div class="order">

                        <div class="order-left">
                            <div class="pizza-thumb">🍕</div>

                            <div class="order-info">
                                <strong>#PSN-00121</strong>
                                <small>Cheese Lover ×1</small>
                            </div>
                        </div>

                        <span class="status done">
                            Selesai
                        </span>

                    </div>

                </div>

            </div>


            <!-- PRODUCTS -->
            <div class="card" style="margin-top:20px;">

                <div class="card-title">
                    <h3>Produk Populer</h3>
                    <a href="#">Lihat Semua →</a>
                </div>

                <div class="products">

                    <div class="product">
                        <div class="product-img">🍕</div>
                        <h4>Pizza Mozza</h4>
                        <div class="price">Rp 45.000</div>
                        <span class="stock">Stok 12</span>
                    </div>

                    <div class="product">
                        <div class="product-img">🍕</div>
                        <h4>Chicken BBQ</h4>
                        <div class="price">Rp 48.000</div>
                        <span class="stock">Stok 10</span>
                    </div>

                    <div class="product">
                        <div class="product-img">🍕</div>
                        <h4>Beef Pepperoni</h4>
                        <div class="price">Rp 52.000</div>
                        <span class="stock">Stok 8</span>
                    </div>

                    <div class="product">
                        <div class="product-img">🍕</div>
                        <h4>Hawaiian</h4>
                        <div class="price">Rp 46.000</div>
                        <span class="stock">Stok 15</span>
                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>