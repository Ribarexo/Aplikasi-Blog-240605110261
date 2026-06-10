<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Dashboard — Aplikasi Blog</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style> 
        body { 
            background-color: #f0f2f5; 
        } 
        .navbar { 
            background-color: #ffffff; 
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06); 
        } 
        .navbar-brand { 
            font-weight: 600; 
            color: #3b5bdb !important; 
        } 
        .card { 
            border: none; 
            border-radius: 12px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); 
        } 
        .foto-profil { 
            width: 100px; 
            height: 100px; 
            object-fit: cover; 
            border-radius: 50%; 
            border: 3px solid #e9ecef; 
        } 
        .info-label { 
            font-size: 0.75rem; 
            color: #868e96; 
            text-transform: uppercase; 
            letter-spacing: 0.05em; 
            font-weight: 600; 
        } 
        .info-value { 
            font-size: 0.95rem; 
            color: #212529; 
            font-weight: 500; 
        } 
        .btn-logout { 
            background-color: #fa5252; 
            border-color: #fa5252; 
            color: #ffffff; 
        } 
        .btn-logout:hover { 
            background-color: #e03131; 
            border-color: #e03131; 
            color: #ffffff; 
        } 
    </style> 
</head> 
<body> 
    <nav class="navbar navbar-expand-lg mb-4"> 
        <div class="container"> 
            <span class="navbar-brand"> 
                Aplikasi Blog 
            </span> 
            <div class="ms-auto"> 
                <form action="<?php echo e(route('logout')); ?>" method="POST"> 
                    <?php echo csrf_field(); ?> 
                    <button type="submit" class="btn btn-logout btn-sm px-3"> 
                        Keluar 
                    </button> 
                </form> 
            </div> 
        </div> 
    </nav> 

    <div class="container"> 
        <div class="row justify-content-center"> 
            <div class="col-md-6"> 
                <div class="card"> 
                    <div class="card-body p-4"> 
                        <div class="text-center mb-4"> 
                            <img src="<?php echo e(asset('storage/foto/' . $foto)); ?>" alt="Foto Profil" class="foto-profil mb-3" onerror="this.onerror=null;this.src='https://placehold.co/100/3b5bdb/FFF?text=Foto';"> 
                            <h5 class="fw-semibold mb-0"> 
                                <?php echo e($nama_lengkap); ?> 
                            </h5> 
                            <p class="text-muted small mb-0"> 
                                Penulis Resmi
                            </p> 
                        </div> 
                        <hr class="my-3"> 
                        <div class="row g-3"> 
                            <div class="col-12"> 
                                <div class="info-label mb-1"> 
                                    Waktu Login Anda:
                                </div> 
                                <div class="info-value"> 
                                    <?php echo e($waktu_login); ?> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body> 
</html><?php /**PATH C:\xampp\htdocs\aplikasi-blog\resources\views/dashboard/index.blade.php ENDPATH**/ ?>