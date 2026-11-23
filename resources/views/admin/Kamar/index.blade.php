<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kamar - Wisma Kita Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F4F6F8] text-slate-800 antialiased flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex-shrink-0 h-full flex flex-col z-20">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <span class="text-xl font-bold text-[#148F96]">Wisma Kita Admin</span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-gray-50 rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Dasbor
            </a>
            <a href="{{ route('admin.kamar.index') }}" class="flex items-center gap-3 px-4 py-3 bg-teal-50 text-[#148F96] rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Kelola Kamar
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-gray-50 rounded-lg font-medium transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Pelanggan
            </a>
        </nav>

        <div class="p-4 border-t border-gray-100 mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content wrapper -->
    <div class="flex-1 flex flex-col h-full min-w-0">
        <!-- Topbar -->
        <header class="h-16 bg-white border-b border-gray-100 flex items-center justify-between px-8 flex-shrink-0">
            <h2 class="text-xl font-bold text-slate-800">Kelola Kamar</h2>
            <div class="text-sm font-medium text-slate-600">
                Halo, Admin {{ Auth::user()->name ?? '' }}
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 p-8 overflow-y-auto">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-slate-800">Daftar Kamar Tersedia</h3>
                <a href="{{ route('admin.kamar.create') }}" class="bg-[#148F96] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#0F767C] transition shadow-sm">
                    + Tambah Kamar
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead>
                            <tr class="text-xs uppercase text-slate-400 border-b border-gray-100 bg-gray-50/50">
                                <th class="px-6 py-4 font-semibold">ID</th>
                                <th class="px-6 py-4 font-semibold">Nama Kamar</th>
                                <th class="px-6 py-4 font-semibold">Harga / Malam</th>
                                <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse($kamar as $item)
                            <tr class="hover:bg-gray-50/50">
                                <td class="px-6 py-4 font-medium text-slate-700">{{ $item->id }}</td>
                                <!-- Sesuaikan 'nama_kamar' dan 'harga' dengan nama kolom asli di tabel kamars Anda -->
                                <td class="px-6 py-4 text-slate-800 font-medium">{{ $item->nama_kamar ?? 'Kamar Standar' }}</td>
                                <td class="px-6 py-4 text-slate-600">Rp {{ number_format($item->harga ?? 0, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-800 font-medium text-sm">Hapus</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-slate-500">Belum ada data kamar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>

</html>