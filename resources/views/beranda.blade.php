@extends('layouts.app')

@section('content')
<!-- Import Font -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    /* Auto Scroll Animation untuk perangkat desa */
    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-50% - 16px)); }
    }
    .animate-scroll {
        animation: scroll 30s linear infinite;
    }
    .slider-container:hover .animate-scroll {
        animation-play-state: paused;
    }

    /* Ambient Blur Animated Blobs */
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 8s infinite;
    }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }

    /* Glassmorphism Effect */
    .glass {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.4);
    }
</style>

<!-- ======================= HERO SECTION ======================= -->
<div class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-slate-50 pt-16 lg:pt-0">
    <!-- Dekorasi Background -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-emerald-200 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob"></div>
        <div class="absolute top-[10%] right-[-5%] w-[30rem] h-[30rem] bg-teal-200 rounded-full mix-blend-multiply filter blur-[120px] opacity-60 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-[-10%] left-[20%] w-[40rem] h-[40rem] bg-cyan-100 rounded-full mix-blend-multiply filter blur-[120px] opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Teks -->
            <div class="space-y-8 text-center lg:text-left flex flex-col items-center lg:items-start">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 border border-emerald-100 text-emerald-700 text-sm font-bold shadow-sm backdrop-blur-sm">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    Portal Resmi Digitalisasi Desa
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-[4.5rem] font-extrabold text-slate-900 leading-[1.1] tracking-tight">
                    Desa Inovatif, <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">Maju & Sejahtera.</span>
                </h1>
                
                <p class="text-lg text-slate-600 leading-relaxed font-medium max-w-xl">
                    Hadirkan kemudahan layanan publik, transparansi informasi, dan pemberdayaan ekonomi lokal langsung di genggaman Anda.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto">
                    <a href="#layanan" class="w-full sm:w-auto px-8 py-4 text-base font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition-all duration-300 shadow-lg shadow-emerald-500/30 hover:-translate-y-1 flex items-center justify-center gap-2">
                        Layanan Mandiri
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="#struktur" class="w-full sm:w-auto px-8 py-4 text-base font-bold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all duration-300 shadow-sm hover:-translate-y-1 flex items-center justify-center">
                        Jelajahi Potensi
                    </a>
                </div>
            </div>

            <!-- Elemen Visual Cards -->
            <div class="relative w-full h-[400px] lg:h-[600px] flex items-center justify-center mt-10 lg:mt-0">
                <div class="relative w-full max-w-md h-full">
                    
                    <!-- Card 1: Notifikasi Layanan -->
                    <div class="absolute top-4 right-0 lg:right-[-20px] w-[280px] bg-white rounded-2xl p-4 shadow-xl z-20 border border-slate-100 transform hover:-translate-y-2 transition-transform duration-300">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Surat Keterangan</h4>
                                <p class="text-xs text-emerald-500 font-semibold flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Telah Selesai
                                </p>
                            </div>
                        </div>
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 w-full"></div>
                        </div>
                    </div>

                    <!-- Card 2: Video Sambutan Kepala Desa -->
                    <div class="absolute top-[25%] left-[-10px] lg:left-[-80px] w-[300px] lg:w-[340px] glass rounded-[2rem] p-3 shadow-2xl z-30 transform hover:scale-105 transition-transform duration-300 animate-[fadeInUp_1s_ease-out_0.2s_both]">
                        <!-- Wrapper Video -->
                        <div class="relative w-full aspect-video rounded-2xl overflow-hidden mb-3 border border-white/50 shadow-inner bg-slate-900 group">
                            <!-- Atribut autoplay, muted, loop wajib ada agar browser mengizinkan auto-play -->
                            <video class="w-full h-full object-cover" autoplay muted loop playsinline>
                                <!-- Placeholder video: Ganti src ini dengan path video asli contoh: asset('video/sambutan.mp4') -->
                                <source src="https://assets.mixkit.co/videos/preview/mixkit-portrait-of-a-smiling-man-in-a-field-of-corn-34757-large.mp4" type="video/mp4">
                                Browser Anda tidak mendukung pemutar video.
                            </video>
                            
                            <!-- Badges Animasi Sambutan -->
                            <div class="absolute top-3 left-3 bg-rose-500 text-white text-[9px] font-black px-2.5 py-1 rounded-full shadow-lg flex items-center gap-1.5 uppercase tracking-widest backdrop-blur-sm">
                                <span class="relative flex h-1.5 w-1.5">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-white"></span>
                                </span>
                                Sambutan
                            </div>
                        </div>
                        
                        <div class="px-2 pb-1 text-center lg:text-left">
                            <span class="text-[10px] font-extrabold text-emerald-700 tracking-wider bg-emerald-100/80 px-2.5 py-1 rounded-md uppercase backdrop-blur-sm">Bapak Kepala Desa</span>
                            <h4 class="font-extrabold text-slate-900 mt-2 text-sm leading-snug">Selamat Datang Warga Majangtengah</h4>
                        </div>
                    </div>

                    <!-- Card 3: Statistik/Data -->
                    <div class="absolute bottom-10 right-4 lg:right-10 w-[240px] bg-slate-900 rounded-[2rem] p-6 shadow-2xl z-20 text-white transform hover:-translate-y-2 transition-transform duration-300 border-[4px] border-slate-800">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                            </span>
                            <span class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Statistik Real-time</span>
                        </div>
                        <h3 class="text-4xl font-extrabold mb-1 tracking-tight">3,450</h3>
                        <p class="text-sm text-slate-400 font-medium">Total Penduduk Terdata</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- ======================= STATISTIK DESA HIGHLIGHT ======================= -->
