<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function edit()
    {
        $profil = ProfilDesa::first();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_desa'  => 'required|string|max:100',
            'foto_kades' => 'nullable|image|max:2048',
        ]);

        $profil = ProfilDesa::firstOrCreate([]);

        $data = $request->except(['_token', '_method', 'foto_kades']);

        if ($request->hasFile('foto_kades')) {
            // Hapus foto lama
            if ($profil->foto_kades) {
                Storage::disk('public')->delete($profil->foto_kades);
            }
            $data['foto_kades'] = $request->file('foto_kades')->store('profil', 'public');
        }

        $profil->update($data);

        return redirect()->route('admin.profil.edit')
            ->with('success', 'Profil desa berhasil diperbarui!');
    }
}
