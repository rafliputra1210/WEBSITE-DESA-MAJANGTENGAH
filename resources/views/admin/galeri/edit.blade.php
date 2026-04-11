@extends('admin.layouts.app')

@section('title', 'Edit Foto Galeri')
@section('page-title', 'Edit Foto Galeri')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.galeri.index') }}">Galeri</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Foto -->
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-image mr-2 text-info"></i>Foto Galeri</h3>
                        </div>
                        <div class="card-body">
                            <!-- Current Image -->
                            <div class="text-center mb-3">
                                <img id="imgPreview" src="{{ asset('storage/' . $galeri->image) }}"
                                     class="img-fluid rounded shadow-sm" style="max-height:300px; object-fit:contain;"
                                     alt="{{ $galeri->title }}">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Ganti Foto <small class="text-muted">(opsional)</small></label>
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror"
                                       accept="image/*" onchange="previewImage(event)" id="imageInput">
                                <small class="text-muted">Format: JPG, PNG, WebP. Maks: 5MB. Kosongkan jika tidak ingin mengganti.</small>
                                @error('image')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle mr-2 text-success"></i>Informasi Foto</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul Foto <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title', $galeri->title) }}" required>
                                @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                <select name="category" class="form-control">
                                    @foreach(['Umum','Kegiatan','Pembangunan','Alam','Budaya','Infrastruktur'] as $cat)
                                        <option value="{{ $cat }}" {{ old('category', $galeri->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Kegiatan</label>
                                <input type="date" name="activity_date" class="form-control"
                                       value="{{ old('activity_date', $galeri->activity_date ? $galeri->activity_date->format('Y-m-d') : date('Y-m-d')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-info btn-block btn-lg">
                                <i class="fas fa-save mr-2"></i>Update Foto
                            </button>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-block">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                            <hr>
                            <form id="delete-this-galeri" action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-outline-danger btn-block"
                                        onclick="confirmDelete('delete-this-galeri', '{{ addslashes($galeri->title) }}')">
                                    <i class="fas fa-trash mr-2"></i>Hapus Foto Ini
                                </button>
                            </form>
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
                document.getElementById('imgPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
