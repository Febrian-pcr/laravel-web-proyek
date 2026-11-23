<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        // Ambil data reservasi milik user yang sedang login, urutkan dari yang terbaru
        $reservasi = Reservasi::where('user_id', Auth::id())
                              ->orderBy('created_at', 'desc')
                              ->get();

        return view('dashboard', compact('reservasi'));        
    }
}
