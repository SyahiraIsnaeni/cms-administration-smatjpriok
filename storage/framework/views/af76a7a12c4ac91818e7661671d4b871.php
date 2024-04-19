<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Jadwal Mata Pelajaran</h1>

    <table class="table table-bordered">
        <thread>
            <tr>Hari</tr>
            <tr>Mata Pelajaran</tr>
            <tr>Guru</tr>
            <tr>Jam Mulai</tr>
            <tr>Jam Selesai</tr>
        <thread>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($jadwal->day->name); ?></td>
                <td><?php echo e($jadwal->mapel->nama); ?> <?php echo e($jadwal->mapel->kelas->nama_kelas); ?></td>
                <td><?php echo e($jadwal->guru->nama); ?></td>
                <td><?php echo e($jadwal->start_time ? substr($jadwal->start_time, 0, 5) : ''); ?></td>
                <td><?php echo e($jadwal->end_time ? substr($jadwal->end_time, 0, 5) : ''); ?></td>
                <td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok-2\resources\views/back/admin/data/jadwal/generate-jadwal-pdf.blade.php ENDPATH**/ ?>