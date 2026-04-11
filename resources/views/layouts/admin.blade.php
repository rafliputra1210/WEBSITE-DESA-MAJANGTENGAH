<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Desa Majangtengah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .sidebar-active { background-color: #ecfdf5; color: #047857; border-right: 4px solid #10b981; }
    </style>
</head>
<body class="text-slate-800">

<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-slate-200 hidden md:flex flex-col shadow-sm">
        <div class="h-16 flex items-center px-6 border-b border-slate-100">
            <span class="text-emerald-600 font-extrabold text-xl tracking-tight">Admin<span class="text-slate-800">Desa</span></span>
        </div>
        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-500 hover:bg-slate-50 hover:text-emerald-600 transition {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard Utama
                    </a>
                </li>
                <li class="px-6 py-3 mt-4">
                    <span class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Manajemen Konten</span>
                </li>
                <li>
                    <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-500 hover:bg-slate-50 hover:text-emerald-600 transition {{ request()->routeIs('admin.berita.*') ? 'sidebar-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        Berita Desa
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-500 hover:bg-slate-50 hover:text-emerald-600 transition {{ request()->routeIs('admin.galeri.*') ? 'sidebar-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Galeri Desa
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.perangkat.index') }}" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-500 hover:bg-slate-50 hover:text-emerald-600 transition {{ request()->routeIs('admin.perangkat.*') ? 'sidebar-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Perangkat Desa
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-500 hover:bg-slate-50 hover:text-emerald-600 transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Pengaturan Profil
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-4 border-t border-slate-100 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">A</div>
            <div class="flex-1">
                <h4 class="text-sm font-bold text-slate-800">Administrator</h4>
                <a href="/" target="_blank" class="text-xs font-semibold text-emerald-600 hover:text-emerald-800 transition">Lihat Website</a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <!-- Top Navbar -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-slate-500 hover:text-emerald-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="text-xl font-bold text-slate-800">@yield('header', 'Dashboard')</h2>
            </div>
            <div>
                <a href="#" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-bold rounded-lg transition-colors border border-slate-200">Logout</a>
            </div>
        </header>

        <!-- Main Workspace -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
