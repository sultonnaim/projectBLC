<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PengunjungController;
use App\Http\Controllers\Admin\PelatihanController;
use APP\Http\Controllers\Admin\SosialisasiController;
use APP\Http\Controllers\Admin\AcaraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdmin\LokasiBLCController;


// Halaman Publik (Tanpa Auth)
Route::view('/', 'public.home')->name('home');

// Informasi Publik
Route::prefix('informasi')->group(function () {
    Route::view('/tentang', 'public.informasi.tentang')->name('informasi.tentang');
    Route::view('/maklumat', 'public.informasi.maklumat')->name('informasi.maklumat');
    Route::view('/pendaftaran', 'public.informasi.pendaftaran')->name('informasi.pendaftaran');
    Route::view('/pembelajaran', 'public.informasi.pembelajaran')->name('informasi.pembelajaran');
    Route::view('/faq', 'public.informasi.faq')->name('informasi.faq');
});

// Halaman Lain Publik
Route::view('/artikel', 'public.artikel')->name('artikel');
Route::view('/lokasi', 'public.lokasi')->name('lokasi');
Route::view('/buku', 'public.buku')->name('buku');
Route::get('/buku', [BukuTamuController::class, 'create'])->name('bukutamu.create');
Route::post('/buku', [BukuTamuController::class, 'store'])->name('bukutamu.store');

