@extends('admin.layouts.app')

@section('title', 'Edit Berita')
@section('page-title', 'Edit Berita')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Berita</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
@endpush

@section('content')
<form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" id="formBerita">
    @csrf
    @method('PUT')
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit mr-2 text-info"></i>Edit Berita</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $berita->title) }}" required
                               oninput="generateSlug(this.value)">
                        @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Slug URL</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-muted" style="font-size:12px;">/berita/</span>
                            </div>
                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug', $berita->slug) }}">
                        </div>
                        @error('slug')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Isi Berita <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content', $berita->content) }}</textarea>
                        @error('content')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Settings -->
        <div class="col-md-4">
            <!-- Foto Sampul -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-image mr-2 text-info"></i>Foto Sampul</h3>
                </div>
                <div class="card-body text-center">
                    @if($berita->image)
                        <img id="imgPreview" src="{{ asset('storage/' . $berita->image) }}" alt="Current Image"
                             style="max-width:100%; border-radius:8px; max-height:200px; object-fit:cover; margin-bottom:10px;">
                    @else
                        <img id="imgPreview" src="#" alt="Preview"
                             style="display:none; max-width:100%; border-radius:8px; max-height:200px; margin-bottom:10px;">
                        <div id="imgPlaceholder" class="bg-light rounded p-4 text-muted mb-2">
                            <i class="fas fa-image fa-3x mb-2 d-block"></i>Belum ada foto
                        </div>
                    @endif
                    <input type="file" name="image" id="imageInput" accept="image/*"
                           onchange="previewImage(event)" style="display:none;">
                    <button type="button" class="btn btn-outline-info btn-sm" onclick="document.getElementById('imageInput').click()">
                        <i class="fas fa-sync mr-1"></i> Ganti Foto
                    </button>
                    <small class="d-block text-muted mt-1">JPG, PNG, WebP. Maks: 2MB</small>
                    @error('image')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Pengaturan -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-cog mr-2 text-secondary"></i>Pengaturan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Kategori <span class="text-danger">*</span></label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                            @foreach(['Umum','Pembangunan','Sosial','Kesehatan','Pendidikan','Ekonomi','Kegiatan','Pengumuman'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $berita->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Terbit</label>
                        <input type="date" name="published_at" class="form-control"
                               value="{{ old('published_at', $berita->published_at ? $berita->published_at->format('Y-m-d') : date('Y-m-d')) }}">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_highlight"
                                   name="is_highlight" value="1"
                                   {{ old('is_highlight', $berita->is_highlight) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_highlight">
                                <i class="fas fa-star text-warning mr-1"></i>
                                <strong>Tandai sebagai Highlight</strong>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-info btn-block btn-lg">
                        <i class="fas fa-save mr-2"></i>Update Berita
                    </button>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary btn-block">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                    <hr>
                    <form id="delete-this-berita" action="{{ route('admin.berita.destroy', $berita) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-danger btn-block"
                                onclick="confirmDelete('delete-this-berita', '{{ addslashes($berita->title) }}')">
                            <i class="fas fa-trash mr-2"></i>Hapus Berita Ini
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote({
            placeholder: 'Tulis isi berita di sini...',
            tabsize: 2,
            height: 350,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });

    function generateSlug(title) {
        let slug = title
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
        document.getElementById('slug').value = slug;
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('imgPreview');
                img.src = e.target.result;
                img.style.display = 'block';
                const placeholder = document.getElementById('imgPlaceholder');
                if (placeholder) placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
