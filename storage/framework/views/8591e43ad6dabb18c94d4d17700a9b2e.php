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
                        <h3>Data Mata Pelajaran <?php echo e($kelas->nama_kelas); ?></h3>
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
                                    <div class="card-header" style="display: flex;margin-left: -20px">
                                        <div class="card-head-row">
                                            <a href="<?php echo e(route("mapel")); ?>" class="btn btn-warning ml-auto"> <i class="bi bi-arrow-left-circle"></i> Kembali </a>
                                        </div>
                                        <div class="card-head-row" style="margin-left: 10px">
                                            <a href="<?php echo e(route('add-mapel', ['kelasId' => $kelas->id])); ?>" class="btn btn-info btn=sm ml-auto"> <i class="bi bi-plus-circle" style="margin-right: 4px"></i>Tambah Data</a>
                                        </div>
                                        <div class="card-head-row" style="margin-left: 10px">
                                            <form action="<?php echo e(route('reset-mapel', ['kelasId' => $kelas->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger ml-auto">
                                                    <i class="bi bi-arrow-clockwise" style="margin-right: 4px"></i> Reset Data
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Nama Mata Pelajaran</th>
                                                            <th>Nama Guru Pengajar</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__empty_1 = true; $__currentLoopData = $mapels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <tr>
                                                                <td class="text-bold-500"><?php echo e($row->nama); ?></td>
                                                                <td class="text-bold-500"><?php echo e($row->guru->nama); ?></td>
                                                                <td class="text-bold-500">
                                                                    <a href="<?php echo e(route('edit-mapel', ['id' => $row->id, 'kelasId' => $kelas->id])); ?>" class="btn icon btn-primary">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                    <br>
                                                                    <form method="post" action="<?php echo e(route('delete-mapel', ['id' => $row->id, 'kelasId' => $kelas->id])); ?>" class="d-inline">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('DELETE'); ?>
                                                                        <button class="btn icon btn-danger" style="margin-top: 10px">
                                                                            <i class="bi bi-trash"></i>
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
                                                    <?php echo e($mapels->links()); ?>

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
<?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok-2\resources\views/back/admin/data/mapel/view-mapel.blade.php ENDPATH**/ ?>