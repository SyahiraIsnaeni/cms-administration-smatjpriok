<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <link rel="stylesheet" href=<?php echo e(asset("../assets/extensions/quill/quill.snow.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("../assets/extensions/quill/quill.bubble.css")); ?>>

    <link rel="shortcut icon" href=<?php echo e(asset("../../assets/image/logosma.png")); ?> type="image/x-icon">

    <link rel="stylesheet" href=<?php echo e(asset("../../assets/compiled/css/app.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("../../assets/compiled/css/app-dark.css")); ?>>
</head>

<body>
<script src=<?php echo e(asset("../../assets/static/js/initTheme.js")); ?>></script>
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
                        <h3>Edit Data Guru</h3>
                    </div>
                </div>
            </div>

            <section id="input-style" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <a href="<?php echo e(route("guru")); ?>" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i></i> Kembali </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" action="<?php echo e(route('edit-guru', $guru->id)); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <div class="form-group">
                                                <label for="squareText">Nama Lengkap</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Nama Guru" name="nama" value="<?php echo e($guru->nama); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">NIP</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="NIP Guru" name="nip" value="<?php echo e($guru->nip); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Jabatan</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Jabatan Guru" name="jabatan" value="<?php echo e($guru->jabatan); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Foto Guru (.jpg, .png, .jpeg)</label>
                                                <input class="form-control" type="file" id="formFile" name="foto">
                                                <br>
                                                <label for="formFile" class="form-label" style="color: red">Foto saat ini</label> <br>
                                                <?php if($guru->foto): ?>
                                                    <img src="<?php echo e(asset('storage/guru/'.$guru->foto)); ?>" width="100" style="margin-left: 10px">
                                                <?php else: ?>
                                                    <p>Belum ada foto</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Email (opsional)</label>
                                                <input type="email" id="squareText" class="form-control square" placeholder="Email Guru" name="email" value="<?php echo e($guru->email); ?>">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-info btn-sm" type="submit"> Simpan </button>
                                                <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Input Style end -->
        </div>

    </div>
</div>
<script src=<?php echo e(asset("../../assets/static/js/components/dark.js")); ?>></script>
<script src=<?php echo e(asset("../../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")); ?>></script>


<script src=<?php echo e(asset("../assets/extensions/quill/quill.min.js")); ?>></script>
<script src=<?php echo e(asset("../assets/static/js/pages/quill.js")); ?>></script>

<?php echo $__env->make('back.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src=<?php echo e(asset("../../assets/compiled/js/app.js")); ?>></script>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\Capstone\sistem-manajemen-konten-dan-administrasi\cms_administration_smatjpriok\resources\views/back/admin/data/guru/edit.blade.php ENDPATH**/ ?>