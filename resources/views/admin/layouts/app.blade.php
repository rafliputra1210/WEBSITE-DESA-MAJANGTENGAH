<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') | Desa Majangtengah</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --primary-desa: #1a6b3c;
            --primary-light: #28a745;
            --secondary-desa: #f8c500;
        }
        .main-header.navbar { background-color: var(--primary-desa) !important; }
        .main-sidebar, .sidebar { background-color: #1c2333 !important; }
        .brand-link { background-color: var(--primary-desa) !important; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .brand-link:hover { background-color: #145a32 !important; }
        .sidebar-dark-success .nav-sidebar>.nav-item>.nav-link.active {
            background-color: var(--primary-desa) !important;
            border-radius: 6px;
        }
        .sidebar-dark-success .nav-sidebar>.nav-item>.nav-link:hover {
            background-color: rgba(26,107,60,0.3) !important;
            border-radius: 6px;
        }
        .nav-sidebar .nav-link { border-radius: 6px; margin: 2px 8px; transition: all 0.2s; }
        .content-header h1 { color: #2c3e50; font-weight: 700; }
        .breadcrumb-item a { color: var(--primary-desa); }
        .card { border-radius: 12px; box-shadow: 0 2px 15px rgba(0,0,0,0.08) !important; border: none; }
        .card-header { border-radius: 12px 12px 0 0 !important; }
        .btn-success { background-color: var(--primary-desa) !important; border-color: var(--primary-desa) !important; }
        .btn-success:hover { background-color: #145a32 !important; border-color: #145a32 !important; }
        .sidebar-brand-text { font-size: 1.1rem !important; letter-spacing: 0.5px; }
        .nav-sidebar .nav-item .nav-link .nav-icon { color: rgba(255,255,255,0.6); }
        .info-box { border-radius: 12px; }
        .user-panel .info a { color: #d0f0c0; }
        .small-box { border-radius: 12px; overflow: hidden; }
        .table td, .table th { vertical-align: middle; }
        .badge { border-radius: 6px; padding: 5px 10px; }
        .img-thumbnail-sm { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
        @media (max-width: 768px) { .content-header h1 { font-size: 1.3rem; } }
    </style>

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-dark-success">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link" target="_blank">
                    <i class="fas fa-globe me-1"></i> Lihat Website
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">!</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Notifikasi</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="fas fa-newspaper mr-2 text-success"></i>Kelola konten website</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar -->
    <aside class="main-sidebar sidebar-dark-success elevation-4">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <div class="d-flex align-items-center px-2">
                <div style="width:35px;height:35px;background:var(--secondary-desa);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fas fa-leaf text-dark" style="font-size:16px;"></i>
                </div>
                <span class="brand-text ml-2 sidebar-brand-text font-weight-bold text-white">Admin Desa</span>
            </div>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <div style="width:34px;height:34px;background:var(--primary-light);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-user-shield text-white" style="font-size:14px;"></i>
                    </div>
                </div>
                <div class="info">
                    <a href="#" class="d-block">Administrator</a>
                </div>
            </div>

            <div class="form-inline mb-2">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Cari menu..." aria-label="Search Dashboard">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-header text-muted">KELOLA KONTEN</li>

                    <!-- Beranda -->
                    <li class="nav-item">
                        <a href="{{ route('admin.beranda.index') }}" class="nav-link {{ request()->routeIs('admin.beranda.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Beranda</p>
                        </a>
                    </li>

                    <!-- Profil Desa -->
                    <li class="nav-item">
                        <a href="{{ route('admin.profil.edit') }}" class="nav-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Profil Desa</p>
                        </a>
                    </li>

                    <!-- Berita -->
                    <li class="nav-item">
                        <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Berita</p>
                        </a>
                    </li>

                    <!-- Galeri -->
                    <li class="nav-item">
                        <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Galeri</p>
                        </a>
                    </li>

                    <li class="nav-header text-muted">PENGATURAN</li>

                    <!-- Perangkat Desa -->
                    <li class="nav-item">
                        <a href="{{ route('admin.perangkat.index') }}" class="nav-link {{ request()->routeIs('admin.perangkat.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Perangkat Desa</p>
                        </a>
                    </li>

                    <li class="nav-item mt-3">
                        <a href="{{ url('/') }}" target="_blank" class="nav-link">
                            <i class="nav-icon fas fa-external-link-alt"></i>
                            <p>Lihat Website</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>&copy; {{ date('Y') }} Admin Panel Desa Majangtengah.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>AdminLTE 3</b>
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Auto-hide alerts after 4 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 4000);

    // SweetAlert confirm delete
    function confirmDelete(formId, itemName) {
        Swal.fire({
            title: 'Hapus Data?',
            text: `Data "${itemName}" akan dihapus secara permanen!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>

@stack('scripts')
</body>
</html>
