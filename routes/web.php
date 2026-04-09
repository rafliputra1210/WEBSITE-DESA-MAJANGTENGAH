<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Rute untuk 5 Halaman Utama Paket Silver
Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/visi-misi', [PageController::class, 'visiMisi'])->name('visi-misi');
Route::get('/perangkat-desa', [PageController::class, 'perangkatDesa'])->name('perangkat-desa');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');