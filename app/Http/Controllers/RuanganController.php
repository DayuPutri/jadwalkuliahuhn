<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller  // Nama class benar
{
    public function index()
    {
        $ruangans = Ruangan::paginate(10);
        return view('admin.ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        return view('admin.ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
        ]);

        Ruangan::create($request->all());
        return redirect('/admin/ruangan')->with('success', 'Ruangan ditambahkan!');
    }

    public function show(Ruangan $ruangan)
    {
        return view('admin.ruangan.show', compact('ruangan'));
    }

    public function edit(Ruangan $ruangan)
    {
        return view('admin.ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
        ]);

        $ruangan->update($request->all());
        return redirect('/admin/ruangan')->with('success', 'Ruangan diperbarui!');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect('/admin/ruangan')->with('success', 'Ruangan dihapus!');
    }
}