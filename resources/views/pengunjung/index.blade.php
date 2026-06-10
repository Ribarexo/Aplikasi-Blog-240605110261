@extends('layouts.frontend')

@section('title', 'Beranda')

@section('content')
<!-- Header Blog (Sesuai Lampiran 1) -->
<div class="row mb-5">
    <div class="col-12 text-start">
        <h2 class="fw-bold text-dark mb-1">Blog Kami</h2>
        <p class="text-muted">Artikel terbaru seputar teknologi dan pemrograman</p>
        <hr class="text-muted opacity-25">
    </div>
</div>

<div class="row">
    <!-- KOLOM KIRI: Daftar 5 Artikel Terbaru -->
    <div class="col-md-8">
        @forelse($articles as $article)
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <!-- Judul Artikel -->
                    <h4 class="fw-bold text-dark mb-3">
                        <a href="{{ route('blog.show', $article->id) }}" class="text-decoration-none text-dark hover-primary">
                            {{ $article->judul }}
                        </a>
                    </h4>
                    
                    <!-- Meta Data: Tanggal (Bisa Hardcode Tahun 2026 Sesuai Soal) -->
                    <div class="d-flex align-items-center gap-2 mb-3 text-muted small">
                        <span class="badge bg-primary text-white px-2 py-1 fw-semibold">
                            {{ $article->kategoriArtikel->nama_kategori ?? 'Umum' }}
                        </span>
                        <span>•</span>
                        <span class="text-secondary">
                            <i class="bi bi-calendar3 me-1"></i> Juni 2026
                        </span>
                        <span>•</span>
                        <span class="text-secondary fw-medium">
                            <i class="bi bi-person me-1"></i> By: {{ $article->penulis->nama_depan ?? 'Anonim' }}
                        </span>
                    </div>

                    <!-- Cuplikan Isi Artikel -->
                    <p class="text-secondary lh-lg mb-4 text-justify">
                        {{ Str::limit($article->isi, 220, '...') }}
                    </p>

                    <!-- Tombol Baca Selengkapnya -->
                    <a href="{{ route('blog.show', $article->id) }}" class="btn btn-success btn-sm px-3 rounded-pill text-white fw-medium">
                        Baca Selengkapnya <i class="bi bi-arrow-right small ms-1"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="card p-5 text-center text-muted shadow-sm">
                <i class="bi bi-journal-x display-4 mb-3 text-secondary"></i>
                <h5>Belum ada artikel yang diterbitkan untuk kategori ini.</h5>
                <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm mt-3 px-3">Tampilkan Semua Artikel</a>
            </div>
        @endforelse
    </div>

    <!-- KOLOM KANAN: Widget Kategori Artikel (Sesuai Lampiran 1) -->
    <div class="col-md-4">
        <div class="card shadow-sm mb-4 position-sticky" style="top: 20px;">
            <div class="card-header bg-white py-3 border-bottom border-light">
                <h5 class="fw-bold text-dark mb-0">Kategori Artikel</h5>
            </div>
            <div class="list-group list-group-flush p-2">
                <!-- Pilihan Semua Artikel -->
                <a href="{{ route('blog.index') }}" 
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center border-0 rounded-3 mb-1 fw-medium {{ !$selectedCategory ? 'bg-primary text-white' : 'text-secondary' }}">
                    <span><i class="bi bi-collection me-2"></i> Semua Artikel</span>
                </a>

                <!-- Loop Data Kategori dari Database -->
                @foreach($categories as $category)
                    <a href="{{ route('blog.index', ['kategori' => $category->id]) }}" 
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-center border-0 rounded-3 mb-1 fw-medium {{ $selectedCategory == $category->id ? 'bg-primary text-white' : 'text-secondary' }}">
                        <span><i class="bi bi-hash me-1"></i> {{ $category->nama_kategori }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection