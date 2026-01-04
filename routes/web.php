<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TambahJadwalController;
use App\Http\Controllers\Admin\KelolaJadwalController;
use App\Http\Controllers\Admin\SchedulingController;
use App\Http\Controllers\Admin\DosenController as AdminDosenController;
use App\Http\Controllers\DosenController;
use App\Models\Dosen;
use App\Models\Jadwal;

// ==================== GUEST ROUTES (TIDAK PERLU LOGIN) ====================
// Halaman utama publik - Wajib ada halaman guest!
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Halaman login & register tetap guest
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', function (LoginRequest $request) {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    });

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
});

// Logout (bisa dari mana saja)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('welcome');
})->name('logout');

// ==================== AUTHENTICATED ROUTES ====================
Route::middleware(['auth'])->group(function () {
    // Dashboard redirect sesuai role
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        return match ($role) {
            'admin'     => redirect()->route('admin.dashboard'),
            'dosen'     => redirect()->route('dosen.dashboard'),
            'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
            default     => redirect()->route('welcome'),
        };
    })->name('dashboard');

    // ==================== ADMIN ROUTES ====================
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', function () {
            if (auth()->user()->role !== 'admin') {
                abort(403);
            }

            $totalJadwal = Jadwal::count();
            $mataKuliahsCount = Jadwal::distinct('mata_kuliah')->count('mata_kuliah');
            $dosensCount = Jadwal::distinct('dosen')->count('dosen');
            $ruanganCount = Jadwal::distinct('ruangan')->count('ruangan');
            $kelasCount = Jadwal::distinct('kelas')->count('kelas');
            $totalSks = Jadwal::sum('sks');

            $hariMap = [
                'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
            ];
            $hariSekarang = $hariMap[now()->format('l')];
            $jadwalHariIni = Jadwal::where('hari', $hariSekarang)->count();

            return view('admin.dashboard', compact(
                'totalJadwal', 'mataKuliahsCount', 'dosensCount',
                'ruanganCount', 'kelasCount', 'totalSks', 'jadwalHariIni'
            ));
        })->name('dashboard');

        // Kelola Jadwal
        Route::get('/kelola-jadwal', [KelolaJadwalController::class, 'index'])->name('kelola-jadwal');
        Route::resource('jadwal', KelolaJadwalController::class)->only(['show', 'edit', 'update', 'destroy']);

        // Tambah Jadwal Baru
        Route::get('/tambah-jadwal', [TambahJadwalController::class, 'create'])->name('tambah-jadwal');
        Route::post('/tambah-jadwal', [TambahJadwalController::class, 'store'])->name('tambah-jadwal.store');

        // Kelola Dosen
        Route::resource('tambah-dosen', AdminDosenController::class)->only(['create', 'store']);
        Route::resource('dosen', AdminDosenController::class)->only(['edit', 'update', 'destroy']);

        Route::get('/profile-dosen', function () {
            if (auth()->user()->role !== 'admin') abort(403);
            $dosens = Dosen::all();
            return view('admin.profile-dosen', compact('dosens'));
        })->name('profile-dosen');

        // Penjadwalan Otomatis
        Route::get('/scheduling', [SchedulingController::class, 'index'])->name('scheduling');
        Route::post('/scheduling/generate', [SchedulingController::class, 'generate'])->name('scheduling.generate');
        Route::post('/scheduling/store', [SchedulingController::class, 'storeGenerated'])->name('scheduling.store');
    });

    // ==================== DOSEN ROUTES ====================
    Route::prefix('dosen')->name('dosen.')->group(function () {
        Route::get('/dashboard', [DosenController::class, 'dashboard'])->name('dashboard');
        Route::get('/jadwal-mengajar', [DosenController::class, 'jadwalLengkap'])->name('jadwal-mengajar');
        Route::get('/tugas', [DosenController::class, 'tugas'])->name('tugas');
        Route::get('/nilai', [DosenController::class, 'nilai'])->name('nilai');
    });

    // ==================== MAHASISWA ROUTES ====================
    Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('/dashboard', function () {
            if (auth()->user()->role !== 'mahasiswa') abort(403);
            return view('mahasiswa.dashboard');
        })->name('dashboard');

        // Menu Jadwal Kuliah (grid lengkap seperti dosen)
        Route::get('/jadwal', function () {
            if (auth()->user()->role !== 'mahasiswa') abort(403);
            $jadwals = Jadwal::orderBy('hari')->orderBy('jam_mulai')->get();
            return view('mahasiswa.jadwal', compact('jadwals'));
        })->name('jadwal');

        // Menu Tugas (statis)
        Route::get('/tugas', function () {
            if (auth()->user()->role !== 'mahasiswa') abort(403);
            return view('mahasiswa.tugas');
        })->name('tugas');

        // Menu Nilai (statis)
        Route::get('/nilai', function () {
            if (auth()->user()->role !== 'mahasiswa') abort(403);
            return view('mahasiswa.nilai');
        })->name('nilai');
    });

    // Profile Umum
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});