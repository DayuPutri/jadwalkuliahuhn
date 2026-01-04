<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruangan; // ← PASTIKAN BARIS INI ADA DAN BENAR

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruangan::create(['nama' => 'Kelas Denpasar', 'kapasitas' => 30]);
        Ruangan::create(['nama' => 'Lab Komputer Denpasar', 'kapasitas' => 25]);
    }
}