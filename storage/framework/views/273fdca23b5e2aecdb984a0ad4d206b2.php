<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Pengumuman SMA Tanjung Priok Jakarta</title>
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

<!-- HERO SECTION -->
<section
    class="bg-[#001A1C] bg-opacity-90 w-full h-[250px] lg:h-[280px] xl:h-[300px] flex justify-center items-center"
>
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1
            class="text-center text-white font-semibold text-[22px] sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl"
        >
            Pengumuman SMA Tanjung Priok Jakarta
        </h1>
        <p
            class="text-center text-white font-medium text-[15px] sm:text-base md:text-lg lg:text-xl xl:text-2xl mt-3 md:mt-4 lg:mt-5 xl:mt-6"
        >
            Temukan pengumuman seputar informasi penting SMA Tanjung Priok
            Jakarta!
        </p>
    </div>
</section>

<!-- KATEGORI PENGUMUMAN dan SEARCH -->
<section class="mt-12">
    <div class="sm:flex mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <div class="sm:w-1/2 md:w-1/3 mt-5 sm:mt-4 md:mt-5 lg:mt-6 xl:mt-7">
            <form action="<?php echo e(route('list-pengumuman')); ?>" method="GET" >
                <div
                    class="rounded-md bg-white flex border border-black border-opacity-30"
                >
                    <button type="submit" class="bg-[#0D464B] px-2 rounded-l-md">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            class="w-5 h-5 mr-2.5 ml-2"
                            fill="#fff"
                        >
                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                            />
                        </svg>
                    </button>

                    <input
                        class="rounded-md w-full py-2 px-2 placeholder:text-[13px] placeholder:lg:text-[14px] placeholder:xl:text-[15px] text-sm lg:text-[15px] xl:text-base"
                        type="text"
                        name="search"
                        placeholder="Cari pengumuman..."
                    />
                </div>
            </form>
        </div>
    </div>
</section>

<!-- DATA PENGUMUMAN -->
<section class="my-10">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20 grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-7 sm:gap-8 md:gap-10">
        <?php $__currentLoopData = $pengumumans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pengumuman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('detail-pengumuman', ['slug' => $pengumuman->slug])); ?>">
            <div class="rounded-md border border-black border-opacity-25 hover:scale-105 ease-in-out duration-300 ">
                <img src="<?php echo e(asset('storage/public/pengumuman/gambar/' . $pengumuman->gambar)); ?>" class="rounded-t-md object-cover object-center h-[200px] w-full">
                <div class="py-2.5 xl:py-3 px-3 bg-white rounded-b-md">
                    <h1 class="text-sm font-semibold lg:text-[14.5px] xl:text-[15px]">
                        <?php echo e($pengumuman->judul); ?>

                    </h1>
                    <p class="mt-1 lg:mt-[5px] text-[13px] lg:text-[13.5px] xl:text-sm font-light">
                        <?php echo e($pengumuman->updated_at->format('d M Y')); ?> | <?php echo e($pengumuman->kategoriPengumuman->kategori); ?>

                    </p>
                    <p class="mt-0.5 text-[13px] lg:text-[13.5px] xl:text-sm font-light">
                        By <?php echo e($pengumuman->penulis); ?>

                    </p>
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<!-- FOOTER -->
<?php echo $__env->make('front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Capstone\sistem-manajemen-konten-dan-administrasi\cms_administration_smatjpriok\resources\views/front/list-pengumuman.blade.php ENDPATH**/ ?>