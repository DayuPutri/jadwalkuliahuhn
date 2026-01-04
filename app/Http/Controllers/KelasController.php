<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller  // Ganti nama class jadi ini (bukan JadwalController)
{
    public function index()
    {
        $kelas = Kelas::paginate(10);
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|string|max:255|unique:kelas',
        ]);

        Kelas::create($request->all());
        return redirect('/admin/kelas')->with('success', 'Kelas ditambahkan!');
    }

    public function show(Kelas $kelas)
    {
        return view('admin.kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'kode_kelas' => 'required|string|max:255|unique:kelas,kode_kelas,' . $kelas->id,
        ]);

        $kelas->update($request->all());
        return redirect('/admin/kelas')->with('success', 'Kelas diperbarui!');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect('/admin/kelas')->with('success', 'Kelas dihapus!');
    }
}