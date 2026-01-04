@extends('layouts.dashboard')

@section('title', 'Laporan & Log')

@section('content')
<div class="flex min-h-screen">
    @include('admin.partials.sidebar')

    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-extrabold text-blue-900 mb-8 text-center">LAPORAN & LOG</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Riwayat Generate Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Generate Ganjil 2025
                                <span class="badge bg-success rounded-pill">0 Conflict - 18 Des 2025</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Generate Genap 2025
                                <span class="badge bg-warning rounded-pill">3 Conflict - 15 Des 2025</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">Log Perubahan Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Edit Technopreneurship (Admin)
                                <span class="badge bg-primary rounded-pill">17 Des 2025 14:30</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Hapus Jadwal Blockchain (Admin)
                                <span class="badge bg-danger rounded-pill">16 Des 2025 10:15</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection