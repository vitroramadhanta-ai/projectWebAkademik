<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $cred = $request->validate(['email' => 'required|email', 'password' => 'required']);

    if (! Auth::attempt($cred)) {
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
    $request->session()->regenerate();
    return redirect()->intended('/dashboard');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}
}
