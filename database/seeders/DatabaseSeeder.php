<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // 1. UserSeeder - Admin, Dosen, Mahasiswa (wajib pertama)
            UserSeeder::class,

            // 2. DosenSeeder - Data dosen untuk tabel dosens (jika ada)
            DosenSeeder::class,

            // 3. MataKuliahSeeder - Data mata kuliah (jika ada tabel terpisah)
            MataKuliahSeeder::class,

            // 4. KelasSeeder - Data kelas seperti IF23A, IF23B
            KelasSeeder::class,

            // 5. RuanganSeeder - Data ruangan seperti Kelas Denpasar, Lab Komputer
            RuanganSeeder::class,

            // 6. JadwalSeeder - Data jadwal kuliah utama (wajib terakhir karena butuh data lain)
            JadwalSeeder::class,

            // 7. JurusanSeeder - Jika ada tabel jurusan (opsional)
            // JurusanSeeder::class,
        ]);
    }
}