<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;
use App\Models\Pembayaran;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reservasi = Reservasi::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('reservasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['birthday'] = $request->birthday;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        Pelanggan::create($data);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataPelanggan = Pelanggan::findOrFail($id);
        $dataPelanggan->first_name = $request->first_name;
        $dataPelanggan->last_name = $request->last_name;
        $dataPelanggan->birthday = $request->birthday;
        $dataPelanggan->gender = $request->gender;
        $dataPelanggan->email = $request->email;
        $dataPelanggan->phone = $request->phone;
        $dataPelanggan->save();

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPelanggan = Pelanggan::findOrFail($id);
        $dataPelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus.');
    }

    public function pembayaran($id)
    {
        // Cari data reservasi berdasarkan ID dan pastikan itu milik user yang sedang login
        $reservasi = Reservasi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('pembayaran', compact('reservasi'));
    }

    public function prosesPembayaran(Request $request, $id)
    {
        // Validasi file gambar
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $reservasi = Reservasi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Simpan gambar ke folder public/storage/bukti_pembayaran
        $path = $request->file('bukti_bayar')->store('bukti_pembayaran', 'public');

        // Simpan data ke tabel pembayarans
        Pembayaran::create([
            'reservasi_id' => $reservasi->id,
            'tgl_bayar' => now(),
            'jumlah_bayar' => $reservasi->total_bayar,
            'bukti_bayar' => $path,
            'status' => 'pending' // Sesuaikan jika nama kolom status di tabel Anda berbeda
        ]);

        // Ubah status reservasi agar tidak muncul tombol "Bayar Sekarang" lagi
        $reservasi->update([
            'status_reservasi' => 'dikonfirmasi'
        ]);

        return redirect()->route('pelanggan.dashboard')->with('success', 'Bukti pembayaran berhasil diunggah! Silakan tunggu konfirmasi Admin.');
    }
}
