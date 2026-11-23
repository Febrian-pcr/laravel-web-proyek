<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // untuk menghitung tanggal

class ReservasiController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'tipe_kamar' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // 2. Cari kamar berdasarkan tipe yang diklik pengguna (dan statusnya tersedia)
        $kamar = Kamar::where('tipe_kamar', $request->tipe_kamar)
                      ->where('status_kamar', 'tersedia')
                      ->first();

        // Jika kamar penuh/tidak ada
        if (!$kamar) {
            return back()->with('error', 'Maaf, tipe kamar ini sedang tidak tersedia.');
        }

        // 3. Hitung Lama Menginap & Total Harga
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $lama_menginap = $checkIn->diffInDays($checkOut);
        $total_bayar = $lama_menginap * $kamar->harga_per_malam;

        // 4. Simpan Data ke Tabel Reservasi
        Reservasi::create([
            'user_id' => Auth::id(),
            'kamar_id' => $kamar->id,
            'tgl_checkin' => $request->check_in,
            'tgl_checkout' => $request->check_out,
            'total_bayar' => $total_bayar,
            'status_reservasi' => 'pending' // Sesuai default di database
        ]);

        // 5. Arahkan ke dashboard pelanggan beserta pesan sukses
        return redirect()->route('pelanggan.dashboard')->with('success', 'Pemesanan berhasil dibuat! Silakan cek riwayat Anda.');
    }
}
