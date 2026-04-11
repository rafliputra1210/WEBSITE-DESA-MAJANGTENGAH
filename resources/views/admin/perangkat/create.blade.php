@extends('admin.layouts.app')

@section('title', 'Tambah Perangkat Desa')
@section('page-title', 'Tambah Perangkat Desa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.perangkat.index') }}">Perangkat Desa</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user-plus mr-2 text-warning"></i>Data Perangkat Desa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div id="photoContainer" class="mb-3">
                                <div id="photoPlaceholder" class="mx-auto rounded-circle bg-light border d-flex align-items-center justify-content-center"
                                     style="width:120px;height:120px;cursor:pointer;"
                                     onclick="document.getElementById('photoInput').click()">
                                    <i class="fas fa-camera fa-2x text-muted"></i>
                                </div>
                                <img id="photoPreview" src="#" class="rounded-circle shadow"
                                     style="width:120px;height:120px;object-fit:cover;display:none;"
                                     alt="Preview">
                            </div>
                            <input type="file" name="photo" id="photoInput" accept="image/*" style="display:none;"
                                   onchange="previewPhoto(event)">
                            <button type="button" class="btn btn-outline-success btn-sm" onclick="document.getElementById('photoInput').click()">
                                <i class="fas fa-camera mr-1"></i>Pilih Foto
                            </button>
                            <small class="text-muted d-block mt-1">Foto profil perangkat desa</small>
                            @error('photo')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" required placeholder="Nama lengkap">
                                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan / Posisi <span class="text-danger">*</span></label>
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"
                                       value="{{ old('position') }}" required placeholder="Contoh: Kepala Desa, Sekretaris, Bendahara...">
                                @error('position')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Urutan Tampil</label>
                                <input type="number" name="order_number" class="form-control"
                                       value="{{ old('order_number', 0) }}" min="0"
                                       placeholder="0 = pertama">
                                <small class="text-muted">Semakin kecil angka, semakin awal tampil.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-warning btn-lg">
                        <i class="fas fa-save mr-2"></i>Simpan Data
                    </button>
                    <a href="{{ route('admin.perangkat.index') }}" class="btn btn-outline-secondary btn-lg ml-2">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewPhoto(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('photoPlaceholder').style.display = 'none';
                const img = document.getElementById('photoPreview');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
