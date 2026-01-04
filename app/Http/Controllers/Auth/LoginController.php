<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Cek login dengan username OR email
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']]) || 
            Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');  // Redirect ke dashboard role-based
        }

        throw ValidationException::withMessages([
            'username' => ['Kredensial salah.'],
        ]);
    }
}