<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function index()
    {
        // Mengambil semua data kamar dari database
        $kamar = Kamar::all();
        return view('admin.kamar.index', compact('kamar'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kamar' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        // Simpan ke database
        Kamar::create([
            'nama_kamar' => $request->nama_kamar,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.kamar.index')->with('success', 'Data kamar berhasil ditambahkan!');
    }
}
