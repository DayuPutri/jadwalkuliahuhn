@extends('layouts.dashboard')

@section('title', 'Nilai Dosen')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-200 to-blue-400 p-10">
        <h1 class="text-5xl font-black text-blue-900 text-center mb-12">PENILAIAN & NILAI MAHASISWA</h1>

        <!-- Tombol Input Nilai Baru -->
        <div class="text-right mb-12">
            <button class="bg-green-600 hover:bg-green-700 text-white px-20 py-8 rounded-3xl text-3xl font-bold shadow-2xl transition hover:scale-105">
                + Input Nilai Baru
            </button>
        </div>

        <!-- Grid Kartu Nilai - Semua 7 Mata Kuliah -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- 1. Technopreneurship -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-8">
                    <h3 class="text-3xl font-black text-black">Technopreneurship</h3>
                    <p class="text-xl text-black opacity-90 mt-2">IF23A - Kelas Denpasar</p>
                </div>
                <div class="p-8">
                    <div class="space-y-8">
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Rata-rata Kelas</span>
                            <span class="font-black text-4xl text-yellow-600">85.5</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Tertinggi</span>
                            <span class="font-black text-green-600 text-3xl">95</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Terendah</span>
                            <span class="font-black text-red-600 text-3xl">60</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Sudah Dinilai</span>
                            <span class="font-black text-blue-600 text-3xl">30 / 30</span>
                        </div>
                    </div>

                    <div class="mt-10 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-2xl font-bold transition">
                            Lihat Detail Nilai
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-2xl font-bold transition">
                            Edit Nilai
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
                    <div class="space-y-8">
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Rata-rata Kelas</span>
                            <span class="font-black text-4xl text-pink-600">88.0</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Tertinggi</span>
                            <span class="font-black text-green-600 text-3xl">98</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Terendah</span>
                            <span class="font-black text-red-600 text-3xl">70</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Sudah Dinilai</span>
                            <span class="font-black text-blue-600 text-3xl">30 / 30</span>
                        </div>
                    </div>

                    <div class="mt-10 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-2xl font-bold transition">
                            Lihat Detail Nilai
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-2xl font-bold transition">
                            Edit Nilai
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
                    <div class="space-y-8">
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Rata-rata Kelas</span>
                            <span class="font-black text-4xl text-green-600">82.3</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Tertinggi</span>
                            <span class="font-black text-green-600 text-3xl">92</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Terendah</span>
                            <span class="font-black text-red-600 text-3xl">55</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Sudah Dinilai</span>
                            <span class="font-black text-orange-600 text-3xl">25 / 30</span>
                        </div>
                    </div>

                    <div class="mt-10 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-2xl font-bold transition">
                            Lihat Detail Nilai
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-2xl font-bold transition">
                            Edit Nilai
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
                    <div class="space-y-8">
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Rata-rata Kelas</span>
                            <span class="font-black text-4xl text-blue-600">80.0</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Tertinggi</span>
                            <span class="font-black text-green-600 text-3xl">90</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Terendah</span>
                            <span class="font-black text-red-600 text-3xl">65</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Sudah Dinilai</span>
                            <span class="font-black text-blue-600 text-3xl">30 / 30</span>
                        </div>
                    </div>

                    <div class="mt-10 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-2xl font-bold transition">
                            Lihat Detail Nilai
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-2xl font-bold transition">
                            Edit Nilai
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
                    <div class="space-y-8">
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Rata-rata Kelas</span>
                            <span class="font-black text-4xl text-purple-600">87.2</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Tertinggi</span>
                            <span class="font-black text-green-600 text-3xl">96</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Terendah</span>
                            <span class="font-black text-red-600 text-3xl">68</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Sudah Dinilai</span>
                            <span class="font-black text-blue-600 text-3xl">30 / 30</span>
                        </div>
                    </div>

                    <div class="mt-10 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-2xl font-bold transition">
                            Lihat Detail Nilai
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-2xl font-bold transition">
                            Edit Nilai
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
                    <div class="space-y-8">
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Rata-rata Kelas</span>
                            <span class="font-black text-4xl text-indigo-600">83.7</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Tertinggi</span>
                            <span class="font-black text-green-600 text-3xl">94</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Terendah</span>
                            <span class="font-black text-red-600 text-3xl">62</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Sudah Dinilai</span>
                            <span class="font-black text-blue-600 text-3xl">30 / 30</span>
                        </div>
                    </div>

                    <div class="mt-10 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-2xl font-bold transition">
                            Lihat Detail Nilai
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-2xl font-bold transition">
                            Edit Nilai
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
                    <div class="space-y-8">
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Rata-rata Kelas</span>
                            <span class="font-black text-4xl text-red-600">84.1</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Tertinggi</span>
                            <span class="font-black text-green-600 text-3xl">93</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Nilai Terendah</span>
                            <span class="font-black text-red-600 text-3xl">64</span>
                        </div>
                        <div class="flex justify-between text-2xl">
                            <span class="text-gray-600 font-medium">Sudah Dinilai</span>
                            <span class="font-black text-blue-600 text-3xl">30 / 30</span>
                        </div>
                    </div>

                    <div class="mt-10 flex space-x-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-6 rounded-2xl text-2xl font-bold transition">
                            Lihat Detail Nilai
                        </button>
                        <button class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-black py-6 rounded-2xl text-2xl font-bold transition">
                            Edit Nilai
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