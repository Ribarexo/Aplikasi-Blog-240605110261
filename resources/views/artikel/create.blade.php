@extends('layouts.app')

@section('title', 'Buat Artikel Baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="mb-3">
            <a href="{{ route('artikel.index') }}" class="btn btn-secondary btn-sm px-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="fw-semibold text-dark mb-0">Tulis Artikel Baru</h5>
            </div>
            <div class="card-body p-4">
                
                <form action="{{ route('artikel.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label fw-medium">Judul Artikel</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul') }}" 
                               placeholder="Masukkan judul artikel yang menarik..." required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="id_kategori" class="form-label fw-medium">Pilih Kategori</label>
                            <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->id }}" {{ old('id_kategori') == $kat->id ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="id_penulis" class="form-label fw-medium">Pilih Penulis</label>
                            <select class="form-select @error('id_penulis') is-invalid @enderror" id="id_penulis" name="id_penulis" required>
                                <option value="">-- Pilih Penulis --</option>
                                @foreach($penulis as $pen)
                                    <option value="{{ $pen->id }}" {{ old('id_penulis') == $pen->id ? 'selected' : '' }}>
                                        {{ $pen->nama_depan }} {{ $pen->nama_belakang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_penulis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="form-label fw-medium">Isi Artikel / Konten</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" 
                                  id="isi" name="isi" rows="8" 
                                  placeholder="Tuliskan seluruh konten artikel Anda di sini..." required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="reset" class="btn btn-light px-4">Reset</button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send"></i> Terbitkan Artikel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection