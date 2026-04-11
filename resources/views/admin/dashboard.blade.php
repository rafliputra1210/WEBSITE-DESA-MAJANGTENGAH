@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Welcome Banner -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card" style="background: linear-gradient(135deg, #1a6b3c 0%, #28a745 100%); border-radius: 16px;">
            <div class="card-body py-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="text-white mb-1"><i class="fas fa-hand-wave mr-2"></i>Selamat Datang, Administrator!</h3>
                        <p class="text-white-50 mb-0">Kelola seluruh konten website Desa Majangtengah dari sini.</p>
                    </div>
                    <div class="col-md-4 text-right d-none d-md-block">
                        <i class="fas fa-leaf" style="font-size: 80px; opacity: 0.15; color: white;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalBerita }}</h3>
                <p>Total Berita</p>
            </div>
            <div class="icon"><i class="fas fa-newspaper"></i></div>
            <a href="{{ route('admin.berita.index') }}" class="small-box-footer">
                Kelola Berita <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalGaleri }}</h3>
                <p>Total Galeri</p>
            </div>
            <div class="icon"><i class="fas fa-images"></i></div>
            <a href="{{ route('admin.galeri.index') }}" class="small-box-footer">
                Kelola Galeri <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalPerangkat }}</h3>
                <p>Perangkat Desa</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="{{ route('admin.perangkat.index') }}" class="small-box-footer">
                Kelola Perangkat <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #6f42c1;">
            <div class="inner">
                <h3 class="text-white">1</h3>
                <p class="text-white">Profil Desa</p>
            </div>
            <div class="icon text-white"><i class="fas fa-building"></i></div>
            <a href="{{ route('admin.profil.edit') }}" class="small-box-footer">
                Edit Profil <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <!-- Berita Terbaru -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="fas fa-newspaper mr-2 text-success"></i>Berita Terbaru</h3>
                <a href="{{ route('admin.berita.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Berita
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritaTerbaru as $berita)
                        <tr>
                            <td>
                                <div class="font-weight-bold">{{ Str::limit($berita->title, 35) }}</div>
                                @if($berita->is_highlight)
                                    <span class="badge badge-warning badge-sm"><i class="fas fa-star mr-1"></i>Highlight</span>
                                @endif
                            </td>
                            <td><span class="badge badge-secondary">{{ $berita->category }}</span></td>
                            <td>{{ $berita->published_at ? $berita->published_at->format('d/m/Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-xs btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                <i class="fas fa-newspaper fa-2x mb-2 d-block"></i>
                                Belum ada berita. <a href="{{ route('admin.berita.create') }}">Tambah sekarang</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-success">
                    Lihat Semua Berita <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Menu Cepat -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-bolt mr-2 text-warning"></i>Menu Cepat</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 mb-3">
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-block btn-outline-success py-3 d-flex flex-column align-items-center">
                            <i class="fas fa-plus-circle fa-2x mb-2"></i>
                            <small>Tambah Berita</small>
                        </a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="{{ route('admin.galeri.create') }}" class="btn btn-block btn-outline-info py-3 d-flex flex-column align-items-center">
                            <i class="fas fa-upload fa-2x mb-2"></i>
                            <small>Upload Galeri</small>
                        </a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="{{ route('admin.profil.edit') }}" class="btn btn-block btn-outline-warning py-3 d-flex flex-column align-items-center">
                            <i class="fas fa-edit fa-2x mb-2"></i>
                            <small>Edit Profil</small>
                        </a>
                    </div>
                    <div class="col-6 mb-3">
                        <a href="{{ route('admin.beranda.index') }}" class="btn btn-block btn-outline-secondary py-3 d-flex flex-column align-items-center">
                            <i class="fas fa-home fa-2x mb-2"></i>
                            <small>Kelola Beranda</small>
                        </a>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('admin.perangkat.create') }}" class="btn btn-block btn-outline-danger py-3 d-flex flex-column align-items-center">
                            <i class="fas fa-user-plus fa-2x mb-2"></i>
                            <small>Tambah Perangkat Desa</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Website -->
        <div class="card" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
            <div class="card-body text-center py-4">
                <div style="width:60px;height:60px;background:linear-gradient(135deg,#1a6b3c,#28a745);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 12px;">
                    <i class="fas fa-globe text-white fa-2x"></i>
                </div>
                <h6 class="font-weight-bold">Website Desa Majangtengah</h6>
                <p class="text-muted small mb-3">Kunjungi website publik desa untuk melihat tampilan terbaru.</p>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-success btn-sm">
                    <i class="fas fa-external-link-alt mr-1"></i> Buka Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
