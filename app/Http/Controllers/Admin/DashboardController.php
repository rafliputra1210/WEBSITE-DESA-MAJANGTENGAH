<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\PerangkatDesa;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita    = Berita::count();
        $totalGaleri    = Galeri::count();
        $totalPerangkat = PerangkatDesa::count();
        $beritaTerbaru  = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalGaleri',
            'totalPerangkat',
            'beritaTerbaru'
        ));
    }
}
