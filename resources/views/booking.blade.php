<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kamar - Wisma Kita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F4F6F8] text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Navbar Sederhana -->
    <nav class="bg-white border-b border-gray-100 py-4 px-6 md:px-12 flex justify-between items-center sticky top-0 z-50">
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <svg class="w-6 h-6 text-[#148F96]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="text-sm font-bold text-slate-600 hover:text-slate-800">Kembali ke Katalog</span>
        </a>
        <span class="text-xl font-bold text-slate-800">Wisma Kita</span>
    </nav>

    <!-- Konten Form -->
    <main class="max-w-3xl w-full mx-auto px-6 py-10 flex-grow">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-slate-800">Selesaikan Pemesanan Anda</h2>
            <p class="text-sm text-slate-500 mt-1">Silakan lengkapi detail tanggal dan pembayaran untuk kamar <span class="font-bold text-[#148F96]">{{ $tipe_kamar }}</span>.</p>
        </div>
        <!-- Tambahkan ini tepat di atas <form> agar pesan error terlihat -->
@if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-6 text-sm">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('error') }}
    </div>
@endif

        <form action="{{ route('booking.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
            @csrf
            <input type="hidden" name="tipe_kamar" value="{{ $tipe_kamar }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Check-in -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Check-in</label>
                    <input type="date" name="check_in" required class="w-full bg-[#FAFAFA] border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#148F96]">
                </div>
                <!-- Check-out -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Check-out</label>
                    <input type="date" name="check_out" required class="w-full bg-[#FAFAFA] border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#148F96]">
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-8">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Metode Pembayaran</label>
                <select name="metode_pembayaran" class="w-full bg-[#FAFAFA] border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#148F96]">
                    <option value="bca">Transfer Bank BCA - 1234567890 (a.n Wisma Kita)</option>
                    <option value="mandiri">Transfer Bank Mandiri - 0987654321 (a.n Wisma Kita)</option>
                    <option value="qris">E-Wallet / QRIS</option>
                </select>
                <p class="text-xs text-slate-400 mt-2">*Instruksi transfer dan upload bukti bayar akan muncul di halaman selanjutnya setelah Anda klik Pesan.</p>
            </div>

            <!-- Rincian Pemesan -->
            <div class="bg-[#F4F6F8] p-4 rounded-lg mb-8">
                <h4 class="text-sm font-semibold text-slate-700 mb-3 border-b border-gray-200 pb-2">Informasi Pemesan</h4>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-slate-500">Nama Lengkap</span>
                    <span class="font-medium text-slate-800">{{ Auth::user()->nama_lengkap }}</span>
                </div>
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-slate-500">Email Akses</span>
                    <span class="font-medium text-slate-800">{{ Auth::user()->email }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-slate-500">Tipe Kamar</span>
                    <span class="font-medium text-[#148F96]">{{ $tipe_kamar }}</span>
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="w-full bg-[#148F96] text-white py-3.5 rounded-lg font-bold text-sm hover:bg-[#0F767C] transition shadow-md">Konfirmasi & Pesan Kamar</button>
        </form>
    </main>

</body>

</html>
