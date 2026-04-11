<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDesa::orderBy('order_number')->get();
        return view('admin.perangkat.index', compact('perangkats'));
    }

    public function create()
    {
        return view('admin.perangkat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:100',
            'position'     => 'required|string|max:100',
            'photo'        => 'nullable|image|max:2048',
            'order_number' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['_token', 'photo']);
        $data['order_number'] = $request->order_number ?? 0;

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('perangkat', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()->route('admin.perangkat.index')
            ->with('success', $request->name . ' berhasil ditambahkan sebagai perangkat desa!');
    }

    public function edit(PerangkatDesa $perangkat)
    {
        return view('admin.perangkat.edit', compact('perangkat'));
    }

    public function update(Request $request, PerangkatDesa $perangkat)
    {
        $request->validate([
            'name'         => 'required|string|max:100',
            'position'     => 'required|string|max:100',
            'photo'        => 'nullable|image|max:2048',
            'order_number' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['_token', '_method', 'photo']);

        if ($request->hasFile('photo')) {
            if ($perangkat->photo) {
                Storage::disk('public')->delete($perangkat->photo);
            }
            $data['photo'] = $request->file('photo')->store('perangkat', 'public');
        }

        $perangkat->update($data);

        return redirect()->route('admin.perangkat.index')
            ->with('success', 'Data ' . $perangkat->name . ' berhasil diperbarui!');
    }

    public function destroy(PerangkatDesa $perangkat)
    {
        if ($perangkat->photo) {
            Storage::disk('public')->delete($perangkat->photo);
        }

        $name = $perangkat->name;
        $perangkat->delete();

        return redirect()->route('admin.perangkat.index')
            ->with('success', 'Data ' . $name . ' berhasil dihapus!');
    }
}
