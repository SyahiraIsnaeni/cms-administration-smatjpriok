<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo e($title); ?></title>
    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image/png" />
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">

    <!-- PENTING!!!! -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head>
<body class="font-cms bg-[#E5F3EF]">
<div class="lg:flex h-screen">
    <div class="lg:w-1/2 hidden lg:flex justify-center">
        <img src="<?php echo e(asset('images/admin.png')); ?>" class=" xl:w-[650px] xl:h-[650px] xl:mt-[45px]" />
    </div>
    <div class="lg:w-1/2 w-full bg-[#0D464B] h-screen">
        <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
            <div class="pt-12 md:pt-16 lg:pt-20 xl:pt-24 flex justify-center items-center">
                <img src="<?php echo e(asset('images/logo.png')); ?>" class="w-[110px] md:w-[120px] md:h-[110px] lg:w-[130px] lg:h-[120px] h-[100px]" />
            </div>
            <div class="flex w-full mt-5 justify-center">
                <div class="bg-white h-[0.5px] w-1/3 mt-[9px]"></div>
                <p class="text-white text-[13px] md:text-sm xl:text-[15px] font-light w-1/3 text-center">
                    LOGIN ADMIN
                </p>
                <div class="bg-white h-[0.5px] w-1/3 mt-[9px]"></div>
            </div>
            <h1 class="text-white mt-2 text-center font-semibold text-base md:text-[17px] xl:text-lg">
                SMA TANJUNG PRIOK JAKARTA
            </h1>
            <div class="mt-5 lg:mt-7">
                <?php if(isset($error)): ?>
                    <div class="rounded-md w-full px-2 py-2 text-[13px] sm:text-sm md:text-[15px] font-normal bg-red-700 text-white mb-4">
                        <p class="text-center"><?php echo e($error); ?></p>
                    </div>
                <?php endif; ?>
                <form  method="post" action="/login">
                    <?php echo csrf_field(); ?>
                    <div>
                        <p class="text-white text-sm lg:text-[15px] font-normal">Email</p>
                        <input name="email" type="email" class="mt-1.5 w-full rounded-md py-2 lg:py-2.5 px-1 lg:px-2 placeholder:px-1 placeholder:text-sm placeholder:lg:text-[15px] text-sm lg:text-[15px]" placeholder="Masukkan Email" />
                    </div>
                    <div class="mt-3">
                        <p class="text-white text-sm lg:text-[15px] font-normal">Password</p>
                        <input name="password" type="password" class="mt-1.5 w-full rounded-md py-2 lg:py-2.5 px-1 lg:px-2 placeholder:px-1 placeholder:text-sm placeholder:lg:text-[15px] text-sm lg:text-[15px]" placeholder="Masukkan Password" />
                    </div>
                    <button class="mt-7 xl:mt-10 bg-[#18A0FB] py-2 lg:py-2.5 w-full text-sm lg:text-[15px] font-semibold rounded-md hover:scale-105 ease-in-out duration-300" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok\resources\views/front/login.blade.php ENDPATH**/ ?>