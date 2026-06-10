<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - Blog Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        footer {
            background-color: #212529;
            color: #bcbcbc;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('blog.index')); ?>">Blog Kami</a>
            <button class="navbar-expand-lg navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('blog.index')); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="#">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="#">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="#">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mb-5">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; <?php echo e(date('Y')); ?> Blog Kami. Seluruh hak cipta dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>