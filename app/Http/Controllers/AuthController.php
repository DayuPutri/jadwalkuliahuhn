<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = User::where('nim', $request->username)
                ->orWhere('email', $request->username)
                ->first();

    if (!$user) {
        return back()->withErrors([
            'username' => 'NIM/Email tidak ditemukan.',
        ])->onlyInput('username');
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'username' => 'Password salah.',
        ])->onlyInput('username');
    }

    Auth::login($user);
    $request->session()->regenerate();

    // Redirect berdasarkan role
    if ($user->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role == 'dosen') {
        return redirect()->route('dosen.dashboard');
    } else {
        return redirect()->route('mahasiswa.dashboard');
    }

    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|unique:users,nim',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:mahasiswa,dosen,admin',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'jurusan_id' => null,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        if ($user->role == 'admin') {
            return redirect('/admin/dashboard')->with('success', 'Registrasi berhasil!');
        } elseif ($user->role == 'dosen') {
            return redirect('/dosen/dashboard')->with('success', 'Registrasi berhasil!');
        } else {
            return redirect('/mahasiswa/dashboard')->with('success', 'Registrasi berhasil!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}