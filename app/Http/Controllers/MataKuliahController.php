<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller  // Ganti nama class jadi ini (bukan JadwalController)
{
    public function index()
    {
        $mataKuliah = MataKuliah::paginate(10);
        return view('admin.mata-kuliah.index', compact('mataKuliah'));
    }

    public function create()
    {
        return view('admin.mata-kuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        MataKuliah::create($request->all());
        return redirect('/admin/mata-kuliah')->with('success', 'Mata kuliah ditambahkan!');
    }

    public function show(MataKuliah $mataKuliah)
    {
        return view('admin.mata-kuliah.show', compact('mataKuliah'));
    }

    public function edit(MataKuliah $mataKuliah)
    {
        return view('admin.mata-kuliah.edit', compact('mataKuliah'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $mataKuliah->update($request->all());
        return redirect('/admin/mata-kuliah')->with('success', 'Mata kuliah diperbarui!');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect('/admin/mata-kuliah')->with('success', 'Mata kuliah dihapus!');
    }
}