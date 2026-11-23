<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Wisma Kita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#F4F6F8] text-slate-800 antialiased min-h-screen flex flex-col items-center justify-center py-10 px-4">

    <div class="max-w-md w-full bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Pembayaran Reservasi</h2>
            <p class="text-sm text-slate-500 mt-1">ID Pesanan: #RES-{{ $reservasi->id }}</p>
        </div>

        <div class="bg-teal-50 border border-teal-100 rounded-lg p-4 mb-6 text-center">
            <p class="text-sm text-slate-600 mb-1">Total yang harus dibayar:</p>
            <p class="text-2xl font-bold text-[#148F96]">Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</p>
        </div>

        <div class="text-sm text-slate-600 mb-6">
            <p class="mb-2 font-semibold">Silakan transfer ke rekening berikut:</p>
            <ul class="list-disc pl-5 space-y-1">
                <li>BCA: <strong>1234567890</strong> a.n Wisma Kita</li>
                <li>Mandiri: <strong>0987654321</strong> a.n Wisma Kita</li>
            </ul>
        </div>

        <form action="{{ route('pembayaran.proses', $reservasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Upload Bukti Transfer</label>
                <input type="file" name="bukti_bayar" required class="w-full bg-[#FAFAFA] border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#148F96] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#148F96] file:text-white hover:file:bg-[#0F767C]">
                @error('bukti_bayar')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <a href="{{ route('pelanggan.dashboard') }}" class="w-1/3 text-center bg-gray-100 text-slate-600 py-3 rounded-lg font-semibold text-sm hover:bg-gray-200 transition">Batal</a>
                <button type="submit" class="w-2/3 bg-[#148F96] text-white py-3 rounded-lg font-bold text-sm hover:bg-[#0F767C] transition shadow-md">Kirim Bukti Pembayaran</button>
            </div>
        </form>
    </div>

</body>
</html>