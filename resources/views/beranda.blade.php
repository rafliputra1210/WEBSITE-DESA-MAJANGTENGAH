@extends('layouts.app')

@section('content')
<style>
    /* Pola titik-titik (dotted pattern) khas desain modern */
    .bg-dots {
        background-image: radial-gradient(#cbd5e1 1.5px, transparent 1.5px);
        background-size: 24px 24px;
    }
    /* Animasi transisi custom */
    .fade-in-up {
        animation: fadeInUp 0.5s ease-out forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="relative min-h-[85vh] bg-slate-50 bg-dots flex items-center justify-center p-4 md:p-8 overflow-hidden font-sans">
    
    <div class="absolute top-[-10%] left-[-5%] w-96 h-96 bg-emerald-400 rounded-full mix-blend-multiply filter blur-[100px] opacity-40 animate-blob"></div>
    <div class="absolute top-[20%] right-[-10%] w-[30rem] h-[30rem] bg-rose-300 rounded-full mix-blend-multiply filter blur-[120px] opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-[-20%] left-[20%] w-[40rem] h-[40rem] bg-cyan-200 rounded-full mix-blend-multiply filter blur-[120px] opacity-40 animate-blob animation-delay-4000"></div>

    <div class="relative w-full max-w-7xl bg-white rounded-[2.5rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] border border-white/50 overflow-hidden z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 p-8 py-12 lg:p-16 lg:py-20 items-center">
            
            <div class="max-w-xl z-20">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-600 text-sm font-bold mb-6 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Portal Resmi Pemerintah Desa
                </div>
                
                <h1 class="text-5xl lg:text-[4rem] font-extrabold text-slate-900 leading-[1.1] tracking-tight mb-6">
                    Selamat Datang di <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-cyan-500">Desa Inovatif.</span>
                </h1>
                
                <p class="text-lg text-slate-500 mb-10 leading-relaxed font-medium">
                    Mewujudkan masyarakat yang mandiri, sejahtera, dan berbudaya melalui inovasi digital dan pelayanan publik yang cepat & transparan.
                </p>
                
                <button id="btn-mulai-tour" class="group relative inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-rose-500 rounded-2xl hover:bg-rose-600 transition-all duration-300 shadow-xl shadow-rose-500/30 hover:-translate-y-1 overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        KENALI DESA KAMI
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </button>
            </div>

            <div class="relative w-full h-[500px] flex items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-tr from-rose-100 to-emerald-50 rounded-[3rem] transform rotate-3 scale-105 -z-10 transition-transform duration-700" id="bg-blob"></div>

                <div id="state-0" class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 ease-in-out">
                    <div class="bg-white p-4 rounded-3xl shadow-2xl shadow-slate-200/50 transform transition hover:scale-105 border border-slate-50">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Kepala Desa" class="w-64 h-64 object-cover rounded-2xl mb-4">
                        <div class="text-center pb-2">
                            <span class="text-xs font-bold text-emerald-500 uppercase tracking-wider">Sambutan Kepala Desa</span>
                            <h3 class="text-xl font-extrabold text-slate-800 mt-1">Bapak Sukirman, S.H.</h3>
                        </div>
                    </div>
                </div>

                <div id="state-1" class="absolute inset-0 flex flex-col justify-center px-10 hidden opacity-0 translate-x-8 transition-all duration-500 ease-in-out">
                    <span class="text-sm font-bold text-slate-400 mb-2">1/3 Langkah</span>
                    <h2 class="text-3xl font-extrabold text-slate-800 mb-6">Visi & Misi Desa</h2>
                    <div class="space-y-3">
                        <button class="w-full text-left px-6 py-4 rounded-2xl bg-white border-2 border-transparent hover:border-emerald-500 hover:shadow-lg transition-all font-semibold text-slate-700 flex items-center gap-3 group" onclick="nextState(2)">
                            <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">✓</div>
                            Menjadi desa percontohan digital
                        </button>
                        <button class="w-full text-left px-6 py-4 rounded-2xl bg-white border-2 border-transparent hover:border-emerald-500 hover:shadow-lg transition-all font-semibold text-slate-700 flex items-center gap-3 group" onclick="nextState(2)">
                            <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">✓</div>
                            Peningkatan pelayanan publik
                        </button>
                        <button class="w-full text-left px-6 py-4 rounded-2xl bg-white border-2 border-transparent hover:border-emerald-500 hover:shadow-lg transition-all font-semibold text-slate-700 flex items-center gap-3 group" onclick="nextState(2)">
                            <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">✓</div>
                            Pengembangan potensi UMKM lokal
                        </button>
                    </div>
                </div>

                <div id="state-2" class="absolute inset-0 flex flex-col justify-center px-10 hidden opacity-0 translate-x-8 transition-all duration-500 ease-in-out">
                    <span class="text-sm font-bold text-slate-400 mb-2">2/3 Langkah</span>
                    <h2 class="text-3xl font-extrabold text-slate-800 mb-6">Potensi Majangtengah</h2>
                    <div class="bg-white p-6 rounded-3xl shadow-xl space-y-4">
                        <div>
                            <label class="text-xs font-bold text-slate-400 uppercase">Sektor Unggulan</label>
                            <div class="mt-1 px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl font-bold text-slate-700">Pertanian Padi Organik</div>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-slate-400 uppercase">Produk Kreatif</label>
                            <div class="mt-1 px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl font-bold text-slate-700">UMKM Kerajinan Bambu</div>
                        </div>
                        <button class="w-full mt-4 bg-slate-900 text-white font-bold py-3.5 rounded-xl hover:bg-slate-800 transition flex items-center justify-center gap-2" onclick="nextState(3)">
                            Lanjut ke Konsultasi <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>

                <div id="state-3" class="absolute inset-0 flex flex-col justify-center px-10 hidden opacity-0 translate-x-8 transition-all duration-500 ease-in-out">
                    <div class="inline-flex self-start bg-cyan-100 text-cyan-700 font-bold px-3 py-1 rounded-full text-xs mb-4">Layanan Mandiri</div>
                    <span class="text-sm font-bold text-slate-400 mb-1">3/3 Langkah</span>
                    <h2 class="text-3xl font-extrabold text-slate-800 mb-6">Jadwalkan Konsultasi</h2>
                    
                    <div class="bg-white p-6 rounded-3xl shadow-xl">
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-slate-700">April 2026</span>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">&lt;</button>
                                <button class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600">&gt;</button>
                            </div>
                        </div>
                        <div class="grid grid-cols-7 gap-2 text-center text-sm font-medium text-slate-400 mb-4">
                            <div>Sn</div><div>Sl</div><div>Rb</div><div>Km</div><div>Jm</div><div>Sb</div><div>Mg</div>
                            <div class="p-2 text-slate-300">29</div><div class="p-2 text-slate-300">30</div>
                            <div class="p-2 text-slate-700 cursor-pointer hover:bg-slate-50 rounded-lg">1</div>
                            <div class="p-2 text-slate-700 cursor-pointer hover:bg-slate-50 rounded-lg">2</div>
                            <div class="p-2 text-slate-700 cursor-pointer hover:bg-slate-50 rounded-lg">3</div>
                            <div class="p-2 bg-emerald-500 text-white font-bold rounded-lg shadow-md cursor-pointer">4</div>
                            <div class="p-2 text-slate-700 cursor-pointer hover:bg-slate-50 rounded-lg">5</div>
                        </div>
                        <button class="w-full bg-emerald-500 text-white font-bold py-3.5 rounded-xl hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/30" onclick="nextState(4)">
                            Jadwalkan Sekarang
                        </button>
                    </div>
                </div>

                <div id="state-4" class="absolute inset-0 flex flex-col items-center justify-center hidden opacity-0 scale-95 transition-all duration-500 ease-in-out">
                    <div class="w-[280px] h-[560px] bg-slate-900 rounded-[2.5rem] p-3 shadow-2xl relative border-4 border-slate-800">
                        <div class="absolute top-0 inset-x-0 h-6 flex justify-center pt-2">
                            <div class="w-16 h-1.5 bg-slate-800 rounded-full"></div>
                        </div>
                        <div class="w-full h-full bg-slate-50 rounded-[2rem] overflow-hidden flex flex-col">
                            <div class="bg-emerald-500 p-6 pt-10 text-white">
                                <h3 class="font-extrabold text-xl">Halo Warga!</h3>
                                <p class="text-emerald-100 text-sm mt-1">Jadwal Anda Terkonfirmasi</p>
                            </div>
                            <div class="flex-1 p-5 flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <h4 class="font-bold text-slate-800 text-lg">Booking Berhasil</h4>
                                <p class="text-center text-slate-500 text-sm mt-2">Silakan datang ke balai desa pada tanggal 4 April 2026, pukul 09:00 WIB.</p>
                                
                                <div class="w-full mt-8 p-4 bg-white border border-slate-100 rounded-xl shadow-sm">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-xs font-bold text-slate-400">STATUS</span>
                                        <span class="text-xs font-bold text-emerald-500 bg-emerald-50 px-2 py-1 rounded">DITERIMA</span>
                                    </div>
                                    <div class="font-bold text-slate-700">Layanan Umum</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute bottom-10 right-0 bg-white px-4 py-3 rounded-2xl shadow-xl border border-slate-50 flex items-center gap-3 fade-in-up" style="animation-delay: 0.5s;">
                        <div class="w-8 h-8 rounded-full bg-rose-100 text-rose-500 flex items-center justify-center font-bold">!</div>
                        <div>
                            <div class="text-xs font-bold text-slate-400">SISTEM DESA</div>
                            <div class="text-sm font-bold text-slate-700">Lead Baru Masuk</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="py-16 bg-white overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-12">
            <span class="text-emerald-500 font-bold tracking-wider uppercase text-sm bg-emerald-50 px-3 py-1 rounded-full">Struktur Organisasi</span>
            <h2 class="mt-4 text-3xl font-extrabold text-gray-900 sm:text-4xl">Perangkat Desa Kami</h2>
            <p class="mt-4 max-w-2xl text-lg text-gray-500 mx-auto">Berdedikasi untuk memberikan pelayanan prima bagi masyarakat.</p>
        </div>

        <div class="relative flex overflow-x-hidden slider-container group pb-8">
            <div class="flex gap-6 animate-scroll w-max px-3">
                
                @php
                    $perangkat = [
                        ['nama' => 'Bapak Kepala Desa', 'jabatan' => 'Kepala Desa', 'foto' => 'https://ui-avatars.com/api/?name=Kepala+Desa&background=0ea5e9&color=fff&size=150'],
                        ['nama' => 'Ibu Sekretaris', 'jabatan' => 'Sekretaris Desa', 'foto' => 'https://ui-avatars.com/api/?name=Sekretaris+Desa&background=10b981&color=fff&size=150'],
                        ['nama' => 'Kaur Keuangan', 'jabatan' => 'Kepala Urusan', 'foto' => 'https://ui-avatars.com/api/?name=Kaur+Keuangan&background=f59e0b&color=fff&size=150'],
                        ['nama' => 'Kasi Pemerintahan', 'jabatan' => 'Kepala Seksi', 'foto' => 'https://ui-avatars.com/api/?name=Kasi+Pem&background=8b5cf6&color=fff&size=150'],
                        ['nama' => 'Kepala Dusun I', 'jabatan' => 'Kepala Dusun', 'foto' => 'https://ui-avatars.com/api/?name=Kadus+Satu&background=ec4899&color=fff&size=150'],
                    ];
                @endphp

                @foreach($perangkat as $p)
                <div class="w-64 bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-6 flex flex-col items-center flex-shrink-0 transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)]">
                    <div class="w-28 h-28 rounded-full overflow-hidden mb-5 border-4 border-blue-50 shadow-inner">
                        <img src="{{ $p['foto'] }}" alt="{{ $p['nama'] }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center">{{ $p['nama'] }}</h3>
                    <div class="mt-2 px-4 py-1.5 bg-sky-50 rounded-full">
                        <p class="text-xs text-sky-600 font-extrabold uppercase tracking-widest">{{ $p['jabatan'] }}</p>
                    </div>
                </div>
                @endforeach

                @foreach($perangkat as $p)
                <div class="w-64 bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-6 flex flex-col items-center flex-shrink-0 transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)]">
                    <div class="w-28 h-28 rounded-full overflow-hidden mb-5 border-4 border-blue-50 shadow-inner">
                        <img src="{{ $p['foto'] }}" alt="{{ $p['nama'] }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center">{{ $p['nama'] }}</h3>
                    <div class="mt-2 px-4 py-1.5 bg-sky-50 rounded-full">
                        <p class="text-xs text-sky-600 font-extrabold uppercase tracking-widest">{{ $p['jabatan'] }}</p>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                /* Bergeser sejauh 50% dari total lebar konten + kompensasi jarak gap */
                transform: translateX(calc(-50% - 12px));
            }
        }
        
        .animate-scroll {
            /* Ubah angka 20s untuk mengatur kecepatan. Makin kecil makin cepat */
            animation: scroll 25s linear infinite;
        }

        /* Efek interaktif: Berhenti jalan saat kursor mouse diarahkan ke area card */
        .slider-container:hover .animate-scroll {
            animation-play-state: paused;
        }
    </style>
