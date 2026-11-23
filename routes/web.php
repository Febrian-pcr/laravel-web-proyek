<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome'); // Halaman landing page / katalog kamar nanti
});

// Route khusus untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return 'Selamat datang di Dashboard Admin'; // Nanti diarahkan ke view admin
    })->name('admin.dashboard');
});

// Route khusus untuk Pelanggan
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/pelanggan/dashboard', [PelangganController::class, 'index'])
    ->middleware(['auth', 'role:pelanggan']) // sesuaikan dengan middleware milik Anda
    ->name('pelanggan.dashboard');
});

Route::get('/preview/admin', function () {
    return view('admin.dashboard');
});

Route::get('/preview/pelanggan', function () {
    return view('pelanggan.dashboard');
});

// Route untuk Form Pemesanan 
Route::middleware(['auth'])->group(function () {
    Route::get('/pesan/{tipe_kamar}', function ($tipe_kamar) {
        return view('booking', ['tipe_kamar' => ucfirst($tipe_kamar)]);
    })->name('booking.form');
});

Route::middleware(['auth'])->group(function () {
    // Route menampilkan form (yang sebelumnya)
    Route::get('/pesan/{tipe_kamar}', function ($tipe_kamar) {
        return view('booking', ['tipe_kamar' => ucfirst($tipe_kamar)]);
    })->name('booking.form');

    // Route MENGIRIM data form ke database (Baru ditambahkan)
    Route::post('/pesan', [ReservasiController::class, 'store'])->name('booking.store');
});

Route::get('/pembayaran/{id}', [PelangganController::class, 'pembayaran'])->name('pembayaran.form');
Route::post('/pembayaran/{id}', [PelangganController::class, 'prosesPembayaran'])->name('pembayaran.proses');

require __DIR__ . '/auth.php';
