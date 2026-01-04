@extends('layouts.dashboard')

@section('title', 'Generate Jadwal Otomatis')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-extrabold text-blue-900 mb-8 text-center">GENERATE JADWAL OTOMATIS</h1>

        <div class="card border-0 shadow-lg mb-8">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.store-generate-jadwal') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="semester" class="form-label text-xl font-bold">Pilih Semester</label>
                        <select class="form-select form-select-lg" id="semester" name="semester" required>
                            <option value="">Pilih Semester</option>
                            <option value="ganjil-2025">Ganjil 2025</option>
                            <option value="genap-2025">Genap 2025</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg px-8 py-4 text-2xl font-bold shadow-lg">
                        <i class="fas fa-magic me-2"></i>Mulai Generate
                    </button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check me-2"></i>{{ session('success') }}
            </div>
            <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Selesai Generate!</div>
            </div>
            <p class="text-center text-success">Berhasil! 0 conflict. <a href="{{ route('admin.kelola-jadwal') }}">Lihat Jadwal Baru</a></p>
        @elseif (session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
            </div>
            <div class="progress mb-4">
                <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Ada 5 conflict, lihat detail</div>
            </div>
        @endif
    </main>
</div>
@endsection