<div class="py-12 bg-emerald-700 relative overflow-hidden border-y-4 border-emerald-500">
    <!-- Pola Transparan di Background -->
    <div class="absolute inset-0 opacity-[0.05] bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-emerald-600/50">
            <div class="text-center space-y-2 px-4">
                <div class="text-4xl lg:text-5xl font-extrabold text-white">3,450</div>
                <div class="text-emerald-200 font-bold uppercase tracking-wider text-xs lg:text-sm">Jiwa Penduduk</div>
            </div>
            <div class="text-center space-y-2 px-4">
                <div class="text-4xl lg:text-5xl font-extrabold text-white">24</div>
                <div class="text-emerald-200 font-bold uppercase tracking-wider text-xs lg:text-sm">Rukun Tetangga (RT)</div>
            </div>
            <div class="text-center space-y-2 px-4">
                <div class="text-4xl lg:text-5xl font-extrabold text-white">12</div>
                <div class="text-emerald-200 font-bold uppercase tracking-wider text-xs lg:text-sm">UMKM Kreatif</div>
            </div>
            <div class="text-center space-y-2 px-4">
                <div class="text-4xl lg:text-5xl font-extrabold text-white">4.2</div>
                <div class="text-emerald-200 font-bold uppercase tracking-wider text-xs lg:text-sm">Km² Luas Area</div>
            </div>
        </div>
    </div>
</div>

<!-- ======================= LAYANAN MANDIRI ======================= -->
<div id="layanan" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-emerald-600 font-bold tracking-widest uppercase text-xs bg-emerald-50 px-4 py-1.5 rounded-full">Portal Layanan Digital</span>
            <h2 class="mt-6 text-3xl font-extrabold text-slate-900 sm:text-4xl">Akses Pelayanan Mudah & Cepat</h2>
            <p class="mt-4 text-lg text-slate-500">Urus administrasi dan temukan solusi kebutuhan Anda dari rumah tanpa harus antre lama di balai desa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Layanan 1 -->
            <a href="#" class="group block p-8 bg-slate-50 rounded-[2rem] hover:bg-white hover:shadow-[0_20px_40px_-15px_rgba(16,185,129,0.2)] border border-slate-100 transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900 mb-2">Administrasi</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Pengurusan SKU, Surat Pindah, dan Surat Keterangan Tidak Mampu.</p>
            </a>

            <!-- Layanan 2 -->
            <a href="#" class="group block p-8 bg-slate-50 rounded-[2rem] hover:bg-white hover:shadow-[0_20px_40px_-15px_rgba(59,130,246,0.2)] border border-slate-100 transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900 mb-2">Kependudukan</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Layanan pendaftaran KTP, Kartu Keluarga, dan pembaruan data warga.</p>
            </a>

            <!-- Layanan 3 -->
            <a href="#" class="group block p-8 bg-slate-50 rounded-[2rem] hover:bg-white hover:shadow-[0_20px_40px_-15px_rgba(244,63,94,0.2)] border border-slate-100 transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-rose-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900 mb-2">Pengaduan</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Wadah tanggap darurat, pelaporan masalah warga atau fasilitas desa.</p>
            </a>

            <!-- Layanan 4 -->
            <a href="#" class="group block p-8 bg-slate-50 rounded-[2rem] hover:bg-white hover:shadow-[0_20px_40px_-15px_rgba(245,158,11,0.2)] border border-slate-100 transition-all duration-300 hover:-translate-y-2">
                <div class="w-16 h-16 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all duration-300 shadow-sm">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900 mb-2">Pembangunan</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Transparansi dana desa, info proyek pembangunan dan realisasi anggaran.</p>
            </a>
            
        </div>
    </div>
