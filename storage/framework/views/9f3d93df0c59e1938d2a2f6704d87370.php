<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Konten SMA Tanjung Priok Jakarta</title>
    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image/png" />
    <!-- <link href="/public/css/output.css" rel="stylesheet" /> -->
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet" />

    <!-- PENTING!!!! -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head>
<body class="font-cms bg-[#E5F3EF]">
<!-- NAVBAR -->
<nav class="sticky bg-[#0D464B] py-3 lg:py-3.5 top-0 w-full z-30">
    <!-- TAMPILAN HP -->
    <div class="md:hidden relative">
        <div class="ml-5 sm:ml-8 flex items-center">
            <img src="<?php echo e(asset('images/logo.png')); ?>" class="w-10 my-auto" />
            <h1 class="font-semibold text-sm text-white block my-auto ml-2 tracking-normal">SMA Tanjung Priok Jakarta</h1>
            <!-- button hamburger -->
            <div class="w-9 h-8 bg-[#ffffff] rounded-md flex ml-auto mr-5 sm:mr-8 mt-1 cursor-pointer" id="toggleButton">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 my-auto mx-auto" viewBox="0 0 448 512">
                    <path
                        fill="#0D464B"
                        d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"
                    />
                </svg>
            </div>
        </div>
        <!-- Navigasi Hamburger -->
        <div class="hidden md:flex flex-col items-start absolute mt-3 right-0 bg-[#0D464B] p-4 w-48 rounded-l-md rounded-t-none opacity-95 h-screen" id="mobileMenu">
            <a href="<?php echo e(route("home")); ?>" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Beranda</a>
            <a href="<?php echo e(route("profil-sekolah")); ?>" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Profil</a>
            <a href="#" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]" id="dataDropdownHP">
                Data
                <div class="hidden absolute -mt-12 -left-28 bg-[#FF8B42] p-2 w-28 rounded-l-md font-medium" id="dataDropdownContentHP">
                    <a href="<?php echo e(route("list-guru")); ?>" class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center">Data Guru</a>
                    <a href="<?php echo e(route("list-staf")); ?>" class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center">Data Staf</a>
                </div>
            </a>
            <a href="<?php echo e(route("konten-sekolah")); ?>" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]">Konten</a>
            <a href="https://frontend-e-learning.web.app/view/login/siswa.html" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">E-Learning</a>
            <!-- Tambahkan navigasi lainnya sesuai kebutuhan -->
        </div>
    </div>

    <!-- TAMPILAN TABLET DAN KOMPUTER -->
    <div class="hidden mx-5 sm:mx-8 lg:mx-10 xl:mx-20 md:grid grid-cols-2">
        <div class="flex">
            <img src="<?php echo e(asset('images/logo.png')); ?>" class="md:w-[40px] md:h-[40px] lg:w-[48px] lg:h-[47px]" />
            <h1 class="block my-auto ml-3 font-semibold tracking-wide text-white text-[14px] lg:text-base xl:text-[17px]">SMA Tanjung Priok Jakarta</h1>
        </div>
        <div class="justify-evenly flex my-auto text-white font-medium text-[13.5px] lg:text-[14.5px] xl:text-[15.5px] lg:tracking-normal xl:tracking-normal">
            <a href="<?php echo e(route("home")); ?>">
                <p class="hover:text-[#FF8B42] ">Beranda</p>
            </a>
            <a href="<?php echo e(route("profil-sekolah")); ?>">
                <p class="hover:text-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42]">Data Sekolah</p>
                <div class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8" id="dataDropdownContent1">
                    <a href="<?php echo e(route("list-guru")); ?>" class="block text-black hover:font-bold py-1">Data Guru</a>
                    <a href="<?php echo e(route("list-staf")); ?>" class="block text-black hover:font-bold py-1 mt-2">Data Staf</a>
                </div>
            </a>
            <a href="<?php echo e(route("konten-sekolah")); ?>">
                <p class="hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]">Konten</p>
            </a>
            <a href="https://frontend-e-learning.web.app/view/login/siswa.html">
                <p class="hover:text-[#FF8B42]">E-Learning</p>
            </a>
        </div>
    </div>

    <script>
        document.getElementById("dataDropdownHP").addEventListener("click", function () {
            var dropdownContentHP1 = document.getElementById("dataDropdownContentHP");
            dropdownContentHP1.classList.toggle("hidden");
        });

        document.getElementById("toggleButton").addEventListener("click", function () {
            document.getElementById("mobileMenu").classList.toggle("hidden");
            document.getElementById("mobileMenu").classList.toggle("animate-slide-right"); // Tambahkan kelas animasi
        });

        document.getElementById("dataDropdown1").addEventListener("click", function (event) {
            event.preventDefault();
            var dropdownContent = document.getElementById("dataDropdownContent1");
            dropdownContent.classList.toggle("hidden");
        });
    </script>
