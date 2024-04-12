<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Profil SMA Tanjung Priok Jakarta</title>
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
            <a href="<?php echo e(route("home")); ?>"  class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42] ">Beranda</a>
            <a href="<?php echo e(route("profil-sekolah")); ?>"  class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]">Profil</a>
            <a href="#" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]" id="dataDropdownHP">
                Data
                <div class="hidden absolute -mt-12 -left-28 bg-[#FF8B42] p-2 w-28 rounded-l-md font-medium" id="dataDropdownContentHP">
                    <a href="<?php echo e(route("list-guru")); ?>"  class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center">Data Guru</a>
                    <a href="<?php echo e(route("list-staf")); ?>" class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center">Data Staf</a>
                </div>
            </a>
            <a href="<?php echo e(route("konten-sekolah")); ?>" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Konten</a>
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
                <p class="hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42]">Data Sekolah</p>
                <div class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8" id="dataDropdownContent1">
                    <a href="<?php echo e(route("list-guru")); ?>" class="block text-black hover:font-bold py-1">Data Guru</a>
                    <a href="<?php echo e(route("list-staf")); ?>" class="block text-black hover:font-bold py-1 mt-2">Data Staf</a>
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

<!-- CAROUSEL -->
<section>
    <div class="w-full bg-[#001A1C] bg-opacity-95">
        <div class="sm:flex pb-5 sm:pb-0">
            <img class="w-full mb-5 sm:mb-0 sm:w-1/2 rounded-br-[400px] xl:h-[600px] lg:h-[500px] md:h-[430px] sm:h-[380px] h-[280px] object-cover object-center" src="<?php echo e(asset('images/carousel-profil.jpg')); ?>" />
            <div class="sm:w-1/2 my-auto mr-5 sm:mr-7 md:mr-10 lg:mr-12 xl:mr-16 xl:ml-0 sm:ml-3 ml-2 text-white">
                <p class="font-semibold text-[22px] sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl text-right tracking-wide">Profil SMA Tanjung Priok</p>
                <p class="font-medium text-[15px] sm:text-base md:text-lg lg:text-xl xl:text-2xl text-right tracking-wide mt-1.5 sm:mt-3 md:mt-4 lg:mt-6 xl:mt-7">
                    SMA Tanjung Priok Jakarta menciptakan perpaduan yang kuat antara keunggulan akademik dan inovasi
                </p>
            </div>
        </div>
    </div>
</section>

