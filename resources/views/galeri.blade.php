@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    /* Efek transisi halus tambahan */
    .masonry-item {
        break-inside: avoid;
        margin-bottom: 1.5rem;
    }
</style>

<!-- HEADER GALERI -->
<div class="relative bg-slate-900 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <!-- Background Pattern / Image -->
        <img src="https://images.unsplash.com/photo-1596422846543-75c6fc197f07?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Galeri Desa Background" class="w-full h-full object-cover mix-blend-overlay opacity-20 filter grayscale">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-900/90 to-slate-50"></div>
        <!-- Ambient Light -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[30rem] lg:w-[50rem] h-[30rem] lg:h-[50rem] bg-emerald-500 rounded-full mix-blend-color-dodge filter blur-[150px] opacity-20"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/80 border border-slate-700 text-emerald-400 text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-md shadow-lg">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Dokumentasi Visual
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6">
            Galeri <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">Desa Kita</span>
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-slate-400 font-medium leading-relaxed">
            Kumpulan momen penting, keindahan alam, kegiatan masyarakat, dan pencapaian Desa Majangtengah terekam dalam satu tempat.
        </p>
    </div>
</div>

<!-- KONTEN GALERI UTAMA -->
<div class="bg-slate-50 pb-24 -mt-10 relative z-20">
    <div class="max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Bar -->
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-2 lg:p-3 max-w-4xl mx-auto mb-16 flex overflow-x-auto gap-2 no-scrollbar scroll-smooth justify-start lg:justify-center relative z-30">
            <button class="px-6 py-3 rounded-2xl bg-emerald-500 text-white font-extrabold text-sm whitespace-nowrap shadow-md shadow-emerald-500/20 transition-all hover:scale-105">Semua Momen</button>
            <button class="px-6 py-3 rounded-2xl bg-transparent text-slate-500 font-bold text-sm hover:bg-slate-100 hover:text-slate-800 whitespace-nowrap transition-all">Pembangunan</button>
            <button class="px-6 py-3 rounded-2xl bg-transparent text-slate-500 font-bold text-sm hover:bg-slate-100 hover:text-slate-800 whitespace-nowrap transition-all">Kegiatan Warga</button>
            <button class="px-6 py-3 rounded-2xl bg-transparent text-slate-500 font-bold text-sm hover:bg-slate-100 hover:text-slate-800 whitespace-nowrap transition-all">Alam & Potensi</button>
            <button class="px-6 py-3 rounded-2xl bg-transparent text-slate-500 font-bold text-sm hover:bg-slate-100 hover:text-slate-800 whitespace-nowrap transition-all">Kesenian</button>
        </div>

        <!-- Masonry Grid -->
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
            
            @php
                $photos = [
                    ['url' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', 'kategori' => 'Alam', 'judul' => 'Sawah Terasering Hijau', 'tanggal' => '10 Jan 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=800&q=80', 'kategori' => 'Kegiatan', 'judul' => 'Gotong Royong Bersih Desa', 'tanggal' => '22 Feb 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1601662528567-526cd06f6582?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=400&q=80', 'kategori' => 'Pembangunan', 'judul' => 'Pengecoran Jalan Poros', 'tanggal' => '05 Mar 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1592982537447-6f2334208f34?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=900&q=80', 'kategori' => 'Pembangunan', 'judul' => 'Peresmian Balai Pertemuan', 'tanggal' => '15 Mar 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1545084931-f1eb94572242?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=500&q=80', 'kategori' => 'Alam', 'judul' => 'Senja di Jembatan Gantung', 'tanggal' => '20 Mar 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=700&q=80', 'kategori' => 'Kegiatan', 'judul' => 'Musdes Tahunan', 'tanggal' => '02 Apr 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1552581234-26160f608093?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=600&q=80', 'kategori' => 'Potensi', 'judul' => 'Pameran UMKM Desa', 'tanggal' => '08 Apr 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1584515933487-779824d29309?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=900&q=80', 'kategori' => 'Kegiatan', 'judul' => 'Posyandu Balita & Lansia', 'tanggal' => '09 Apr 2026'],
                    ['url' => 'https://images.unsplash.com/photo-1544724569-5f546fd6f2b6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=450&q=80', 'kategori' => 'Kesenian', 'judul' => 'Kuda Lumping Tradisional', 'tanggal' => '10 Apr 2026'],
                ];
            @endphp

            @foreach($photos as $photo)
            <!-- GALERI ITEM -->
            <div class="masonry-item relative group overflow-hidden rounded-[2rem] shadow-sm bg-white cursor-pointer hover:shadow-2xl hover:shadow-slate-300/50 transition-all duration-500 border border-slate-100 hover:border-emerald-200">
                <!-- Image -->
                <img src="{{ $photo['url'] }}" alt="{{ $photo['judul'] }}" class="w-full h-auto object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                
                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 ease-in-out"></div>
                
                <!-- Zoom Icon Center -->
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                    <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white border border-white/30 transform scale-50 group-hover:scale-100 transition-transform duration-500 ease-out">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    </div>
                </div>

                <!-- Content Bottom -->
                <div class="absolute inset-x-0 bottom-0 p-6 lg:p-8 translate-y-6 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                    <span class="inline-block bg-emerald-500/90 backdrop-blur-sm text-white text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-widest mb-3 border border-emerald-400">
                        {{ $photo['kategori'] }}
                    </span>
                    <h3 class="text-white font-extrabold text-xl leading-tight mb-2 group-hover:text-emerald-300 transition-colors">
                        {{ $photo['judul'] }}
                    </h3>
                    <p class="text-slate-300 text-xs font-bold flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $photo['tanggal'] }}
                    </p>
                </div>
            </div>
            @endforeach

        </div>

         <!-- Call to Action Video/Virtual Tour (Bonus feature) -->
        <div class="mt-20 relative rounded-[3rem] overflow-hidden bg-slate-900 border border-slate-800 p-1">
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-500 opacity-20"></div>
            <img src="https://images.unsplash.com/photo-1506526155986-1e6490333333?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Video Background" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-30">
            
            <div class="relative z-10 p-12 lg:p-20 text-center flex flex-col items-center">
                <div class="w-20 h-20 bg-emerald-500 rounded-full flex items-center justify-center text-white cursor-pointer hover:scale-110 hover:bg-emerald-400 transition-all shadow-[0_0_40px_rgba(16,185,129,0.5)] mb-8">
                    <svg class="w-8 h-8 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </div>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Kenali Kami Lebih Dekat</h2>
                <p class="text-slate-300 text-lg max-w-2xl mx-auto font-medium">Saksikan video Profil Desa Majangtengah dan rasakan kehangatan keramahtamahan warga serta keasrian alam secara langsung.</p>
            </div>
        </div>

    </div>
</div>
@endsection