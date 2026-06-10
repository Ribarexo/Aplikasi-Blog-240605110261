

<?php $__env->startSection('title', 'Kelola Penulis'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-dark mb-0">Daftar Penulis Blog</h4>
    <a href="<?php echo e(route('penulis.create')); ?>" class="btn btn-primary btn-sm px-3 shadow-sm">
        <i class="bi bi-person-plus"></i> Tambah Penulis
    </a>
</div>

<?php if(session('sukses')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('sukses')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

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
                    <?php $__empty_1 = true; $__currentLoopData = $penulis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="ps-4 fw-medium text-secondary"><?php echo e($index + 1); ?></td>
                            <td>
                                <div class="fw-semibold text-dark"><?php echo e($item->nama_depan); ?> <?php echo e($item->nama_belakang); ?></div>
                            </td>
                            <td class="text-muted">@`<?php echo e($item->user_name); ?>`</td>
                            <td>
                                <span class="badge bg-light text-dark border"><?php echo e($item->foto); ?></span>
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="<?php echo e(route('penulis.edit', $item->id)); ?>" class="btn btn-outline-warning btn-sm px-2" title="Ubah">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    
                                    <form action="<?php echo e(route('penulis.destroy', $item->id)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data penulis ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-2" title="Hapus">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-people display-6 d-block mb-2"></i>
                                Belum ada data penulis. Silakan tambahkan data baru!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/penulis/index.blade.php ENDPATH**/ ?>