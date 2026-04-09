@extends('layouts.app')

@section('content')
<div class="bg-blue-900 py-16 text-white text-center">
    <h1 class="text-4xl font-bold">Profil Desa Majangtengah</h1>
    <p class="mt-2 text-blue-200">Mengenal lebih dekat sejarah dan visi misi kami.</p>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-4">
                <a href="#sejarah" class="block p-4 bg-white shadow rounded-lg hover:bg-blue-50 transition border-l-4 border-blue-900 font-bold">Sejarah Desa</a>
                <a href="#visimisi" class="block p-4 bg-white shadow rounded-lg hover:bg-blue-50 transition border-l-4 border-yellow-400 font-bold">Visi & Misi</a>
                <a href="#perangkat" class="block p-4 bg-white shadow rounded-lg hover:bg-blue-50 transition border-l-4 border-green-500 font-bold">Perangkat Desa</a>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-16">
            <section id="sejarah">
                <h2 class="text-3xl font-bold border-b-2 border-blue-900 pb-2 mb-6">Sejarah Desa</h2>
                <p class="text-gray-700 leading-relaxed mb-4">Desa Majangtengah memiliki sejarah panjang yang berakar pada nilai-nilai gotong royong masyarakat agraris...</p>
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" class="rounded-xl shadow-lg w-full mb-4">
            </section>

            <section id="visimisi">
                <h2 class="text-3xl font-bold border-b-2 border-yellow-400 pb-2 mb-6">Visi & Misi</h2>
                <div class="bg-yellow-50 p-8 rounded-xl border border-yellow-200">
                    <h3 class="text-xl font-bold text-yellow-800 mb-2">Visi:</h3>
                    <p class="italic text-lg text-gray-800">"Terwujudnya Desa Majangtengah yang Mandiri, Sejahtera, dan Berbasis Digital."</p>
                </div>
            </section>

            <section id="perangkat">
                <h2 class="text-3xl font-bold border-b-2 border-green-500 pb-2 mb-6">Perangkat Desa</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @php $jabatan = ['Kepala Desa', 'Sekretaris Desa', 'KAUR Keuangan', 'KAUR Perencanaan']; @endphp
                    @foreach($jabatan as $j)
                    <div class="bg-white p-6 rounded-xl shadow-md flex items-center gap-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=random" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Nama Perangkat</h4>
                            <p class="text-sm text-gray-500">{{ $j }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@endsection