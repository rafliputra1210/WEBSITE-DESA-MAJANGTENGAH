@extends('admin.layouts.app')

@section('title', 'Perangkat Desa')
@section('page-title', 'Perangkat Desa')

@section('breadcrumb')
    <li class="breadcrumb-item active">Perangkat Desa</li>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('admin.perangkat.create') }}" class="btn btn-warning">
            <i class="fas fa-user-plus mr-2"></i>Tambah Perangkat Desa
        </a>
    </div>
    <div class="col-auto">
        <span class="badge badge-warning badge-lg p-2" style="font-size:14px;">
            Total: {{ $perangkats->count() }} Anggota
        </span>
    </div>
</div>

<div class="row">
    @forelse($perangkats as $perangkat)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card text-center h-100" style="border-radius:12px;">
            <div class="card-body pt-4">
                @if($perangkat->photo)
                    <img src="{{ asset('storage/' . $perangkat->photo) }}"
                         class="rounded-circle shadow mb-3"
                         style="width:90px;height:90px;object-fit:cover; border:3px solid #28a745;"
                         alt="{{ $perangkat->name }}">
                @else
                    <div class="mx-auto rounded-circle bg-success d-flex align-items-center justify-content-center mb-3"
                         style="width:90px;height:90px; border:3px solid #28a745;">
                        <i class="fas fa-user text-white fa-2x"></i>
                    </div>
                @endif
                <h6 class="font-weight-bold mb-1">{{ $perangkat->name }}</h6>
                <p class="text-muted small mb-2">{{ $perangkat->position }}</p>
                <span class="badge badge-light text-muted border">Urutan: {{ $perangkat->order_number }}</span>
            </div>
            <div class="card-footer p-2 bg-light">
                <div class="btn-group w-100">
                    <a href="{{ route('admin.perangkat.edit', $perangkat) }}" class="btn btn-sm btn-info flex-fill">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form id="delete-perangkat-{{ $perangkat->id }}" action="{{ route('admin.perangkat.destroy', $perangkat) }}" method="POST" style="flex:1;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger w-100"
                                onclick="confirmDelete('delete-perangkat-{{ $perangkat->id }}', '{{ addslashes($perangkat->name) }}')">
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
                <i class="fas fa-users fa-4x mb-3 d-block"></i>
                <h4>Belum ada data perangkat desa</h4>
                <p>Tambahkan anggota perangkat desa untuk ditampilkan di halaman profil.</p>
                <a href="{{ route('admin.perangkat.create') }}" class="btn btn-warning">
                    <i class="fas fa-user-plus mr-2"></i>Tambah Perangkat Desa
                </a>
            </div>
        </div>
    </div>
    @endforelse
</div>
@endsection
