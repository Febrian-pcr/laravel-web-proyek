<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Reservasi Wisma</title>
    <!-- Kita gunakan CDN Tailwind CSS agar desain langsung jalan -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-blue-700">Wisma Kita</h1>
        <div>
            <!-- Pengecekan Login -->
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium px-4">Dashboard Admin</a>
                @else
                    <a href="{{ route('pelanggan.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium px-4">Dashboard Saya</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium mr-4">Masuk</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Daftar</a>
            @endauth
        </div>
    </nav>

    <!-- Banner Hero -->
    <header class="bg-blue-600 text-white text-center py-16">
        <h2 class="text-4xl font-bold mb-4">Kenyamanan Menginap Harga Terbaik</h2>
        <p class="text-lg mb-8">Pesan kamar secara online, cepat, dan mudah.</p>
    </header>

    <!-- Katalog Kamar -->
    <main class="max-w-6xl mx-auto p-6 mt-2">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b-2 border-blue-200 pb-2">Pilihan Kamar</h3>
        
        <!-- Grid Kamar (Untuk sementara kita hardcode desainnya) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card Kamar 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=600&q=80" alt="Kamar Standar" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h4 class="text-xl font-bold mb-2">Kamar Standar</h4>
                    <p class="text-gray-600 text-sm mb-4">Fasilitas: Kipas Angin, TV LED, Kamar Mandi Luar, Free WiFi.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-blue-600 font-bold text-lg">Rp 150.000<span class="text-sm text-gray-500 font-normal">/malam</span></p>
                        <!-- Tombol ini nanti akan diarahkan ke form pemesanan -->
                        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Pesan</a>
                    </div>
                </div>
            </div>

            <!-- Card Kamar 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=600&q=80" alt="Kamar Deluxe" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h4 class="text-xl font-bold mb-2">Kamar Deluxe</h4>
                    <p class="text-gray-600 text-sm mb-4">Fasilitas: AC, TV LED, Kamar Mandi Dalam, Sarapan, Free WiFi.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-blue-600 font-bold text-lg">Rp 250.000<span class="text-sm text-gray-500 font-normal">/malam</span></p>
                        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Pesan</a>
                    </div>
                </div>
            </div>
            
            <!-- Card Kamar 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=600&q=80" alt="Kamar VIP" class="w-full h-48 object-cover">
                <div class="p-5">
                    <h4 class="text-xl font-bold mb-2">Kamar VIP</h4>
                    <p class="text-gray-600 text-sm mb-4">Fasilitas: AC, Smart TV, Kulkas Mini, Air Panas, Sarapan 2 Porsi.</p>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-blue-600 font-bold text-lg">Rp 450.000<span class="text-sm text-gray-500 font-normal">/malam</span></p>
                        <a href="#" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Pesan</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>