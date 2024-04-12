<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMA Tanjung Priok</title>

    <link rel="shortcut icon" href=<?php echo e(asset("assets/image/logosma.png")); ?> type="image/x-icon">
    <link rel="icon" href=<?php echo e(asset("assets/image/logosma.png")); ?> type="image/x-icon" />

    <link rel="stylesheet" href=<?php echo e(asset("./assets/compiled/css/app.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("./assets/compiled/css/app-dark.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("./assets/compiled/css/iconly.css")); ?>>
</head>

<body>
<script src=<?php echo e(asset("assets/static/js/initTheme.js")); ?>></script>
<div id="app">
    <?php echo $__env->make('back.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Dashboard Admin SMA Tanjung Priok Jakarta</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Berita</b></p></h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($berita->COUNT('id')); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Pengumuman</b></p></h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($pengumuman->COUNT('id')); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Blog</b></p></h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($blog->COUNT('id')); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold"><p><b>Prestasi</b></p></h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($prestasi->COUNT('id')); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title"><p><b>Draf Pengumuman</b></p></div>
                            </div>
                        </div>
                        <div class="card-body" style="margin-top: -25px">
                            <?php $__empty_1 = true; $__currentLoopData = $drafPengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="row fs-5" style="margin-bottom: -20px">
                                    <div class="col-2 col-md-2 col-lg-2 ml-3 mt-2 mb-2">
                                        <img src="<?php echo e(asset('storage/pengumuman/gambar/'.$row->gambar)); ?>"  class="img-fluid" alt="bg" width="90">
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8 mt-3 mb-3">
                                        <a class="text-black" style="text-decoration: none; font-size: small; ">
                                            <p><?php echo e($row->judul); ?></p>
                                        </a>

                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1 mt-3 mb-3">
                                        <a href="<?php echo e(route('edit-pengumuman', $row->id)); ?>"
                                           class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title"><p><b>Draf Berita</b></p></div>
                            </div>
                        </div>
                        <div class="card-body" style="margin-top: -25px">
                            <?php $__empty_1 = true; $__currentLoopData = $drafBerita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="row fs-5" style="margin-bottom: -20px">
                                    <div class="col-2 col-md-2 col-lg-2 ml-3 mt-2 mb-2">
                                        <img src="<?php echo e(asset('storage/berita/'.$row->gambar)); ?>"  class="img-fluid" alt="bg" width="90">
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8 mt-3 mb-3">
                                        <a class="text-black" style="text-decoration: none; font-size: small; ">
                                            <p><?php echo e($row->judul); ?></p>
                                        </a>

                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1 mt-3 mb-3">
                                        <a href="<?php echo e(route('edit-berita', $row->id)); ?>"
                                           class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card full-height">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title"><p><b>Draf Blog</b></p></div>
                            </div>

                        </div>
                        <div class="card-body" style="margin-top: -25px">
                            <?php $__empty_1 = true; $__currentLoopData = $drafBlog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="row fs-5" style="margin-bottom: -20px">
                                    <div class="col-2 col-md-2 col-lg-2 ml-3 mt-2 mb-2">
                                        <img src="<?php echo e(asset('storage/blog/'.$row->gambar)); ?>"  class="img-fluid" alt="bg" width="90">
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-8 mt-3 mb-3">
                                        <a class="text-black" style="text-decoration: none; font-size: small; ">
                                            <p><?php echo e($row->judul); ?></p>
                                        </a>

                                    </div>
                                    <div class="col-1 col-md-1 col-lg-1 mt-3 mb-3">
                                        <a href="<?php echo e(route('edit-blog', $row->id)); ?>"
                                           class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src=<?php echo e(asset("assets/static/js/components/dark.js")); ?>></script>
<script src=<?php echo e(asset("assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")); ?>></script>
<script src=<?php echo e(asset("assets/compiled/js/app.js")); ?>></script>


<?php echo $__env->make('back.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Need: Apexcharts -->
<script src=<?php echo e(asset("assets/extensions/apexcharts/apexcharts.min.js")); ?>></script>
<script src=<?php echo e(asset("assets/static/js/pages/dashboard.js")); ?>></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok-2\resources\views/back/admin/dashboard.blade.php ENDPATH**/ ?>