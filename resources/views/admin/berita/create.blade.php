@extends('admin.layouts.app')

@section('title', 'Tambah Berita')
@section('page-title', 'Tambah Berita')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.berita.index') }}">Berita</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
@endpush

@section('content')
<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" id="formBerita">
    @csrf
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-newspaper mr-2 text-success"></i>Informasi Berita</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required
                               placeholder="Tulis judul berita yang menarik..."
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
                                   value="{{ old('slug') }}" placeholder="slug-url-berita">
                        </div>
                        <small class="text-muted">Otomatis terisi dari judul. Bisa diubah manual.</small>
                        @error('slug')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Isi Berita <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
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
                <div class="card-body">
                    <div class="form-group text-center">
                        <div id="imgPreviewWrapper" class="mb-3">
                            <img id="imgPreview" src="#" alt="Preview"
                                 style="display:none; max-width:100%; border-radius:8px; max-height:200px; object-fit:cover;">
                            <div id="imgPlaceholder" class="bg-light rounded p-5 text-muted">
                                <i class="fas fa-cloud-upload-alt fa-3x mb-2 d-block"></i>
                                Klik untuk pilih foto
                            </div>
                        </div>
                        <input type="file" name="image" id="imageInput" class="@error('image') is-invalid @enderror"
                               accept="image/*" onchange="previewImage(event)" style="display:none;">
                        <button type="button" class="btn btn-outline-info btn-sm" onclick="document.getElementById('imageInput').click()">
                            <i class="fas fa-folder-open mr-1"></i> Pilih Foto
                        </button>
                        <small class="d-block text-muted mt-1">JPG, PNG, WebP. Maks: 2MB</small>
                        @error('image')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                    </div>
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
                                <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Terbit</label>
                        <input type="date" name="published_at" class="form-control"
                               value="{{ old('published_at', date('Y-m-d')) }}">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_highlight"
                                   name="is_highlight" value="1" {{ old('is_highlight') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_highlight">
                                <i class="fas fa-star text-warning mr-1"></i>
                                <strong>Tandai sebagai Highlight</strong>
                            </label>
                        </div>
                        <small class="text-muted">Berita highlight akan ditampilkan di posisi utama beranda.</small>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-success btn-block btn-lg">
                        <i class="fas fa-save mr-2"></i>Simpan Berita
                    </button>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary btn-block">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    // Inisialisasi Summernote editor
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

    // Generate slug dari judul
    function generateSlug(title) {
        let slug = title
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
        document.getElementById('slug').value = slug;
    }

    // Preview gambar
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imgPreview').src = e.target.result;
                document.getElementById('imgPreview').style.display = 'block';
                document.getElementById('imgPlaceholder').style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
