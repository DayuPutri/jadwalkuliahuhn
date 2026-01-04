@extends('layouts.dashboard')

@section('title', 'Nilai Mahasiswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100 p-10">
        <h1 class="text-6xl font-black text-purple-800 mb-16 text-center">⭐ Nilai Saya</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Technopreneurship -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Technopreneurship</h3>
                <p class="text-6xl font-black text-green-600 text-center mt-12">A (95)</p>
            </div>

            <!-- Kewarganegaraan -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Kewarganegaraan</h3>
                <p class="text-6xl font-black text-green-600 text-center mt-12">A- (88)</p>
            </div>

            <!-- Proyek Perangkat Lunak -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-yellow-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Proyek Perangkat Lunak</h3>
                <p class="text-6xl font-black text-yellow-600 text-center mt-12">B+ (82)</p>
            </div>

            <!-- Teknologi Blockchain -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Teknologi Blockchain</h3>
                <p class="text-6xl font-black text-green-600 text-center mt-12">A (90)</p>
            </div>

            <!-- Pengembangan Web -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Pengembangan Web</h3>
                <p class="text-6xl font-black text-green-600 text-center mt-12">A- (87)</p>
            </div>

            <!-- Pembelajaran Mesin -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-yellow-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Pembelajaran Mesin</h3>
                <p class="text-6xl font-black text-yellow-600 text-center mt-12">B (80)</p>
            </div>

            <!-- Analisis Jejaring Sosial -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 border-l-8 border-green-600 hover:shadow-3xl transition transform hover:-translate-y-2">
                <h3 class="text-4xl font-black text-purple-800 mb-8">Analisis Jejaring Sosial</h3>
                <p class="text-6xl font-black text-green-600 text-center mt-12">A- (89)</p>
            </div>
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('mahasiswa.dashboard') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-32 py-8 rounded-full text-4xl font-black shadow-2xl transition hover:scale-105">
                ← Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection