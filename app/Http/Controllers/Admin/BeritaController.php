<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::latest('published_at');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $beritas = $query->paginate(10);

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'nullable|string|unique:beritas,slug',
            'content'      => 'required|string',
            'category'     => 'required|string',
            'published_at' => 'nullable|date',
            'image'        => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['_token', 'image']);
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['is_highlight'] = $request->has('is_highlight');

        // Handle unique slug
        $original = $data['slug'];
        $count = 1;
        while (Berita::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $original . '-' . $count++;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita "' . $data['title'] . '" berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'nullable|string|unique:beritas,slug,' . $berita->id,
            'content'      => 'required|string',
            'category'     => 'required|string',
            'published_at' => 'nullable|date',
            'image'        => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'image']);
        $data['slug'] = $request->slug ?: Str::slug($request->title);
        $data['is_highlight'] = $request->has('is_highlight');

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }
            $data['image'] = $request->file('image')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image) {
            Storage::disk('public')->delete($berita->image);
        }

        $title = $berita->title;
        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita "' . $title . '" berhasil dihapus!');
    }
}
