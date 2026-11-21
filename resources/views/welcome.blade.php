<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisma Kita</title>
    <!-- Tailwind CSS & Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F4F6F8] text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 py-4 px-6 md:px-12 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-[#148F96]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="text-xl font-bold text-slate-800">Wisma Kita</span>
        </div>
        <div class="flex items-center gap-6">
            <a href="#" class="text-[#148F96] font-medium text-sm">Beranda</a>
            <a href="#" class="text-slate-600 hover:text-slate-800 font-medium text-sm">Kamar</a>
            <a href="#" class="text-slate-600 hover:text-slate-800 font-medium text-sm">Fasilitas</a>
            <a href="#" class="text-slate-600 hover:text-slate-800 font-medium text-sm">Kontak</a>
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="bg-[#148F96] text-white px-5 py-2 rounded-lg font-medium text-sm hover:bg-[#0F767C]">Dashboard Admin</a>
                @else
                    <a href="{{ route('pelanggan.dashboard') }}" class="bg-[#148F96] text-white px-5 py-2 rounded-lg font-medium text-sm hover:bg-[#0F767C]">Dashboard Saya</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="bg-[#148F96] text-white px-5 py-2.5 rounded-lg font-medium text-sm hover:bg-[#0F767C] transition">Login / Register</a>
            @endauth
        </div>
    </nav>

    <!-- Hero Banner with image icon / placeholder -->
    <div class="bg-[#2C8084] h-72 w-full relative flex items-center justify-center">
        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
        </svg>
    </div>

    <!-- Booking Floating Search Form -->
    <div class="max-w-6xl w-full mx-auto px-6 -mt-16 relative z-10">
        <form class="bg-white rounded-xl shadow-lg p-6 grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-2">Check-in</label>
                <div class="relative">
                    <input type="text" value="20/05/2025" class="w-full bg-[#FAFAFA] border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-slate-600 focus:outline-none focus:border-[#148F96]">
                    <span class="absolute right-3 top-3.5 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </span>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-2">Check-out</label>
                <div class="relative">
                    <input type="text" value="21/05/2025" class="w-full bg-[#FAFAFA] border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-slate-600 focus:outline-none focus:border-[#148F96]">
                    <span class="absolute right-3 top-3.5 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </span>
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-2">Tipe kamar</label>
                <select class="w-full bg-[#FAFAFA] border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-slate-600 focus:outline-none focus:border-[#148F96] appearance-none">
                    <option>Semua tipe</option>
                    <option>Deluxe</option>
                    <option>Standard</option>
                    <option>VIP</option>
                </select>
            </div>
            <div>
                <button type="submit" class="w-full bg-[#148F96] text-white py-2.5 rounded-lg font-medium text-sm hover:bg-[#0F767C] transition">Cari</button>
            </div>
        </form>
    </div>

    <!-- Room Cards Section -->
    <main class="max-w-6xl w-full mx-auto px-6 py-12 flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Room 1 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=600&q=80" alt="Deluxe" class="w-full h-48 object-cover">
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Deluxe</h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-4 flex-grow">Kamar luas dengan tempat tidur king, nyaman untuk istirahat Anda.</p>
                    <div class="mt-auto">
                        <div class="mb-4">
                            <span class="text-[#148F96] font-bold text-base">Rp 350.000</span>
                            <span class="text-xs text-slate-400">/ malam</span>
                        </div>
                        <a href="#" class="block text-center bg-[#148F96] text-white py-2 rounded-lg text-xs font-semibold hover:bg-[#0F767C] transition">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Room 2 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=600&q=80" alt="Standard" class="w-full h-48 object-cover">
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-slate-800 mb-2">Standard</h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-4 flex-grow">Pilihan nyaman dan terjangkau untuk perjalanan singkat Anda.</p>
                    <div class="mt-auto">
                        <div class="mb-4">
                            <span class="text-[#148F96] font-bold text-base">Rp 249.000</span>
                            <span class="text-xs text-slate-400">/ malam</span>
                        </div>
                        <a href="#" class="block text-center bg-[#148F96] text-white py-2 rounded-lg text-xs font-semibold hover:bg-[#0F767C] transition">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Room 3 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=600&q=80" alt="VIP" class="w-full h-48 object-cover">
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-lg font-bold text-slate-800 mb-2">VIP</h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-4 flex-grow">Kamar premium dengan ruang lebih luas dan fasilitas lengkap.</p>
                    <div class="mt-auto">
                        <div class="mb-4">
                            <span class="text-[#148F96] font-bold text-base">Rp 500.000</span>
                            <span class="text-xs text-slate-400">/ malam</span>
                        </div>
                        <a href="#" class="block text-center bg-[#148F96] text-white py-2 rounded-lg text-xs font-semibold hover:bg-[#0F767C] transition">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#EAEDF1] py-8 px-6 md:px-12 flex flex-col md:flex-row justify-between items-center text-xs text-slate-400 gap-4 mt-auto">
        <div class="text-center md:text-left">
            <p class="font-bold text-slate-600 text-sm mb-1">Wisma Kita</p>
            <p>Jl. Puspa No. 18, Yogyakarta - 0812 3456 7890</p>
        </div>
        <div>
            <p>© 2025 Wisma Kita. Semua hak dilindungi.</p>
        </div>
    </footer>

</body>
</html>
