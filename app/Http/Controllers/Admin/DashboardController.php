<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung statistik untuk dashboard
        $totalJadwal = Jadwal::count();
        $mataKuliahsCount = Jadwal::distinct('mata_kuliah')->count('mata_kuliah');
        $dosensCount = Jadwal::distinct('dosen')->count('dosen');
        $ruanganCount = Jadwal::distinct('ruangan')->count('ruangan');
        $kelasCount = Jadwal::distinct('kelas')->count('kelas');

        // TAMBAHAN BARU (ini yang kamu tanya)
        $totalSks = Jadwal::sum('sks');
        $jadwalHariIni = Jadwal::where('hari', now()->translatedFormat('l'))->count();
        // Catatan: now()->translatedFormat('l') untuk nama hari dalam bahasa Indonesia (Senin, Selasa, dll)

        return view('admin.dashboard', compact(
            'totalJadwal',
            'mataKuliahsCount',
            'dosensCount',
            'ruanganCount',
            'kelasCount',
            'totalSks',
            'jadwalHariIni'
        ));
    }
}