<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>

    <link rel="shortcut icon" href=<?php echo e(asset("../assets/image/logosma.png")); ?> type="image/x-icon">
    <link rel="stylesheet" href=<?php echo e(asset("../assets/extensions/quill/quill.snow.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("../assets/extensions/quill/quill.bubble.css")); ?>>

    <link rel="stylesheet" href=<?php echo e(asset("../assets/compiled/css/app.css")); ?>>
    <link rel="stylesheet" href=<?php echo e(asset("../assets/compiled/css/app-dark.css")); ?>>
</head>

<body>
<script src=<?php echo e(asset("../assets/static/js/initTheme.js")); ?>></script>
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
                        <h3>Tambah Data Ekstrakurikuler</h3>
                    </div>
                </div>
            </div>

            <section id="input-style" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <a href="/dashboard/beranda/ekstrakurikuler" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i> Kembali </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('add-ekstrakurikuler')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="squareText">Nama Ekstrakurikuler</label>
                                                <input type="text" id="squareText" class="form-control square"
                                                       placeholder="Ekstrakurikuler" name="nama">
                                            </div>
                                            <div class="form-group" style="margin-top: 20px">
                                                <label for="squareText">Deskripsi Ekstrakurikuler</label>
                                                <textarea type="text" class="form-control square"
                                                          placeholder="Deskripsi" name="deskripsi" style="height: 200px"></textarea>
                                            </div>
                                            <div class="form-group" style="margin-top: 20px">
                                                <label for="formFile" class="form-label">Logo Ekstrakurikuler (.jpg, .png, .jpeg)</label>
                                                <input class="form-control" type="file" id="formFile" name="logo">
                                            </div>
                                            <div class="form-group" style="margin-top: 20px">
                                                <label for="formFile" class="form-label">Foto Kegiatan Ekstrakurikuler (.jpg, .png, .jpeg)</label>
                                                <input class="form-control" name="images[]" type="file" id="formFileMultiple" multiple>
                                            </div>
                                            <div class="form-group" style="margin-top: 20px">
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
<script src=<?php echo e(asset("../assets/static/js/components/dark.js")); ?>></script>
<script src=<?php echo e(asset("../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")); ?>></script>


<?php echo $__env->make('back.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src=<?php echo e(asset("../assets/compiled/js/app.js")); ?>></script>

<script src=<?php echo e(asset("../assets/extensions/quill/quill.min.js")); ?>></script>
<script src=<?php echo e(asset("../assets/static/js/pages/quill.js")); ?>></script>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok-2\resources\views/back/admin/konten/beranda/ekstrakurikuler/add.blade.php ENDPATH**/ ?>