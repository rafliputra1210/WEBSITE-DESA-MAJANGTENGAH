@extends('admin.layouts.app')

@section('title', 'Edit Perangkat Desa')
@section('page-title', 'Edit Perangkat Desa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.perangkat.index') }}">Perangkat Desa</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('admin.perangkat.update', $perangkat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user-edit mr-2 text-info"></i>Edit Data Perangkat Desa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                @if($perangkat->photo)
                                    <img id="photoPreview" src="{{ asset('storage/' . $perangkat->photo) }}"
                                         class="rounded-circle shadow" style="width:120px;height:120px;object-fit:cover;" alt="{{ $perangkat->name }}">
                                @else
                                    <div id="photoPlaceholder" class="mx-auto rounded-circle bg-light border d-flex align-items-center justify-content-center"
                                         style="width:120px;height:120px;">
                                        <i class="fas fa-user fa-3x text-muted"></i>
                                    </div>
                                    <img id="photoPreview" src="#" class="rounded-circle shadow"
                                         style="width:120px;height:120px;object-fit:cover;display:none;" alt="Preview">
                                @endif
                            </div>
                            <input type="file" name="photo" id="photoInput" accept="image/*" style="display:none;"
                                   onchange="previewPhoto(event)">
                            <button type="button" class="btn btn-outline-info btn-sm" onclick="document.getElementById('photoInput').click()">
                                <i class="fas fa-sync mr-1"></i>Ganti Foto
                            </button>
                            <small class="text-muted d-block mt-1">Kosongkan jika tidak ganti.</small>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       value="{{ old('name', $perangkat->name) }}" required>
                                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jabatan / Posisi <span class="text-danger">*</span></label>
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"
                                       value="{{ old('position', $perangkat->position) }}" required>
                                @error('position')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Urutan Tampil</label>
                                <input type="number" name="order_number" class="form-control"
                                       value="{{ old('order_number', $perangkat->order_number) }}" min="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-info btn-lg">
                        <i class="fas fa-save mr-2"></i>Update Data
                    </button>
                    <a href="{{ route('admin.perangkat.index') }}" class="btn btn-outline-secondary btn-lg ml-2">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                    <form id="delete-this-perangkat" action="{{ route('admin.perangkat.destroy', $perangkat) }}" method="POST" class="d-inline mt-2 float-right">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-danger btn-lg"
                                onclick="confirmDelete('delete-this-perangkat', '{{ addslashes($perangkat->name) }}')">
                            <i class="fas fa-trash mr-2"></i>Hapus
                        </button>
                    </form>
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
                const placeholder = document.getElementById('photoPlaceholder');
                if (placeholder) placeholder.style.display = 'none';
                const img = document.getElementById('photoPreview');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