</nav>

<!-- HERO SECTION -->
<section
    class="bg-[#001A1C] bg-opacity-90 w-full h-[250px] lg:h-[280px] xl:h-[300px] flex justify-center items-center"
>
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1
            class="text-center text-white font-semibold text-[22px] sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl"
        >
            Konten SMA Tanjung Priok Jakarta
        </h1>
        <p
            class="text-center text-white font-medium text-[15px] sm:text-base md:text-lg lg:text-xl xl:text-2xl mt-3 md:mt-4 lg:mt-5 xl:mt-6"
        >
            Telusuri beragam konten yang menarik dan informatif yang berkaitan
            dengan kegiatan dan keunikan SMA Tanjung Priok yang akan menginspirasi
            para siswa!
        </p>
    </div>
</section>

<!-- GALERI -->
<section class="my-12 md:my-16">
    <h1
        class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl text-center"
    >
        Galeri SMA Tanjung Priok Jakarta
    </h1>
    <!-- TAMPILAN HP -->
    <div class="block sm:hidden mx-5 mt-3">
        <?php $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('detail-galeri', ['id' => $galeri->id])); ?>">
            <div class="relative mt-5">
                <img
                    src="<?php echo e(asset('storage/public/galeri-thumbnail/' . $galeri->thumbnail)); ?>"
                    class="w-full h-[250px] object-cover object-center"
                />
                <div
                    class="bg-[#0D464B] bg-gradient-to-t from-[#0D464B] via-[#13494D]/75 to-[#737373]/20 bg-opacity-25 absolute top-0 h-full w-full items-center flex"
                >
                    <p
                        class="text-base font-medium text-white text-left mt-auto mx-auto px-5 pb-6 leading-relaxed"
                    >
                        <?php echo e($galeri->judul); ?>

                    </p>
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <nav aria-label="Page navigation example ">
                <ul class="flex items-center mt-5 justify-center -space-x-px h-8 text-sm">
                    <li>
                        <a href="<?php echo e($galeris->previousPageUrl()); ?>" >
                            <div class="flex items-center text-sm justify-center ms-0 px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white mr-4 bg-[#0D464B] border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                                Prev
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e($galeris->nextPageUrl()); ?>" >
                            <div class="flex items-center text-sm justify-center px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white ml-4 bg-[#0D464B] border border-gray-300">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
    </div>
    <!-- TAMPILAN TABLET DAN LAPTOP -->
    <div
        class="hidden sm:mx-8 sm:block md:mx-10 lg:mx-16 xl:mx-20 mt-7 md:mt-8 lg:mt-10 xl:mt-12"
    >
        <div
            class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-7 lg:gap-8"
        >
            <?php $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('detail-galeri', ['id' => $galeri->id])); ?>">
                <div class="relative">
                    <img
                        src="<?php echo e(asset('storage/public/galeri-thumbnail/' . $galeri->thumbnail)); ?>"
                        class="w-full h-[250px] object-cover object-center"
                    />
                    <div class="opacity-0 hover:opacity-100">
                        <div
                            class="bg-[#0D464B] bg-opacity-80 absolute top-0 h-full w-full items-center flex"
                        >
                            <p
                                class="text-base lg:text-[17px] xl:text-lg font-semibold text-white text-center mx-auto px-5 leading-relaxed"
                            >
                                <?php echo e($galeri->judul); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Tombol-tombol pagination -->
        <nav aria-label="Page navigation example ">
            <ul class="flex items-center mt-5 justify-center -space-x-px h-8 text-sm">
                <li>
                    <a href="<?php echo e($galeris->previousPageUrl()); ?>" >
                        <div class="flex items-center justify-center ms-0 px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white mr-4 bg-[#0D464B] border border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                            Prev
                        </div>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e($galeris->nextPageUrl()); ?>" >
                        <div class="flex items-center justify-center px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white ml-4 bg-[#0D464B] border border-gray-300">
                            Next
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</section>

