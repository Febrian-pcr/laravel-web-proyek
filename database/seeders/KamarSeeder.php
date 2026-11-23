<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kamar;

class KamarSeeder extends Seeder
{

    public function run()
    {
        Kamar::create(['no_kamar' => '101', 'tipe_kamar' => 'Deluxe', 'harga_per_malam' => 350000]);
        Kamar::create(['no_kamar' => '102', 'tipe_kamar' => 'Standard', 'harga_per_malam' => 249000]);
        Kamar::create(['no_kamar' => '103', 'tipe_kamar' => 'VIP', 'harga_per_malam' => 500000]);
    }
}
