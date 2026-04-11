@extends('admin.layouts.app')

@section('title', 'Upload Foto Galeri')
@section('page-title', 'Upload Foto Galeri')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.galeri.index') }}">Galeri</a></li>
    <li class="breadcrumb-item active">Upload</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" id="formGaleri">
            @csrf
            <div class="row">
                <!-- Upload Area -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-cloud-upload-alt mr-2 text-info"></i>Upload Foto</h3>
                        </div>
                        <div class="card-body">
                            <!-- Drag & Drop Upload Area -->
                            <div id="dropZone" class="border border-dashed rounded p-5 text-center mb-3"
                                 style="border-width:2px !important; border-color:#28a745 !important; cursor:pointer; background:#f8fff8; transition:all 0.2s;"
                                 onclick="document.getElementById('imageInput').click()"
                                 ondragover="event.preventDefault(); this.style.background='#e8f5e9';"
                                 ondragleave="this.style.background='#f8fff8';"
                                 ondrop="handleDrop(event)">
                                <div id="dropContent">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-success mb-3 d-block"></i>
                                    <h5 class="text-success">Drag & Drop Foto di Sini</h5>
                                    <p class="text-muted mb-2">atau</p>
                                    <span class="btn btn-outline-success btn-sm">Pilih dari Komputer</span>
                                    <p class="text-muted small mt-2 mb-0">Format: JPG, PNG, WebP — Maks: 5MB per file</p>
                                </div>
                                <div id="previewArea" style="display:none;">
                                    <img id="imgPreview" src="#" class="img-fluid rounded" style="max-height:300px; object-fit:contain;">
                                    <p class="text-muted small mt-2 mb-0" id="fileName"></p>
                                </div>
                            </div>
                            <input type="file" name="image" id="imageInput" accept="image/*" style="display:none;"
                                   onchange="previewImage(event)" required>
                            @error('image')
                                <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="btnClearImg" style="display:none;" onclick="clearImage()">
                                <i class="fas fa-times mr-1"></i>Hapus Pilihan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Info Foto -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle mr-2 text-success"></i>Informasi Foto</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul Foto <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title') }}" required
                                       placeholder="Deskripsi singkat foto...">
                                @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    @foreach(['Umum','Kegiatan','Pembangunan','Alam','Budaya','Infrastruktur'] as $cat)
                                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                                @error('category')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Kegiatan</label>
                                <input type="date" name="activity_date" class="form-control"
                                       value="{{ old('activity_date', date('Y-m-d')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                <i class="fas fa-upload mr-2"></i>Upload Foto
                            </button>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-block">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Galeri
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('dropContent').style.display = 'none';
                document.getElementById('previewArea').style.display = '';
                document.getElementById('imgPreview').src = e.target.result;
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('btnClearImg').style.display = 'inline-block';
            };
            reader.readAsDataURL(file);
        }
    }

    function clearImage() {
        document.getElementById('imageInput').value = '';
        document.getElementById('dropContent').style.display = '';
        document.getElementById('previewArea').style.display = 'none';
        document.getElementById('btnClearImg').style.display = 'none';
    }

    function handleDrop(event) {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const dt = new DataTransfer();
            dt.items.add(file);
            document.getElementById('imageInput').files = dt.files;
            previewImage({ target: { files: dt.files } });
        }
    }
</script>
@endpush
