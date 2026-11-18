<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
    return back()->withErrors(['email' => 'Email atau password salah']);
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);          // manajemen pengguna
    });

    Route::middleware('role:admin,dosen')->group(function () {
        Route::resource('materi', MateriController::class);       // materi
        Route::resource('nilai', NilaiController::class);         // nilai
    });

    Route::get('/nilai-saya', [NilaiController::class, 'saya'])
        ->middleware('role:mahasiswa');
});