<!--SEJARAH SEKOLAH -->
<section class="my-10 sm:my-12">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <!-- Tampilan HP -->
        <div class="text-black block sm:hidden">
            <h1 class="font-bold text-xl sm:text-2xl mt-5 sm:mt-7">Sejarah SMA Tanjung Priok Jakarta</h1>
            <p class="text-sm font-normal mt-3 text-justify leading-[1.55] indent-10">
                SMA Tanjung Priok, berdiri pada tahun 1985 dengan tanggal pendirian resmi pada 1 Juli 1985/1986 di bawah naungan Yayasan Dikantara. Pada masa itu, Drs. H. Nawawi Rambe menjabat sebagai Kepala Sekolah, didukung oleh Wakil Kepala
                Sekolah, Bapak Darwin. Sekolah ini dimulai dengan 19 siswa di jurusan IPA, berlokasi di kompleks yang sama dengan STM Perkapalan dan SMP Tanjung Priok, yakni di Jl. Mangga No. 3 Jakarta Utara. Guru-guru berasal dari STM, SMP
                Tanjung, dan sekolah lain yang sesuai dengan kebutuhan.
            </p>
            <img src="<?php echo e(asset('images/sma.jpg')); ?>" alt="Deskripsi Gambar" class="my-3 h-[220px] object-cover object-center rounded-md w-full" />
            <!-- Kalimat tambahan untuk tampilan HP -->
            <p class="text-sm font-normal mt-2 text-justify leading-[1.55] lg:mt-1 xl:mt-1 indent-10">
                Pada tahun kedua, 1986/1987, jumlah siswa meningkat menjadi 35, dengan 17 siswa di jurusan IPA dan 18 siswa di jurusan IPS. Sistem pembelajaran diintegrasikan dan dibagi, dengan mata pelajaran umum digabungkan, sementara jurusan
                minat dipisahkan. Tahun ketiga menandai peningkatan jumlah ujian dibandingkan dengan tahun pertama. Pada tahun 1988, dengan rasa syukur, sekolah berhasil mencapai tingkat kelulusan 100%.
            </p>
        </div>

        <!-- TAMPILAN TABLET DAN LAPTOP -->
        <div class="hidden sm:block">
            <div class="mt-10 lg:mt-12 xl:mt-16">
                <div class="flex">
                    <h1 class="font-bold w-2/3 text-2xl md:text-3xl lg:text-[33px] xl:text-4xl leading-normal xl:leading-[1.5]">Sejarah SMA Tanjung Priok</h1>
                    <div class="bg-[#0D464B] h-[5px] rounded-sm w-1/3 mt-4 lg:mt-4 xl:mt-6"></div>
                </div>
                <div class="float-left mt-5 md:mt-8">
                    <img
                        src="<?php echo e(asset('images/sma.jpg')); ?>"
                        alt="Deskripsi Gambar"
                        class="h-[230px] md:h-[250px] lg:h-[270px] object-cover object-center rounded-md w-[330px] md:w-[380px] lg:w-[440px] xl:-w-[470px] mr-7 md:mr-10 lg:mr-12 xl:mr-16 mb-1.5 md:mb-3.5"
                    />
                </div>
                <div class="pb-4 md:pb-6 xl:pb-7"></div>
                <p class="text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px] xl:tracking-wide font-normal xl:leading-relaxed text-justify leading-[1.5]">
                    SMA Tanjung Priok, berdiri pada tahun 1985 dengan tanggal pendirian resmi pada 1 Juli 1985/1986 di bawah naungan Yayasan Dikantara. Pada masa itu, Drs. H. Nawawi Rambe menjabat sebagai Kepala Sekolah, didukung oleh Wakil
                    Kepala Sekolah, Bapak Darwin. Sekolah ini dimulai dengan 19 siswa di jurusan IPA, berlokasi di kompleks yang sama dengan STM Perkapalan dan SMP Tanjung Priok, yakni di Jl. Mangga No. 3 Jakarta Utara. Guru-guru berasal dari
                    STM, SMP Tanjung, dan sekolah lain yang sesuai dengan kebutuhan. Pada tahun kedua, 1986/1987, jumlah siswa meningkat menjadi 35, dengan 17 siswa di jurusan IPA dan 18 siswa di jurusan IPS. Sistem pembelajaran diintegrasikan
                    dan dibagi, dengan mata pelajaran umum digabungkan, sementara jurusan minat dipisahkan. Tahun ketiga menandai peningkatan jumlah ujian dibandingkan dengan tahun pertama. Pada tahun 1988, dengan rasa syukur, sekolah berhasil
                    mencapai tingkat kelulusan 100%.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SAMBUTAN KEPSEK-->
