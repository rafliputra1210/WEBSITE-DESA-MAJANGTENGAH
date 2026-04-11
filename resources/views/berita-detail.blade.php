@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .prose p {
        margin-bottom: 1.5rem;
        line-height: 1.8;
        color: #475569; /* slate-600 */
        font-weight: 500;
    }
    .prose h2 {
        font-size: 1.875rem;
        font-weight: 800;
        color: #0f172a; /* slate-900 */
        margin-top: 3rem;
        margin-bottom: 1.5rem;
        letter-spacing: -0.025em;
    }
    .prose ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 1.5rem;
        color: #475569;
        font-weight: 500;
    }
    .prose li {
        margin-bottom: 0.5rem;
    }
    .prose blockquote {
        border-left: 4px solid #10b981; /* emerald-500 */
        padding-left: 1.5rem;
        font-style: italic;
        color: #334155;
        background: #f8fafc;
        padding-top: 1rem;
        padding-bottom: 1rem;
        padding-right: 1rem;
        border-radius: 0 1rem 1rem 0;
        margin-bottom: 1.5rem;
    }
</style>

<!-- HEADER BERITA (Minimalist & Focused) -->
<div class="bg-white pt-24 pb-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-slate-500 font-bold mb-8">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('beranda') }}" class="hover:text-emerald-500 transition">Beranda</a></li>
                <li><span class="text-slate-300">/</span></li>
                <li><a href="{{ route('berita') }}" class="hover:text-emerald-500 transition">Kabar Desa</a></li>
                <li><span class="text-slate-300">/</span></li>
                <li class="text-emerald-600 truncate max-w-[150px] sm:max-w-xs">Inovasi Pertanian Desa Menuju Ketahanan...</li>
            </ol>
        </nav>

        <!-- Judul & Meta -->
        <span class="inline-block bg-emerald-100 text-emerald-700 text-xs font-extrabold px-3 py-1.5 rounded-full uppercase tracking-widest mb-4 border border-emerald-200 shadow-sm">Pembangunan</span>
        
        <h1 class="text-4xl md:text-5xl lg:text-[3.5rem] font-extrabold text-slate-900 leading-[1.1] tracking-tight mb-8">
            Inovasi Pertanian Desa Menuju Ketahanan Pangan Nasional 2026
        </h1>

        <div class="flex flex-wrap items-center justify-between gap-6 pb-8 border-b border-slate-100">
            <div class="flex items-center gap-4">
                <img src="https://ui-avatars.com/api/?name=Admin+Desa&background=047857&color=fff&size=100" alt="Author" class="w-12 h-12 rounded-full border-2 border-white shadow-md object-cover">
                <div>
                    <h4 class="font-extrabold text-slate-900 text-sm">Ditulis oleh Admin Desa</h4>
                    <span class="text-slate-500 text-xs font-bold flex items-center gap-1.5 mt-0.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        11 April 2026
                    </span>
                </div>
            </div>
            
            <!-- Social Share Quick -->
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold text-slate-400 mr-2 uppercase tracking-wide">Bagikan:</span>
                <a href="#" class="w-9 h-9 rounded-full bg-slate-50 border border-slate-200 text-slate-500 flex items-center justify-center hover:bg-[#25D366] hover:text-white hover:border-[#25D366] transition-colors"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51h-.57c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg></a>
                <a href="#" class="w-9 h-9 rounded-full bg-slate-50 border border-slate-200 text-slate-500 flex items-center justify-center hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] transition-colors"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                <a href="#" class="w-9 h-9 rounded-full bg-slate-50 border border-slate-200 text-slate-500 flex items-center justify-center hover:bg-[#1DA1F2] hover:text-white hover:border-[#1DA1F2] transition-colors"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></a>
            </div>
        </div>
    </div>
</div>

<!-- FEATURED IMAGE -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2">
    <div class="w-full h-[300px] md:h-[450px] lg:h-[600px] rounded-[2.5rem] overflow-hidden shadow-2xl relative">
        <img src="https://images.unsplash.com/photo-1592982537447-6f2334208f34?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Featured Image" class="w-full h-full object-cover">
        <!-- Caption if needed -->
        <div class="absolute bottom-4 right-4 bg-black/50 backdrop-blur-sm text-white/80 text-[10px] px-3 py-1.5 rounded-lg border border-white/10 uppercase tracking-widest">
            Foto: Dokumentasi Balai Desa
        </div>
    </div>
</div>

