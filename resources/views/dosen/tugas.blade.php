@extends('layouts.dashboard')

@section('title', 'Tugas Dosen')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-200 to-blue-400 p-10">
        <h1 class="text-5xl font-black text-blue-900 text-center mb-12">DAFTAR TUGAS & PENUGASAN</h1>

        <!-- Tombol Tambah Tugas Baru -->
        <div class="text-right mb-12">
            <button class="bg-green-600 hover:bg-green-700 text-white px-20 py-8 rounded-3xl text-3xl font-bold shadow-2xl transition hover:scale-105">
                + Tambah Tugas Baru
            </button>
        </div>

        <!-- Grid Kartu Tugas - Semua 7 Mata Kuliah -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- 1. Technopreneurship -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-8">
                    <h3 class="text-3xl font-black text-black">Technopreneurship</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Kelas Denpasar</p>
                </div>
                <div class="p-8">
                    <h4 class="text-2xl font-bold text-blue-900 mb-4">Business Model Canvas</h4>
                    <p class="text-lg text-gray-700 mb-6">Buat BMC lengkap untuk ide startup teknologi.</p>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-bold text-red-600">5 Januari 2026</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Pengumpulan</span>
                            <span class="font-bold text-green-600">28 / 30</span>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-xl font-bold transition">
                            Lihat Pengumpulan
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-xl font-bold transition">
                            Edit Tugas
                        </button>
                    </div>
                </div>
            </div>

            <!-- 2. Kewarganegaraan -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-pink-500 to-pink-600 p-8">
                    <h3 class="text-3xl font-black text-black">Kewarganegaraan</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Kelas Denpasar</p>
                </div>
                <div class="p-8">
                    <h4 class="text-2xl font-bold text-blue-900 mb-4">Esai Pancasila Era Digital</h4>
                    <p class="text-lg text-gray-700 mb-6">Esai 1000 kata tentang Pancasila di era digital.</p>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-bold text-green-600">3 Januari 2026</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Pengumpulan</span>
                            <span class="font-bold text-green-600">30 / 30</span>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-xl font-bold transition">
                            Lihat Pengumpulan
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-xl font-bold transition">
                            Edit Tugas
                        </button>
                    </div>
                </div>
            </div>

            <!-- 3. Proyek Perangkat Lunak -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-green-500 to-green-600 p-8">
                    <h3 class="text-3xl font-black text-black">Proyek Perangkat Lunak</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Lab Komputer Denpasar</p>
                </div>
                <div class="p-8">
                    <h4 class="text-2xl font-bold text-blue-900 mb-4">Prototype Aplikasi</h4>
                    <p class="text-lg text-gray-700 mb-6">Buat prototype aplikasi web menggunakan Laravel + Tailwind.</p>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-bold text-orange-600">10 Januari 2026</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Pengumpulan</span>
                            <span class="font-bold text-orange-600">25 / 30</span>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-xl font-bold transition">
                            Lihat Pengumpulan
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-xl font-bold transition">
                            Edit Tugas
                        </button>
                    </div>
                </div>
            </div>

            <!-- 4. Teknologi Blockchain -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-8">
                    <h3 class="text-3xl font-black text-black">Teknologi Blockchain</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Lab Komputer Denpasar</p>
                </div>
                <div class="p-8">
                    <h4 class="text-2xl font-bold text-blue-900 mb-4">Smart Contract Sederhana</h4>
                    <p class="text-lg text-gray-700 mb-6">Buat smart contract sederhana menggunakan Solidity.</p>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-bold text-red-600">8 Januari 2026</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Pengumpulan</span>
                            <span class="font-bold text-orange-600">22 / 30</span>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-xl font-bold transition">
                            Lihat Pengumpulan
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-xl font-bold transition">
                            Edit Tugas
                        </button>
                    </div>
                </div>
            </div>

            <!-- 5. Pengembangan Web -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-8">
                    <h3 class="text-3xl font-black text-black">Pengembangan Web</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Lab Komputer Denpasar</p>
                </div>
                <div class="p-8">
                    <h4 class="text-2xl font-bold text-blue-900 mb-4">Website Portofolio</h4>
                    <p class="text-lg text-gray-700 mb-6">Buat website portofolio pribadi dengan HTML, CSS, JS.</p>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-bold text-orange-600">12 Januari 2026</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Pengumpulan</span>
                            <span class="font-bold text-green-600">29 / 30</span>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-xl font-bold transition">
                            Lihat Pengumpulan
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-xl font-bold transition">
                            Edit Tugas
                        </button>
                    </div>
                </div>
            </div>

            <!-- 6. Pembelajaran Mesin -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 p-8">
                    <h3 class="text-3xl font-black text-black">Pembelajaran Mesin</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Kelas Denpasar</p>
                </div>
                <div class="p-8">
                    <h4 class="text-2xl font-bold text-blue-900 mb-4">Model Klasifikasi Sederhana</h4>
                    <p class="text-lg text-gray-700 mb-6">Buat model machine learning untuk klasifikasi data Iris.</p>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-bold text-red-600">7 Januari 2026</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Pengumpulan</span>
                            <span class="font-bold text-orange-600">20 / 30</span>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-xl font-bold transition">
                            Lihat Pengumpulan
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-xl font-bold transition">
                            Edit Tugas
                        </button>
                    </div>
                </div>
            </div>

            <!-- 7. Analisis Jejaring Sosial -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-red-500 to-red-600 p-8">
                    <h3 class="text-3xl font-black text-black">Analisis Jejaring Sosial</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Kelas Denpasar</p>
                </div>
                <div class="p-8">
                    <h4 class="text-2xl font-bold text-blue-900 mb-4">Analisis Graf Sosial</h4>
                    <p class="text-lg text-gray-700 mb-6">Analisis jaringan sosial menggunakan NetworkX.</p>
                    <div class="space-y-4">
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-bold text-green-600">4 Januari 2026</span>
                        </div>
                        <div class="flex justify-between text-lg">
                            <span class="text-gray-600">Pengumpulan</span>
                            <span class="font-bold text-green-600">30 / 30</span>
                        </div>
                    </div>
                    <div class="mt-8 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-xl font-bold transition">
                            Lihat Pengumpulan
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-xl font-bold transition">
                            Edit Tugas
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center mt-16">
            <a href="{{ route('dosen.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-32 py-12 rounded-full text-4xl font-black shadow-2xl transition hover:scale-105">
                ← Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection