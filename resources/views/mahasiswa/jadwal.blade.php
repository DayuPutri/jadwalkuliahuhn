@extends('layouts.dashboard')

@section('title', 'Jadwal Kuliah Mahasiswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-100 p-6 md:p-10">
        <h1 class="text-4xl md:text-5xl font-black text-purple-900 text-center mb-8 md:mb-12 tracking-tight">JADWAL KULIAH SEMESTER INI</h1>

        <div class="bg-white rounded-3xl shadow-2xl p-8 overflow-x-auto">
            <table class="min-w-full table-fixed">
                <thead>
                    <tr class="bg-purple-100">
                        <th class="w-24 text-xl lg:text-2xl font-bold py-6">Jam</th>
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <th class="text-2xl lg:text-3xl font-black text-purple-900 py-6">{{ $hari }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php $processed = [] @endphp
                    @for ($hour = 7; $hour <= 18; $hour++)
                        <tr>
                            <td class="text-xl lg:text-2xl font-bold text-right pr-6 py-10 bg-purple-50 text-purple-800 border-t border-purple-200">
                                {{ sprintf('%02d', $hour) }}.00
                            </td>

                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                @php
                                    $key = $hari . '-' . $hour;
                                    if (in_array($key, $processed)) {
                                        continue;
                                    }

                                    $jadwal = $jadwals->where('hari', $hari)
                                                      ->filter(fn($j) => \Carbon\Carbon::parse($j->jam_mulai)->hour == $hour)
                                                      ->first();

                                    $rowspan = 1;
                                    $bgColor = 'gray-200';
                                    if ($jadwal) {
                                        $start = \Carbon\Carbon::parse($jadwal->jam_mulai);
                                        $end = \Carbon\Carbon::parse($jadwal->jam_selesai);
                                        $rowspan = max(1, $end->diffInHours($start));
                                        if ($end->minute > 0) $rowspan += 1;

                                        $colors = ['pink', 'purple', 'indigo', 'green', 'yellow', 'red', 'blue'];
                                        $colorIndex = $jadwal->id % 7;
                                        $bgColor = $colors[$colorIndex] . '-400';

                                        for ($i = 1; $i < $rowspan; $i++) {
                                            $processed[] = $hari . '-' . ($hour + $i);
                                        }
                                    }
                                @endphp

                                <td class="p-2 border-t border-gray-200" @if($jadwal && $rowspan > 1) rowspan="{{ $rowspan }}" @endif>
                                    @if($jadwal)
                                        <div class="h-full bg-{{ $bgColor }} rounded-2xl p-6 flex flex-col justify-center items-center text-white shadow-xl">
                                            <p class="text-2xl lg:text-3xl font-black">{{ $jadwal->mata_kuliah }}</p>
                                            <p class="text-lg lg:text-xl mt-4">Dosen: {{ $jadwal->dosen }}</p>
                                            <p class="text-base lg:text-lg">Ruangan: {{ $jadwal->ruangan }}</p>
                                            <p class="text-base lg:text-lg">Kelas: {{ $jadwal->kelas }}</p>
                                            <p class="text-base lg:text-lg mt-2">
                                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                                            </p>
                                        </div>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('mahasiswa.dashboard') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-20 py-6 rounded-full text-3xl font-bold shadow-xl transition hover:scale-105">
                ← Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection