<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDosen
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'dosen') {
            return redirect('/login')->with('error', 'Akses ditolak! Anda bukan dosen.');
        }
        return $next($request);
    }
}