<section class="my-12 sm:my-16 lg:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <!-- Tampilan HP -->
        <div class="text-black block sm:hidden">
            <h1 class="font-bold text-xl sm:text-2xl mt-5 sm:mt-7 text-center">Salam Inspiratif Kepala Sekolah</h1>
            <img src="<?php echo e(asset('images/kepsek.jpg')); ?>" alt="Kepala sekolah" class="mt-5 mx-auto rounded-md w-[180px] h-[230px] object-cover object-center" />
            <!-- nama kepsek -->
            <p class="text-center text-[15px] font-semibold mt-1.5">Sea Niko, S.E</p>
            <p class="text-center text-[13px] font-medium">Kepala Sekolah</p>
            <div class="flex mt-5">
                <div class="flex">
                    <div class="bg-[#0D464B] py-0.5 w-1 h-full rounded-lg mt-auto"></div>
                    <p class="ml-4 text-sm font-normal text-justify italic leading-[1.5] flex-1">
                        Assalamu'alaikum wr. wb. <br />
                        Kami bersyukur atas limpahan rahmat, hidayah, dan karunia Allah SWT yang memungkinkan kita untuk mengembangkan potensi dalam pendidikan. Kami sadar akan pesatnya perkembangan dunia internet, yang menjadi tantangan bagi
                        pendidikan. Oleh karena itu, SMA Tanjung Priok berupaya menjawab tantangan tersebut dengan membentuk Tim IT dan meluncurkan website sekolah ini. Kami berharap website ini menjadi sumber informasi publik tentang profil SMA
                        Tanjung Priok, media pengembangan diri bagi tenaga edukatif dan peserta didik, serta sarana komunikasi antara stakeholder sekolah dan masyarakat. Dukungan dari pengunjung kami harapkan untuk evaluasi dan pengembangan sekolah
                        ke depan. <br />
                        Wassalamualaikum wr. wb
                    </p>
                </div>
            </div>
        </div>

        <!-- TAMPILAN TABLET DAN LAPTOP -->
        <div class="hidden sm:block">
            <div class="flex mt-7 md:mt-10 lg:mt-12 xl:mt-16">
                <div class="w-8/12 md:w-9/12 xl:10/12 mr-5 relative">
                    <h1 class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl">Salam Inspiratif Kepala Sekolah</h1>
                    <!-- Garis Vertikal -->
                    <div class="flex mt-4 lg:mt-5 xl:mt-6">
                        <p class="text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px] xl:tracking-wide font-normal lg:leading-relaxed xl:leading-[1.8] text-justify italic leading-[1.5] left-[10px] flex-1">
                            Assalamu'alaikum wr. wb. <br />
                            Kami bersyukur atas limpahan rahmat, hidayah, dan karunia Allah SWT yang memungkinkan kita untuk mengembangkan potensi dalam pendidikan. Kami sadar akan pesatnya perkembangan dunia internet, yang menjadi tantangan bagi
                            pendidikan. Oleh karena itu, SMA Tanjung Priok berupaya menjawab tantangan tersebut dengan membentuk Tim IT dan meluncurkan website sekolah ini. Kami berharap website ini menjadi sumber informasi publik tentang profil SMA
                            Tanjung Priok, media pengembangan diri bagi tenaga edukatif dan peserta didik, serta sarana komunikasi antara stakeholder sekolah dan masyarakat. Dukungan dari pengunjung kami harapkan untuk evaluasi dan pengembangan
                            sekolah ke depan. <br />
                            Wassalamualaikum wr. wb
                        </p>
                    </div>
                    <div class="bg-[#0D464B] py-0.5 mt-4 lg:mt-5 xl:mt-7 w-2/3 rounded-lg"></div>
                </div>
                <div class="w-4/12 md:w-3/12 xl:2/12 ml-5 lg:ml-12 xl:ml-20">
                    <img src="<?php echo e(asset('images/kepsek.jpg')); ?>" alt="Deskripsi Gambar" class="object-cover w-full h-[250px] lg:h-[275px] xl:h-[330px] md:object-cover md:max-w-full rounded-md shadow-md mt-5 md:mt-2 lg:mt-0" />
                    <p class="text-center font-semibold text-[15.5px] lg:text-base xl:text-[17px] mt-1.5 lg:mt-2 xl:mt-2.5">Sea Niko, S.E</p>
                    <p class="text-center text-sm lg:text-[15px] xl:text-base font-medium mt-0">Kepala Sekolah</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section class="relative mt-16 sm:mt-20">
    <!-- Div untuk overlay warna -->
    <div class="absolute top-0 left-0 w-full bg-[#0D464B] bg-opacity-90 z-10 h-[840px] sm:h-[790px] md:h-[550px] lg:h-[570px] xl:h-[590px]"></div>
    <!-- Gambar Latar -->
    <img src="<?php echo e(asset('images/school-AI1.jpg')); ?>" alt="School" class="top-0 left-0 w-full z-0 opacity-80 object-cover object-center h-[840px] sm:h-[790px] md:h-[550px] lg:h-[570px] xl:h-[590px]" />

    <!-- TAMPILAN HP -->
    <div class="block md:hidden absolute top-0 left-0 w-full my-8 z-20">
        <h1 class="text-white text-center font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl mt-3">Visi & Misi SMA Tanjung Priok</h1>
        <div class="mx-5 sm:mx-8">
            <img src="<?php echo e(asset('images/school-AI3.png')); ?>" alt="Deskripsi Gambar" class="my-6 sm:my-6 w-full max-h-[300px] object-cover object-center rounded-md" />
            <h1 class="text-white font-semibold text-lg underline underline-offset-8 mt-1 decoration-[3px] decoration-[#FF8B42]">Visi</h1>
            <p class="text-white text-sm sm:text-[14.5px] font-normal mt-3.5 text-justify leading-[1.5]">Unggul Dalam Mutu Berpijak pada Budaya Bangsa</p>

            <h1 class="text-white font-semibold text-lg mt-5 underline underline-offset-8 decoration-[3px] decoration-[#FF8B42]">Misi</h1>
            <ol class="text-white ml-4 list-decimal text-sm sm:text-[14.5px] font-normal mt-3.5 text-justify leading-[1.5]">
                <li>Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga setiap siswa berkembang secara optimal, sesuai dengan potensi yang dimiliki</li>
                <li>Menumbuhkan semangat keunggulan secara intensif kepada seluruh warga sekolah</li>
                <li>Mendorong dan membantu untuk mengenali potensi dirinya, sehingga dapat dikembangkan secara optimal</li>
                <li>Menumbuhkan penghayatan terhadap ajaran agama yang dianut dan juga budaya bangsa sehingga menjadi sumber kearifan dalam bertindak</li>
                <li>Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah dan penentu kebijakan sekolah</li>
            </ol>
        </div>
    </div>

    <!-- TAMPILAN TABLET & LAPTOP -->
    <div class="md:block hidden absolute top-0 left-0 w-full my-8 lg:my-12 z-20">
        <div class="flex z-20 mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
            <div class="w-3/5 mr-6 xl:mr-12 relative">
                <h1 class="text-white font-semibold text-[22px] lg:text-2xl xl:text-[28px] leading-normal xl:leading-[1.5] mt-6 underline underline-offset-8 decoration-[#FF8B42] decoration-[3px] lg:decoration-4">Visi</h1>
                <p class="text-white text-[15px] lg:text-base xl:text-[17px] font-normal text-justify leading-[1.5] mt-3.5 lg:mt-4 xl:mt-[17px]">Unggul Dalam Mutu Berpijak pada Budaya Bangsa</p>
                <h1 class="text-white font-semibold text-[22px] lg:text-2xl xl:text-[28px] leading-normal xl:leading-[1.5] mt-5 xl:mt-6 underline underline-offset-8 decoration-[#FF8B42] decoration-[3px] lg:decoration-4">Misi</h1>
                <ol class="ml-5 list-decimal text-[15px] text-white lg:text-base xl:text-[17px] font-normal text-justify leading-[1.5] xl:leading-[1.7] mt-3.5 lg:mt-4 xl:mt-[17px]">
                    <li>Melaksanakan pembelajaran dan bimbingan secara efektif, sehingga setiap siswa berkembang secara optimal, sesuai dengan potensi yang dimiliki</li>
                    <li>Menumbuhkan semangat keunggulan secara intensif kepada seluruh warga sekolah</li>
                    <li>Mendorong dan membantu untuk mengenali potensi dirinya, sehingga dapat dikembangkan secara optimal</li>
                    <li>Menumbuhkan penghayatan terhadap ajaran agama yang dianut dan juga budaya bangsa sehingga menjadi sumber kearifan dalam bertindak</li>
                    <li>Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah dan penentu kebijakan sekolah</li>
                </ol>
            </div>
            <div class="w-2/5 ml-6 xl:ml-12 relative">
                <h1 class="text-white font-bold md:text-3xl lg:text-[33px] xl:text-4xl lg:mr-5 leading-loose mt-6 text-right tracking-wide">Visi & Misi</h1>
                <h1 class="text-white font-bold md:text-[26px] lg:text-[30px] xl:text-[33px] lg:mr-5 mt-1.5 xl:mt-2 text-right tracking-wide">SMA Tanjung Priok</h1>
                <img src="<?php echo e(asset('images/school-AI3.png')); ?>" alt="Deskripsi Gambar" class="object-cover w-full h-[300px] xl:h-[290px] rounded-md mt-10" />
            </div>
        </div>
    </div>
