<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservasi_id',
        'admin_id',
        'tgl_bayar',
        'jumlah_bayar',
        'bukti_transfer',
        'status_pembayaran'
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}
