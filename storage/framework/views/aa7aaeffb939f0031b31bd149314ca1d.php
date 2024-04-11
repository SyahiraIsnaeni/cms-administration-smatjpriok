<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>

    <link rel="shortcut icon" href=<?php echo e(asset("./assets/image/logosma.png")); ?> type="image/x-icon">

    <link rel="stylesheet" href=<?php echo e(asset("./assets/compiled/css/app.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("./assets/compiled/css/app-dark.css")); ?>>
</head>

<body>
<script src=<?php echo e(asset("assets/static/js/initTheme.js")); ?>></script>
<div id="app">
    <?php echo $__env->make('back.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data Riwayat Blog</h3>
                    </div>
                </div>
            </div>

            <!-- Bordered table start -->
            <section class="section"  style="margin-top: 30px">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Judul</th>
                                                            <th>Penulis</th>
                                                            <th>Gambar</th>
                                                            <th>Status</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <tr>
                                                                <td class="text-bold-500"><?php echo e($blog->judul); ?></td>
                                                                <td class="text-bold-500"><?php echo e($blog->penulis); ?></td>
                                                                <td><img src=<?php echo e(asset('storage/blog/' . $blog->gambar)); ?> width="100" height="100"></td>
                                                                <td>
                                                                    <?php if($blog->is_active == '1'): ?>
                                                                        Diterbitkan
                                                                    <?php else: ?>
                                                                        Draf
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($blog->updated_at->format('d M Y')); ?></td>
                                                                <td class="text-bold-500">
                                                                    <form method="post" action="<?php echo e(route('restore-riwayat-blog', $blog->id)); ?>" class="d-inline">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('DELETE'); ?>
                                                                        <button class="btn icon btn-primary" style="margin-top: 10px">
                                                                            Restore Data
                                                                        </button>
                                                                    </form>
                                                                    <br>
                                                                    <form method="post" action="<?php echo e(route('delete-riwayat-blog', $blog->id)); ?>" class="d-inline">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('DELETE'); ?>
                                                                        <button class="btn icon btn-danger" style="margin-top: 10px">
                                                                            Hapus Permanen
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <tr>
                                                                <td colspan="7" class="text-center">Data Masih Kosong</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                    <?php echo e($blogs->links()); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Basic Tables start -->
            <section class="section" style="margin-top: 30px">
                <div class="row" id="basic-table">
                    <div class="col-lg-12 col-md-6">
                        <div class="card">
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Tables end -->
        </div>


    </div>
</div>
<script src=<?php echo e(asset("assets/static/js/components/dark.js")); ?>></script>
<script src=<?php echo e(asset("assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")); ?>></script>



<script src=<?php echo e(asset("assets/compiled/js/app.js")); ?>></script>

<?php echo $__env->make('back.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Capstone\sistem-manajemen-konten-dan-administrasi\cms_administration_smatjpriok\resources\views\back\admin\konten\riwayat\blog.blade.php ENDPATH**/ ?>