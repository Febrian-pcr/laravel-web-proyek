<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@wismakita.com'],
            [
                'username' => 'admin',
                'password' => bcrypt('password123'),
                'nama_lengkap' => 'Admin Febrian',
                'no_hp' => '081234567890',
                'role' => 'admin',
            ]
        );

        // 2. Akun Pelanggan (User)
        User::updateOrCreate(
            ['email' => 'pelanggan@wismakita.com'],
            [
                'username' => 'pelanggan',
                'password' => bcrypt('password123'),
                'nama_lengkap' => 'Budi Santoso',
                'no_hp' => '089876543210',
                'role' => 'pelanggan',
            ]
        );

        // 3. Isi data kamar awal (hapus tanda // di bawah jika ingin sekalian mengisi data kamar)
        $this->call(KamarSeeder::class);
    }
}
