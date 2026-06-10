@extends('layouts.app')

@section('title', 'Edit Penulis')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="mb-3">
            <a href="{{ route('penulis.index') }}" class="btn btn-secondary btn-sm px-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="fw-semibold text-dark mb-0">Ubah Data Penulis</h5>
            </div>
            <div class="card-body p-4">
                
                <form action="{{ route('penulis.update', $penulis->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama_depan" class="form-label fw-medium">Nama Depan</label>
                            <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" 
                                   id="nama_depan" name="nama_depan" value="{{ old('nama_depan', $penulis->nama_depan) }}" required>
                            @error('nama_depan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama_belakang" class="form-label fw-medium">Nama Belakang</label>
                            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" 
                                   id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang', $penulis->nama_belakang) }}" required>
                            @error('nama_belakang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="user_name" class="form-label fw-medium">Username</label>
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" 
                               id="user_name" name="user_name" value="{{ old('user_name', $penulis->user_name) }}" required>
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-medium">
                            <i class="bi bi-check-lg"></i> Perbarui Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection