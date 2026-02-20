@extends('layouts.admin')

@section('namaPage', 'Informasi Website')

@section('main-content')
@if(session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="mb-0 pl-3">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Form Informasi Website</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('profileWeb.storeOrUpdate') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="site_name">Nama Website <span class="text-danger">*</span></label>
                        <input type="text" name="site_name" id="site_name" class="form-control"
                            value="{{ old('site_name', $profile->site_name ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $profile->description ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" rows="3" class="form-control">{{ old('address', $profile->address ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="map_link">Link Map</label>
                        <input type="url" name="map_link" id="map_link" class="form-control"
                            value="{{ old('map_link', $profile->map_link ?? '') }}"
                            placeholder="https://maps.google.com/...">
                    </div>

                    <div class="form-group">
                        <label for="complaint_link">Link Pengaduan</label>
                        <input type="url" name="complaint_link" id="complaint_link" class="form-control"
                            value="{{ old('complaint_link', $profile->complaint_link ?? '') }}"
                            placeholder="https://...">
                    </div>

                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                            value="{{ old('phone', $profile->phone ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" id="fax" class="form-control"
                            value="{{ old('fax', $profile->fax ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $profile->email ?? '') }}">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Informasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Ringkasan</h5>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Nama Website:</strong><br>{{ $profile->site_name ?? '-' }}</p>
                <p class="mb-2"><strong>Deskripsi:</strong><br>{{ $profile->description ?? '-' }}</p>
                <p class="mb-2"><strong>Alamat:</strong><br>{{ $profile->address ?? '-' }}</p>
                <p class="mb-2"><strong>Link Map:</strong><br>{{ $profile->map_link ?? '-' }}</p>
                <p class="mb-2"><strong>Link Pengaduan:</strong><br>{{ $profile->complaint_link ?? '-' }}</p>
                <p class="mb-2"><strong>Telepon:</strong><br>{{ $profile->phone ?? '-' }}</p>
                <p class="mb-2"><strong>Fax:</strong><br>{{ $profile->fax ?? '-' }}</p>
                <p class="mb-0"><strong>Email:</strong><br>{{ $profile->email ?? '-' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