</section>

<!-- FASILITAS -->
<section class="my-12 sm:my-16 md:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <!-- TAMPILAN HP -->
        <div class="block md:hidden">
            <h1 class="font-bold text-xl sm:text-2xl text-center">Fasilitas Sekolah</h1>
            <p class="mt-3 sm:mt-4 text-sm sm:text-[15px] font-normal text-center"></p>
            <ul id="sliderFasilitas" class="flex gap-5">
                <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class=" mx-5 w-full sm:w-[300px]">
                    <div class="relative">
                        <div class="justify-center items-center border rounded-md border-black border-opacity-25">
                            <img src="<?php echo e(asset('storage/fasilitas/' . $row->gambar)); ?>" class="rounded-md w-full h-[180px] object-cover object-center" />
                        </div>
                        <div class="absolute inset-x-0 -bottom-5 flex justify-center items-center">
                            <div class="bg-[#FF8B42] rounded-xl w-3/4 py-3 px-3">
                                <h1 class="text-sm font-semibold text-center"><?php echo e($row->nama); ?></h1>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="flex justify-center items-center mt-7">
                <button onclick="prevFasilitas()" class="rounded-full bg-[#0D464B] p-1.5 sm:p-2 mr-2 hover:bg-[#FF8B42]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5" fill="#fff">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                    </svg>
                </button>
                <button onclick="nextFasilitas()" class="rounded-full bg-[#0D464B] p-1.5 sm:p-2 ml-2 hover:bg-[#FF8B42]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5" fill="#fff">
                        <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                    </svg>
                </button>
            </div>
            <script>
                if (window.innerWidth < 640) {
                    currentSlideIDFasilitas = 1;
                    sliderElementFasilitas = document.getElementById("sliderFasilitas");
                    totalSlidesFasilitas = sliderElementFasilitas.childElementCount;

                    function nextFasilitas() {
                        if (currentSlideIDFasilitas < totalSlidesFasilitas) {
                            currentSlideIDFasilitas++;
                            showSlideFasilitas();
                        }
                    }
                    function prevFasilitas() {
                        if (currentSlideIDFasilitas > 1) {
                            currentSlideIDFasilitas--;
                            showSlideFasilitas();
                        }
                    }
                    function showSlideFasilitas() {
                        slidesFasilitas = document.getElementById("sliderFasilitas").getElementsByTagName("li");
                        for (let index = 0; index < totalSlidesFasilitas; index++) {
                            const elementFasilitas = slidesFasilitas[index];
                            if (currentSlideIDFasilitas === index + 1) {
                                elementFasilitas.classList.remove("hidden");
                            } else {
                                elementFasilitas.classList.add("hidden");
                            }
                        }
                    }
                    showSlideFasilitas();
                }

                if (window.innerWidth >= 640) {
                    currentSlideIDFasilitas2 = 0;
                    sliderElementFasilitas2 = document.getElementById("sliderFasilitas");
                    totalSlidesFasilitas2 = sliderElementFasilitas2.childElementCount;

                    function nextFasilitas() {
                        if (currentSlideIDFasilitas2 < totalSlidesFasilitas2 - 2) {
                            currentSlideIDFasilitas2++;
                            showSlideFasilitas2();
                        }
                    }
                    function prevFasilitas() {
                        if (currentSlideIDFasilitas2 > 0) {
                            currentSlideIDFasilitas2--;
                            showSlideFasilitas2();
                        } else if (currentSlideIDFasilitas2 === 0) {
                            // Tambahkan kondisi ini untuk menangani slide pertama
                            currentSlideIDFasilitas2 = 0; // Ubah currentSlideID menjadi 0 untuk menghindari slide negatif
                            showSlideFasilitas2();
                        }
                    }
                    function showSlideFasilitas2() {
                        slidesFasilitas2 = document.getElementById("sliderFasilitas").getElementsByTagName("li");
                        for (let index = 0; index < totalSlidesFasilitas2; index++) {
                            const elementFasilitas2 = slidesFasilitas2[index];
                            if (currentSlideIDFasilitas2 <= index && index < currentSlideIDFasilitas2 + 2) {
                                elementFasilitas2.classList.remove("hidden");
                            } else {
                                elementFasilitas2.classList.add("hidden");
                            }
                        }
                    }
                    showSlideFasilitas2();
                }
            </script>
        </div>

        <!-- TAMPILAN TABLET & LAPTOP -->
        <div class="hidden md:block">
            <h1 class="text-3xl lg:text-[33px] xl:text-4xl font-bold mb-10 text-center">Fasilitas Sekolah</h1>
            <div class="flex">
                <div class="w-full mr-8">
                    <ul class="flex md:gap-8 lg:gap-16 xl:gap-20 2xl:gap-28" id="sliderFasilitasLarge">
                        <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="hidden w-[330px] xl:w-[380px]">
                            <div class="relative">
                                <div class="justify-center items-center border rounded-md border-black border-opacity-25">
                                    <img src="<?php echo e(asset('storage/fasilitas/' . $row->gambar)); ?>" class="w-full h-[200px] lg:h-[220px] xl:h-[260px] object-cover object-center border-b border-black border-opacity-25 rounded-md" />
                                </div>
                                <div class="absolute inset-x-0 -bottom-5 flex justify-center items-center">
                                    <div class="bg-[#FF8B42] rounded-xl py-2 px-3 w-3/4  lg:px-3 lg:py-3 xl:px-3 xl:py-3">
                                        <h1 class="text-sm lg:text-[15px] xl:text-[17px] font-semibold text-center"><?php echo e($row->nama); ?></h1>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="">
                <div class="mt-10 lg:mt-12 xl:mt-[50px]">
                    <div class="flex justify-center mt-6 lg:mt-8">
                        <button onclick="prevFasilitasLarge()" class="rounded-full bg-[#0D464B] p-2.5 lg:p-3 mr-2 xl:mr-3 hover:bg-[#FF8B42]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5 lg:w-[24px] lg:h-[24px]" fill="#fff">
                                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                            </svg>
                        </button>
                        <button onclick="nextFasilitasLarge()" class="rounded-full bg-[#0D464B] p-2.5 lg:p-3 ml-2 xl:ml-3 hover:bg-[#FF8B42]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5 lg:w-[24px] lg:h-[24px]" fill="#fff">
                                <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <script>
                const sliderElement = document.getElementById("sliderFasilitasLarge");
                const totalSlides = sliderElement.childElementCount;
                let currentSlideID = totalSlides > 2 ? totalSlides - 3 : 0; // buat tiga gambar pertama yang ditampilkan di awal

                function nextFasilitasLarge() {
                    if (currentSlideID > 0) {
                        // Mengubah kondisi agar ketika currentSlideID mencapai 0, tidak bisa lagi digeser ke kiri
                        currentSlideID--;
                    }
                    showSlideFasilitas3();
                }

                function prevFasilitasLarge() {
                    if (currentSlideID < totalSlides - 3) {
                        // Mengubah kondisi agar ketika currentSlideID mencapai totalSlides - 3, tidak bisa lagi digeser ke kanan
                        currentSlideID++;
                        showSlideFasilitas3();
                    }
                }

                function showSlideFasilitas3() {
                    const slides = sliderElement.getElementsByTagName("li");

                    for (let index = 0; index < totalSlides; index++) {
                        const element = slides[index];
                        if (index >= currentSlideID && index < currentSlideID + 3) {
                            // ini buat nampilin tiga gambar pada layar
                            slides[index].classList.remove("hidden");
                            slides[index].classList.add("opacity-100");
                            slides[index].classList.remove("opacity-55");
                        } else {
                            slides[index].classList.add("hidden");
                            slides[index].classList.remove("opacity-100");
                            slides[index].classList.add("opacity-55");
                        }
                    }
                }

                showSlideFasilitas3();
            </script>
        </div>
    </div>
