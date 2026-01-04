@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-5">
                <h1 class="display-4 text-primary">Portal Jadwal Kuliah Kampus</h1>
                <p class="lead text-muted">Kelola jadwal mata kuliah, dosen, dan ruang dengan mudah.</p>
                <a href="/jadwal" class="btn btn-primary btn-lg">Lihat Jadwal</a>
            </div>
            <!-- Navigasi Card -->
            <div class="row mb-5">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-primary">
                        <div class="card-body text-center">
                            <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Jadwal Kuliah</h5>
                            <p class="card-text">Lihat dan kelola jadwal kelas.</p>
                            <a href="/jadwal" class="btn btn-primary">Buka</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-success">
                        <div class="card-body text-center">
                            <i class="fas fa-user-tie fa-3x text-success mb-3"></i>
                            <h5 class="card-title">Dosen</h5>
                            <p class="card-text">Kelola data dosen.</p>
                            <a href="/dosen" class="btn btn-success">Buka</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-info">
                        <div class="card-body text-center">
                            <i class="fas fa-university fa-3x text-info mb-3"></i>
                            <h5 class="card-title">Ruang</h5>
                            <p class="card-text">Kelola data ruang kelas.</p>
                            <a href="/ruang" class="btn btn-info">Buka</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jadwal Terbaru Card -->
            <div class="row">
                <div class="col-12">
                    <h3 class="text-secondary mb-4">Jadwal Terbaru</h3>
                </div>
                @forelse ($jadwals as $jadwal)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-info">
                            <div class="card-body">
                                <h5 class="card-title">{{ $jadwal->mata_kuliah }}</h5>
                                <p class="card-text"><strong>Dosen:</strong> {{ $jadwal->dosen->nama }}</p>
                                <p class="card-text"><strong>Ruang:</strong> {{ $jadwal->ruang->nama }}</p>
                                <p class="card-text"><strong>Waktu:</strong> {{ $jadwal->waktu_mulai->format('d/m/Y H:i') }}</p>
                                <a href="/jadwal/{{ $jadwal->id }}" class="btn btn-outline-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada jadwal terbaru.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection