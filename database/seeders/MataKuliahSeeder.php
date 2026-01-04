<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah; // <--- Tambahkan ini

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataKuliah::create(['nama' => 'Technopreneurship', 'deskripsi' => 'Mata kuliah wirausaha']);
        MataKuliah::create(['nama' => 'Kewarganegaraan', 'deskripsi' => 'Pendidikan kewarganegaraan']);
        MataKuliah::create(['nama' => 'Proyek Perangkat Lunak', 'deskripsi' => 'Proyek software']);
        MataKuliah::create(['nama' => 'Teknologi Blockchain', 'deskripsi' => 'Teknologi blockchain']);
        MataKuliah::create(['nama' => 'Pengembangan Web', 'deskripsi' => 'Web development']);
        MataKuliah::create(['nama' => 'Pembelajaran Mesin', 'deskripsi' => 'Machine learning']);
        MataKuliah::create(['nama' => 'Analisis Jejaring Sosial', 'deskripsi' => 'Social network analysis']);
    }
}
