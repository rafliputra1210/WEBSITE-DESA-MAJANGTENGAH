@extends('admin.layouts.app')

@section('title', 'Kelola Galeri')
@section('page-title', 'Galeri Foto')

@section('breadcrumb')
    <li class="breadcrumb-item active">Galeri</li>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-success">
            <i class="fas fa-upload mr-2"></i>Upload Foto Baru
        </a>
        <a href="{{ url('/galeri') }}" target="_blank" class="btn btn-outline-secondary ml-2">
            <i class="fas fa-eye mr-1"></i> Lihat di Website
        </a>
    </div>
    <div class="col-auto">
        <span class="badge badge-info badge-lg p-2" style="font-size:14px;">
            Total: {{ $galeris->total() }} Foto
        </span>
    </div>
</div>

<!-- Filter -->
<div class="card mb-3">
    <div class="card-body py-2">
        <form method="GET" action="{{ route('admin.galeri.index') }}" class="form-inline">
            <div class="input-group mr-3">
                <input type="text" name="search" class="form-control" placeholder="Cari judul foto..."
                       value="{{ request('search') }}" style="min-width:220px;">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <select name="category" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <option value="Umum" {{ request('category') == 'Umum' ? 'selected' : '' }}>Umum</option>
                <option value="Kegiatan" {{ request('category') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                <option value="Pembangunan" {{ request('category') == 'Pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                <option value="Alam" {{ request('category') == 'Alam' ? 'selected' : '' }}>Alam & Lingkungan</option>
                <option value="Budaya" {{ request('category') == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                <option value="Infrastruktur" {{ request('category') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
            </select>
            @if(request('search') || request('category'))
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times"></i> Reset
                </a>
            @endif
            <div class="ml-auto">
                <div class="btn-group" role="group">
                    <button type="button" id="btnGrid" class="btn btn-sm btn-outline-info active" onclick="switchView('grid')">
                        <i class="fas fa-th"></i>
                    </button>
                    <button type="button" id="btnList" class="btn btn-sm btn-outline-info" onclick="switchView('list')">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Grid View -->
<div id="viewGrid">
    <div class="row">
        @forelse($galeris as $galeri)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100" style="border-radius:12px; overflow:hidden;">
                <div style="position:relative; padding-top:65%; overflow:hidden; background:#f5f5f5;">
                    <img src="{{ asset('storage/' . $galeri->image) }}"
                         class="img-fluid"
                         style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover; transition:transform 0.3s;"
                         alt="{{ $galeri->title }}"
                         onerror="this.src='https://via.placeholder.com/400x260?text=No+Image'">
                </div>
                <div class="card-body p-3">
                    <h6 class="font-weight-bold mb-1" title="{{ $galeri->title }}">{{ Str::limit($galeri->title, 30) }}</h6>
                    <span class="badge badge-secondary badge-sm">{{ $galeri->category }}</span>
                    @if($galeri->activity_date)
                        <small class="text-muted d-block mt-1"><i class="fas fa-calendar mr-1"></i>{{ $galeri->activity_date->format('d M Y') }}</small>
                    @endif
                </div>
                <div class="card-footer p-2 bg-light">
                    <div class="btn-group w-100">
                        <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-sm btn-info flex-fill">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form id="delete-galeri-{{ $galeri->id }}" action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST" style="flex:1;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger w-100"
                                    onclick="confirmDelete('delete-galeri-{{ $galeri->id }}', '{{ addslashes($galeri->title) }}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5 text-muted">
                    <i class="fas fa-images fa-4x mb-3 d-block text-muted"></i>
                    <h4>Belum ada foto di galeri</h4>
                    <p>Upload foto kegiatan dan dokumentasi desa untuk ditampilkan di galeri.</p>
                    <a href="{{ route('admin.galeri.create') }}" class="btn btn-success">
                        <i class="fas fa-upload mr-2"></i>Upload Foto Pertama
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- List View (hidden by default) -->
<div id="viewList" style="display:none;">
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="bg-info text-white">
                    <tr>
                        <th width="80">Foto</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal Kegiatan</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeris as $galeri)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $galeri->image) }}" class="img-thumbnail-sm" alt="{{ $galeri->title }}"
                                 onerror="this.src='https://via.placeholder.com/60x60?text=No+Img'">
                        </td>
                        <td class="font-weight-bold">{{ Str::limit($galeri->title, 45) }}</td>
                        <td><span class="badge badge-secondary">{{ $galeri->category }}</span></td>
                        <td><small>{{ $galeri->activity_date ? $galeri->activity_date->format('d M Y') : '-' }}</small></td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <form id="del-list-{{ $galeri->id }}" action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete('del-list-{{ $galeri->id }}', '{{ addslashes($galeri->title) }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data galeri.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($galeris->hasPages())
<div class="d-flex justify-content-center mt-3">
    {{ $galeris->withQueryString()->links() }}
</div>
@endif
@endsection

@push('scripts')
<script>
    function switchView(type) {
        if (type === 'grid') {
            document.getElementById('viewGrid').style.display = '';
            document.getElementById('viewList').style.display = 'none';
            document.getElementById('btnGrid').classList.add('active');
            document.getElementById('btnList').classList.remove('active');
        } else {
            document.getElementById('viewGrid').style.display = 'none';
            document.getElementById('viewList').style.display = '';
            document.getElementById('btnList').classList.add('active');
            document.getElementById('btnGrid').classList.remove('active');
        }
    }
</script>
@endpush
