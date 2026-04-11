 @extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
</style>

<!-- HERO HEADER -->
<div class="relative bg-slate-900 pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1574686018318-62024db21e05?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Background" class="w-full h-full object-cover mix-blend-overlay opacity-20">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>
        <div class="absolute top-[-20%] right-[-10%] w-[40rem] h-[40rem] bg-emerald-500 rounded-full mix-blend-color-dodge filter blur-[150px] opacity-30"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700 text-emerald-400 text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-md">
            Pusat Informasi
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6">
            Kabar & Pengumuman <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">Desa</span>
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-slate-300 font-medium">
            Ikuti terus perkembangan terbaru, program unggulan, dan informasi publik secara transparan dari Pemerintah Desa.
        </p>
        
        <!-- Search Bar -->
        <div class="mt-10 max-w-xl mx-auto relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" class="block w-full pl-12 pr-4 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-slate-400 focus:ring-2 focus:ring-emerald-500 focus:border-transparent focus:bg-white/20 transition-all shadow-2xl backdrop-blur-md" placeholder="Cari berita atau pengumuman...">
            <button class="absolute inset-y-2 right-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-6 rounded-xl transition-colors shadow-lg shadow-emerald-500/30">
                Cari
            </button>
        </div>
    </div>
</div>

<!-- KATEGORI FILTER -->
<div class="bg-white border-b border-slate-100 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto py-4 gap-2 no-scrollbar scroll-smooth">
            <button class="px-6 py-2 rounded-full bg-emerald-500 text-white font-bold text-sm whitespace-nowrap shadow-md shadow-emerald-500/20">Semua Berita</button>
            <button class="px-6 py-2 rounded-full bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-100 whitespace-nowrap transition border border-slate-200 hover:border-slate-300">Pemerintahan</button>
            <button class="px-6 py-2 rounded-full bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-100 whitespace-nowrap transition border border-slate-200 hover:border-slate-300">Pembangunan</button>
            <button class="px-6 py-2 rounded-full bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-100 whitespace-nowrap transition border border-slate-200 hover:border-slate-300">Kegiatan Warga</button>
            <button class="px-6 py-2 rounded-full bg-slate-50 text-slate-600 font-bold text-sm hover:bg-slate-100 whitespace-nowrap transition border border-slate-200 hover:border-slate-300">Pengumuman</button>
        </div>
    </div>
</div>

<!-- BERITA HIGHLIGHT -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex items-center gap-3 mb-8">
        <div class="w-1.5 h-6 bg-emerald-500 rounded-full"></div>
        <h2 class="text-2xl font-extrabold text-slate-900">Sorotan Utama</h2>
    </div>

    <!-- Layout Highlight (1 Besar Kiri, 2 Kecil Kanan) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Big Highlight -->
        <a href="{{ route('berita.detail', 'inovasi-pertanian-desa-menuju-ketahanan-pangan') }}" class="lg:col-span-8 group relative rounded-[2rem] overflow-hidden shadow-xl aspect-video lg:aspect-auto min-h-[400px] flex items-end">
            <img src="https://images.unsplash.com/photo-1592982537447-6f2334208f34?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Berita Utama" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
            
            <div class="relative z-10 p-8 lg:p-12 w-full">
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span class="bg-emerald-500 text-white text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-widest shadow-sm">Pembangunan</span>
                    <span class="text-slate-300 text-sm font-medium flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 11 April 2026</span>
                </div>
                <h3 class="text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-3 group-hover:text-emerald-300 transition-colors">
                    Inovasi Pertanian Desa Menuju Ketahanan Pangan Nasional 2026
                </h3>
                <p class="text-slate-300 font-medium line-clamp-2 max-w-3xl">
                    Pemerintah desa melakukan sosialisasi intensif terkait penggunaan teknologi digital untuk monitoring lahan pertanian warga agar hasil panen lebih konsisten dan transparan.
                </p>
            </div>
        </a>

        <!-- Side Highlight -->
        <div class="lg:col-span-4 flex flex-col gap-8">
            <a href="{{ route('berita.detail', 'kegiatan-kerja-bakti-massal') }}" class="group relative rounded-[2rem] overflow-hidden shadow-lg h-full flex items-end min-h-[250px]">
                <img src="https://images.unsplash.com/photo-1601662528567-526cd06f6582?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Berita 2" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                
                <div class="relative z-10 p-6 w-full">
                    <span class="inline-block bg-blue-500 text-white text-[9px] font-extrabold px-2 py-1 rounded-full uppercase tracking-wider mb-2">Kegiatan</span>
                    <h3 class="text-xl font-extrabold text-white leading-tight group-hover:text-blue-300 transition-colors line-clamp-2">
                        Kerja Bakti Massal Persiapan Menyambut Musim Hujan
                    </h3>
                </div>
            </a>

            <a href="{{ route('berita.detail', 'pengumuman-pencairan-blt') }}" class="group relative rounded-[2rem] overflow-hidden shadow-lg h-full flex items-end min-h-[250px]">
                <img src="https://images.unsplash.com/photo-1554110397-9bac083987c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Berita 3" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                
                <div class="relative z-10 p-6 w-full">
                    <span class="inline-block bg-rose-500 text-white text-[9px] font-extrabold px-2 py-1 rounded-full uppercase tracking-wider mb-2">Pengumuman</span>
                    <h3 class="text-xl font-extrabold text-white leading-tight group-hover:text-rose-300 transition-colors line-clamp-2">
                        Jadwal Pencairan Bantuan Langsung Tunai (BLT) Tahap III
                    </h3>
                </div>
            </a>
        </div>
        
    </div>
