<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class DashboardDosenController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::where('dosen_id', Auth::user()->id)->with(['mataKuliah', 'kelas', 'ruangan'])->paginate(10);
        return view('dosen.dashboard', compact('jadwals'));
    }
}