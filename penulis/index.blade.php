@extends('layouts.app')

@section('title', 'Kelola Penulis')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0">Daftar Penulis Blog</h4>
    <a href="{{ route('penulis.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
        <i class="bi bi-person-plus"></i> Tambah Penulis
    </a>
</div>

@if(session('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="8%" class="ps-4">No</th>
                        <th width="32%">Nama Lengkap</th>
                        <th width="25%">Username</th>
                        <th width="15%">Foto</th>
                        <th width="20%" class="text-center pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penulis as $index => $item)
                        <tr>
                            <td class="ps-4 fw-medium text-secondary">{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-semibold text-dark">{{ $item->nama_depan }} {{ $item->nama_belakang }}</div>
                            </td>
                            <td class="text-muted">@`{{ $item->user_name }}`</td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $item->foto }}</span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('penulis.edit', $item->id) }}" class="btn btn-outline-warning btn-sm px-2" title="Ubah">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    
                                    <form action="{{ route('penulis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data penulis ini?')">
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
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-people display-6 d-block mb-2"></i>
                                Belum ada data penulis. Silakan tambahkan data baru!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection