
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Admin - Pizza Mozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen p-6">

    <div class="max-w-3xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                🍕 Tambah Admin
            </h1>

            <p class="text-gray-500 mt-2">
                Tambahkan data administrator Pizza Mozza
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.admins.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="nama" class="block font-semibold text-gray-700 mb-2">
                        Nama Admin
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama admin"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div class="mb-5">
                    <label for="email" class="block font-semibold text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@example.com"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                
                <div class="mb-5">
                    <label for="jabatan" class="block font-semibold text-gray-700 mb-2">
                        Jabatan
                    </label>

                    <select
                        id="jabatan"
                        name="jabatan"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">

                        <option value="" disabled
                            {{ old('jabatan') ? '' : 'selected' }}>
                            Pilih Jabatan
                        </option>

                        <option value="Admin"
                            {{ old('jabatan') == 'Admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="Super Admin"
                            {{ old('jabatan') == 'Super Admin' ? 'selected' : '' }}>
                            Super Admin
                        </option>

                    </select>
                </div>

                <div class="mb-6">
                    <label for="no_hp" class="block font-semibold text-gray-700 mb-2">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        id="no_hp"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="08xxxxxxxxxx"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div class="flex flex-wrap gap-3">

                    <button
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Simpan Admin
                    </button>

                    <a
                        href="{{ route('admin.admins.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-xl font-semibold transition">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>