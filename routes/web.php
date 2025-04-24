<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


// Halaman Utama
Route::view('/', 'public.home')->name('home');

// Informasi
Route::prefix('informasi')->group(function () {
    Route::view('/tentang', 'public.informasi.tentang')->name('informasi.tentang');
    Route::view('/maklumat', 'public.informasi.maklumat')->name('informasi.maklumat');
    Route::view('/pendaftaran', 'public.informasi.pendaftaran')->name('informasi.pendaftaran');
    Route::view('/faq', 'public.informasi.faq')->name('informasi.faq');
});

// Halaman Lain
Route::view('/artikel', 'public.artikel')->name('artikel');
Route::view('/lokasi', 'public.lokasi')->name('lokasi');

Route::get('/buku', function () {
    return view('public.buku');
});
Route::post('/buku', [BukuTamuController::class, 'store'])->name('bukutamu.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/buku', function () {
        return view('public.buku');
    })->name('user.dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboardadmin');
    })->name('admin.dashboardadmin');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/superadmin', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php'; 