<script>
    // Logika Interaktif untuk mengontrol alur state UI
    const totalStates = 5;

    document.getElementById('btn-mulai-tour').addEventListener('click', function() {
        nextState(1);
        // Ubah warna background blob saat masuk ke mode interaktif
        document.getElementById('bg-blob').classList.remove('from-rose-100', 'to-emerald-50', 'rotate-3');
        document.getElementById('bg-blob').classList.add('from-cyan-50', 'to-blue-50', '-rotate-6', 'scale-100');
    });

    function nextState(targetState) {
        for (let i = 0; i < totalStates; i++) {
            const el = document.getElementById(`state-${i}`);
            if (i === targetState) {
                // Tampilkan state target
                el.classList.remove('hidden');
                // Beri sedikit delay agar transisi display:block ke opacity CSS berfungsi
                setTimeout(() => {
                    el.classList.remove('opacity-0', 'translate-x-8', 'scale-95');
                    el.classList.add('opacity-100', 'translate-x-0', 'scale-100');
                }, 50);
            } else {
                // Sembunyikan state lainnya
                el.classList.remove('opacity-100', 'translate-x-0', 'scale-100');
                el.classList.add('opacity-0');
                // Reset posisi tergantung animasi awal (slide atau scale)
                if(i === 4) {
                    el.classList.add('scale-95');
                } else {
                    el.classList.add('translate-x-8');
                }
                
                setTimeout(() => {
                    el.classList.add('hidden');
                }, 500); // Sesuaikan dengan durasi transition-all di CSS (500ms)
            }
        }
    }
</script>
@endsection