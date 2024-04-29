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
    <link
        rel="stylesheet"
        href=<?php echo e(asset("../editor/richtexteditor/rte_theme_default.css")); ?>

    />
    <script
        type="text/javascript"
        src=<?php echo e(asset("../editor/richtexteditor/rte.js")); ?>

    ></script>
    <script
        type="text/javascript"
        src=<?php echo e(asset("../editor/richtexteditor/plugins/all_plugins.js")); ?>

    ></script>
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
                        <h3>Edit Data Berita</h3>
                    </div>
                </div>
            </div>

            <section id="input-style" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <a href="<?php echo e(route("berita")); ?>" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i></i> Kembali </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" action="<?php echo e(route('edit-berita', $berita->id)); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <div class="form-group">
                                                <label for="squareText">Judul Berita</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Judul Berita" name="judul" value="<?php echo e($berita->judul); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Penulis</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Nama Penulis" name="penulis" value="<?php echo e($berita->penulis); ?>">
                                            </div>
                                            <div class="form-group" style="margin-top: 20px">
                                                <label for="squareText">Isi Berita</label>
                                                <textarea id="inp_editor1" name="konten">
                                                 &lt;p&gt;<?php echo e($berita->konten); ?>&lt;/p&gt;
                                                </textarea>
                                                <script>
                                                    var editor1 = new RichTextEditor("#inp_editor1");
                                                </script>
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <select name="kategori_berita_id" class="form-control">
                                                    <?php $__currentLoopData = $kategori_beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($kategori->id == $kategori->kategori_berita_id): ?>
                                                            <option value=<?php echo e($kategori->id); ?> selected='selected'> <?php echo e($kategori->kategori); ?> </option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($kategori->id); ?>">
                                                                <?php echo e($kategori->kategori); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Gambar Berita (.jpg, .png, .jpeg)</label>
                                                <input class="form-control" type="file" id="formFile" name="gambar">
                                                <br>
                                                <label for="formFile" class="form-label" style="color: red">Gambar saat ini</label> <br>
                                                <img src="<?php echo e(asset('storage/public/berita/'.$berita->gambar)); ?>" width="100" style="margin-left: 10px">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="is_active" class="form-control">
                                                    <option value="1" <?php echo e($berita->is_active == '1' ? 'selected' : ''); ?>>
                                                        Terbitkan
                                                    </option>
                                                    <option value="0" <?php echo e($berita->is_active == '0' ? 'selected' : ''); ?>>
                                                        Draf
                                                    </option>
                                                </select>
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
<?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok\resources\views/back/admin/konten/beranda/berita/edit.blade.php ENDPATH**/ ?>