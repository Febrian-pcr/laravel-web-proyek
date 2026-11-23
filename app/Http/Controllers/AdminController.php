<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Pembayaran;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua reservasi beserta relasi pembayarannya
        $reservasi = Reservasi::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('reservasi'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        
        // Ubah status menjadi 'selesai' sesuai enum database Anda
        $reservasi->update(['status_reservasi' => 'selesai']);

        return back()->with('success', 'Pesanan #' . $id . ' berhasil dikonfirmasi dan diselesaikan.');
    }
}
