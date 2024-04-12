<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Pengumuman Detail SMA Tanjung Priok Jakarta</title>
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
            <h1
                class="font-semibold text-sm text-white block my-auto ml-2 tracking-normal"
            >
                SMA Tanjung Priok Jakarta
            </h1>
            <!-- button hamburger -->
            <div
                class="w-9 h-8 bg-[#ffffff] rounded-md flex ml-auto mr-5 sm:mr-8 mt-1 cursor-pointer"
                id="toggleButton"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 my-auto mx-auto"
                    viewBox="0 0 448 512"
                >
                    <path
                        fill="#0D464B"
                        d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"
                    />
                </svg>
            </div>
        </div>
        <!-- Navigasi Hamburger -->
        <div
            class="hidden md:flex flex-col items-start absolute mt-3 right-0 bg-[#0D464B] p-4 w-48 rounded-l-md rounded-t-none opacity-95 h-screen"
            id="mobileMenu"
        >
            <a
                href="<?php echo e(route("home")); ?>"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]"
            >Beranda</a
            >
            <a
                href="<?php echo e(route("profil-sekolah")); ?>"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]"
            >Profil</a
            >
            <a
                href="#"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42] font-medium"
                id="dataDropdownHP"
            >Data
                <div
                    class="hidden absolute -mt-12 -left-28 bg-[#FF8B42] p-2 w-28 rounded-l-md font-medium"
                    id="dataDropdownContentHP"
                >
                    <a
                        href="<?php echo e(route("list-guru")); ?>"
                        class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center"
                    >Data Guru</a
                    >
                    <a
                        href="<?php echo e(route("list-staf")); ?>"
                        class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center"
                    >Data Staf</a
                    >
                </div>
            </a>
            <a
                href="<?php echo e(route("konten-sekolah")); ?>"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]"
            >Konten</a
            >
            <a
                href="https://frontend-e-learning.web.app/view/login/siswa.html"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]"
            >E-Learning</a
            >
            <!-- Tambahkan navigasi lainnya sesuai kebutuhan -->
        </div>
    </div>

    <!-- TAMPILAN TABLET DAN KOMPUTER -->
    <div class="hidden mx-5 sm:mx-8 lg:mx-10 xl:mx-20 md:grid grid-cols-2">
        <div class="flex">
            <img
                src="<?php echo e(asset('images/logo.png')); ?>"
                class="md:w-[40px] md:h-[40px] lg:w-[48px] lg:h-[47px]"
            />
            <h1
                class="block my-auto ml-3 font-semibold tracking-wide text-white text-[14px] lg:text-base xl:text-[17px]"
            >
                SMA Tanjung Priok Jakarta
            </h1>
        </div>
        <div
            class="justify-evenly flex my-auto text-white font-medium text-[13.5px] lg:text-[14.5px] xl:text-[15.5px] lg:tracking-normal xl:tracking-normal"
        >
            <a href="<?php echo e(route("home")); ?>">
                <p class="hover:text-[#FF8B42]">Beranda</p>
            </a>
            <a href="<?php echo e(route("profil-sekolah")); ?>">
                <p class="hover:text-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42]">Data Sekolah</p>
                <div
                    class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8"
                    id="dataDropdownContent1"
                >
                    <a href="<?php echo e(route("list-guru")); ?>" class="block text-black hover:font-bold py-1"
                    >Data Guru</a
                    >
                    <a
                        href="<?php echo e(route("list-staf")); ?>"
                        class="block text-black hover:font-bold py-1 mt-2"
                    >Data Staf</a
                    >
                </div>
            </a>
            <a href="<?php echo e(route("konten-sekolah")); ?>">
                <p class="hover:text-[#FF8B42]">Konten</p>
            </a>
            <a href="https://frontend-e-learning.web.app/view/login/siswa.html">
                <p class="hover:text-[#FF8B42]">E-Learning</p>
            </a>
        </div>
    </div>

    <script>
        document
            .getElementById("dataDropdownHP")
            .addEventListener("click", function () {
                var dropdownContentHP1 = document.getElementById(
                    "dataDropdownContentHP"
                );
                dropdownContentHP1.classList.toggle("hidden");
            });

        document
            .getElementById("toggleButton")
            .addEventListener("click", function () {
                document.getElementById("mobileMenu").classList.toggle("hidden");
                document
                    .getElementById("mobileMenu")
                    .classList.toggle("animate-slide-right"); // Tambahkan kelas animasi
            });

        document
            .getElementById("dataDropdown1")
            .addEventListener("click", function (event) {
                event.preventDefault();
                var dropdownContent = document.getElementById(
                    "dataDropdownContent1"
                );
                dropdownContent.classList.toggle("hidden");
            });
    </script>