// Area Terproteksi (Harus Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Admin Area
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboardadmin');
        })->name('dashboardadmin');
        
        Route::get('/acara/tambah', [AcaraController::class, 'create'])->name('admin.acara.create');
        Route::post('/acara', [AcaraController::class, 'store'])->name('admin.acara.store');

        Route::resource('peserta', App\Http\Controllers\Admin\PesertaController::class);

        Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');

        Route::get('peserta/{id}/validasi', [App\Http\Controllers\Admin\PesertaController::class, 'validasi'])->name('peserta.validasi');
        Route::get('peserta/{id}/nonvalidasi', [App\Http\Controllers\Admin\PesertaController::class, 'nonvalidasi'])->name('peserta.nonvalidasi');
        Route::put('/peserta/{peserta}', [App\Http\Controllers\Admin\PesertaController::class, 'update'])->name('peserta.update');
        Route::get('/peserta/{peserta}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
        
        Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
        Route::post('/kelas/{kelas}/toggle-status', [KelasController::class, 'toggleStatus'])->name('kelas.toggle-status');
        Route::get('/kelascetak-pdf', [KelasController::class, 'cetakPdf'])->name('kelas.cetak-pdf');
        Route::post('/{kelas}/complete', [KelasController::class, 'markCompleted'])->name('kelas.mark-completed');


// Menampilkan halaman kelola peserta (GET)
Route::get('/admin/kelas/{kelas}/kelola-peserta', [KelasController::class, 'kelolaPeserta'])
     ->name('admin.kelas.kelola-peserta');

// Menyimpan peserta baru (POST)
Route::post('/admin/kelas/{kelas}/peserta', [KelasController::class, 'simpanPeserta'])
     ->name('admin.kelas.simpan-peserta');

// Mengupdate peserta (PUT)
Route::put('/admin/kelas/{kelas}/peserta/{peserta}', [KelasController::class, 'updatePeserta'])
     ->name('admin.kelas.update-peserta');

// Menghapus peserta (DELETE)
Route::delete('/admin/kelas/{kelas}/peserta/{peserta}', [KelasController::class, 'hapusPeserta'])
     ->name('admin.kelas.hapus-peserta');

        Route::get('/pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');
        Route::delete('/pengunjung/{pengunjung}', [PengunjungController::class, 'destroy'])->name('pengunjung.destroy');
        Route::post('/pengunjung', [PengunjungController::class, 'store'])->name('pengunjung.store');
        Route::get('/pengunjung/entrypengunjung', [PengunjungController::class, 'create'])->name('pengunjung.entrypengunjung');
        Route::get('/pengunjung/entryfoto', [PengunjungController::class, 'showEntryFotoForm'])->name('pengunjung.entryfoto');
        Route::post('/pengunjung/simpan-foto', [PengunjungController::class, 'simpanFoto'])->name('pengunjung.simpanfoto');
        Route::get('/pengunjung/laporanfoto', [PengunjungController::class, 'showLaporanFoto'])->name('pengunjung.laporanfoto');
        Route::get('/pengunjung/updatefoto/{id}', [PengunjungController::class, 'updatefoto'])->name('pengunjung.updatefoto');
        Route::delete('/pengunjung/hapusfoto/{id}', [PengunjungController::class, 'hapusFoto'])->name('pengunjung.hapusfoto');


        Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
        Route::post('/pelatihan', [PelatihanController::class, 'updatePelatihan'])->name('pelatihan.update');

        Route::get('/sosialisasi/entryfoto', [\App\Http\Controllers\Admin\SosialisasiController::class, 'showEntryFotoForm'])->name('sosialisasi.entryfoto');
        Route::get('/sosialisasi/laporanfoto', [\App\Http\Controllers\Admin\SosialisasiController::class, 'showLaporanFoto'])->name('sosialisasi.laporanfoto');
        Route::post('/sosialisasi/simpan-foto', [\App\Http\Controllers\Admin\SosialisasiController::class, 'simpanFoto'])->name('sosialisasi.simpanfoto');
        Route::get('/sosialisasi/updatefoto/{id}', [\App\Http\Controllers\Admin\SosialisasiController::class, 'updatefoto'])->name('sosialisasi.updatefoto');
        Route::delete('/sosialisasi/hapusfoto/{id}', [\App\Http\Controllers\Admin\SosialisasiController::class, 'hapusFoto'])->name('sosialisasi.hapusfoto');

    //     Route::prefix('pelatihan')->name('pelatihan.')->group(function() {
    //     Route::get('/', [PelatihanController::class, 'index'])->name('index');
    //     Route::post('/', [PelatihanController::class, 'updatePelatihan'])->name('update');
    // });
        Route::get('/profile', function () {
            return view('admin.profile.profile');
        })->name('profile');
    });
    
    // Super Admin Area
Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/', function () {
        return view('superadmin.dashboardsuperadmin');
    })->name('dashboardsuperadmin');

    Route::get('/profile', function () {
        return view('superadmin.profile.profile');
    })->name('profile');

    // Show User
    Route::get('/masterdata', [\App\Http\Controllers\SuperAdmin\UserController::class, 'index'])->name('masterdata.index');
    Route::get('/users', [\App\Http\Controllers\SuperAdmin\UserController::class, 'index'])->name('users.index');
    Route::post('/users', [\App\Http\Controllers\SuperAdmin\UserController::class, 'store'])->name('users.store');
    Route::get('/masterdata/entryuser', [\App\Http\Controllers\SuperAdmin\UserController::class, 'create'])
    ->name('masterdata.entryuser');

    // User Control
    Route::resource('users', \App\Http\Controllers\Superadmin\UserController::class);
    Route::get('/masterdata/edituser/{user}', [\App\Http\Controllers\SuperAdmin\UserController::class, 'edit'])
    ->name('masterdata.edituser');



    //Show BLC Area
    Route::prefix('masterdata')->name('masterdata.')->group(function () {
        Route::get('/lokasi', [LokasiBLCController::class, 'indexarea'])->name('blcarea');
        Route::get('/entryblc', [LokasiBLCController::class, 'create'])->name('entryblc');
    
        Route::get('/lokasi/create', [LokasiBLCController::class, 'create'])->name('blc.create');
        Route::post('/lokasi', [LokasiBLCController::class, 'store'])->name('blc.store');
        Route::get('/lokasi/{blcLocation}/edit', [LokasiBLCController::class, 'edit'])->name('blc.edit');
        Route::put('/lokasi/{blcLocation}', [LokasiBLCController::class, 'update'])->name('blc.update');
        Route::delete('/lokasi/{blcLocation}', [LokasiBLCController::class, 'destroy'])->name('blc.destroy');
        Route::get('/blc/editblc', [LokasiBLCController::class, 'editDeletePage'])
            ->name('editblc');
        Route::get('/formeditblc/{blcLocation}', [LokasiBLCController::class, 'edit'])
            ->name('formeditblc');

    });
    
    


    
    
});


});

require __DIR__.'/auth.php';