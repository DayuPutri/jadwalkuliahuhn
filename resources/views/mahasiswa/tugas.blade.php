@extends('layouts.dashboard')

@section('title', 'Tugas Mahasiswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100 p-10">
        <h1 class="text-6xl font-black text-purple-800 mb-16 text-center">📝 Tugas Saya</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Technopreneurship -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Technopreneurship</h3>
                <p class="text-2xl text-gray-700 mb-8">Business Model Canvas</p>
                <p class="text-3xl font-bold text-green-600">Sudah Upload ✓</p>
            </div>

            <!-- Kewarganegaraan -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-red-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Kewarganegaraan</h3>
                <p class="text-2xl text-gray-700 mb-8">Esai Pancasila Era Digital</p>
                <p class="text-3xl font-bold text-red-600">Belum Upload !</p>
            </div>

            <!-- Proyek Perangkat Lunak -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Proyek Perangkat Lunak</h3>
                <p class="text-2xl text-gray-700 mb-8">Prototype Aplikasi</p>
                <p class="text-3xl font-bold text-green-600">Sudah Upload ✓</p>
            </div>

            <!-- Teknologi Blockchain -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Teknologi Blockchain</h3>
                <p class="text-2xl text-gray-700 mb-8">Analisis Kasus</p>
                <p class="text-3xl font-bold text-green-600">Sudah Upload ✓</p>
            </div>

            <!-- Pengembangan Web -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-yellow-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Pengembangan Web</h3>
                <p class="text-2xl text-gray-700 mb-8">Website Portofolio</p>
                <p class="text-3xl font-bold text-yellow-600">Menunggu Review</p>
            </div>

            <!-- Pembelajaran Mesin -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Pembelajaran Mesin</h3>
                <p class="text-2xl text-gray-700 mb-8">Model Klasifikasi</p>
                <p class="text-3xl font-bold text-green-600">Sudah Upload ✓</p>
            </div>

            <!-- Analisis Jejaring Sosial -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-red-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Analisis Jejaring Sosial</h3>
                <p class="text-2xl text-gray-700 mb-8">Laporan Centrality</p>
                <p class="text-3xl font-bold text-red-600">Belum Upload !</p>
            </div>
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('mahasiswa.dashboard') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-32 py-8 rounded-full text-4xl font-black shadow-2xl transition hover:scale-105">
                ← Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection