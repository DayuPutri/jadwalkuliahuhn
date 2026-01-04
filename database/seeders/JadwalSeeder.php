<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Ruangan; // perbaikan nama
use App\Models\MataKuliah; // tambah import
use App\Models\Kelas; // tambah import

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan seeder ini jalan SETELAH DosenSeeder, MataKuliahSeeder, KelasSeeder, RuanganSeeder
        // Kalau belum ada data, seeder ini akan gagal → urutan di DatabaseSeeder penting!

        $jadwals = [
            [
                'mata_kuliah' => 'Technopreneurship',
                'dosen' => 'NI MADE RAI KRISTINA, SE., MM',
                'kelas' => 'IF23A',
                'ruangan' => 'Kelas Denpasar',
                'hari' => 'Senin',
                'jam_mulai' => '14:00',
                'jam_selesai' => '16:00',
                'sks' => 3,
            ],
            [
                'mata_kuliah' => 'Kewarganegaraan',
                'dosen' => 'Ni Wayan Ayu Mamadi, S.Ag., M.Pd.H',
                'kelas' => 'IF23A',
                'ruangan' => 'Kelas Denpasar',
                'hari' => 'Selasa',
                'jam_mulai' => '10:00',
                'jam_selesai' => '11:40',
                'sks' => 2,
            ],
            [
                'mata_kuliah' => 'Proyek Perangkat Lunak',
                'dosen' => 'NI KETUT GITA SARASWATI, S.E., S.Kom., M.Kom',
                'kelas' => 'IF23A',
                'ruangan' => 'Lab Komputer Denpasar',
                'hari' => 'Selasa',
                'jam_mulai' => '13:00',
                'jam_selesai' => '15:30',
                'sks' => 3,
            ],
            [
                'mata_kuliah' => 'Teknologi Blockchain',
                'dosen' => 'I GEDE AGUS KRISNA WARMAYANA, S.Kom., M.T',
                'kelas' => 'IF23A',
                'ruangan' => 'Lab Komputer Denpasar',
                'hari' => 'Rabu',
                'jam_mulai' => '13:00',
                'jam_selesai' => '15:30',
                'sks' => 3,
            ],
            [
                'mata_kuliah' => 'Pengembangan Web',
                'dosen' => 'I GEDE WAHYU SANJAYA, ST., M.Kom',
                'kelas' => 'IF23A',
                'ruangan' => 'Lab Komputer Denpasar',
                'hari' => 'Kamis',
                'jam_mulai' => '07:30',
                'jam_selesai' => '10:00',
                'sks' => 3,
            ],
            [
                'mata_kuliah' => 'Pembelajaran Mesin',
                'dosen' => 'I MADE ANOM MAHARTHA DINATA, M.Kom.',
                'kelas' => 'IF23A',
                'ruangan' => 'Kelas Denpasar',
                'hari' => 'Kamis',
                'jam_mulai' => '13:00',
                'jam_selesai' => '15:30',
                'sks' => 3,
            ],
            [
                'mata_kuliah' => 'Analisis Jejaring Sosial',
                'dosen' => 'I PUTU ADI SASKARA, S.Kom., M.I.Kom',
                'kelas' => 'IF23A',
                'ruangan' => 'Kelas Denpasar',
                'hari' => 'Jumat',
                'jam_mulai' => '07:30',
                'jam_selesai' => '10:00',
                'sks' => 3,
            ],
        ];

        foreach ($jadwals as $jadwal) {
            Jadwal::updateOrCreate(
                [
                    'mata_kuliah' => $jadwal['mata_kuliah'],
                    'hari' => $jadwal['hari'],
                ],
                $jadwal
            );
        }
    }
}