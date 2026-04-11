<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $galeris = $query->paginate(12);

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'image'         => 'required|image|max:5120',
            'category'      => 'nullable|string',
            'activity_date' => 'nullable|date',
        ]);

        $path = $request->file('image')->store('galeri', 'public');

        Galeri::create([
            'title'         => $request->title,
            'image'         => $path,
            'category'      => $request->category ?? 'Umum',
            'activity_date' => $request->activity_date,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto "' . $request->title . '" berhasil diupload ke galeri!');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'image'         => 'nullable|image|max:5120',
            'category'      => 'nullable|string',
            'activity_date' => 'nullable|date',
        ]);

        $data = [
            'title'         => $request->title,
            'category'      => $request->category ?? 'Umum',
            'activity_date' => $request->activity_date,
        ];

        if ($request->hasFile('image')) {
            // Hapus foto lama
            if ($galeri->image) {
                Storage::disk('public')->delete($galeri->image);
            }
            $data['image'] = $request->file('image')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->image) {
            Storage::disk('public')->delete($galeri->image);
        }

        $title = $galeri->title;
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto "' . $title . '" berhasil dihapus dari galeri!');
    }
}
