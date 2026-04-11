@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    html {
        scroll-behavior: smooth;
    }

    .glass-nav {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    .nav-active {
        background-color: #ecfdf5 !important;
        border-color: #bbf7d0 !important;
        color: #047857 !important;
    }
    .nav-active div {
        background-color: #34d399 !important;
        color: #ffffff !important;
    }
</style>

<!-- HEADER PROFIL -->
<div class="relative bg-slate-900 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Background" class="w-full h-full object-cover mix-blend-overlay opacity-20 filter grayscale">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-900/80 to-slate-50"></div>
        <div class="absolute top-0 right-0 w-[40rem] h-[40rem] bg-emerald-500 rounded-full mix-blend-color-dodge filter blur-[150px] opacity-20"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/80 border border-slate-700 text-emerald-400 text-xs font-bold uppercase tracking-widest mb-6 backdrop-blur-md shadow-lg">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            Tentang Desa
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6">
            Profil Desa <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">Majangtengah</span>
        </h1>
        <p class="mt-4 max-w-3xl mx-auto text-lg text-slate-400 font-medium leading-relaxed">
            Menelusuri sejarah, menatap visi masa depan, dan mengenal lebih dekat para pengabdi masyarakat yang berdedikasi membangun desa.
        </p>
    </div>
</div>

<!-- KONTEN PROFIL TATA LETAK -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-12">
        
        <!-- SIDEBAR NAVIGASI (Kiri) -->
        <div class="xl:col-span-3">
            <div class="sticky top-28 glass-nav rounded-3xl p-4 shadow-xl shadow-slate-200/50 flex flex-col gap-2">
                <span class="px-4 py-2 text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-2">Navigasi Profil</span>
                
                <a href="#sejarah" class="nav-link flex items-center gap-3 p-4 rounded-2xl hover:bg-emerald-50 border border-transparent hover:border-emerald-100 transition-all font-bold text-slate-600 hover:text-emerald-700 group nav-active">
                    <div class="w-8 h-8 rounded-full bg-slate-100 group-hover:bg-emerald-200 text-slate-400 group-hover:text-emerald-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    Sejarah Desa
                </a>
                
                <a href="#visimisi" class="nav-link flex items-center gap-3 p-4 rounded-2xl hover:bg-emerald-50 border border-transparent hover:border-emerald-100 transition-all font-bold text-slate-600 hover:text-emerald-700 group">
                    <div class="w-8 h-8 rounded-full bg-slate-100 group-hover:bg-emerald-200 text-slate-400 group-hover:text-emerald-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    Visi & Misi
                </a>

                <a href="#perangkat" class="nav-link flex items-center gap-3 p-4 rounded-2xl hover:bg-emerald-50 border border-transparent hover:border-emerald-100 transition-all font-bold text-slate-600 hover:text-emerald-700 group">
                    <div class="w-8 h-8 rounded-full bg-slate-100 group-hover:bg-emerald-200 text-slate-400 group-hover:text-emerald-600 flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    Perangkat Desa
                </a>
            </div>
        </div>

        <!-- AREA KONTEN (Kanan) -->
        <div class="xl:col-span-9 space-y-24">
            
            <!-- SEJARAH DESA -->
            <section id="sejarah" class="scroll-mt-32">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1.5 h-8 bg-emerald-500 rounded-full"></div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Sejarah Desa</h2>
                </div>
                
                <div class="bg-white rounded-[2.5rem] p-8 lg:p-12 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 mb-8">
                    <p class="text-lg text-slate-600 font-medium leading-relaxed mb-6">
                        <span class="text-3xl font-extrabold text-emerald-600 float-left mr-3 mt-1">D</span>esa Majangtengah memiliki sejarah panjang yang berakar pada nilai-nilai gotong royong masyarakat agraris. Berdasarkan cerita turun-temurun dari para sesepuh, nama "Majangtengah" diambil dari letak geografisnya yang berada tepat di tengah-tengah hamparan lembah subur, menjadikannya titik pusat pertemuan berbagai rute perdagangan tradisional di masa lampau.
                    </p>
                    <p class="text-lg text-slate-600 font-medium leading-relaxed mb-10">
                        Pertumbuhan desa berawal dari sekelompok kecil petani perantau yang menetap dan membangun sistem pengairan sederhana. Seiring berjalannya waktu, persatuan dan kerja keras warga berhasil menyulap area ini menjadi salah satu lumbung pangan potensial dan kini sedang bertransformasi menjadi desa yang paham literasi digital tanpa meninggalkan kearifan lokal.
                    </p>
                    
                    <div class="relative w-full h-[400px] md:h-[500px] rounded-[2rem] overflow-hidden shadow-2xl group">
                        <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=1200&q=80" alt="Sejarah Desa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 lg:bottom-10 lg:left-10">
                            <span class="text-emerald-400 font-bold text-xs uppercase tracking-widest shadow-sm">Foto Arsip</span>
                            <h3 class="text-white text-2xl lg:text-3xl font-extrabold mt-1 leading-snug">Pemandangan Titik Lokasi Babad Alas Pertama</h3>
                        </div>
                    </div>
                </div>
            </section>

            <!-- VISI MISI -->
            <section id="visimisi" class="scroll-mt-32">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1.5 h-8 bg-blue-500 rounded-full"></div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Visi & Misi</h2>
                </div>

                <!-- Kartu Visi -->
                <div class="relative bg-gradient-to-br from-emerald-500 to-teal-500 rounded-[2.5rem] p-10 lg:p-14 shadow-2xl overflow-hidden mb-8 transform hover:scale-[1.01] transition-transform duration-500">
                    <!-- Elemen Dekoratif -->
                    <div class="absolute top-[-20%] right-[-10%] w-[20rem] h-[20rem] bg-white rounded-full mix-blend-overlay filter blur-[60px] opacity-20"></div>
                    <div class="absolute bottom-[-10%] left-[-10%] w-[15rem] h-[15rem] bg-white rounded-full mix-blend-overlay filter blur-[40px] opacity-10"></div>
                    
                    <div class="relative z-10 text-center">
                        <span class="inline-block bg-white/20 text-white border border-white/30 text-[10px] font-extrabold px-4 py-1.5 rounded-full uppercase tracking-widest mb-6 backdrop-blur-sm shadow-sm">
                            Visi Utama Masa Depan
                        </span>
                        <h3 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight italic">
                            "Terwujudnya Desa Majangtengah yang Mandiri, Sejahtera, Berkarakter, dan Berbasis Digital."
                        </h3>
                    </div>
                </div>

                <!-- Daftar Misi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $misi = [
                            ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'item' => 'Mengoptimalkan pelayanan publik yang transparan, cepat, dan mudah diakses melalui teknologi cerdas.'],
                            ['icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'item' => 'Meningkatkan kualitas sumber daya manusia lewat pendidikan, kesehatan, dan pelatihan keahlian berkelanjutan.'],
                            ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'item' => 'Memberdayakan ekonomi lokal masyarakat, terutama sektor agrikultur dan UMKM industri kreatif kerajinan.'],
                            ['icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'item' => 'Melestarikan lingkungan hidup dan budaya lokal sebagai fondasi utama di tengah gempuran modernisasi.'],
                        ];
                    @endphp

                    @foreach($misi as $index => $m)
                    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 hover:border-blue-200 transition-all duration-300 group flex flex-col items-start gap-5">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center shrink-0 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $m['icon'] }}"></path></svg>
                        </div>
                        <div>
                            <span class="text-[11px] font-extrabold text-blue-400 uppercase tracking-widest mb-2 block">Misi {{ $index + 1 }}</span>
                            <p class="text-slate-700 font-bold leading-relaxed text-lg">{{ $m['item'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- PERANGKAT DESA -->
            <section id="perangkat" class="scroll-mt-32">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1.5 h-8 bg-amber-500 rounded-full"></div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900">Perangkat Desa</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @php 
                        $jabatanDetail = [
                            ['nama' => 'Bapak Kepala Desa', 'posisi' => 'Kepala Desa', 'pic' => '047857'],
                            ['nama' => 'Ibu Sekretaris', 'posisi' => 'Sekretaris Desa', 'pic' => '059669'],
                            ['nama' => 'Kaur Keuangan', 'posisi' => 'Kepala Urusan', 'pic' => '10b981'],
                            ['nama' => 'Kaur Perencanaan', 'posisi' => 'Kepala Urusan', 'pic' => '34d399'],
                            ['nama' => 'Kasi Pemerintahan', 'posisi' => 'Kepala Seksi', 'pic' => '6ee7b7'],
                            ['nama' => 'Kepala Dusun I', 'posisi' => 'Mewilayahi Dusun', 'pic' => '0284c7'],
                        ]; 
                    @endphp

                    @foreach($jabatanDetail as $jd)
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center gap-5 hover:shadow-xl hover:border-emerald-200 transition-all duration-300 hover:-translate-y-2 group cursor-default">
                        <div class="w-20 h-20 bg-slate-50 rounded-2xl overflow-hidden shrink-0 border-[3px] border-emerald-50 shadow-inner group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($jd['nama']) }}&background={{ $jd['pic'] }}&color=fff&size=200" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-lg leading-snug">{{ $jd['nama'] }}</h4>
                            <p class="text-[10px] font-extrabold text-emerald-600 uppercase tracking-widest mt-1.5 bg-emerald-50/80 inline-block px-2.5 py-1 rounded">
                                {{ $jd['posisi'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            
        </div>
    </div>
</div>

<script>
    // Script Scroll Spy Sederhana untuk Navigasi Samping
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= sectionTop - 180) { // Offset penyesuaian header sticky
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('nav-active');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('nav-active');
                }
            });
        });
    });
</script>
@endsection