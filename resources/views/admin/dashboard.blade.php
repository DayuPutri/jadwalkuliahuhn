@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-black text-blue-900 mb-8 text-center">DASHBOARD ADMIN</h1>
        <p class="text-3xl text-blue-800 mb-16 text-center">Sistem Jadwal Kuliah Informatika Denpasar</p>

        <!-- Statistik Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-32">
            <!-- Total Jadwal -->
            <div class="bg-white rounded-3xl shadow-2xl p-16 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-9xl mb-12 text-blue-600">📅</div>
                <h3 class="text-7xl font-black text-blue-800">{{ $totalJadwal }}</h3>
                <p class="text-3xl font-black text-gray-600 mt-8">Total Jadwal</p>
            </div>

            <!-- Total Kelas -->
            <div class="bg-white rounded-3xl shadow-2xl p-16 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-9xl mb-12 text-green-600">👥</div>
                <h3 class="text-7xl font-black text-green-800">{{ $kelasCount }}</h3>
                <p class="text-3xl font-black text-gray-600 mt-8">Total Kelas</p>
            </div>

            <!-- Total Mata Kuliah -->
            <div class="bg-white rounded-3xl shadow-2xl p-16 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-9xl mb-12 text-indigo-600">📚</div>
                <h3 class="text-7xl font-black text-indigo-800">{{ $mataKuliahsCount }}</h3>
                <p class="text-3xl font-black text-gray-600 mt-8">Total Mata Kuliah</p>
            </div>

            <!-- Total Dosen -->
            <div class="bg-white rounded-3xl shadow-2xl p-16 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-9xl mb-12 text-purple-600">👨‍🏫</div>
                <h3 class="text-7xl font-black text-purple-800">{{ $dosensCount }}</h3>
                <p class="text-3xl font-black text-gray-600 mt-8">Total Dosen</p>
            </div>

            <!-- Total SKS -->
            <div class="bg-white rounded-3xl shadow-2xl p-16 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-9xl mb-12 text-teal-600">📊</div>
                <h3 class="text-7xl font-black text-teal-800">{{ $totalSks }}</h3>
                <p class="text-3xl font-black text-gray-600 mt-8">Total SKS</p>
            </div>

            <!-- Jadwal Hari Ini -->
            <div class="bg-white rounded-3xl shadow-2xl p-16 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-9xl mb-12 text-orange-600">🔔</div>
                <h3 class="text-7xl font-black text-orange-800">{{ $jadwalHariIni }}</h3>
                <p class="text-3xl font-black text-gray-600 mt-8">Jadwal Hari Ini</p>
            </div>

            <!-- Total Ruangan -->
            <div class="bg-white rounded-3xl shadow-2xl p-16 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-9xl mb-12 text-red-600">🏢</div>
                <h3 class="text-7xl font-black text-red-800">{{ $ruanganCount }}</h3>
                <p class="text-3xl font-black text-gray-600 mt-8">Total Ruangan</p>
            </div>
        </div>

        <!-- Akses Cepat - 4 kartu -->
        <h2 class="text-5xl font-black text-blue-900 mb-16 text-center">Akses Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-20 max-w-7xl mx-auto">
            <!-- Kelola Jadwal Kuliah -->
            <a href="{{ route('admin.kelola-jadwal') }}" 
               class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl shadow-2xl hover:shadow-3xl transition hover:-translate-y-6 p-16 text-center">
                <div class="text-9xl mb-8 text-white">📅</div>
                <h3 class="text-4xl font-black text-black mb-4">Kelola Jadwal Kuliah</h3>
                <p class="text-xl text-black">Lihat, edit, atau hapus jadwal</p>
            </a>

            <!-- Tambah Jadwal Baru - DIPERBAIKI: pakai route('admin.tambah-jadwal') -->
            <a href="{{ route('admin.tambah-jadwal') }}" 
               class="bg-gradient-to-br from-green-600 to-green-800 rounded-3xl shadow-2xl hover:shadow-3xl transition hover:-translate-y-6 p-16 text-center">
                <div class="text-9xl mb-8 text-white">➕</div>
                <h3 class="text-4xl font-black text-black mb-4">Tambah Jadwal Baru</h3>
                <p class="text-xl text-black">Buat jadwal perkuliahan baru</p>
            </a>

            <!-- Penjadwalan Otomatis -->
            <a href="{{ route('admin.scheduling') }}" 
               class="bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-3xl shadow-2xl hover:shadow-3xl transition hover:-translate-y-6 p-16 text-center">
                <div class="text-9xl mb-8 text-white">⚙️</div>
                <h3 class="text-4xl font-black text-black mb-4">Penjadwalan Otomatis</h3>
                <p class="text-xl text-black">Generate jadwal tanpa bentrok</p>
            </a>

            <!-- Profil Dosen -->
            <a href="{{ route('admin.profile-dosen') }}" 
               class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-3xl shadow-2xl hover:shadow-3xl transition hover:-translate-y-6 p-16 text-center">
                <div class="text-9xl mb-8 text-white">👨‍🏫</div>
                <h3 class="text-4xl font-black text-black mb-4">Profil Dosen</h3>
                <p class="text-xl text-black">Lihat profil lengkap dosen</p>
            </a>
        </div>
    </main>
@endsection