</div>

<!-- ======================= PERANGKAT DESA ======================= -->
<div id="struktur" class="py-24 bg-slate-50 overflow-hidden relative">
    <!-- Dekorasi aksen -->
    <div class="absolute right-[-5%] top-[10%] w-[30rem] h-[30rem] bg-emerald-100 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 pointer-events-none"></div>
    <div class="absolute left-[-5%] bottom-[-10%] w-[40rem] h-[40rem] bg-blue-50 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16 relative z-10">
        <span class="text-emerald-600 font-bold tracking-widest uppercase text-xs bg-white px-4 py-1.5 rounded-full border border-emerald-100 shadow-sm">Struktur Organisasi</span>
        <h2 class="mt-6 text-3xl font-extrabold text-slate-900 sm:text-4xl">Perangkat Desa Kami</h2>
        <p class="mt-4 max-w-2xl text-lg text-slate-500 mx-auto">Tim yang berdedikasi tinggi memberikan pelayanan prima, cepat, dan transparan untuk seluruh masyarakat.</p>
    </div>

    <!-- Infinite Scroll Slider -->
    <div class="relative flex overflow-x-hidden slider-container group pb-8">
        <div class="flex gap-8 animate-scroll w-max px-4">
            
            @php
                $perangkat = [
                    ['nama' => 'Bapak Kepala Desa', 'jabatan' => 'Kepala Desa', 'foto' => 'https://ui-avatars.com/api/?name=Kepala+Desa&background=047857&color=fff&size=250'],
                    ['nama' => 'Ibu Sekretaris', 'jabatan' => 'Sekretaris Desa', 'foto' => 'https://ui-avatars.com/api/?name=Sekretaris+Desa&background=059669&color=fff&size=250'],
                    ['nama' => 'Kaur Keuangan', 'jabatan' => 'Kepala Urusan', 'foto' => 'https://ui-avatars.com/api/?name=Kaur+Keuangan&background=10b981&color=fff&size=250'],
                    ['nama' => 'Kasi Pemerintahan', 'jabatan' => 'Kepala Seksi', 'foto' => 'https://ui-avatars.com/api/?name=Kasi+Pemerintahan&background=34d399&color=fff&size=250'],
                    ['nama' => 'Kepala Dusun I', 'jabatan' => 'Kepala Dusun', 'foto' => 'https://ui-avatars.com/api/?name=Kepala+Dusun&background=6ee7b7&color=fff&size=250'],
                ];
            @endphp

            @foreach($perangkat as $p)
            <div class="w-[280px] bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 flex flex-col items-center flex-shrink-0 transition-all duration-300 hover:-translate-y-3 hover:shadow-[0_25px_50px_-12px_rgba(0,0,0,0.1)] hover:border-emerald-200 group/card">
                <div class="w-32 h-32 rounded-[1.5rem] overflow-hidden mb-6 border-[6px] border-emerald-50 shadow-inner group-hover/card:scale-110 group-hover/card:rotate-2 transition-transform duration-300">
                    <img src="{{ $p['foto'] }}" alt="{{ $p['nama'] }}" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-extrabold text-slate-800 text-center mb-1">{{ $p['nama'] }}</h3>
                <div class="mt-3 px-5 py-2 bg-emerald-50 rounded-full border border-emerald-100">
                    <p class="text-[11px] text-emerald-600 font-extrabold uppercase tracking-widest">{{ $p['jabatan'] }}</p>
                </div>
            </div>
            @endforeach

            <!-- Duplikasi array untuk trik infinite scroll tanpa patah -->
            @foreach($perangkat as $p)
            <div class="w-[280px] bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8 flex flex-col items-center flex-shrink-0 transition-all duration-300 hover:-translate-y-3 hover:shadow-[0_25px_50px_-12px_rgba(0,0,0,0.1)] hover:border-emerald-200 group/card">
                <div class="w-32 h-32 rounded-[1.5rem] overflow-hidden mb-6 border-[6px] border-emerald-50 shadow-inner group-hover/card:scale-110 group-hover/card:rotate-2 transition-transform duration-300">
                    <img src="{{ $p['foto'] }}" alt="{{ $p['nama'] }}" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-extrabold text-slate-800 text-center mb-1">{{ $p['nama'] }}</h3>
                <div class="mt-3 px-5 py-2 bg-emerald-50 rounded-full border border-emerald-100">
                    <p class="text-[11px] text-emerald-600 font-extrabold uppercase tracking-widest">{{ $p['jabatan'] }}</p>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>

