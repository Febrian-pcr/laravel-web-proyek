<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Pelanggan - Wisma Kita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F4F6F8] text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 py-4 px-6 md:px-12 flex justify-between items-center sticky top-0 z-50">
        <span class="text-xl font-bold text-[#148F96]">Wisma Kita</span>
        <div class="flex items-center gap-4">
            <span class="text-sm font-medium text-slate-600">Halo, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-5xl w-full mx-auto px-6 py-10 flex-grow">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Dasbor Pelanggan</h2>
                <p class="text-sm text-slate-500 mt-1">Kelola pesanan kamar dan pembayaran Anda di sini.</p>
            </div>
            <a href="{{ url('/') }}" class="bg-[#148F96] text-white px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-[#0F767C] transition shadow-sm">
                + Pesan Kamar Lagi
            </a>
        </div>

        <!-- Alert Sukses (Jika ada) -->
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium">
            {{ session('success') }}
        </div>
        @endif

        <!-- Daftar Reservasi -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-semibold text-slate-700">Riwayat Pemesanan Anda</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-xs uppercase text-slate-400 border-b border-gray-100">
                            <th class="px-6 py-4 font-semibold">ID Pesanan</th>
                            <th class="px-6 py-4 font-semibold">Check-in</th>
                            <th class="px-6 py-4 font-semibold">Check-out</th>
                            <th class="px-6 py-4 font-semibold">Total Bayar</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @forelse($reservasi as $item)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-4 font-medium text-slate-700">#RES-{{ $item->id }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ \Carbon\Carbon::parse($item->tgl_checkin)->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ \Carbon\Carbon::parse($item->tgl_checkout)->format('d M Y') }}</td>
                            <td class="px-6 py-4 font-semibold text-slate-800">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @if($item->status_reservasi == 'pending')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Menunggu Pembayaran</span>
                                @elseif($item->status_reservasi == 'dikonfirmasi')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Menunggu Konfirmasi Admin</span>
                                @elseif($item->status_reservasi == 'selesai')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Selesai / Lunas</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if($item->status_reservasi == 'pending')
                                <a href="{{ route('pembayaran.form', $item->id) }}" class="text-[#148F96] hover:text-[#0F767C] font-semibold text-sm">Bayar Sekarang</a>
                                @else
                                <span class="text-slate-400 text-sm">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                Anda belum memiliki riwayat pemesanan kamar.<br>
                                <a href="{{ url('/') }}" class="text-[#148F96] font-semibold hover:underline mt-2 inline-block">Mulai Pesan Kamar</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>