<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'no_kamar', 'tipe_kamar', 'harga_per_malam', 'status_kamar'
    ];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
