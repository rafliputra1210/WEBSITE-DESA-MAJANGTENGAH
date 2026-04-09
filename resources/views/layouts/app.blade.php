<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Desa Majangtengah')</title>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen selection:bg-cyan-500 selection:text-white">

    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('beranda') }}" class="font-extrabold text-2xl tracking-tight flex items-center gap-3 text-indigo-900 hover:text-cyan-600 transition duration-300">
                        <span class="text-3xl drop-shadow-md">🏛️</span>
                        <div>
                            DESA <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">MAJANGTENGAH</span>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex space-x-8 items-center font-semibold text-sm tracking-wide">
                    <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'text-cyan-600' : 'text-slate-600' }} hover:text-cyan-500 transition">Beranda</a>
                    <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'text-cyan-600' : 'text-slate-600' }} hover:text-cyan-500 transition">Profil</a>
                    <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'text-cyan-600' : 'text-slate-600' }} hover:text-cyan-500 transition">Berita</a>
                    <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'text-cyan-600' : 'text-slate-600' }} hover:text-cyan-500 transition">Galeri</a>
                    
                    <a href="{{ route('kontak') }}" class="relative inline-flex items-center justify-center px-6 py-2.5 text-base font-bold text-white transition-all duration-200 bg-gradient-to-r from-cyan-500 to-blue-600 border border-transparent rounded-full hover:from-cyan-400 hover:to-blue-500 shadow-lg hover:shadow-cyan-500/30 hover:-translate-y-0.5">
                        Hubungi Kami
                    </a>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-slate-600 hover:text-cyan-600 focus:outline-none transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg absolute w-full">
            <div class="px-4 pt-2 pb-6 space-y-2 sm:px-3">
                <a href="{{ route('beranda') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('beranda') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-600 hover:bg-slate-50' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('profil') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-600 hover:bg-slate-50' }}">Profil</a>
                <a href="{{ route('berita') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('berita') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-600 hover:bg-slate-50' }}">Berita</a>
                <a href="{{ route('galeri') }}" class="block px-3 py-2 rounded-lg font-medium {{ request()->routeIs('galeri') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-600 hover:bg-slate-50' }}">Galeri</a>
                <a href="{{ route('kontak') }}" class="block mt-4 px-3 py-3 text-center rounded-lg font-bold text-white bg-gradient-to-r from-cyan-500 to-blue-600 shadow-md">Hubungi Kami</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-slate-300 mt-auto relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-2xl font-extrabold mb-6 text-white flex items-center gap-2">
                        <span>🏛️</span> Desa Majangtengah
                    </h3>
                    <p class="text-slate-400 leading-relaxed mb-6">Mewujudkan masyarakat yang mandiri, berbudaya, dan sejahtera melalui inovasi digital dan pelayanan prima berkelanjutan.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-lg font-bold mb-6 text-white uppercase tracking-wider">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('profil') }}" class="hover:text-cyan-400 transition flex items-center gap-2"><span class="text-cyan-500">&rarr;</span> Profil Pemerintah</a></li>
                        <li><a href="{{ route('berita') }}" class="hover:text-cyan-400 transition flex items-center gap-2"><span class="text-cyan-500">&rarr;</span> Pengumuman & Berita</a></li>
                        <li><a href="{{ route('galeri') }}" class="hover:text-cyan-400 transition flex items-center gap-2"><span class="text-cyan-500">&rarr;</span> Galeri Kegiatan</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-lg font-bold mb-6 text-white uppercase tracking-wider">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="bg-slate-800 p-2 rounded-lg text-cyan-400">📍</div> 
                            <span class="mt-1">Jl. Raya Desa Majangtengah No. 1, Kabupaten</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="bg-slate-800 p-2 rounded-lg text-cyan-400">📞</div> 
                            <span>085 795 116 905</span> 
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="bg-slate-800 p-2 rounded-lg text-cyan-400">✉️</div> 
                            <span>pemdes@majangtengah.desa.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                <p>&copy; {{ date('Y') }} Pemerintah Desa Majangtengah. Hak Cipta Dilindungi.</p>
                <p>Dikembangkan dengan ❤️ oleh <span class="font-bold text-cyan-400 hover:text-cyan-300 cursor-pointer transition">Liza.Dev</span>.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi Animasi AOS
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            // Sedikit animasi fade-in untuk menu mobile
            if(!menu.classList.contains('hidden')) {
                menu.classList.add('animate-fade-in-down');
            }
        });
    </script>
</body>
</html>