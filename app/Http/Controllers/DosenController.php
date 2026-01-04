<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    /**
     * Dashboard Dosen - Jadwal minggu ini + statistik (filter dosen login)
     */
    public function dashboard()
    {
        $dosenName = Auth::user()->name;

        // Ambil jadwal dosen login saja untuk dashboard
        $jadwalMingguIni = Jadwal::where('dosen', $dosenName)->get();

        // Statistik
        $mataKuliahCount = $jadwalMingguIni->unique('mata_kuliah')->count();
        $kelasCount = $jadwalMingguIni->unique('kelas')->count();
        $totalJam = $jadwalMingguIni->sum('sks') * 2; // asumsi 1 SKS = 2 jam

        // Jadwal hari ini
        $hariMap = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $hariSekarang = $hariMap[now()->format('l')];
        $jadwalHariIni = $jadwalMingguIni->where('hari', $hariSekarang)->count();

        return view('dosen.dashboard', compact(
            'jadwalMingguIni',
            'mataKuliahCount',
            'kelasCount',
            'totalJam',
            'jadwalHariIni'
        ));
    }

    /**
     * Jadwal Mengajar Lengkap - Tampilkan SEMUA jadwal semester ini (untuk demo grid lengkap)
     */
    public function jadwalLengkap()
    {
        // Tampilkan SEMUA jadwal dari database (tidak filter dosen) agar grid penuh & cantik
        $jadwals = Jadwal::orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('dosen.jadwal-mengajar', compact('jadwals'));
    }

    /**
     * Halaman Tugas Dosen
     */
    public function tugas()
    {
        // Data statis sementara
        $tugas = [
            [
                'mata_kuliah' => 'Technopreneurship',
                'kelas' => 'IF23A',
                'judul' => 'Business Model Canvas',
                'deadline' => '5 Januari 2026',
                'sudah_upload' => 28,
                'total_mahasiswa' => 30,
                'warna' => 'purple'
            ],
            [
                'mata_kuliah' => 'Proyek Perangkat Lunak',
                'kelas' => 'IF23A',
                'judul' => 'Prototype Aplikasi',
                'deadline' => '10 Januari 2026',
                'sudah_upload' => 25,
                'total_mahasiswa' => 30,
                'warna' => 'green'
            ],
            [
                'mata_kuliah' => 'Kewarganegaraan',
                'kelas' => 'IF23A',
                'judul' => 'Esai Pancasila Era Digital',
                'deadline' => '3 Januari 2026',
                'sudah_upload' => 30,
                'total_mahasiswa' => 30,
                'warna' => 'pink'
            ],
        ];

        return view('dosen.tugas', compact('tugas'));
    }

    /**
     * Halaman Nilai Dosen
     */
    public function nilai()
    {
        // Data statis sementara
        $nilai = [
            [
                'mata_kuliah' => 'Technopreneurship',
                'kelas' => 'IF23A - Kelas Denpasar',
                'rata_rata' => 85.5,
                'tertinggi' => 95,
                'terendah' => 60,
                'sudah_dinilai' => 30,
                'total_mahasiswa' => 30,
                'warna' => 'yellow'
            ],
            [
                'mata_kuliah' => 'Kewarganegaraan',
                'kelas' => 'IF23A - Kelas Denpasar',
                'rata_rata' => 88.0,
                'tertinggi' => 98,
                'terendah' => 70,
                'sudah_dinilai' => 30,
                'total_mahasiswa' => 30,
                'warna' => 'pink'
            ],
            [
                'mata_kuliah' => 'Proyek Perangkat Lunak',
                'kelas' => 'IF23A - Lab Komputer Denpasar',
                'rata_rata' => 82.3,
                'tertinggi' => 92,
                'terendah' => 55,
                'sudah_dinilai' => 25,
                'total_mahasiswa' => 30,
                'warna' => 'green'
            ],
            [
                'mata_kuliah' => 'Teknologi Blockchain',
                'kelas' => 'IF23A - Lab Komputer Denpasar',
                'rata_rata' => 80.0,
                'tertinggi' => 90,
                'terendah' => 65,
                'sudah_dinilai' => 30,
                'total_mahasiswa' => 30,
                'warna' => 'blue'
            ],
        ];

        return view('dosen.nilai', compact('nilai'));
    }
}