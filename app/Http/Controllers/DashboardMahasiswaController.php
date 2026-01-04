<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['mataKuliah', 'dosen', 'kelas', 'ruangan'])->get();  // Sederhana, tanpa paginate
        return view('mahasiswa.dashboard', compact('jadwals'));
    }
}