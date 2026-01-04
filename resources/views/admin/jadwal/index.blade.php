@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kelola Jadwal</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success mb-3">Tambah Jadwal</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->mataKuliah->nama }}</td>
                    <td>{{ $jadwal->dosen->nama }}</td>
                    <td>{{ $jadwal->kelas->kode_kelas }}</td>
                    <td>{{ $jadwal->ruangan->nama }}</td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ $jadwal->jam }}</td>
                    <td>
                        <a href="{{ route('admin.jadwal.show', $jadwal) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.jadwal.edit', $jadwal) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.jadwal.destroy', $jadwal) }}" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $jadwals->links() }}
</div>
@endsection