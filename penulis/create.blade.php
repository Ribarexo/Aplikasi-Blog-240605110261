@extends('layouts.app')

@section('title', 'Tambah Penulis')

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
                <h5 class="fw-semibold text-dark mb-0">Tambah Penulis Baru</h5>
            </div>
            <div class="card-body p-4">
                
                <form action="{{ route('penulis.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama_depan" class="form-label fw-medium">Nama Depan</label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_belakang" class="form-label fw-medium">Nama Belakang</label>
                            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="user_name" class="form-label fw-medium">Username</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Contoh: rizqi_akbar" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="reset" class="btn btn-light px-4">Reset</button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save"></i> Simpan Penulis
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection