@extends('layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0">Daftar Kategori Artikel</h4>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
        <i class="bi bi-plus-lg"></i> Tambah Kategori
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="8%" class="ps-4">No</th>
                        <th width="30%">Nama Kategori</th>
                        <th width="42%">Keterangan</th>
                        <th width="20%" class="text-center pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $index => $item)
                        <tr>
                            <td class="ps-4 fw-medium text-secondary">{{ $index + 1 }}</td>
                            <td class="fw-semibold text-dark">{{ $item->nama_kategori }}</td>
                            <td class="text-muted">{{ $item->keterangan ?? '-' }}</td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-outline-warning btn-sm px-2" title="Ubah">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-2" title="Hapus">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x display-6 d-block mb-2"></i>
                                Belum ada data kategori. Silakan tambahkan data baru!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection