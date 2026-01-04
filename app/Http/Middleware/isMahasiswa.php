<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsMahasiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'mahasiswa') {
            return redirect('/login')->with('error', 'Akses ditolak! Anda bukan mahasiswa.');
        }
        return $next($request);
    }
}