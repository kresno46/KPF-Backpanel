@extends('layouts.admin')

@section('namaPage', ' Beranda')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Wakil Pialang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['wakil_total'] }}</div>
                <small class="text-muted d-block">Aktif: {{ $widget['wakil_aktif'] }}</small>
                <small class="text-muted d-block">Nonaktif: {{ $widget['wakil_nonaktif'] }}</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kategori Wakil</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['kategori'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Berita</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['berita'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Karier</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['karier'] }}</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Banner</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['banner'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Produk JFX</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['jfx'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Produk SPA</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['spa'] }}</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Users</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Update Terbaru Wakil Pialang</h6>
                <a href="{{ route('kategori-wakil.index') }}" class="small">Lihat semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latest['wakil'] as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategoriWakilPialang->nama_kategori ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-{{ $item->status === 'aktif' ? 'success' : 'danger' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>{{ $item->updated_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Belum ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Berita Terbaru</h6>
                <a href="{{ route('berita.index') }}" class="small">Lihat semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latest['berita'] as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->updated_at->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-3">Belum ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
