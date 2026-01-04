@extends('layouts.dashboard')

@section('title', 'Dashboard Dosen')

@section('content')
    <!-- Kalender Besar -->
    <div class="bg-black bg-opacity-50 rounded-3xl p-12 mb-16 shadow-2xl">
        <h2 class="text-5xl font-black mb-12 text-center text-yellow-400">Kalender</h2>
        <div class="grid grid-cols-7 gap-8 text-center">
            <div class="text-3xl font-black text-yellow-400">Su</div>
            <div class="text-3xl font-black text-yellow-400">Mo</div>
            <div class="text-3xl font-black text-yellow-400">Tu</div>
            <div class="text-3xl font-black text-yellow-400">We</div>
            <div class="text-3xl font-black text-yellow-400">Th</div>
            <div class="text-3xl font-black text-yellow-400">Fr</div>
            <div class="text-3xl font-black text-yellow-400">Sa</div>

            @php
                $today = now()->day;
                $daysInMonth = now()->daysInMonth;
                $startDay = now()->startOfMonth()->dayOfWeekIso; // 1 = Senin, 7 = Minggu
                $offset = $startDay == 7 ? 0 : $startDay;
            @endphp

            @for ($i = 1; $i < $offset; $i++)
                <div></div>
            @endfor

            @for ($day = 1; $day <= $daysInMonth; $day++)
                <div class="py-12 text-5xl font-black rounded-3xl {{ $day == $today ? 'bg-yellow-500 text-black shadow-2xl' : 'hover:bg-white hover:bg-opacity-20' }}">
                    {{ $day }}
                </div>
            @endfor
        </div>
    </div>

    <!-- Jadwal Minggu Ini -->
    <div class="bg-black bg-opacity-50 rounded-3xl p-12 mb-16 shadow-2xl">
        <h2 class="text-5xl font-black mb-12 text-center text-yellow-400">Jadwal Minggu Ini</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="border-b-4 border-yellow-500">
                    <tr>
                        <th class="py-8 px-12 text-3xl font-black">Hari</th>
                        <th class="py-8 px-12 text-3xl font-black">Jam</th>
                        <th class="py-8 px-12 text-3xl font-black">Mata Kuliah</th>
                        <th class="py-8 px-12 text-3xl font-black">Ruangan</th>
                        <th class="py-8 px-12 text-3xl font-black">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-600 hover:bg-white hover:bg-opacity-10">
                        <td class="py-8 px-12 text-2xl">Senin</td>
                        <td class="py-8 px-12 text-2xl">14.00 - 16.00</td>
                        <td class="py-8 px-12 text-2xl font-bold">Technopreneurship</td>
                        <td class="py-8 px-12 text-2xl">Kelas Denpasar</td>
                        <td class="py-8 px-12 text-2xl">IF23A</td>
                    </tr>
                    <tr class="border-b border-gray-600 hover:bg-white hover:bg-opacity-10">
                        <td class="py-8 px-12 text-2xl">Selasa</td>
                        <td class="py-8 px-12 text-2xl">10.00 - 11.40</td>
                        <td class="py-8 px-12 text-2xl font-bold">Kewarganegaraan</td>
                        <td class="py-8 px-12 text-2xl">Kelas Denpasar</td>
                        <td class="py-8 px-12 text-2xl">IF23A</td>
                    </tr>
                    <tr class="border-b border-gray-600 hover:bg-white hover:bg-opacity-10">
                        <td class="py-8 px-12 text-2xl">Selasa</td>
                        <td class="py-8 px-12 text-2xl">13.00 - 15.30</td>
                        <td class="py-8 px-12 text-2xl font-bold">Proyek Perangkat Lunak</td>
                        <td class="py-8 px-12 text-2xl">Lab Komputer Denpasar</td>
                        <td class="py-8 px-12 text-2xl">IF23A</td>
                    </tr>
                    <tr class="border-b border-gray-600 hover:bg-white hover:bg-opacity-10">
                        <td class="py-8 px-12 text-2xl">Rabu</td>
                        <td class="py-8 px-12 text-2xl">13.00 - 15.30</td>
                        <td class="py-8 px-12 text-2xl font-bold">Teknologi Blockchain</td>
                        <td class="py-8 px-12 text-2xl">Lab Komputer Denpasar</td>
                        <td class="py-8 px-12 text-2xl">IF23A</td>
                    </tr>
                    <tr class="border-b border-gray-600 hover:bg-white hover:bg-opacity-10">
                        <td class="py-8 px-12 text-2xl">Kamis</td>
                        <td class="py-8 px-12 text-2xl">07.30 - 10.00</td>
                        <td class="py-8 px-12 text-2xl font-bold">Pengembangan Web</td>
                        <td class="py-8 px-12 text-2xl">Lab Komputer Denpasar</td>
                        <td class="py-8 px-12 text-2xl">IF23A</td>
                    </tr>
                    <tr class="border-b border-gray-600 hover:bg-white hover:bg-opacity-10">
                        <td class="py-8 px-12 text-2xl">Kamis</td>
                        <td class="py-8 px-12 text-2xl">13.00 - 15.30</td>
                        <td class="py-8 px-12 text-2xl font-bold">Pembelajaran Mesin</td>
                        <td class="py-8 px-12 text-2xl">Kelas Denpasar</td>
                        <td class="py-8 px-12 text-2xl">IF23A</td>
                    </tr>
                    <tr class="border-b border-gray-600 hover:bg-white hover:bg-opacity-10">
                        <td class="py-8 px-12 text-2xl">Jumat</td>
                        <td class="py-8 px-12 text-2xl">07.30 - 10.00</td>
                        <td class="py-8 px-12 text-2xl font-bold">Analisis Jejaring Sosial</td>
                        <td class="py-8 px-12 text-2xl">Kelas Denpasar</td>
                        <td class="py-8 px-12 text-2xl">IF23A</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Status Tugas & Statistik Nilai -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
        <!-- Status Tugas -->
        <div class="bg-black bg-opacity-50 rounded-3xl p-12 shadow-2xl">
            <h2 class="text-4xl font-black text-yellow-400 mb-12 text-center">STATUS TUGAS</h2>
            <ul class="space-y-8 text-2xl">
                <li class="flex items-center">
                    <div class="w-12 h-12 bg-green-600 rounded-full mr-8 flex items-center justify-center">
                        <span class="text-black font-black text-2xl">✓</span>
                    </div>
                    <span>Technopreneurship - <span class="text-green-400 font-bold">Sudah Upload (30/30)</span></span>
                </li>
                <li class="flex items-center">
                    <div class="w-12 h-12 bg-red-600 rounded-full mr-8 flex items-center justify-center">
                        <span class="text-black font-black text-2xl">!</span>
                    </div>
                    <span>Kewarganegaraan - <span class="text-red-400 font-bold">Belum Upload (5/30)</span></span>
                </li>
                <li class="flex items-center">
                    <div class="w-12 h-12 bg-green-600 rounded-full mr-8 flex items-center justify-center">
                        <span class="text-black font-black text-2xl">✓</span>
                    </div>
                    <span>Proyek Perangkat Lunak - <span class="text-green-400 font-bold">Sudah Upload (28/30)</span></span>
                </li>
            </ul>
        </div>

        <!-- Statistik Nilai -->
        <div class="bg-black bg-opacity-50 rounded-3xl p-12 shadow-2xl">
            <h2 class="text-4xl font-black text-yellow-400 mb-12 text-center">STATISTIK NILAI</h2>
            <div class="space-y-12 text-3xl">
                <div class="flex justify-between">
                    <span class="text-gray-300">Nilai Tertinggi</span>
                    <span class="font-black text-green-400">95</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-300">Nilai Rata-rata</span>
                    <span class="font-black text-yellow-400">85</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-300">Nilai Terendah</span>
                    <span class="font-black text-red-400">60</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection