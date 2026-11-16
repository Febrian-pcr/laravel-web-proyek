<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'kamar_id', 'admin_id', 'tgl_checkin', 'tgl_checkout', 
        'fasilitas_tambahan', 'total_bayar', 'status_reservasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