</section>

<!-- STRUKTUR ORGANISASI -->
<section class="my-12 sm:my-16 lg:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <?php $__currentLoopData = $struktur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h1 class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl text-center">Struktur Organisasi</h1>
        <div class="md:flex mt-7 sm:mt-8 md:mt-12 lg:mt-16 xl:mt-[66px] text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px]">
            <div class="md:w-1/2 md:mr-8 lg:mr-10 xl:mr-12">
                <p class="bg-[#0D464B] px-2.5 py-1.5 font-medium text-white w-fit">Dinas Dikdas</p>
                <p class="mt-2">DKI Jakarta</p>
                <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
            </div>
            <div class="mt-4 md:w-1/2 md:ml-8 lg:ml-10 xl:ml-12 md:mt-0">
                <p class="bg-[#0D464B] px-2.5 py-1.5 font-medium text-white w-fit">Yayasan</p>
                <p class="mt-2">Dikantara</p>
                <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
            </div>
        </div>
        <div class="mt-4 md:mt-6 text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px]">
            <p class="bg-[#0D464B] px-2.5 py-1.5 font-medium text-white w-fit">Kepala Sekolah</p>
            <p class="mt-2"><?php echo e($row->kepsek); ?></p>
            <div class="md:flex">
                <div class="md:mr-8 lg:mr-10 xl:mr-12 w-1/2">
                    <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
                </div>
                <div class="md:ml-8 lg:ml-10 xl:ml-12 w-1/2"></div>
            </div>
            <p class="mt-1">Kepala Sekolah Tanjung Priok</p>
        </div>
        <div class="md:flex mt-4 md:mt-6 text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px]">
            <div class="md:w-1/2 md:mr-8 lg:mr-10 xl:mr-12">
                <p class="bg-[#0D464B] px-2.5 py-1.5 font-medium text-white w-fit">Wakil Kepala Sekolah</p>
                <div>
                    <p class="mt-2"><?php echo e($row->wakil_kurikulum); ?></p>
                    <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
                    <p class="mt-1">Wakil Kepala Sekolah Bidang Kurikulum</p>
                </div>
                <div class="mt-3">
                    <p class="mt-2"><?php echo e($row->wakil_kesiswaan); ?></p>
                    <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
                    <p class="mt-1">Wakil Kepala Sekolah Bidang Kesiswaan</p>
                </div>
            </div>
            <div class="mt-3 md:mt-8 md:w-1/2 md:ml-8 lg:ml-10 xl:ml-12">
                <p class="mt-2"><?php echo e($row->wakil_sarpras); ?></p>
                <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
                <p class="mt-1">Wakil Kepala Sekolah Bidang Sarana Prasarana</p>
            </div>
        </div>
        <div class="mt-4 md:mt-6 text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px]">
            <p class="bg-[#0D464B] px-2.5 py-1.5 font-medium text-white w-fit">Bidang Konseling</p>
            <p class="mt-2"><?php echo e($row->bk); ?></p>
            <div class="md:flex">
                <div class="md:mr-8 lg:mr-10 xl:mr-12 w-1/2">
                    <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
                </div>
                <div class="md:ml-8 lg:ml-10 xl:ml-12 w-1/2"></div>
            </div>
            <p class="mt-1">Guru Bimbingan Konseling dan Penyuluhan</p>
        </div>
        <div class="mt-4 md:mt-6 text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px]">
            <p class="bg-[#0D464B] px-2.5 py-1.5 font-medium text-white w-fit">Pembina OSIS</p>
            <p class="mt-2"><?php echo e($row->osis); ?></p>
            <div class="md:flex">
                <div class="md:mr-8 lg:mr-10 xl:mr-12 w-1/2">
                    <div class="bg-black w-full py-[1px] rounded-lg mt-1.5"></div>
                </div>
                <div class="md:ml-8 lg:ml-10 xl:ml-12 w-1/2"></div>
            </div>
            <p class="mt-1">Pembina dan Penanggungjawab Osis</p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<!-- FOOTER -->
<?php echo $__env->make('front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\cms-administration-smatjpriok-2\resources\views/front/profil.blade.php ENDPATH**/ ?>