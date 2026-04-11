@extends('admin.layouts.app')

@section('title', 'Kelola Beranda')
@section('page-title', 'Kelola Beranda')

@section('breadcrumb')
    <li class="breadcrumb-item active">Beranda</li>
@endsection

@section('content')
<div class="row">
    <!-- Preview Website -->
    <div class="col-12 mb-4">
        <div class="card" style="background: linear-gradient(135deg, #1a6b3c 0%, #28a745 100%);">
            <div class="card-body py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="text-white mb-0"><i class="fas fa-info-circle mr-2"></i>Halaman ini untuk mengatur konten yang tampil di <strong>Beranda</strong> website publik desa.</p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/') }}" target="_blank" class="btn btn-light btn-sm">
                            <i class="fas fa-eye mr-1"></i> Preview Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Statistik Beranda -->
    <div class="col-md-4">
        <div class="info-box mb-3" style="border-radius:12px;">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-newspaper"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Berita Terpublish</span>
                <span class="info-box-number">{{ $totalBerita }}</span>
            </div>
        </div>
        <div class="info-box mb-3" style="border-radius:12px;">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-images"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Foto Galeri</span>
                <span class="info-box-number">{{ $totalGaleri }}</span>
            </div>
        </div>
        <div class="info-box" style="border-radius:12px;">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Perangkat Desa</span>
                <span class="info-box-number">{{ $totalPerangkat }}</span>
            </div>
        </div>
    </div>

    <!-- Setting Hero / Sambutan -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sliders-h mr-2 text-success"></i>Pengaturan Teks Beranda</h3>
            </div>
            <form action="{{ route('admin.beranda.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Desa <span class="text-danger">*</span></label>
                        <input type="text" name="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror"
                               value="{{ old('nama_desa', $profil->nama_desa ?? 'Majangtengah') }}"
                               placeholder="Contoh: Majangtengah">
                        @error('nama_desa')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tagline / Slogan Desa</label>
                        <input type="text" name="tagline" class="form-control @error('tagline') is-invalid @enderror"
                               value="{{ old('tagline', $profil->tagline ?? '') }}"
                               placeholder="Contoh: Bersatu, Maju, Sejahtera">
                        @error('tagline')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Teks Sambutan Kepala Desa</label>
                        <textarea name="sambutan" class="form-control @error('sambutan') is-invalid @enderror" rows="4"
                                  placeholder="Tulis kata sambutan dari kepala desa...">{{ old('sambutan', $profil->sambutan ?? '') }}</textarea>
                        @error('sambutan')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Penduduk</label>
                                <input type="text" name="jumlah_penduduk" class="form-control"
                                       value="{{ old('jumlah_penduduk', $profil->jumlah_penduduk ?? '') }}"
                                       placeholder="Contoh: 4.500 Jiwa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Luas Wilayah</label>
                                <input type="text" name="luas_wilayah" class="form-control"
                                       value="{{ old('luas_wilayah', $profil->luas_wilayah ?? '') }}"
                                       placeholder="Contoh: 450 Ha">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah KK</label>
                                <input type="text" name="jumlah_kk" class="form-control"
                                       value="{{ old('jumlah_kk', $profil->jumlah_kk ?? '') }}"
                                       placeholder="Contoh: 1.200 KK">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah RT/RW</label>
                                <input type="text" name="jumlah_rtrw" class="form-control"
                                       value="{{ old('jumlah_rtrw', $profil->jumlah_rtrw ?? '') }}"
                                       placeholder="Contoh: 12 RT / 4 RW">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-2"></i>Simpan Pengaturan
                    </button>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary ml-2">
                        <i class="fas fa-eye mr-1"></i>Preview
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Berita Highlight untuk Beranda -->
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title"><i class="fas fa-star mr-2 text-warning"></i>Berita Highlight di Beranda</h3>
                <a href="{{ route('admin.berita.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus mr-1"></i> Tambah Berita
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th width="60">Foto</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($beritaHighlight as $berita)
                        <tr>
                            <td>
                                @if($berita->image)
                                    <img src="{{ asset('storage/' . $berita->image) }}" class="img-thumbnail-sm" alt="{{ $berita->title }}">
                                @else
                                    <div class="img-thumbnail-sm bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="font-weight-bold">{{ Str::limit($berita->title, 40) }}</div>
                                <small class="text-muted">{{ Str::limit($berita->content, 50) }}</small>
                            </td>
                            <td><span class="badge badge-secondary">{{ $berita->category }}</span></td>
                            <td><small>{{ $berita->published_at ? $berita->published_at->format('d M Y') : '-' }}</small></td>
                            <td>
                                @if($berita->is_highlight)
                                    <span class="badge badge-warning"><i class="fas fa-star mr-1"></i>Highlight</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-xs btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="fas fa-star fa-2x mb-2 d-block text-warning"></i>
                                Belum ada berita yang ditandai sebagai highlight.
                                <br><a href="{{ route('admin.berita.create') }}" class="btn btn-sm btn-success mt-2">Buat Berita Baru</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
