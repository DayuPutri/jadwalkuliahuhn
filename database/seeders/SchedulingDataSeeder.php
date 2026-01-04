<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Ruang;
use App\Models\User;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Hash;

class SchedulingDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Kelas
        $kelas = Kelas::create([
            'nama' => 'IF23A',
            'jumlah_mahasiswa' => 35,
        ]);

        // 2. Ruang
        Ruang::create(['nama' => 'Kelas Denpasar', 'kapasitas' => 40, 'tipe' => 'kelas']);
        Ruang::create(['nama' => 'Lab Komputer Denpasar', 'kapasitas' => 30, 'tipe' => 'lab']);

        // 3. Dosen (pastikan role = dosen)
        $dosen1 = User::create([
            'name' => 'NI MADE RAI KRISTINA, SE., MM',
            'email' => 'rai.kristina@uhn.ac.id',
            'nim' => null,
            'role' => 'dosen',
            'password' => Hash::make('dosen123'),
        ]);

        $dosen2 = User::create([
            'name' => 'I GEDE AGUS KRISNA WARMAYANA, S.Kom., M.T',
            'email' => 'agus.krisna@uhn.ac.id',
            'nim' => null,
            'role' => 'dosen',
            'password' => Hash::make('dosen123'),
        ]);

        // 4. Mata Kuliah
        MataKuliah::create([
            'kode' => 'TPR001',
            'nama' => 'Technopreneurship',
            'sks' => 3,
            'semester' => 5,
            'dosen_id' => $dosen1->id,
            'kelas_id' => $kelas->id,
        ]);

        MataKuliah::create([
            'kode' => 'BLC001',
            'nama' => 'Teknologi Blockchain',
            'sks' => 3,
            'semester' => 5,
            'dosen_id' => $dosen2->id,
            'kelas_id' => $kelas->id,
        ]);

        MataKuliah::create([
            'kode' => 'WEB001',
            'nama' => 'Pengembangan Web',
            'sks' => 3,
            'semester' => 5,
            'dosen_id' => $dosen1->id,
            'kelas_id' => $kelas->id,
        ]);

        // Tambah 4-5 mata kuliah lagi biar lebih realistis
    }
}