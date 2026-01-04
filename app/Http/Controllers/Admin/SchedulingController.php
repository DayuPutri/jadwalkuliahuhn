<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class SchedulingController extends Controller
{
    /**
     * Tampilkan halaman Penjadwalan Otomatis
     */
    public function index()
    {
        // Hitung statistik dari data jadwal yang ada
        $mataKuliahsCount = Jadwal::distinct('mata_kuliah')->count('mata_kuliah');
        $dosensCount = Jadwal::distinct('dosen')->count('dosen');
        $ruanganCount = Jadwal::distinct('ruangan')->count('ruangan');
        $kelasCount = Jadwal::distinct('kelas')->count('kelas');
        $jadwals = Jadwal::all();

        return view('admin.scheduling', compact(
            'mataKuliahsCount',
            'dosensCount',
            'ruanganCount',
            'kelasCount',
            'jadwals'
        ));
    }

    /**
     * Generate jadwal otomatis (versi sederhana acak)
     */
    public function generate(Request $request)
    {
        // Ambil semua mata kuliah unik
        $mataKuliahs = Jadwal::distinct('mata_kuliah')->pluck('mata_kuliah');

        // Daftar opsi
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jamMulai = ['07:30', '10:00', '13:00', '15:30'];
        $ruangan = ['Kelas Denpasar', 'Lab Komputer Denpasar'];

        $jadwalBaru = [];

        foreach ($mataKuliahs as $mk) {
            // Ambil dosen dari jadwal lama (atau default)
            $dosen = Jadwal::where('mata_kuliah', $mk)->first()->dosen ?? 'Dosen Default';

            // Acak hari, jam, ruangan
            $randomHari = $hari[array_rand($hari)];
            $randomJam = $jamMulai[array_rand($jamMulai)];
            $randomRuangan = $ruangan[array_rand($ruangan)];

            // Tentukan jam selesai berdasarkan jam mulai
            $jamSelesai = match ($randomJam) {
                '07:30' => '10:00',
                '10:00' => '11:40',
                '13:00' => '15:30',
                '15:30' => '18:00',
                default => '18:00'
            };

            $jadwalBaru[] = [
                'mata_kuliah' => $mk,
                'dosen' => $dosen,
                'kelas' => 'IF23A',
                'hari' => $randomHari,
                'jam_mulai' => $randomJam,
                'jam_selesai' => $jamSelesai,
                'ruangan' => $randomRuangan,
            ];
        }

        // Simpan ke session untuk preview
        session()->put('jadwal_otomatis', $jadwalBaru);

        return redirect()->back()->with('success', 'Jadwal otomatis berhasil digenerate! Silakan preview di bawah.');
    }

    /**
     * Simpan jadwal otomatis ke database permanen
     */
    public function storeGenerated(Request $request)
    {
        $jadwalOtomatis = session('jadwal_otomatis');

        if ($jadwalOtomatis && count($jadwalOtomatis) > 0) {
            foreach ($jadwalOtomatis as $j) {
                Jadwal::create($j);
            }
            session()->forget('jadwal_otomatis');
            return redirect()->route('admin.kelola-jadwal')->with('success', 'Jadwal otomatis berhasil disimpan ke database!');
        }

        return redirect()->back()->with('error', 'Tidak ada jadwal otomatis untuk disimpan.');
    }
}