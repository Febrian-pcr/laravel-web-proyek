<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;

// Halaman Utama / Katalog Kamar
Route::get('/', function () {
    return view('welcome');
});

// Route Preview (Opsional untuk cek tampilan)
Route::get('/preview/admin', function () {
    return view('admin.dashboard');
});
Route::get('/preview/pelanggan', function () {
    return view('pelanggan.dashboard');
});

// Route untuk Pelanggan (Sudah Login)
Route::middleware(['auth'])->group(function () {
    // Dashboard Pelanggan
    Route::get('/pelanggan/dashboard', [PelangganController::class, 'index'])
        ->middleware('role:pelanggan')
        ->name('pelanggan.dashboard');

    // Pemesanan Kamar
    Route::get('/pesan/{tipe_kamar}', function ($tipe_kamar) {
        return view('booking', ['tipe_kamar' => ucfirst($tipe_kamar)]);
    })->name('booking.form');
    Route::post('/pesan', [ReservasiController::class, 'store'])->name('booking.store');

    // Pembayaran
    Route::get('/pembayaran/{id}', [PelangganController::class, 'pembayaran'])->name('pembayaran.form');
    Route::post('/pembayaran/{id}', [PelangganController::class, 'prosesPembayaran'])->name('pembayaran.proses');
});

// Route khusus Admin (Sudah Login & Role Admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard & Konfirmasi Reservasi
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/konfirmasi/{id}', [AdminController::class, 'konfirmasi'])->name('admin.konfirmasi');

    // Kelola Kamar (CRUD)
    Route::get('/admin/kamar', [KamarController::class, 'index'])->name('admin.kamar.index');
    Route::get('/admin/kamar/create', [KamarController::class, 'create'])->name('admin.kamar.create');
    Route::post('/admin/kamar', [KamarController::class, 'store'])->name('admin.kamar.store');
});

require __DIR__ . '/auth.php';
