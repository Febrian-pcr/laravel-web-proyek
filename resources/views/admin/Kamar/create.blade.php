<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar - Wisma Kita Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#F4F6F8] text-slate-800 antialiased flex h-screen">

    <!-- Sidebar (Disembunyikan kodenya untuk mempersingkat, Anda bisa salin sidebar penuh dari index.blade.php) -->
    <aside class="w-64 bg-white border-r border-gray-200 flex-shrink-0 h-full flex flex-col z-20">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <span class="text-xl font-bold text-[#148F96]">Wisma Kita Admin</span>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-gray-50 rounded-lg font-medium transition">Dasbor</a>
            <a href="{{ route('admin.kamar.index') }}" class="flex items-center gap-3 px-4 py-3 bg-teal-50 text-[#148F96] rounded-lg font-medium transition">Kelola Kamar</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-gray-50 rounded-lg font-medium transition">Pelanggan</a>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col h-full min-w-0">
        <header class="h-16 bg-white border-b border-gray-100 flex items-center px-8 flex-shrink-0">
            <h2 class="text-xl font-bold text-slate-800">Tambah Kamar Baru</h2>
        </header>

        <main class="flex-1 p-8 overflow-y-auto">
            <div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-8">
                <form action="{{ route('admin.kamar.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama / Tipe Kamar</label>
                        <input type="text" name="nama_kamar" required placeholder="Contoh: Kamar Deluxe" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#148F96] focus:border-[#148F96] outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Harga per Malam (Rp)</label>
                        <input type="number" name="harga" required min="0" placeholder="Contoh: 250000" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#148F96] focus:border-[#148F96] outline-none transition">
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.kamar.index') }}" class="px-5 py-2 text-slate-600 font-medium hover:bg-gray-100 rounded-lg transition">Batal</a>
                        <button type="submit" class="bg-[#148F96] text-white px-5 py-2 rounded-lg font-semibold hover:bg-[#0F767C] transition shadow-sm">
                            Simpan Kamar
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>