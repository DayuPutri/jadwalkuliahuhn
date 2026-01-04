@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Jadwal</h2>
    <form method="POST" action="{{ route('admin.jadwal.store') }}">
        @csrf
        <div class="mb-3">
            <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
            <select class="form-select @error('mata_kuliah_id') is-invalid @enderror" id="mata_kuliah_id" name="mata_kuliah_id" required>
                <option value="">Pilih Mata Kuliah</option>
                @foreach ($mataKuliah as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
            @error('mata_kuliah_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen</label>
            <select class="form-select @error('dosen_id') is-invalid @enderror" id="dosen_id" name="dosen_id" required>
                <option value="">Pilih Dosen</option>
                @foreach ($dosen as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                @endforeach
            </select>
            @error('dosen_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select class="form-select @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" required>
                <option value="">Pilih Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->kode_kelas }}</option>
                @endforeach
            </select>
            @error('kelas_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ruangan_id" class="form-label">Ruangan</label>
            <select class="form-select @error('ruangan_id') is-invalid @enderror" id="ruangan_id" name="ruangan_id" required>
                <option value="">Pilih Ruangan</option>
                @foreach ($ruangan as $r)
                    <option value="{{ $r->id }}">{{ $r->nama }}</option>
                @endforeach
            </select>
            @error('ruangan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" value="{{ old('hari') }}" required>
            @error('hari')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="text" class="form-control @error('jam') is-invalid @enderror" id="jam" name="jam" value="{{ old('jam') }}" required>
            @error('jam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection