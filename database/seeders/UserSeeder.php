<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin - login pakai email
        User::updateOrCreate(['email' => 'admin@kampus.ac.id'], [
            'name' => 'Admin Sistem',
            'email' => 'admin@kampus.ac.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Dosen - login pakai email
        User::updateOrCreate(['email' => 'dosen@kampus.ac.id'], [
            'name' => 'Dosen Test',
            'email' => 'dosen@kampus.ac.id',
            'password' => Hash::make('dosen123'),
            'role' => 'dosen',
        ]);

        // Mahasiswa - login pakai NIM (kolom nim)
        User::updateOrCreate(['nim' => '2313231048'], [
            'name' => 'Mahasiswa Test',
            'nim' => '2313231048',
            'email' => '2313231048@kampus.ac.id', // opsional
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa',
            'kelas' => 'IF23A', // kalau ada kolom kelas
        ]);
    }
}