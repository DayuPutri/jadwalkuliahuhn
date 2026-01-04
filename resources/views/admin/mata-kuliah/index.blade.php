@extends('layouts.dashboard')

@section('title', 'Kelola Mata Kuliah')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-extrabold text-blue-900 mb-8 text-center">KELOLA MATA KULIAH</h1>

        <div class="d-flex justify-content-between mb-4">
            <h2 class="h4 fw-bold text-blue-900 mb-0">Daftar Mata Kuliah</h2>
            <a href="{{ route('admin.mata-kuliah.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Mata Kuliah
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <th>Kode</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mataKuliah as $mk)
                        <tr>
                            <td>{{ $mk->nama }}</td>
                            <td>{{ $mk->kode }}</td>
                            <td>{{ $mk->sks }}</td>
                            <td>
                                <a href="{{ route('admin.mata-kuliah.edit', $mk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{ route('admin.mata-kuliah.destroy', $mk->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection