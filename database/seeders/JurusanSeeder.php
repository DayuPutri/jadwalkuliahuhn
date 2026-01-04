<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        Jurusan::create(['nama' => 'Informatika', 'kode' => 'IF']);
        Jurusan::create(['nama' => 'Teknik Sipil', 'kode' => 'TS']);
        Jurusan::create(['nama' => 'Manajemen', 'kode' => 'MN']);
        Jurusan::create(['nama' => 'Akuntansi', 'kode' => 'AK']);
        // Tambah jurusan lain sesuai kampus-mu
    }
}