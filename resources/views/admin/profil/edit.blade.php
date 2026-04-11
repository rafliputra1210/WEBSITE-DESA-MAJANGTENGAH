@extends('admin.layouts.app')

@section('title', 'Edit Profil Desa')
@section('page-title', 'Profil Desa')

@section('breadcrumb')
    <li class="breadcrumb-item active">Profil Desa</li>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <div class="card" style="background: linear-gradient(135deg, #6f42c1 0%, #9c6ef3 100%);">
            <div class="card-body py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="text-white mb-0"><i class="fas fa-info-circle mr-2"></i>Informasi profil desa yang tampil di halaman <strong>Profil & Visi Misi</strong> website.</p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/profil') }}" target="_blank" class="btn btn-light btn-sm">
                            <i class="fas fa-eye mr-1"></i> Preview Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <!-- Identitas Desa -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-id-card mr-2 text-purple" style="color:#6f42c1;"></i>Identitas Desa</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Desa <span class="text-danger">*</span></label>
                        <input type="text" name="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror"
                               value="{{ old('nama_desa', $profil->nama_desa ?? 'Majangtengah') }}" required>
                        @error('nama_desa')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control"
                               value="{{ old('kecamatan', $profil->kecamatan ?? '') }}"
                               placeholder="Contoh: Dampit">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Kabupaten</label>
                                <input type="text" name="kabupaten" class="form-control"
                                       value="{{ old('kabupaten', $profil->kabupaten ?? '') }}"
                                       placeholder="Contoh: Malang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control"
                                       value="{{ old('provinsi', $profil->provinsi ?? 'Jawa Timur') }}"
                                       placeholder="Contoh: Jawa Timur">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Kode Pos</label>
                        <input type="text" name="kode_pos" class="form-control"
                               value="{{ old('kode_pos', $profil->kode_pos ?? '') }}"
                               placeholder="Contoh: 65181">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat Kantor Desa</label>
                        <textarea name="alamat" class="form-control" rows="3"
                                  placeholder="Tulis alamat lengkap kantor desa...">{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Telepon / WhatsApp</label>
                                <input type="text" name="telepon" class="form-control"
                                       value="{{ old('telepon', $profil->telepon ?? '') }}"
                                       placeholder="Contoh: 0341-xxxxxx">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email', $profil->email ?? '') }}"
                                       placeholder="desa@mail.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visi Misi -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bullseye mr-2 text-danger"></i>Visi & Misi</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Visi Desa</label>
                        <textarea name="visi" class="form-control" rows="3"
                                  placeholder="Tulis visi desa...">{{ old('visi', $profil->visi ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Misi Desa</label>
                        <textarea name="misi" class="form-control" rows="6"
                                  placeholder="Tulis misi desa, pisahkan dengan Enter untuk setiap poin...">{{ old('misi', $profil->misi ?? '') }}</textarea>
                        <small class="text-muted">Tips: Tulis setiap misi pada baris baru untuk tampilan yang lebih rapi.</small>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Sejarah Singkat Desa</label>
                        <textarea name="sejarah" class="form-control" rows="5"
                                  placeholder="Tulis sejarah singkat desa...">{{ old('sejarah', $profil->sejarah ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik & Media -->
        <div class="col-md-4">
            <!-- Foto Kepala Desa -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user-tie mr-2 text-success"></i>Kepala Desa</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Kepala Desa</label>
                        <input type="text" name="nama_kades" class="form-control"
                               value="{{ old('nama_kades', $profil->nama_kades ?? '') }}"
                               placeholder="Nama lengkap kepala desa">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Masa Jabatan</label>
                        <input type="text" name="masa_jabatan" class="form-control"
                               value="{{ old('masa_jabatan', $profil->masa_jabatan ?? '') }}"
                               placeholder="Contoh: 2020 - 2026">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Kata Sambutan</label>
                        <textarea name="sambutan" class="form-control" rows="4"
                                  placeholder="Kata sambutan dari kepala desa...">{{ old('sambutan', $profil->sambutan ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Foto Kepala Desa</label>
                        @if(isset($profil) && $profil->foto_kades)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $profil->foto_kades) }}" class="img-fluid rounded" style="max-height:120px;" alt="Foto Kades">
                            </div>
                        @endif
                        <input type="file" name="foto_kades" class="form-control-file @error('foto_kades') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG. Maks: 2MB</small>
                        @error('foto_kades')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <!-- Data Statistik -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-bar mr-2 text-info"></i>Data Statistik</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Jumlah Penduduk</label>
                        <input type="text" name="jumlah_penduduk" class="form-control"
                               value="{{ old('jumlah_penduduk', $profil->jumlah_penduduk ?? '') }}"
                               placeholder="Contoh: 4.500">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jumlah KK</label>
                        <input type="text" name="jumlah_kk" class="form-control"
                               value="{{ old('jumlah_kk', $profil->jumlah_kk ?? '') }}"
                               placeholder="Contoh: 1.200">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Luas Wilayah (Ha)</label>
                        <input type="text" name="luas_wilayah" class="form-control"
                               value="{{ old('luas_wilayah', $profil->luas_wilayah ?? '') }}"
                               placeholder="Contoh: 450">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jumlah RT</label>
                        <input type="text" name="jumlah_rt" class="form-control"
                               value="{{ old('jumlah_rt', $profil->jumlah_rt ?? '') }}"
                               placeholder="Contoh: 12">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jumlah RW</label>
                        <input type="text" name="jumlah_rw" class="form-control"
                               value="{{ old('jumlah_rw', $profil->jumlah_rw ?? '') }}"
                               placeholder="Contoh: 4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save mr-2"></i>Simpan Profil Desa
                    </button>
                    <a href="{{ url('/profil') }}" target="_blank" class="btn btn-outline-secondary btn-lg ml-2">
                        <i class="fas fa-eye mr-1"></i> Preview Halaman Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
