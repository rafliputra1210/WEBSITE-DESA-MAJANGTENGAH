@extends('layouts.app')

@section('content')
<div class="bg-blue-900 py-16 text-white text-center">
    <h1 class="text-4xl font-bold">Kabar & Pengumuman</h1>
    <p class="mt-2 text-blue-200">Update terbaru seputar program dan kegiatan desa.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @for($i=1; $i<=6; $i++)
        <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition flex flex-col">
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=600&q=80" class="h-48 w-full object-cover">
            <div class="p-6 flex-grow flex flex-col">
                <div class="flex justify-between items-center mb-3">
                    <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase">Berita</span>
                    <span class="text-xs text-gray-400 font-medium italic">10 April 2026</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 hover:text-blue-900 cursor-pointer">Inovasi Pertanian Desa Menuju Ketahanan Pangan Nasional</h3>
                <p class="text-gray-600 text-sm line-clamp-3 mb-4">Pemerintah desa melakukan sosialisasi penggunaan teknologi digital untuk monitoring lahan pertanian warga agar hasil panen maksimal...</p>
                <div class="mt-auto pt-4 border-t border-gray-50">
                    <a href="#" class="text-blue-900 font-bold text-sm inline-flex items-center gap-1 hover:gap-2 transition-all">Baca Selengkapnya <span>&rarr;</span></a>
                </div>
            </div>
        </article>
        @endfor
    </div>
</div>
@endsection