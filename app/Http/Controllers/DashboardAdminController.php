<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalJadwal = Jadwal::count();
        $totalMK = MataKuliah::count();
        $totalDosen = Dosen::count();
        $totalKelas = Kelas::count();
        return view('admin.dashboard', compact('totalJadwal', 'totalMK', 'totalDosen', 'totalKelas'));
    }

    public function jadwal()
    {
        $jadwals = Jadwal::with(['mataKuliah', 'dosen', 'kelas', 'ruangan'])->paginate(10);
        return view('admin.jadwal', compact('jadwals'));
    }

    public function tambahJadwal()
    {
        $mataKuliah = MataKuliah::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        return view('admin.tambah-jadwal', compact('mataKuliah', 'dosen', 'kelas', 'ruangan', 'hari'));
    }

    public function storeJadwal(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:dosen,id',
            'kelas_id' => 'required|exists:kelas,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan_id' => 'required|exists:ruangan,id',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil ditambah!');
    }
}