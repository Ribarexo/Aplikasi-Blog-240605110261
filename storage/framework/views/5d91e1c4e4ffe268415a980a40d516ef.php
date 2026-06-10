

<?php $__env->startSection('title', $article->judul); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-outline-secondary btn-sm px-3 rounded-pill fw-medium">
            <i class="bi bi-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card shadow-sm">
            <div class="card-body p-4 p-md-5">
                <span class="badge bg-primary text-white px-3 py-2 rounded-pill fw-semibold mb-3">
                    <?php echo e($article->kategoriArtikel->nama_kategori ?? 'Umum'); ?>

                </span>

                <h1 class="fw-bold text-dark mb-3 lh-base"><?php echo e($article->judul); ?></h1>

                <div class="d-flex align-items-center gap-3 text-muted small pb-4 mb-4 border-bottom border-light">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle fs-5 me-2 text-secondary"></i>
                        <div>
                            <span class="text-dark fw-semibold">By: <?php echo e($article->penulis->nama_depan ?? 'Anonim'); ?> <?php echo e($article->penulis->nama_belakang ?? ''); ?></span>
                        </div>
                    </div>
                    <div class="text-secondary">|</div>
                    <div>
                        <i class="bi bi-calendar3 me-1"></i> Juni 2026
                    </div>
                </div>

                <div class="text-secondary lh-lg fs-5 text-justify" style="white-space: pre-line;">
                    <?php echo e($article->isi); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm position-sticky" style="top: 20px;">
            <div class="card-header bg-white py-3 border-bottom border-light">
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-journal-text me-2 text-primary"></i>Artikel Terkait</h5>
            </div>
            <div class="list-group list-group-flush p-2">
                <?php $__empty_1 = true; $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('blog.show', $related->id)); ?>" class="list-group-item list-group-item-action border-0 rounded-3 mb-2 p-3 bg-light-hover">
                        <h6 class="fw-bold text-dark mb-1 text-truncate-2"><?php echo e($related->judul); ?></h6>
                        <span class="small text-muted"><i class="bi bi-calendar3 me-1"></i> Juni 2026</span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-3 text-center text-muted small">
                        <i class="bi bi-info-circle d-block mb-1 fs-5"></i>
                        Tidak ada artikel terkait lainnya dalam kategori ini.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
    .bg-light-hover:hover {
        background-color: #f1f3f5;
        transition: 0.2s;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/pengunjung/show.blade.php ENDPATH**/ ?>