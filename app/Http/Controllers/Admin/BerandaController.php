<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\PerangkatDesa;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $profil          = ProfilDesa::first();
        $totalBerita     = Berita::count();
        $totalGaleri     = Galeri::count();
        $totalPerangkat  = PerangkatDesa::count();
        $beritaHighlight = Berita::where('is_highlight', true)->latest()->take(6)->get();

        return view('admin.beranda.index', compact(
            'profil',
            'totalBerita',
            'totalGaleri',
            'totalPerangkat',
            'beritaHighlight'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:100',
            'tagline'   => 'nullable|string|max:200',
            'sambutan'  => 'nullable|string',
        ]);

        $profil = ProfilDesa::firstOrCreate([]);

        $profil->update($request->only([
            'nama_desa',
            'tagline',
            'sambutan',
            'jumlah_penduduk',
            'luas_wilayah',
            'jumlah_kk',
            'jumlah_rtrw',
        ]));

        return redirect()->route('admin.beranda.index')
            ->with('success', 'Pengaturan beranda berhasil disimpan!');
    }
}
