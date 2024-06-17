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
    <?php echo $__env->make('back.perpustakaan.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <h3>Data Peminjaman Buku Perpustakaan</h3>
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
                                    <div class="card-header" style="display: flex">
                                        <div class="card-head-row" style="margin-left: -20px">
                                            <a href="<?php echo e(route("add-peminjaman-perpus")); ?>" class="btn btn-info btn=sm ml-auto"> <i class="bi bi-plus-circle" style="margin-right: 4px"></i>Tambah Data</a>
                                        </div>
                                    </div>
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Nama Peminjam</th>
                                                            <th>Kelas</th>
                                                            <th>Telepon</th>
                                                            <th>Judul Buku</th>
                                                            <th>Jumlah</th>
                                                            <th>Status</th>
                                                            <th>Tanggal Dikembalikan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__empty_1 = true; $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <tr>
                                                                <td class="text-bold-500"><?php echo e($row->nama); ?></td>
                                                                <td class="text-bold-500"><?php echo e($row->kelas); ?></td>
                                                                <td class="text-bold-500"><?php echo e($row->telepon); ?></td>
                                                                <td class="text-bold-500"><?php echo e($row->buku->judul); ?></td>
                                                                <td class="text-bold-500"><?php echo e($row->jumlah); ?></td>
                                                                <?php if($row->status == 1): ?>
                                                                    <td class="text-bold-500">Dikembalikan</td>
                                                                <?php elseif($row->status == 0): ?>
                                                                    <td class="text-bold-500">Belum Dikembalikan</td>
                                                                <?php endif; ?>
                                                                <?php if($row->tanggal_dikembalikan == null): ?>
                                                                    <td class="text-bold-500">-</td>
                                                                <?php elseif($row->tanggal_dikembalikan != null): ?>
                                                                    <td class="text-bold-500"><?php echo e(\Carbon\Carbon::parse($row->tanggal)->format('d-m-Y')); ?></td>
                                                                <?php endif; ?>
                                                                <td class="text-bold-500">
                                                                    <?php if($row->status == 0): ?>
                                                                        <a href="<?php echo e(route('edit-peminjaman-perpus', ['id' => $row->id])); ?>" class="btn icon btn-primary">
                                                                            <i class="bi bi-pencil"></i>
                                                                        </a>
                                                                        <form method="post" action="<?php echo e(route('delete-peminjaman-perpus', $row->id)); ?>" class="d-inline">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('DELETE'); ?>
                                                                            <button class="btn icon btn-danger" style="margin-left: 5px">
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    <?php endif; ?>
                                                                    <?php if($row->status == 0): ?>
                                                                        <form method="post" action="<?php echo e(route('dikembalikan-peminjaman-perpus', $row->id)); ?>" class="d-inline">
                                                                            <?php echo csrf_field(); ?>
                                                                            <button class="btn icon btn-success" style="margin-left: 5px">
                                                                                Dikembalikan
                                                                            </button>
                                                                        </form>
                                                                    <?php elseif($row->status == 1): ?>
                                                                        <form method="post" action="<?php echo e(route('batal-dikembalikan-peminjaman-perpus', $row->id)); ?>" class="d-inline">
                                                                            <?php echo csrf_field(); ?>
                                                                            <button class="btn icon btn-warning" style="margin-left: 5px">
                                                                                Batal Dikembalikan
                                                                            </button>
                                                                        </form>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <tr>
                                                                <td colspan="7" class="text-center">Data Masih Kosong</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                    <?php echo e($peminjaman->links()); ?>

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
<?php /**PATH C:\xampp\htdocs\Capstone\sistem-manajemen-konten-dan-administrasi\cms_administration_smatjpriok\resources\views/back/perpustakaan/peminjaman/view.blade.php ENDPATH**/ ?>