<!-- CONTENT LAYOUT -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex flex-col lg:flex-row gap-16">
        
        <!-- MATERI / ARTIKEL (Left) -->
        <article class="lg:w-8/12 prose w-full">
            <p class="text-xl lg:text-2xl font-medium text-slate-800 leading-relaxed mb-8">
                Desa Majangtengah kembali menorehkan prestasi melalui program terbarunya di sektor agrikultur. Melalui kerja sama dengan berbagai badan teknologi, sistem pengairan dan pemantauan pupuk kini bisa diakses hanya melalui gawai cerdas para petani kelurahan.
            </p>

            <p>
                Langkah inovatif ini diambil untuk menekan risiko gagal panen akibat cuaca tak menentu yang beberapa tahun terakhir melanda siklus pertanian konvensional. Bapak Kepala Desa menuturkan bahwa digitalisasi tidak hanya untuk pelayanan administrasi kantor, namun juga harus dirasakan langsung dampaknya pada roda perekonomian utama warga, yakni pertanian.
            </p>

            <blockquote>
                "Kita tidak bisa membiarkan teknologi jalan sendiri sementara warga di sawah masih menggunakan metode prediksi tradisional yang berisiko. Teknologi harus turun ke lumpur!" tegas Kepala Desa saat peresmian program.
            </blockquote>

            <h2>Dampak Positif yang Langsung Terasa</h2>
            <p>
                Dalam masa uji coba awal selama 3 bulan, kelompok tani telah melaporkan penghematan biaya pupuk hingga 30% karena sensor IoT yang ditanam di beberapa titik lahan dapat menginformasikan secara presisi tanaman mana yang butuh nutrisi tambahan dan mana yang tidak.
            </p>
            <ul>
                <li><strong>Efisiensi Air:</strong> Sistem irigasi cerdas otomatis menutup saat deteksi kelembapan tanah mencukupi.</li>
                <li><strong>Peningkatan Kualitas:</strong> Panen padi yang dihasilkan diklaim lebih seragam dan bernas.</li>
                <li><strong>Akses Data:</strong> Data historis cuaca desa terekam untuk prediksi masa panen yang lebih akurat.</li>
            </ul>

            <p>
                Pemerintah Daerah pun melirik inovasi ini untuk dapat direplikasi pada desa-desa tetangga sehingga dapat terbentuk satu ekosistem suplai pangan regional yang solid, mandiri, dan tangguh terhadap perubahan iklim. Diharapkan program ini tidak hanya meningkatkan pendapatan petani, namun juga menarik generasi muda desa untuk mau kembali menggarap lahan dan menjadi petani modern (smart farmer).
            </p>

            <!-- Tags -->
            <div class="mt-12 flex items-center gap-3">
                <span class="text-sm font-extrabold text-slate-900 uppercase tracking-widest">TAGS:</span>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-emerald-100 hover:text-emerald-700 text-slate-600 text-xs font-bold transition-colors">Pertanian</a>
                    <a href="#" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-emerald-100 hover:text-emerald-700 text-slate-600 text-xs font-bold transition-colors">Digitalisasi</a>
                    <a href="#" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-emerald-100 hover:text-emerald-700 text-slate-600 text-xs font-bold transition-colors">Ekonomi</a>
                    <a href="#" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-emerald-100 hover:text-emerald-700 text-slate-600 text-xs font-bold transition-colors">Inovasi</a>
                </div>
            </div>
            
            <!-- Author Box -->
            <div class="mt-12 p-8 bg-slate-50 border border-slate-100 rounded-[2rem] flex flex-col md:flex-row items-center md:items-start gap-6">
                <img src="https://ui-avatars.com/api/?name=Admin+Desa&background=047857&color=fff&size=200" alt="Admin" class="w-24 h-24 rounded-full shadow-md object-cover">
                <div class="text-center md:text-left">
                    <h4 class="font-extrabold text-slate-900 text-xl mb-1">Admin Desa</h4>
                    <p class="text-sm text-emerald-600 font-bold uppercase tracking-widest mb-3">Tim Humas Majangtengah</p>
                    <p class="text-slate-500 font-medium text-sm leading-relaxed">Bertanggung jawab atas pengelolaan informasi publik dan memastikan transparansi program-program desa sampai ke masyarakat luas.</p>
                </div>
            </div>
        </article>

        <!-- SIDEBAR (Right) -->
        <aside class="lg:w-4/12">
            <!-- Berita Terbaru Widget -->
            <div class="bg-white rounded-[2rem] border border-slate-100 p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] sticky top-28">
                <div class="flex items-center gap-3 mb-8">
                    <span class="w-1.5 h-5 bg-emerald-500 rounded-full"></span>
                    <h3 class="text-xl font-extrabold text-slate-900 leading-none mt-1">Berita Lainnya</h3>
                </div>

                <div class="space-y-6">
                    <!-- Item 1 -->
                    <a href="#" class="group flex gap-4 items-center">
                        <div class="w-24 h-24 rounded-2xl overflow-hidden shrink-0 relative">
                            <img src="https://images.unsplash.com/photo-1545084931-f1eb94572242?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-extrabold text-slate-400 tracking-wider mb-1 block">Pembangunan</span>
                            <h4 class="font-bold text-slate-800 text-sm leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">Peresmian Jembatan Gantung Penghubung Antar Dusun</h4>
                        </div>
                    </a>

                    <!-- Item 2 -->
                    <a href="#" class="group flex gap-4 items-center">
                        <div class="w-24 h-24 rounded-2xl overflow-hidden shrink-0 relative">
                            <img src="https://images.unsplash.com/photo-1552581234-26160f608093?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-extrabold text-slate-400 tracking-wider mb-1 block">Kegiatan</span>
                            <h4 class="font-bold text-slate-800 text-sm leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">Pelatihan Digital Marketing Untuk UMKM Kerajinan</h4>
                        </div>
                    </a>

                    <!-- Item 3 -->
                    <a href="#" class="group flex gap-4 items-center">
                        <div class="w-24 h-24 rounded-2xl overflow-hidden shrink-0 relative">
                            <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-extrabold text-slate-400 tracking-wider mb-1 block">Kesehatan</span>
                            <h4 class="font-bold text-slate-800 text-sm leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">Pelaksanaan Imunisasi Massal Balita Berjalan Lancar</h4>
                        </div>
                    </a>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="{{ route('berita') }}" class="w-full block text-center px-4 py-3 bg-slate-50 hover:bg-slate-100 text-slate-700 font-bold rounded-xl transition-colors">Lihat Semua Indeks Berita</a>
                </div>
            </div>
            
        </aside>

    </div>
</div>
@endsection
