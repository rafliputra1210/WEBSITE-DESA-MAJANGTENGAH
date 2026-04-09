<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function profil()
    {
        return view('profil');
    }

    public function berita()
    {
        return view('berita');
    }

    public function galeri()
    {
        return view('galeri');
    }

    public function kontak()
    {
        // Pastikan kamu sudah membuat file kontak.blade.php nanti
        return view('kontak'); 
    }

    // Fungsi tambahan jika rute visi-misi dan perangkat-desa dipisah dari profil
    public function visiMisi()
    {
        return view('profil'); // Sementara diarahkan ke profil
    }

    public function perangkatDesa()
    {
        return view('profil'); // Sementara diarahkan ke profil
    }
}