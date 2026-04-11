<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Rute untuk 5 Halaman Utama Paket Silver
Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/visi-misi', [PageController::class, 'visiMisi'])->name('visi-misi');
Route::get('/perangkat-desa', [PageController::class, 'perangkatDesa'])->name('perangkat-desa');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PageController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// --- ADMIN PANEL ROUTES ---
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Beranda management
    Route::get('/beranda', [\App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('beranda.index');
    Route::put('/beranda', [\App\Http\Controllers\Admin\BerandaController::class, 'update'])->name('beranda.update');

    // Profil Desa (single page - edit only)
    Route::get('/profil', [\App\Http\Controllers\Admin\ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [\App\Http\Controllers\Admin\ProfilController::class, 'update'])->name('profil.update');

    // Berita CRUD
    Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class);

    // Galeri CRUD
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class);

    // Perangkat Desa CRUD
    Route::resource('perangkat', \App\Http\Controllers\Admin\PerangkatDesaController::class);
});