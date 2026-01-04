<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        // Data dosen tetap
        Dosen::create(['nama' => 'NI MADE RAI KRISTINA,SE.,MM', 'email' => 'rai.kristina@uhn.ac.id']);
        Dosen::create(['nama' => 'Ni Wayan Ayu Mamadi,S.Ag.,M.Pd.H', 'email' => 'ayu.mamadi@uhn.ac.id']);
        Dosen::create(['nama' => 'NI KETUT GITA SARASWATI, S.E., S.Kom., M.Kom', 'email' => 'gita.saraswati@uhn.ac.id']);
        Dosen::create(['nama' => 'I GEDE AGUS KRISNA WARMAYANA,S.Kom.,M.T', 'email' => 'agus.warmayana@uhn.ac.id']);
        Dosen::create(['nama' => 'I GEDE WAHYU SANJAYA,ST.,M.Kom', 'email' => 'wahyu.sanjaya@uhn.ac.id']);
        Dosen::create(['nama' => 'I MADE ANOM MAHARTHA DINATA, M.Kom.', 'email' => 'anom.dinata@uhn.ac.id']);
        Dosen::create(['nama' => 'I PUTU ADI SASKARA,S.Kom.,M.I.Kom', 'email' => 'adi.saskara@uhn.ac.id']);

        // Faker untuk data tambahan
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            Dosen::create([
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