<!-- ======================= CALL TO ACTION ======================= -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-[3rem] overflow-hidden bg-slate-900 p-10 lg:p-16 flex flex-col lg:flex-row items-center justify-between gap-10 shadow-2xl">
            <!-- Pattern CTA -->
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
            <!-- Glow Gradient -->
            <div class="absolute top-[-50%] right-[-10%] w-[30rem] h-[30rem] bg-emerald-500 rounded-full mix-blend-color-dodge filter blur-[120px] opacity-30 pointer-events-none"></div>
            
            <div class="relative z-10 max-w-2xl text-center lg:text-left">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Mari Bangun Desa Bersama!</h2>
                <p class="text-lg text-slate-400">Sampaikan aspirasi, ide, atau temukan informasi terbaru secara langsung melalui saluran digital komunikasi kami.</p>
            </div>
            <div class="relative z-10 flex w-full lg:w-auto justify-center">
                <a href="#" class="px-10 py-5 text-base font-extrabold text-emerald-900 bg-emerald-400 rounded-2xl hover:bg-emerald-300 transition-all duration-300 shadow-[0_0_40px_rgba(52,211,153,0.4)] hover:shadow-[0_0_60px_rgba(52,211,153,0.6)] hover:-translate-y-1">
                    Hubungi Admin Desa
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ======================= FOOTER / BAWAH ======================= -->
<footer class="bg-white border-t border-slate-100 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center text-white font-extrabold text-2xl shadow-lg shadow-emerald-500/30">
                        M
                    </div>
                    <div>
                        <span class="block font-extrabold text-xl text-slate-900 leading-none">MajangTengah</span>
                        <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Desa Digital</span>
                    </div>
                </div>
                <p class="text-slate-500 leading-relaxed font-medium">Menyediakan layanan administrasi dan informasi masyarakat terpadu secara mandiri untuk mewujudkan desa yang sejahtera.</p>
            </div>
            <div>
                <h4 class="font-extrabold text-slate-900 mb-6 uppercase text-sm tracking-wider">Tautan Cepat</h4>
                <ul class="space-y-3 font-medium">
                    <li><a href="#" class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2"><div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div> Profil Desa</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2"><div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div> Visi & Misi</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2"><div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div> Galeri Kegiatan</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-emerald-600 transition flex items-center gap-2"><div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div> Berita Warga</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-extrabold text-slate-900 mb-6 uppercase text-sm tracking-wider">Kontak & Alamat</h4>
                <ul class="space-y-4 text-slate-500 font-medium">
                    <li class="flex items-start gap-4">
                        <div class="bg-slate-50 p-2 rounded-lg text-emerald-600 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="pt-1">Jl. Raya Majangtengah No. 1, Kec. Dampit, Kab. Malang.</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="bg-slate-50 p-2 rounded-lg text-emerald-600 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span>desa@majangtengah.go.id</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-sm text-slate-400 font-medium">
                &copy; {{ date('Y') }} Pemerintah Desa Majangtengah. Hak cipta dilindungi.
            </div>
            <div class="flex gap-4">
                <a href="#" class="w-10 h-10 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-emerald-50 hover:text-emerald-600 transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                <a href="#" class="w-10 h-10 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-emerald-50 hover:text-emerald-600 transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.20 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
                <a href="#" class="w-10 h-10 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-emerald-50 hover:text-emerald-600 transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg></a>
            </div>
        </div>
    </div>
</footer>

@endsection