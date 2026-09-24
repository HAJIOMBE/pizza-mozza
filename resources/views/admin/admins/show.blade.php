
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Admin - Pizza Mozza</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50 min-h-screen p-6">

    <div class="max-w-3xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                🍕 Detail Admin
            </h1>

            <p class="text-gray-500 mt-2">
                Informasi administrator Pizza Mozza
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            <div class="space-y-5">

                <div>
                    <p class="text-sm text-gray-500 font-semibold">
                        Nama Admin
                    </p>

                    <p class="text-lg text-gray-800 font-medium">
                        {{ $admin->nama }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 font-semibold">
                        Email
                    </p>

                    <p class="text-lg text-gray-800">
                        {{ $admin->email }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 font-semibold">
                        Jabatan
                    </p>

                    <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $admin->jabatan }}
                    </span>
                </div>

                <div>
                    <p class="text-sm text-gray-500 font-semibold">
                        Nomor HP
                    </p>

                    <p class="text-lg text-gray-800">
                        {{ $admin->no_hp ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 font-semibold">
                        Dibuat Pada
                    </p>

                    <p class="text-lg text-gray-800">
                        {{ $admin->created_at?->format('d M Y, H:i') ?? '-' }}
                    </p>
                </div>

            </div>

            <div class="flex flex-wrap gap-3 mt-8">

                <a
                    href="{{ route('admin.admins.edit', $admin->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                    Edit Admin
                </a>

                <a
                    href="{{ route('admin.admins.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-xl font-semibold transition">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</body>
</html>