@extends('layouts.dashboard')

@section('title', 'Dashboard Mahasiswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100">
        <div class="p-10">
            <!-- Greeting -->
            <h1 class="text-5xl font-black text-purple-800 mb-4">Halo, {{ Auth::user()->name ?? 'Mahasiswa' }} Test 4! 👋</h1>
            <p class="text-2xl text-purple-700 mb-12">Portal Jadwal Kuliah - Kelas IF23A, Universitas Hindu Negeri I Gusti Bagus Sugriwa Denpasar</p>

            <!-- Jadwal Hari Ini -->
            <h2 class="text-4xl font-black text-purple-800 mb-8">📅 Jadwal Hari Ini ({{ now()->format('l, d F Y') }})</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-3xl p-10 shadow-2xl">
                    <h3 class="text-4xl font-black mb-4">Kewarganegaraan</h3>
                    <p class="text-2xl opacity-90 mb-6">10.00 - 11.40 | Kelas Denpasar</p>
                    <p class="text-xl">Dosen: Ni Wayan Ayu Mamadi, S.Ag., M.Pd.H</p>
                </div>
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-3xl p-10 shadow-2xl">
                    <h3 class="text-4xl font-black mb-4">Proyek Perangkat Lunak</h3>
                    <p class="text-2xl opacity-90 mb-6">13.00 - 15.30 | Lab Komputer Denpasar</p>
                    <p class="text-xl">Dosen: NI KETUT GITA SARASWATI, S.E., S.Kom., M.Kom</p>
                </div>
            </div>

            <!-- Semua Jadwal Kuliah -->
            <h2 class="text-4xl font-black text-purple-800 mb-10">📚 Semua Jadwal Kuliah</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Kartu Jadwal -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 hover:shadow-3xl transition transform hover:-translate-y-3">
                    <h3 class="text-3xl font-black text-purple-800 mb-4">Technopreneurship</h3>
                    <p class="text-2xl text-purple-600 font-bold mb-4">Senin 14.00 - 16.00</p>
                    <p class="text-xl text-gray-700">Ruang: Kelas Denpasar</p>
                    <p class="text-xl text-gray-700">Dosen: NI MADE RAI KRISTINA, SE., MM</p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 hover:shadow-3xl transition transform hover:-translate-y-3">
                    <h3 class="text-3xl font-black text-purple-800 mb-4">Kewarganegaraan</h3>
                    <p class="text-2xl text-purple-600 font-bold mb-4">Selasa 10.00 - 11.40</p>
                    <p class="text-xl text-gray-700">Ruang: Kelas Denpasar</p>
                    <p class="text-xl text-gray-700">Dosen: Ni Wayan Ayu Mamadi, S.Ag., M.Pd.H</p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 hover:shadow-3xl transition transform hover:-translate-y-3">
                    <h3 class="text-3xl font-black text-purple-800 mb-4">Proyek Perangkat Lunak</h3>
                    <p class="text-2xl text-purple-600 font-bold mb-4">Selasa 13.00 - 15.30</p>
                    <p class="text-xl text-gray-700">Ruang: Lab Komputer Denpasar</p>
                    <p class="text-xl text-gray-700">Dosen: NI KETUT GITA SARASWATI, S.E., S.Kom., M.Kom</p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 hover:shadow-3xl transition transform hover:-translate-y-3">
                    <h3 class="text-3xl font-black text-purple-800 mb-4">Teknologi Blockchain</h3>
                    <p class="text-2xl text-purple-600 font-bold mb-4">Rabu 13.00 - 15.30</p>
                    <p class="text-xl text-gray-700">Ruang: Lab Komputer Denpasar</p>
                    <p class="text-xl text-gray-700">Dosen: I GEDE AGUS KRISNA WARMAYANA, S.Kom., M.T</p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 hover:shadow-3xl transition transform hover:-translate-y-3">
                    <h3 class="text-3xl font-black text-purple-800 mb-4">Pengembangan Web</h3>
                    <p class="text-2xl text-purple-600 font-bold mb-4">Kamis 07.30 - 10.00</p>
                    <p class="text-xl text-gray-700">Ruang: Lab Komputer Denpasar</p>
                    <p class="text-xl text-gray-700">Dosen: I GEDE WAHYU SANJAYA, ST., M.Kom</p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 hover:shadow-3xl transition transform hover:-translate-y-3">
                    <h3 class="text-3xl font-black text-purple-800 mb-4">Pembelajaran Mesin</h3>
                    <p class="text-2xl text-purple-600 font-bold mb-4">Kamis 13.00 - 15.30</p>
                    <p class="text-xl text-gray-700">Ruang: Kelas Denpasar</p>
                    <p class="text-xl text-gray-700">Dosen: I MADE ANOM MAHARTHA DINATA, M.Kom.</p>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 hover:shadow-3xl transition transform hover:-translate-y-3">
                    <h3 class="text-3xl font-black text-purple-800 mb-4">Analisis Jejaring Sosial</h3>
                    <p class="text-2xl text-purple-600 font-bold mb-4">Jumat 07.30 - 10.00</p>
                    <p class="text-xl text-gray-700">Ruang: Kelas Denpasar</p>
                    <p class="text-xl text-gray-700">Dosen: I PUTU ADI SASKARA, S.Kom., M.I.Kom</p>
                </div>
            </div>
        </div>
    </div>
@endsection