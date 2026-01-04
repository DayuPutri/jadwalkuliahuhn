@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%) !important;
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
    }
    .main-container {
        display: flex;
        max-width: 1200px;
        margin: 0 auto;
        min-height: 100vh;
    }
    .sidebar-left {
        width: 250px;
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 1rem;
        overflow-y: auto;
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        height: auto;
        max-height: 80vh;
    }
    .sidebar-title {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid rgba(255,255,255,0.3);
    }
    .nav-link {
        display: block;
        padding: 1rem;
        color: rgba(255,255,255,0.9);
        text-decoration: none;
        border-radius: 10px;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
        font-size: 1.5rem;
    }
    .nav-link:hover {
        background: rgba(255,255,255,0.2);
        transform: translateX(5px);
    }
    .logout-nav {
        background: rgba(255,107,107,0.8);
        color: white;
        font-weight: bold;
    }
    .logout-nav:hover {
        background: rgba(255,82,82,0.9);
    }
    .main-content {
        flex: 1;
        padding: 1.5rem;
        overflow-y: auto;
    }
    .header-section {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 2rem;
        margin-bottom: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .welcome-title {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    .welcome-subtitle {
        font-size: 1.5rem;
        opacity: 0.9;
    }
    .form-section {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .form-title {
        color: #333;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        border-bottom: 2px solid #4facfe;
        padding-bottom: 0.5rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        font-weight: bold;
        color: #333;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 1rem;
        font-size: 1.1rem;
        transition: border-color 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #4facfe;
        box-shadow: 0 0 0 0.2rem rgba(79,172,254,0.25);
    }
    .btn-simpan {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        border-radius: 25px;
        padding: 1rem 2rem;
        font-size: 1.2rem;
        font-weight: bold;
        transition: all 0.3s ease;
        width: 100%;
    }
    .btn-simpan:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(79,172,254,0.3);
        color: white;
    }
</style>

<div class="main-container">
    <!-- Sidebar Kiri Navigasi -->
    <div class="sidebar-left">
        <h4 class="sidebar-title">Navigasi</h4>
        <a href="{{ route('admin.jadwal') }}" class="nav-link">📅 Kelola Jadwal</a>
        <a href="#" class="nav-link">📚 Kelola Mata Kuliah</a>
        <a href="#" class="nav-link">👨‍🏫 Kelola Dosen</a>
        <a href="#" class="nav-link">🏫 Kelola Ruangan</a>
        <a href="{{ route('logout') }}" class="nav-link logout-nav">🚪 Logout</a>
    </div>

    <!-- Main Content Kanan -->
    <div class="main-content">
        <!-- Welcome Header -->
        <div class="header-section">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="welcome-title">Tambah Jadwal Baru</h1>
                    <p class="welcome-subtitle">Isi form di bawah untuk menambah jadwal kuliah baru.</p>
                </div>
            </div>
        </div>

        <!-- Form Tambah Jadwal -->
        <div class="form-section">
            <h3 class="form-title">Form Tambah Jadwal</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.store-jadwal') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                        <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-control" required>
                            <option value="">Pilih Mata Kuliah</option>
                            @foreach ($mataKuliah as $mk)
                                <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="dosen_id" class="form-label">Dosen</label>
                        <select name="dosen_id" id="dosen_id" class="form-control" required>
                            <option value="">Pilih Dosen</option>
                            @foreach ($dosen as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="kelas_id" class="form-label">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control" required>
                            <option value="">Pilih Kelas</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->kode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="hari" class="form-label">Hari</label>
                        <select name="hari" id="hari" class="form-control" required>
                            <option value="">Pilih Hari</option>
                            @foreach ($hari as $h)
                                <option value="{{ $h }}">{{ $h }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="ruangan_id" class="form-label">Ruangan</label>
                        <select name="ruangan_id" id="ruangan_id" class="form-control" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach ($ruangan as $r)
                                <option value="{{ $r->id }}">{{ $r->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-simpan">Simpan Jadwal</button>
            </form>
        </div>
    </div>
</div>
@endsection