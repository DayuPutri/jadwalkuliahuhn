<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalJadwal = DB::table('jadwals')->count();
        $totalMK = DB::table('mata_kuliahs')->count();
        $totalDosen = DB::table('dosens')->count();
        $totalKelas = DB::table('kelas')->count();
        return view('admin.dashboard', compact('totalJadwal', 'totalMK', 'totalDosen', 'totalKelas'));
    }

    public function jadwal()
{
    $jadwals = DB::table('jadwals')->paginate(10);
    return view('admin.kelola-jadwal', compact('jadwals'));  // Ubah 'admin.jadwal' jadi 'admin.kelola-jadwal'
}

    public function tambahJadwal()
    {
        $mataKuliah = DB::table('mata_kuliahs')->get();
        $dosen = DB::table('dosens')->get();
        $kelas = DB::table('kelas')->get();
        $ruangan = DB::table('ruangans')->get();
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        return view('admin.tambah-jadwal', compact('mataKuliah', 'dosen', 'kelas', 'ruangan', 'hari'));
    }

    public function storeJadwal(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'kelas_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan_id' => 'required',
        ]);

        DB::table('jadwals')->insert($request->all());

        return redirect()->route('admin.kelola-jadwal')->with('success', 'Jadwal berhasil ditambah!');
    }
}