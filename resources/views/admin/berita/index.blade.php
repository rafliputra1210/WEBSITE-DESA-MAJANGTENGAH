@extends('admin.layouts.app')

@section('title', 'Kelola Berita')
@section('page-title', 'Berita')

@section('breadcrumb')
    <li class="breadcrumb-item active">Berita</li>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('admin.berita.create') }}" class="btn btn-success">
            <i class="fas fa-plus mr-2"></i>Tambah Berita Baru
        </a>
        <a href="{{ url('/berita') }}" target="_blank" class="btn btn-outline-secondary ml-2">
            <i class="fas fa-eye mr-1"></i> Lihat di Website
        </a>
    </div>
    <div class="col-auto">
        <span class="badge badge-success badge-lg p-2" style="font-size:14px;">
            Total: {{ $beritas->total() }} Berita
        </span>
    </div>
</div>

<!-- Filter -->
<div class="card mb-3">
    <div class="card-body py-2">
        <form method="GET" action="{{ route('admin.berita.index') }}" class="form-inline">
            <div class="input-group mr-3">
                <input type="text" name="search" class="form-control" placeholder="Cari judul berita..."
                       value="{{ request('search') }}" style="min-width:250px;">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <select name="category" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <option value="Umum" {{ request('category') == 'Umum' ? 'selected' : '' }}>Umum</option>
                <option value="Pembangunan" {{ request('category') == 'Pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                <option value="Sosial" {{ request('category') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                <option value="Kesehatan" {{ request('category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                <option value="Pendidikan" {{ request('category') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                <option value="Ekonomi" {{ request('category') == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                <option value="Kegiatan" {{ request('category') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
            </select>
            @if(request('search') || request('category'))
                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times mr-1"></i>Reset
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Data Table -->
<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="bg-success text-white">
                <tr>
                    <th width="60">Foto</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                <tr>
                    <td>
                        @if($berita->image)
                            <img src="{{ asset('storage/' . $berita->image) }}" class="img-thumbnail-sm" alt="{{ $berita->title }}">
                        @else
                            <div class="img-thumbnail-sm bg-light d-flex align-items-center justify-content-center" style="width:60px;height:60px;border-radius:8px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="font-weight-bold">{{ Str::limit($berita->title, 45) }}</div>
                        <small class="text-muted">{{ Str::limit($berita->content, 60) }}</small>
                    </td>
                    <td>
                        <span class="badge badge-secondary">{{ $berita->category }}</span>
                    </td>
                    <td>
                        <small>{{ $berita->published_at ? $berita->published_at->format('d M Y') : '-' }}</small>
                    </td>
                    <td>
                        @if($berita->is_highlight)
                            <span class="badge badge-warning"><i class="fas fa-star mr-1"></i>Highlight</span>
                        @else
                            <span class="badge badge-light text-muted">Biasa</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-info" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form id="delete-berita-{{ $berita->id }}" action="{{ route('admin.berita.destroy', $berita) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" title="Hapus"
                                        onclick="confirmDelete('delete-berita-{{ $berita->id }}', '{{ addslashes($berita->title) }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="fas fa-newspaper fa-3x mb-3 d-block text-muted"></i>
                        <h5>Belum ada berita</h5>
                        <p>Mulai tambahkan berita desa untuk ditampilkan di website.</p>
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-success">
                            <i class="fas fa-plus mr-2"></i>Tambah Berita Pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($beritas->hasPages())
    <div class="card-footer">
        {{ $beritas->withQueryString()->links() }}
    </div>
    @endif
</div>
@endsection
