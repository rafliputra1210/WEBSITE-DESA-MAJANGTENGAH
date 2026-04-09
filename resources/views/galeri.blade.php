@extends('layouts.app')

@section('content')
<div class="bg-blue-900 py-16 text-white text-center">
    <h1 class="text-4xl font-bold">Galeri Foto</h1>
    <p class="mt-2 text-blue-200">Dokumentasi kegiatan dan potensi Desa Majangtengah.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">
        @for($i=1; $i<=9; $i++)
        <div class="relative group overflow-hidden rounded-xl shadow-lg transition-transform hover:scale-[1.02]">
            <img src="https://picsum.photos/seed/{{ $i }}/800/{{ $i % 2 == 0 ? '600' : '900' }}" class="w-full h-auto">
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-4">
                <p class="text-white font-bold text-center">Judul Foto Kegiatan {{ $i }}</p>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection