<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Pizza Mozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 bottom-0 w-64 bg-gray-900 text-white p-5 overflow-y-auto">

        <div class="text-center mb-10">
            <div class="text-4xl mb-2">🍕</div>

            <h1 class="text-xl font-bold text-orange-400">
                Pizza Mozza
            </h1>

            <p class="text-gray-400 text-sm mt-1">
                Admin Dashboard
            </p>
        </div>

        <nav class="space-y-3">

            <!-- DASHBOARD -->
            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-3 rounded-xl bg-red-600 hover:bg-red-700 transition">
                📊 Dashboard
            </a>

            <!-- ADMIN -->
            <a href="{{ route('admin.admins.index') }}"
               class="block px-4 py-3 rounded-xl hover:bg-red-600 transition">
                👤 Data Admin
            </a>

            <!-- KARYAWAN -->
            <a href="{{ route('karyawan.index') }}"
               class="block px-4 py-3 rounded-xl hover:bg-red-600 transition">
                👥 Data Karyawan
            </a>

            <!-- PESANAN -->
            <a href="{{ route('admin.pesanan') }}"
               class="block px-4 py-3 rounded-xl hover:bg-red-600 transition">
                🛒 Pesanan
            </a>

        </nav>

        <div class="border-t border-gray-700 mt-10 pt-5">
            <p class="text-orange-400 font-semibold text-sm">
                🍕 Kelola Bisnis Pizza
            </p>

            <p class="text-gray-400 text-xs mt-2">
                Sistem informasi Pizza Mozza
            </p>
        </div>

    </aside>


    <!-- KONTEN UTAMA -->
    <main class="ml-64 p-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div>
                <p class="text-red-600 font-semibold">
                    Selamat datang kembali! 👋
                </p>

                <h1 class="text-3xl font-bold text-gray-800 mt-2">
                    Dashboard Pizza Mozza
                </h1>

                <p class="text-gray-500 mt-2">
                    Kelola administrasi dan operasional usaha.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow px-5 py-3">
                <p class="text-sm text-gray-500">
                    Status Sistem
                </p>

                <p class="font-bold text-green-600">
                    ● Aktif
                </p>
            </div>

        </div>


        <!-- KARTU MENU -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- KARTU ADMIN -->
            <a href="{{ route('admin.admins.index') }}"
               class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-red-600 hover:shadow-xl hover:-translate-y-1 transition">

                <div class="text-4xl mb-4">
                    👤
                </div>

                <h2 class="text-xl font-bold text-gray-800">
                    Data Admin
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Kelola data administrator Pizza Mozza.
                </p>

                <p class="text-red-600 font-semibold mt-5">
                    Buka CRUD Admin →
                </p>

            </a>


            <!-- KARTU KARYAWAN -->
            <a href="{{ route('karyawan.index') }}"
               class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-orange-500 hover:shadow-xl hover:-translate-y-1 transition">

                <div class="text-4xl mb-4">
                    👥
                </div>

                <h2 class="text-xl font-bold text-gray-800">
                    Data Karyawan
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Kelola data karyawan Pizza Mozza.
                </p>

                <p class="text-orange-600 font-semibold mt-5">
                    Buka CRUD Karyawan →
                </p>

            </a>


            <!-- KARTU PESANAN -->
            <a href="{{ route('admin.pesanan') }}"
               class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-xl hover:-translate-y-1 transition">

                <div class="text-4xl mb-4">
                    🛒
                </div>

                <h2 class="text-xl font-bold text-gray-800">
                    Pesanan
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Lihat halaman pengelolaan pesanan.
                </p>

                <p class="text-green-600 font-semibold mt-5">
                    Buka Pesanan →
                </p>

            </a>

        </div>


        <!-- INFORMASI -->
        <div class="bg-white rounded-2xl shadow-md p-6 mt-8">

            <h2 class="text-xl font-bold text-gray-800">
                📋 Informasi Sistem
            </h2>

            <p class="text-gray-500 mt-3">
                Dashboard ini menghubungkan halaman Admin,
                Karyawan, dan Pesanan dalam satu sistem.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

                <div class="bg-red-50 rounded-xl p-4">
                    <p class="text-red-600 font-bold">
                        Admin
                    </p>

                    <p class="text-gray-600 text-sm mt-1">
                        CRUD data administrator
                    </p>
                </div>

                <div class="bg-orange-50 rounded-xl p-4">
                    <p class="text-orange-600 font-bold">
                        Karyawan
                    </p>

                    <p class="text-gray-600 text-sm mt-1">
                        CRUD data karyawan
                    </p>
                </div>

                <div class="bg-green-50 rounded-xl p-4">
                    <p class="text-green-600 font-bold">
                        Pesanan
                    </p>

                    <p class="text-gray-600 text-sm mt-1">
                        Halaman pesanan
                    </p>
                </div>

            </div>

        </div>


        <!-- FOOTER -->
        <footer class="text-center text-gray-500 text-sm mt-10">
            © {{ date('Y') }} Pizza Mozza. All rights reserved.
        </footer>

    </main>

</body>
</html>