</div>

<!-- LIST SEMUA BERITA -->
<div class="bg-slate-50 py-16 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-6 bg-slate-800 rounded-full"></div>
                <h2 class="text-2xl font-extrabold text-slate-900">Semua Berita</h2>
            </div>
            <a href="#" class="text-emerald-600 font-bold text-sm hover:text-emerald-700 flex items-center gap-1 group">Lihat Indeks <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @php
                $news = [
                    ['kategori' => 'Pemerintahan', 'warna' => 'bg-purple-100 text-purple-700', 'judul' => 'Rapat Koordinasi Evaluasi Kinerja Perangkat Desa Semester I', 'gambar' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'],
                    ['kategori' => 'Pembangunan', 'warna' => 'bg-emerald-100 text-emerald-700', 'judul' => 'Peresmian Jembatan Gantung Penghubung Antar Dusun', 'gambar' => 'https://images.unsplash.com/photo-1545084931-f1eb94572242?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'],
                    ['kategori' => 'Kegiatan', 'warna' => 'bg-blue-100 text-blue-700', 'judul' => 'Pelatihan Digital Marketing Untuk UMKM Kerajinan Bambu', 'gambar' => 'https://images.unsplash.com/photo-1552581234-26160f608093?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'],
                    ['kategori' => 'Kesehatan', 'warna' => 'bg-rose-100 text-rose-700', 'judul' => 'Pelaksanaan Imunisasi Massal Balita Berjalan Lancar', 'gambar' => 'https://images.unsplash.com/photo-1584515933487-779824d29309?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'],
                    ['kategori' => 'Pendidikan', 'warna' => 'bg-amber-100 text-amber-700', 'judul' => 'Bantuan Alat Belajar Interaktif untuk Sekolah Dasar', 'gambar' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'],
                    ['kategori' => 'Pengumuman', 'warna' => 'bg-slate-200 text-slate-800', 'judul' => 'Peringatan Pemadaman Listrik Area Balai Desa pada Hari Minggu', 'gambar' => 'https://images.unsplash.com/photo-1544724569-5f546fd6f2b6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'],
                ];
            @endphp

            @foreach($news as $idx => $item)
            <a href="{{ route('berita.detail', 'contoh-judul-berita') }}" class="group bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)] hover:border-slate-200 transition-all duration-300 flex flex-col hover:-translate-y-2">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ $item['gambar'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors"></div>
                    <div class="absolute top-4 left-4 {{ $item['warna'] }} text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-widest shadow-sm">
                        {{ $item['kategori'] }}
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-center gap-2 mb-3 text-xs font-bold text-slate-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ 10 - $idx }} April 2026
                        <span class="mx-1">•</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        1.2k views
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 leading-snug mb-3 group-hover:text-emerald-600 transition-colors line-clamp-2">
                        {{ $item['judul'] }}
                    </h3>
                    <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2 font-medium">
                        Diharapkan partisipasi aktif dari seluruh elemen masyarakat. Pelaksanaan akan dikoordinasikan langsung oleh kepala dusun setempat demi kelancaran program.
                    </p>
                    <div class="mt-auto border-t border-slate-100 pt-4 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-slate-200 overflow-hidden">
                                <img src="https://ui-avatars.com/api/?name=Admin+Desa&background=047857&color=fff" class="w-full h-full object-cover">
                            </div>
                            <span class="text-xs font-bold text-slate-600">Admin Desa</span>
                        </div>
                        <span class="text-emerald-600 font-extrabold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">Baca <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                    </div>
                </div>
            </a>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            <nav class="inline-flex gap-2 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-400 hover:bg-emerald-50 hover:text-emerald-600 font-bold transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-emerald-500 text-white font-extrabold shadow-md shadow-emerald-500/20">1</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-transparent text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-extrabold transition">2</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-transparent text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-extrabold transition">3</a>
                <span class="w-10 h-10 flex items-center justify-center text-slate-400 font-bold">...</span>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-transparent text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-extrabold transition">12</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-600 hover:bg-emerald-50 hover:text-emerald-600 font-bold transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
            </nav>
        </div>

    </div>
</div>
@endsection