</nav>

<!-- CONTENT -->
<section class="my-10 sm:my-12">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1
            class="font-bold leading-[1.5] md:leading-[1.4] text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl"
        >
            <?php echo e($blog->judul); ?>

        </h1>
        <div class="lg:mt-4 mt-2 flex">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"
                class="lg:w-5 lg:h-5 md:h-4 md:w-4 w-3.5 h-4 mr-1 lg:mr-1.5"
            >
                <path
                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                />
            </svg>
            <p
                class="text-[13px] sm:text-sm md:text-[14.5px] lg:text-[15px] xl:text-base font-light"
            >
                By <?php echo e($blog->penulis); ?>

            </p>
        </div>
        <div class="mt-0.5 md:mt-1 lg:mt-1.5 flex">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"
                class="lg:w-[18px] lg:h-[18px] md:h-4 md:w-4 w-3.5 h-4 mr-1 lg:mr-1.5"
            >
                <path
                    d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"
                />
            </svg>
            <p
                class="text-[13px] sm:text-[13.5px] md:text-sm lg:text-[15px] xl:text-base font-light"
            >
                <?php echo e(\Carbon\Carbon::parse($blog->updated_at)->setTimezone('Asia/Jakarta')->translatedFormat('d F Y, H:i')); ?> WIB
            </p>
        </div>
        <img
            src="<?php echo e(asset('storage/blog/' . $blog->gambar)); ?>"
            class="w-full h-[250px] sm:h-[300px] md:h-[380px] lg:h-[550px] xl:h-[600px] mt-4 lg:mt-5 xl:mt-7 object-cover object-center"
        />
        <p
            class="mt-5 lg:mt-7 sm:leading-relaxed lg:leading-[1.7] xl:leading-[1.8] text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px] text-justify"
        >
            <?php echo $blog->konten; ?>

        </p>
    </div>
</section>

<!-- OTHER CONTENT -->
<section class="my-10 sm:my-12">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1
            class="font-bold text-[17px] sm:text-lg md:text-[19px] lg:text-[21px] xl:text-2xl underline underline-offset-8 lg:underline-offset-[10px] xl:underline-offset-[12px] decoration-4 decoration-[#FF8B42]"
        >
            Blog Lainnya
        </h1>
        <div
            class="mt-6 sm:mt-8 sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 sm:gap-6 md:gap-8 ms:gap-5 xl:gap-8"
        >
            <?php $__currentLoopData = $nextBlog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('detail-blog', ['slug' => $row->slug])); ?>">
                <div
                    class="relative h-[250px] mt-5 sm:mt-0 hover:scale-105 ease-in-out duration-300"
                >
                    <img
                        src="<?php echo e(asset('storage/blog/' . $row->gambar)); ?>"
                        class="w-full object-cover object-center h-full"
                    />
                    <div
                        class="bg-[#0D464B] text-white bg-gradient-to-t from-[#0D464B] via-[#13494D]/70 to-[#737373]/5 bg-opacity-20 absolute top-0 h-full w-full"
                    >
                        <div class="bottom-0 absolute mx-5 my-5">
                            <h1 class="mt-auto text-[15px] sm:text-base font-medium">
                                <?php echo e($row->judul); ?>

                            </h1>
                            <p
                                class="text-[13px] sm:text-sm md:text-[15px] font-light mt-1"
                            >
                                <?php echo e($row->updated_at->format('d M Y')); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- FOOTER -->
<?php echo $__env->make('front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Capstone\sistem-manajemen-konten-dan-administrasi\cms_administration_smatjpriok\resources\views\front\detail-blog.blade.php ENDPATH**/ ?>