<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Jadwal Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #0d47a1; }
        .card-icon { font-size: 3rem; opacity: 0.8; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar text-white p-4" style="width: 280px;">
            <div class="text-center mb-5">
                <img src="https://i.pinimg.com/736x/97/d2/be/97d2be4ac1ea5bc05aa62082cdc0dca1.jpg" alt="Logo UHN" class="img-fluid rounded mb-3" width="120">
                <h5>Panel Admin</h5>
                <small>Universitas Hindu Negeri<br>I Gusti Bagus Sugriwa Denpasar</small>
            </div>
            <hr class="border-light">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white fw-bold {{ request()->routeIs('admin.dashboard') ? 'active bg-primary' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.jadwal.index') }}" class="nav-link text-white">
                        <i class="fas fa-calendar-alt me-2"></i> Kelola Jadwal
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.jadwal.create') }}" class="nav-link text-white">
                        <i class="fas fa-plus-circle me-2"></i> Tambah Jadwal
                    </a>
                </li>
                <!-- Tambah menu lain nanti -->
                <li class="nav-item mt-auto">
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm w-100">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>