<!-- VIDEO -->
<section class="my-12 md:my-16">
    <div class="h-[650px] sm:h-[420px] md:h-[470px] lg:h-[520px] xl:h-[560px] relative">
        <img src="../assets/y (1).png" class="w-full h-full object-cover object-center" />
        <div class="h-full absolute top-0 bg-[#0D464B] w-full bg-opacity-90">
            <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20 my-8 sm:my-10 md:my-12 lg:my-16 xl:my-20">
                <h1 class="text-white font-semibold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl text-center">Video Kegiatan SMA Tanjung Priok Jakarta</h1>
                <div class="mt-3 sm:mt-4 md:mt-5 lg:mt-6 xl:mt-8 sm:grid sm:grid-cols-2 xl:grid-cols-3 sm:gap-5 md:gap-8 lg:gap-10 xl:gap-12">
                    <div class="w-full h-[240px] md:h-[260px] lg:h-[300px] mt-5">
                        <iframe class="w-full h-full rounded-md" src="https://www.youtube.com/embed/rpW1EKzv390" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="w-full h-[240px] md:h-[260px] lg:h-[300px] mt-5">
                        <iframe class="w-full h-full rounded-md" src="https://www.youtube.com/embed/G1_AzB55qiM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="w-full h-[240px] md:h-[260px] lg:h-[300px] mt-5 hidden xl:block">
                        <iframe class="w-full h-full rounded-md" src="https://www.youtube.com/embed/odjlLCWMKZk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BLOG KEGIATAN -->
<section class="my-12 md:my-16">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1 class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl text-center">
            Blog Kegiatan SMA Tanjung Priok Jakarta
        </h1>
        <div class="mt-6 sm:mt-8 md:mt-10 lg:mt-12 xl:mt-16 sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 sm:gap-6 md:gap-8 ms:gap-5 xl:gap-8">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('detail-blog', ['slug' => $blog->slug])); ?>">
                <div class="relative h-[250px] mt-5 sm:mt-0  hover:scale-105 ease-in-out duration-300">
                    <img src="<?php echo e(asset('storage/public/blog/' . $blog->gambar)); ?>" class="w-full object-cover object-center h-full">
                    <div class="bg-[#0D464B]  text-white bg-gradient-to-t from-[#0D464B] via-[#13494D]/70 to-[#737373]/5 bg-opacity-20 absolute top-0 h-full w-full">
                        <div class="bottom-0 absolute mx-5 my-5">
                            <h1 class="mt-auto text-[15px] sm:text-base font-medium"><?php echo strlen($blog->judul) > 60 ? substr($blog->judul, 0, 60) . '...' : $blog->judul; ?></h1>
                            <p class="text-[13px] sm:text-sm md:text-[15px] font-light mt-1"><?php echo e($blog->updated_at->format('d M Y')); ?></p>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <nav aria-label="Page navigation example ">
            <ul class="flex items-center mt-5 justify-center -space-x-px h-8 text-sm">
                <li>
                    <a href="<?php echo e($blogs->previousPageUrl()); ?>" >
                        <div class="flex items-center justify-center ms-0 px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white mr-4 bg-[#0D464B] border border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                            Prev
                        </div>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e($blogs->nextPageUrl()); ?>" >
                        <div class="flex items-center justify-center px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white ml-4 bg-[#0D464B] border border-gray-300">
                            Next
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

<!-- FOOTER -->
<?php echo $__env->make('front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Capstone\sistem-manajemen-konten-dan-administrasi\cms_administration_smatjpriok\resources\views/front/konten.blade.php ENDPATH**/ ?>