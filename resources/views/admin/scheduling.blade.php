@extends('layouts.dashboard')

@section('title', 'Penjadwalan Otomatis')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <!-- Header: Judul kiri + Pilih Semester kanan -->
        <div class="flex items-center justify-between mb-32">
            <h1 class="text-6xl font-extrabold text-blue-900">PENJADWALAN OTOMATIS</h1>
            <div>
                <label class="block text-3xl font-bold text-blue-900 mb-8 text-right">Pilih Semester</label>
                <select name="semester" class="px-12 py-8 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    <option value="Ganjil 2025/2026">Ganjil 2025/2026</option>
                    <option value="Genap 2025/2026">Genap 2025/2026</option>
                </select>
            </div>
        </div>

        <!-- Kotak Statistik dengan Icon Cantik -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-32">
            <!-- Mata Kuliah -->
            <div class="bg-white rounded-3xl shadow-2xl p-20 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-10xl mb-12">📚</div>
                <h3 class="text-4xl font-bold text-blue-900 mb-8">Mata Kuliah</h3>
                <p class="text-3xl text-gray-700 mb-12">{{ $mataKuliahsCount }} Terdaftar</p>
            </div>

            <!-- Dosen -->
            <div class="bg-white rounded-3xl shadow-2xl p-20 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-10xl mb-12">👨‍🏫</div>
                <h3 class="text-4xl font-bold text-blue-900 mb-8">Dosen</h3>
                <p class="text-3xl text-gray-700 mb-12">{{ $dosensCount }} Terdaftar</p>
            </div>

            <!-- Ruangan -->
            <div class="bg-white rounded-3xl shadow-2xl p-20 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-10xl mb-12">🏛️</div>
                <h3 class="text-4xl font-bold text-blue-900 mb-8">Ruangan</h3>
                <p class="text-3xl text-gray-700 mb-12">{{ $ruanganCount }} Terdaftar</p>
            </div>

            <!-- Kelas -->
            <div class="bg-white rounded-3xl shadow-2xl p-20 text-center hover:shadow-3xl transition transform hover:-translate-y-4">
                <div class="text-10xl mb-12">👥</div>
                <h3 class="text-4xl font-bold text-blue-900 mb-8">Kelas</h3>
                <p class="text-3xl text-gray-700 mb-12">{{ $kelasCount }} Terdaftar</p>
            </div>
        </div>

        <!-- Tombol Generate Jadwal Otomatis (tulisan lebih kecil) -->
        <div class="text-center mb-32">
            <form action="{{ route('admin.scheduling.generate') }}" method="POST">
                @csrf
                <button type="submit" class="bg-gradient-to-r from-green-600 to-green-700 text-white px-48 py-14 rounded-3xl text-4xl font-extrabold shadow-2xl hover:shadow-3xl transition hover:scale-105">
                    GENERATE JADWAL OTOMATIS
                </button>
            </form>
        </div>

        <!-- Preview Jadwal Otomatis -->
        @if(session('jadwal_otomatis'))
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-32">
                <div class="p-12">
                    <h2 class="text-4xl font-bold text-blue-900 mb-12 text-center">PREVIEW JADWAL OTOMATIS</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gradient-to-r from-blue-800 to-blue-900 text-white">
                            <tr>
                                <th class="py-8 px-12 text-center text-2xl font-bold">No</th>
                                <th class="py-8 px-12 text-center text-2xl font-bold">Mata Kuliah</th>
                                <th class="py-8 px-12 text-center text-2xl font-bold">Dosen</th>
                                <th class="py-8 px-12 text-center text-2xl font-bold">Kelas</th>
                                <th class="py-8 px-12 text-center text-2xl font-bold">Hari & Jam</th>
                                <th class="py-8 px-12 text-center text-2xl font-bold">Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('jadwal_otomatis') as $index => $jadwal)
                                <tr class="border-b hover:bg-blue-50 transition">
                                    <td class="py-10 px-12 text-center text-xl">{{ $index + 1 }}</td>
                                    <td class="py-10 px-12 text-center text-xl font-bold text-blue-900">{{ $jadwal['mata_kuliah'] }}</td>
                                    <td class="py-10 px-12 text-center text-xl">{{ $jadwal['dosen'] }}</td>
                                    <td class="py-10 px-12 text-center text-xl">{{ $jadwal['kelas'] }}</td>
                                    <td class="py-10 px-12 text-center text-xl">
                                        {{ $jadwal['hari'] }}<br>
                                        {{ $jadwal['jam_mulai'] }} - {{ $jadwal['jam_selesai'] }}
                                    </td>
                                    <td class="py-10 px-12 text-center text-xl">{{ $jadwal['ruangan'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

           <!-- Tombol Simpan (kiri) & Generate Ulang (kanan) dengan jarak lebar -->
           <div class="flex justify-between items-center px-40 mb-32">
                <!-- Simpan Jadwal Otomatis Ini (kiri) -->
                <form action="{{ route('admin.scheduling.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 text-black px-32 py-12 rounded-3xl text-4xl font-extrabold shadow-2xl hover:shadow-3xl transition hover:scale-105">
                        SIMPAN JADWAL OTOMATIS INI
                    </button>
                </form>

                <!-- Generate Ulang (kanan) -->
                <a href="{{ route('admin.scheduling') }}" class="bg-gradient-to-r from-gray-600 to-gray-700 text-black px-32 py-12 rounded-3xl text-4xl font-extrabold shadow-2xl hover:shadow-3xl transition hover:scale-105">
                    GENERATE ULANG
                </a>
            </div>
        @endif
    </main>
@endsection