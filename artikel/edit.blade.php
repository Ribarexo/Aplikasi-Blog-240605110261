@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <!-- Tombol Kembali -->
        <div class="mb-3">
            <a href="{{ route('artikel.index') }}" class="btn btn-secondary btn-sm px-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="fw-semibold text-dark mb-0">Ubah Artikel</h5>
            </div>
            <div class="card-body p-4">
                
                <!-- Form Edit Artikel -->
                <form action="{{ route('artikel.update', $artikel->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Input Judul Artikel -->
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-medium">Judul Artikel</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <!-- Dropdown Kategori Artikel -->
                        <div class="col-md-6">
                            <label for="id_kategori" class="form-label fw-medium">Pilih Kategori</label>
                            <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ old('id_kategori', $artikel->id_kategori) == $kat->id ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Dropdown Penulis Artikel -->
                        <div class="col-md-6">
                            <label for="id_penulis" class="form-label fw-medium">Pilih Penulis</label>
                            <select class="form-select @error('id_penulis') is-invalid @enderror" id="id_penulis" name="id_penulis" required>
                                <option value="">-- Pilih Penulis --</option>
                                @foreach($penulis as $pen)
                                    <option value="{{ $pen->id }}" {{ old('id_penulis', $artikel->id_penulis) == $pen->id ? 'selected' : '' }}>
                                        {{ $pen->nama_depan }} {{ $pen->nama_belakang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Input Isi Artikel -->
                    <div class="mb-4">
                        <label for="isi" class="form-label fw-medium">Isi Artikel / Konten</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" 
                                  id="isi" name="isi" rows="8" required>{{ old('isi', $artikel->isi) }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Aksi Simpan Perubahan -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-medium">
                            <i class="bi bi-check-lg"></i> Perbarui Artikel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection