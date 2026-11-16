<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/pelanggan/dashboard', function () {
        return 'Selamat datang di Dashboard Pelanggan'; // Nanti diarahkan ke view pelanggan
    })->name('pelanggan.dashboard');
});

require __DIR__ . '/auth.php';
