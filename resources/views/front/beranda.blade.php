<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>SMA Tanjung Priok Jakarta</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png" />
    <!-- <link href="/public/css/output.css" rel="stylesheet" /> -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- PENTING!!!! -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link
        rel="stylesheet"
        href={{asset("../editor/richtexteditor/rte_theme_default.css")}}
    />
    <script
        type="text/javascript"
        src={{asset("../editor/richtexteditor/rte.js")}}
    ></script>
    <script
        type="text/javascript"
        src={{asset("../editor/richtexteditor/plugins/all_plugins.js")}}
    ></script>
</head>
<body class="font-cms bg-[#E5F3EF]">
<!-- NAVBAR -->
<nav class="sticky bg-[#0D464B] py-3 lg:py-3.5 top-0 w-full z-30">
    <!-- TAMPILAN HP -->
    <div class="md:hidden relative">
        <div class="ml-5 sm:ml-8 flex items-center">
            <img src="{{ asset('images/logo.png') }}" class="w-10 my-auto" />
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
            <a href="{{route("home")}}" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]">Beranda</a>
            <a href="{{route("profil-sekolah")}}" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Profil</a>
            <a href="#" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]" id="dataDropdownHP">
                Data
                <div class="hidden absolute -mt-12 -left-28 bg-[#FF8B42] p-2 w-28 rounded-l-md font-medium" id="dataDropdownContentHP">
                    <a href="{{route("list-guru")}}" class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center">Data Guru</a>
                    <a href="{{route("list-staf")}}" class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center">Data Staf</a>
                </div>
            </a>
            <a href="{{route("konten-sekolah")}}" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Konten</a>
            <a href="https://frontend-e-learning.web.app/view/login/siswa.html" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">E-Learning</a>
            <!-- Tambahkan navigasi lainnya sesuai kebutuhan -->
        </div>
    </div>

    <!-- TAMPILAN TABLET DAN KOMPUTER -->
    <div class="hidden mx-5 sm:mx-8 lg:mx-10 xl:mx-20 md:grid grid-cols-2">
        <div class="flex">
            <img src="{{ asset('images/logo.png') }}" class="md:w-[40px] md:h-[40px] lg:w-[48px] lg:h-[47px]" />
            <h1 class="block my-auto ml-3 font-semibold tracking-wide text-white text-[14px] lg:text-base xl:text-[17px]">SMA Tanjung Priok Jakarta</h1>
        </div>
        <div class="justify-evenly flex my-auto text-white font-medium text-[13.5px] lg:text-[14.5px] xl:text-[15.5px] lg:tracking-normal xl:tracking-normal">
            <a href="{{route("home")}}">
                <p class="hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]">Beranda</p>
            </a>
            <a href="{{route("profil-sekolah")}}">
                <p class="hover:text-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42]">Data Sekolah</p>
                <div class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8" id="dataDropdownContent1">
                    <a href="{{route("list-guru")}}" class="block text-black hover:font-bold py-1">Data Guru</a>
                    <a href="{{route("list-staf")}}" class="block text-black hover:font-bold py-1 mt-2">Data Staf</a>
                </div>
            </a>
            <a href="{{route("konten-sekolah")}}">
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
            <img class="w-full mb-5 sm:mb-0 sm:w-1/2 rounded-br-[400px] xl:h-[600px] lg:h-[500px] md:h-[430px] sm:h-[380px] h-[280px] object-cover object-center" src={{ asset('images/carousel-fix.jpg') }} />
            <div class="sm:w-1/2 my-auto mr-5 sm:mr-7 md:mr-10 lg:mr-12 xl:mr-16 xl:ml-0 sm:ml-3 ml-2 text-white">
                <p class="font-semibold text-[22px] sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl text-right tracking-wide">SMA Tanjung Priok Jakarta</p>
                <p class="font-medium text-[15px] sm:text-base md:text-lg lg:text-xl xl:text-2xl text-right tracking-wide mt-1.5 sm:mt-3 md:mt-4 lg:mt-6 xl:mt-7">Unggul Dalam Mutu Berpijak pada Budaya Bangsa</p>
            </div>
        </div>
    </div>
</section>

<!-- SEKILAS SMA TANJUNG PRIOK -->
<section class="my-10 sm:my-12">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <!-- Tampilan HP -->
        <div class="text-black block md:hidden">
            <div class="bg-[#0D464B] py-0.5 w-3/4 ml-auto rounded-md"></div>
            <h1 class="font-bold text-xl sm:text-2xl mt-5 sm:mt-7 text-justify">Sekilas Tentang SMA Tanjung Priok Jakarta</h1>
            <p class="text-sm sm:text-[14.5px] font-normal mt-4 leading-[1.55] text-justify">
                SMA Tanjung Priok Jakarta adalah sebuah lembaga pendidikan menengah atas berakreditasi A yang berkomitmen untuk menjadi yang terdepan dalam mencapai mutu pendidikan sambil tetap mengakar pada nilai-nilai dan budaya bangsa. SMA
                Tanjung Priok Jakarta mengedepankan pembentukan karakter siswa, termasuk nilai-nilai moral, etika, kepemimpinan, dan keterampilan sosial.
            </p>
            <div class="bg-[#0D464B] w-3/4 py-0.5 mt-5 sm:mt-7 rounded-md"></div>
        </div>

        <!-- TAMPILAN TABLET DAN LAPTOP -->
        <div class="hidden md:block mt-10 lg:mt-12 xl:mt-16">
            <div class="flex">
                <div class="w-1/2 mr-8 relative">
                    <h1 class="font-semibold text-3xl lg:text-[33px] xl:text-4xl my-auto leading-normal xl:leading-[1.5] mt-[50px] lg:mt-12 xl:mt-12">Sekilas Tentang SMA Tanjung Priok Jakarta</h1>
                    <!-- GIMANA CARANYA AGAR INI KEBAWAH? -->
                    <div class="bg-[#0D464B] py-0.5 w-full absolute bottom-0 rounded-md"></div>
                </div>
                <div class="w-1/2 ml-8 relative">
                    <div class="bg-[#0D464B] py-0.5 w-full absolute top-0 rounded-md"></div>
                    <p class="text-[15px] lg:text-base xl:text-[17px] xl:tracking-wide lg:leading-relaxed font-normal my-5 lg:my-7 xl:my-10 text-justify">
                        SMA Tanjung Priok Jakarta adalah sebuah lembaga pendidikan menengah atas berakreditasi A yang berkomitmen untuk menjadi yang terdepan dalam mencapai mutu pendidikan sambil tetap mengakar pada nilai-nilai dan budaya bangsa.
                        SMA Tanjung Priok Jakarta mengedepankan pembentukan karakter siswa, termasuk nilai-nilai moral, etika, kepemimpinan, dan keterampilan sosial.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EKSPLORASI TERBARU -->
<section class="my-12 sm:my-16 lg:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1 class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl text-center">Eksplorasi Terbaru</h1>
        <p class="mt-3 font-normal lg:mt-5 text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-lg italic text-center">Jelajahi update terbaru dari komunitas pendidikan kami!</p>
        <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-8 sm:mt-3">
            <a href="{{route("list-prestasi")}}">
                <div class="bg-[#00C59C] rounded-md bg-opacity-80 py-6 px-6 lg:px-7 lg:py-7 mt-5 hover:transition hover:scale-105 ease-in-out duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-10 h-10">
                        <path
                            d="M400 0H176c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8H24C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9H192c-17.7 0-32 14.3-32 32s14.3 32 32 32H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H357.9C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24H446.4c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112h84.4c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6h84.4c-5.1 66.3-31.1 111.2-63 142.3z"
                        />
                    </svg>
                    <p class="font-bold text-base md:text-[16.5px] lg:text-[17px] xl:text-lg mt-2 lg:mt-4">Prestasi Sekolah</p>
                    <p class="text-[13px] sm:text-[13.5px] md:text-sm lg:text-[14.5px] xl:text-[15.5px] font-normal mt-1">Telusuri Pencapaian Gemilang Sekolah Kami.</p>
                </div>
            </a>
            <a href="{{route("list-berita")}}">
                <div class="bg-[#FF8B42] rounded-md bg-opacity-85 py-6 px-6 lg:px-7 lg:py-7 mt-5 hover:transition hover:scale-105 ease-in-out duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-10 h-10">
                        <path
                            d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"
                        />
                    </svg>
                    <p class="font-bold text-base md:text-[16.5px] lg:text-[17px] xl:text-lg mt-2 lg:mt-4">Berita Sekolah</p>
                    <p class="text-[13px] sm:text-[13.5px] md:text-sm lg:text-[14.5px] xl:text-[15.5px] font-normal mt-1">Jelajahi Berita-Berita Terkini Sekolah Kami.</p>
                </div>
            </a>
            <a href="{{route("list-pengumuman")}}">
                <div class="bg-[#00A9C0] rounded-md bg-opacity-75 py-6 px-6 lg:px-7 lg:py-7 mt-5 sm:mt-0 lg:mt-5 hover:transition hover:scale-105 ease-in-out duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-10 h-10">
                        <path
                            d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75H192 160 64c-35.3 0-64 28.7-64 64v96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V352l8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V300.4c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4V32zm-64 76.7V240 371.3C357.2 317.8 280.5 288 200.7 288H192V192h8.7c79.8 0 156.5-29.8 215.3-83.3z"
                        />
                    </svg>
                    <p class="font-bold text-base md:text-[16.5px] lg:text-[17px] xl:text-lg mt-2 lg:mt-4">Pengumuman Sekolah</p>
                    <p class="text-[13px] sm:text-[13.5px] md:text-sm lg:text-[14.5px] xl:text-[15.5px] font-normal mt-1">Temukan Pengumuman Terbaru Sekolah Kami.</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- EKSTRAKURIKULER -->
<section class="relative mt-16 sm:mt-20 h-[430px] sm:h-[450px] md:h-[400px] lg:h-[440px] xl:h-[520px]">
    <!-- Div untuk overlay warna -->
    <div class="absolute top-0 left-0 w-full h-full bg-[#0D464B] bg-opacity-90 z-10"></div>
    <!-- Gambar Latar -->
    <img src="{{ asset('images/school-AI1.jpg') }}" alt="School" class="top-0 left-0 w-full z-0 opacity-80 object-cover object-center h-[430px] sm:h-[450px] md:h-[400px] lg:h-[440px] xl:h-[520px]" />
    <!-- TAMPILAN HP -->
    <div class="block md:hidden absolute top-0 left-0 w-full my-8 z-20">
        <h1 class="text-white text-center font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl">Kegiatan Ekstrakurikuler</h1>
        <!-- INI YANG AKAN DIGESER -->
        <ul id="slider" class="flex">
            @foreach($ekstrakurikulers as $ekstrakurikuler)
                <li class="mx-5 sm:mx-8">
                    <div class="flex justify-center items-center my-3 sm:my-4">
                        <img src="{{ asset('storage/public/ekstrakurikuler-logos/' . $ekstrakurikuler->logo) }}" class="w-[130px] h-[130px] sm:w-[150px] sm:h-[150px] items-center object-cover object-center" />
                    </div>
                    <h1 class="text-white text-center font-semibold text-[17px] sm:text-lg">{{ $ekstrakurikuler->nama }}</h1>
                    <p class="text-center text-white font-light text-[12.5px] sm:text-sm mt-2">
                        {!! strlen($ekstrakurikuler->deskripsi) > 150 ? substr($ekstrakurikuler->deskripsi, 0, 150) . '...' : $ekstrakurikuler->deskripsi !!}
                    </p>
                    <div class="flex justify-center items-center mt-2 sm:mt-3">
                        <a href="{{ route('detail-ekstrakurikuler', ['id' => $ekstrakurikuler->id]) }}">
                            <p class="text-[12.5px] sm:text-sm font-medium text-white underline">Selengkapnya</p>
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="mt-[1px] ml-0.5 w-3.5 h-3.5" fill="#fff">
                            <path
                                d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                            />
                        </svg>
                    </div>
                </li>
            @endforeach
        </ul>
        <!-- INI UNTUK PANAH KANAN DAN KIRI -->
        <div class="flex justify-center items-center mt-5">
            <button onclick="prev()" class="rounded-full bg-white p-1.5 sm:p-2 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5">
                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                </svg>
            </button>
            <button onclick="next()" class="rounded-full bg-white p-1.5 sm:p-2 ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5">
                    <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                </svg>
            </button>
        </div>
        <script>
            currentSlideIDEkskul = 1;
            sliderElementEkskul = document.getElementById("slider");
            totalSlidesEkskul = sliderElementEkskul.childElementCount;

            function next() {
                if (currentSlideIDEkskul < totalSlidesEkskul) {
                    currentSlideIDEkskul++;
                    showSlideEkskul();
                }
            }
            function prev() {
                if (currentSlideIDEkskul > 1) {
                    currentSlideIDEkskul--;
                    showSlideEkskul();
                }
            }
            function showSlideEkskul() {
                slidesEkskul = document.getElementById("slider").getElementsByTagName("li");
                for (let index = 0; index < totalSlidesEkskul; index++) {
                    const elementEkskul = slidesEkskul[index];
                    if (currentSlideIDEkskul === index + 1) {
                        elementEkskul.classList.remove("hidden");
                    } else {
                        elementEkskul.classList.add("hidden");
                    }
                }
            }
            showSlideEkskul();
        </script>
    </div>
    <!-- TAMPILAN TABLET DAN LAPTOP -->
    <div class="md:block hidden absolute top-0 left-0 w-full my-12 lg:my-16 xl:my-20 z-20">
        <h1 class="text-white text-center font-semibold md:text-3xl lg:text-[33px] xl:text-4xl">Kegiatan Ekstrakurikuler</h1>
        <div class="flex md:mx-10 lg:mx-16 xl:mx-20">
            <button onclick="prev2()" class="rounded-full p-1 mr-4 lg:mr-6 xl:mr-8 transition ease-in-out hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-8 h-8 lg:w-10 lg:h-10" fill="#fff">
                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                </svg>
            </button>
            <!-- INI YANG AKAN DIGESER -->
            <ul id="slider2" class="mt-3">
                @foreach($ekstrakurikulers as $ekstrakurikuler)
                    <li class="flex w-full">
                        <div class="flex w-full justify-center items-center my-3 sm:my-4">
                            <img src="{{ asset('storage/public/ekstrakurikuler-logos/' . $ekstrakurikuler->logo) }}" class="w-[210px] h-[210px] lg:w-[230px] lg:h-[230px] xl:w-[260px] xl:h-[260px] items-center object-cover object-center" />
                            <div class="ml-6 xl:ml-8 w-full">
                                <h1 class="text-white font-semibold text-[19px] lg:text-[22px] xl:text-[26px]">{{ $ekstrakurikuler->nama }}</h1>
                                <p class="text-white font-light text-[14.5px] lg:text-base xl:text-lg mt-3 w-full">
                                    {!! strlen($ekstrakurikuler->deskripsi) > 300 ? substr($ekstrakurikuler->deskripsi, 0, 300) . '...' : $ekstrakurikuler->deskripsi !!}
                                </p>
                                <div class="mt-4 flex">
                                    <a href="{{ route('detail-ekstrakurikuler', ['id' => $ekstrakurikuler->id]) }}">
                                        <p class="text-[14.5px] lg:text-base xl:text-[17px] font-medium text-white underline">Selengkapnya</p>
                                    </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="mt-[3px] ml-1 w-4 h-4" fill="#fff">
                                        <path
                                            d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <button onclick="next2()" class="rounded-full p-1 ml-4 lg:ml-6 xl:ml-8 transition ease-in-out hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-8 h-8 lg:w-10 lg:h-10" fill="white">
                    <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                </svg>
            </button>
        </div>
        <script>
            currentSlideIDEkskul2 = 1;
            sliderElementEkskul2 = document.getElementById("slider2");
            totalSlidesEkskul2 = sliderElementEkskul2.childElementCount;

            function next2() {
                if (currentSlideIDEkskul2 < totalSlidesEkskul2) {
                    currentSlideIDEkskul2++;
                    showSlideEkskul2();
                }
            }
            function prev2() {
                if (currentSlideIDEkskul2 > 1) {
                    currentSlideIDEkskul2--;
                    showSlideEkskul2();
                }
            }
            function showSlideEkskul2() {
                slidesEkskul2 = document.getElementById("slider2").getElementsByTagName("li");
                for (let index = 0; index < totalSlidesEkskul2; index++) {
                    const elementEkskul2 = slidesEkskul2[index];
                    if (currentSlideIDEkskul2 === index + 1) {
                        elementEkskul2.classList.remove("hidden");
                    } else {
                        elementEkskul2.classList.add("hidden");
                    }
                }
            }
            showSlideEkskul2();
        </script>
    </div>
</section>

<!-- PRESTASI -->
<section class="my-12 sm:my-16 md:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <!-- TAMPILAN HP -->
        <div class="block md:hidden">
            <h1 class="font-bold text-xl sm:text-2xl text-center">Prestasi Sekolah</h1>
            <p class="mt-3 sm:mt-4 text-sm sm:text-[15px] font-normal text-center">Telusuri pencapaian gemilang SMA Tanjung Priok Jakarta, sumber inspirasi bagi para siswa.</p>
            <ul id="sliderPrestasi" class="flex gap-5">
                @foreach($prestasis as $prestasi)
                    <li class="mx-5 w-full sm:w-[300px]">
                        <a>
                            <div class="justify-center items-center mt-5 border rounded-md border-black border-opacity-25">
                                <div class="border-b h-[180px] border-black border-opacity-25 rounded-md">
                                    <img src="{{ asset('storage/public/prestasi/' . $prestasi->gambar) }}" class="rounded-t-md w-full h-[180px] object-cover object-center" />
                                </div>
                                <div class="bg-white rounded-b-md py-3 px-3">
                                    <h1 class="text-sm font-semibold text-center">{{ $prestasi->nama }}</h1>
                                    <p class="mt-1 text-[12.5px] font-normal text-center">{{ $prestasi->kejuaraan }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="flex justify-center items-center mt-5">
                <button onclick="prevPrestasi()" class="rounded-full bg-[#0D464B] p-1.5 sm:p-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5" fill="#fff">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                    </svg>
                </button>
                <button onclick="nextPrestasi()" class="rounded-full bg-[#0D464B] p-1.5 sm:p-2 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5" fill="#fff">
                        <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                    </svg>
                </button>
            </div>
            <script>
                if (window.innerWidth < 640) {
                    currentSlideIDPrestasi = 1;
                    sliderElementPrestasi = document.getElementById("sliderPrestasi");
                    totalSlidesPrestasi = sliderElementPrestasi.childElementCount;

                    function nextPrestasi() {
                        if (currentSlideIDPrestasi < totalSlidesPrestasi) {
                            currentSlideIDPrestasi++;
                            showSlidePrestasi();
                        }
                    }
                    function prevPrestasi() {
                        if (currentSlideIDPrestasi > 1) {
                            currentSlideIDPrestasi--;
                            showSlidePrestasi();
                        }
                    }
                    function showSlidePrestasi() {
                        slidesPrestasi = document.getElementById("sliderPrestasi").getElementsByTagName("li");
                        for (let index = 0; index < totalSlidesPrestasi; index++) {
                            const elementPrestasi = slidesPrestasi[index];
                            if (currentSlideIDPrestasi === index + 1) {
                                elementPrestasi.classList.remove("hidden");
                            } else {
                                elementPrestasi.classList.add("hidden");
                            }
                        }
                    }
                    showSlidePrestasi();
                }

                if (window.innerWidth >= 640) {
                    currentSlideIDPrestasi2 = 0;
                    sliderElementPrestasi2 = document.getElementById("sliderPrestasi");
                    totalSlidesPrestasi2 = sliderElementPrestasi2.childElementCount;

                    function nextPrestasi() {
                        if (currentSlideIDPrestasi2 < totalSlidesPrestasi2 - 2) {
                            currentSlideIDPrestasi2++;
                            showSlidePrestasi2();
                        }
                    }
                    function prevPrestasi() {
                        if (currentSlideIDPrestasi2 > 0) {
                            currentSlideIDPrestasi2--;
                            showSlidePrestasi2();
                        } else if (currentSlideIDPrestasi2 === 0) {
                            // Tambahkan kondisi ini untuk menangani slide pertama
                            currentSlideIDPrestasi2 = 0; // Ubah currentSlideID menjadi 0 untuk menghindari slide negatif
                            showSlidePrestasi2();
                        }
                    }
                    function showSlidePrestasi2() {
                        slidesPrestasi2 = document.getElementById("sliderPrestasi").getElementsByTagName("li");
                        for (let index = 0; index < totalSlidesPrestasi2; index++) {
                            const elementPrestasi2 = slidesPrestasi2[index];
                            if (currentSlideIDPrestasi2 <= index && index < currentSlideIDPrestasi2 + 2) {
                                elementPrestasi2.classList.remove("hidden");
                            } else {
                                elementPrestasi2.classList.add("hidden");
                            }
                        }
                    }
                    showSlidePrestasi2();
                }
            </script>
        </div>

        <!-- TAMPILAN TABLET & LAPTOP -->
        <div class="hidden md:block">
            <div class="flex">
                <div class="w-2/3 mr-8">
                    <ul class="flex" id="sliderPrestasiLarge">
                        @foreach($prestasis as $prestasi)
                            <li class="mr-7 lg:mr-12 xl:mr-20 w-[240px] xl:w-[280px] opacity-55">
                                <a>
                                    <div class="penanda justify-center items-center rounded-md border border-black border-opacity-25">
                                        <img src="{{ asset('storage/public/prestasi/' . $prestasi->gambar) }}" class="rounded-t-md w-full h-[120px] lg:h-[140px] xl:h-[180px] object-cover object-center border-black border-opacity-25" />
                                        <div class="bg-white rounded-b-md py-3 px-3 lg:px-4 lg:py-4 xl:py-5">
                                            <h1 class="text-[13px] lg:text-sm xl:text-[15px] font-semibold text-center">{{ $prestasi->nama }}</h1>
                                            <p class="mt-1 lg:mt-1.5 text-[11px] lg:text-xs xl:text-sm font-normal text-center">{{ $prestasi->kejuaraan }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="w-1/3 ml-8">
                    <div class="mt-0 xl:mt-10">
                        <h1 class="text-3xl lg:text-[33px] xl:text-4xl font-bold text-right">Prestasi Sekolah</h1>
                        <p class="mt-4 lg:mt-5 xl:mt-6 font-normal text-[15px] lg:text-base xl:text-[17px] xl:leading-relaxed text-right">Telusuri pencapaian gemilang SMA Tanjung Priok Jakarta, sumber inspirasi bagi para siswa.</p>
                        <div class="flex justify-end mt-6 lg:mt-8">
                            <button onclick="prevPrestasiLarge()" class="rounded-full bg-[#0D464B] p-2.5 lg:p-3 mr-2 xl:mr-3 hover:bg-[#FF8B42]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5 lg:w-[24px] lg:h-[24px]" fill="#fff">
                                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                </svg>
                            </button>
                            <button onclick="nextPrestasiLarge()" class="rounded-full bg-[#0D464B] p-2.5 lg:p-3 ml-2 xl:ml-3 hover:bg-[#FF8B42]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5 lg:w-[24px] lg:h-[24px]" fill="#fff">
                                    <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <script>
                    const sliderElement = document.getElementById(
                        "sliderPrestasiLarge"
                    );
                    const totalSlides = sliderElement.childElementCount;
                    let currentSlideID = totalSlides - 1;

                    function nextPrestasiLarge() {
                        if (currentSlideID > 1) {
                            currentSlideID--;
                        }
                        showSlidePrestasi3();
                    }

                    function prevPrestasiLarge() {
                        if (currentSlideID < totalSlides - 1) {
                            currentSlideID++;
                            showSlidePrestasi3();
                        }
                    }

                    function showSlidePrestasi3() {
                        const slides = sliderElement.getElementsByTagName("li");
                        const textH1 = sliderElement.getElementsByTagName("h1");
                        const textP = sliderElement.getElementsByTagName("p");
                        const high = sliderElement.getElementsByTagName("img");

                        for (let index = 0; index < totalSlides; index++) {
                            const element = slides[index];
                            const anchorTag = slides[index].querySelector("a"); // Mengambil tag <a> di dalam slide

                            if (index === currentSlideID) {
                                // Menampilkan slide saat ini
                                slides[index].classList.remove("hidden");
                                slides[index].classList.remove(
                                    "w-[240px]",
                                    "xl:w-[280px]",
                                    "opacity-55",
                                    "mt-5",
                                    "lg:mt-6",
                                    "xl:mt-7"
                                );
                                slides[index].classList.add(
                                    "w-[330px]",
                                    "xl:w-[380px]",
                                    "opacity-100",
                                    "mt-0"
                                );
                                textH1[index].classList.remove(
                                    "text-[13px]",
                                    "lg:text-sm",
                                    "xl:text-[15px]"
                                );
                                textP[index].classList.remove(
                                    "text-[11px]",
                                    "lg:text-xs",
                                    "xl:text-sm",
                                    "mt-1",
                                    "lg:mt-1.5"
                                );
                                high[index].classList.remove(
                                    "h-[120px]",
                                    "lg:h-[140px]",
                                    "xl:h-[180px]"
                                );
                                textH1[index].classList.add(
                                    "text-sm",
                                    "lg:text-[15px]",
                                    "xl:text-[17px]"
                                );
                                textP[index].classList.add(
                                    "text-xs",
                                    "lg:text-[13px]",
                                    "xl:text-[15px]",
                                    "mt-1",
                                    "lg:mt-1.5",
                                    "xl:mt-2"
                                );
                                high[index].classList.add(
                                    "h-[170px]",
                                    "lg:h-[190px]",
                                    "xl:h-[230px]"
                                );

                                // Menghilangkan kemampuan klik pada tag <a>
                                anchorTag.setAttribute("href", "#");
                            } else if (index === currentSlideID - 1) {
                                // Menampilkan slide sebelumnya
                                slides[index].classList.remove("hidden");
                                slides[index].classList.remove(
                                    "w-[330px]",
                                    "xl:w-[380px]",
                                    "opacity-100",
                                    "mt-0"
                                );
                                slides[index].classList.add(
                                    "w-[240px]",
                                    "xl:w-[280px]",
                                    "opacity-55",
                                    "mt-5",
                                    "lg:mt-6",
                                    "xl:mt-7"
                                );
                                textH1[index].classList.remove(
                                    "text-sm",
                                    "lg:text-[15px]",
                                    "xl:text-[17px]"
                                );
                                textP[index].classList.remove(
                                    "text-xs",
                                    "lg:text-[13px]",
                                    "xl:text-[15px]",
                                    "mt-1",
                                    "lg:mt-1.5",
                                    "xl:mt-2"
                                );
                                high[index].classList.remove(
                                    "h-[170px]",
                                    "lg:h-[190px]",
                                    "xl:h-[230px]"
                                );
                                textH1[index].classList.add(
                                    "text-[13px]",
                                    "lg:text-sm",
                                    "xl:text-[15px]"
                                );
                                textP[index].classList.add(
                                    "text-[11px]",
                                    "lg:text-xs",
                                    "xl:text-sm",
                                    "mt-1",
                                    "lg:mt-1.5"
                                );
                                high[index].classList.add(
                                    "h-[120px]",
                                    "lg:h-[140px]",
                                    "xl:h-[180px]"
                                );

                                // Menonaktifkan tag <a>
                                anchorTag.removeAttribute("href");
                            } else {
                                // Menyembunyikan slide lainnya
                                slides[index].classList.add("hidden");
                            }
                        }
                    }

                    showSlidePrestasi3();
                </script>

            </div>
        </div>
    </div>
</section>

<!-- PENGUMUMAN -->
<section class="my-12 sm:my-16 md:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <!-- TAMPILAN HP -->
        <div class="block md:hidden">
            <h1 class="font-bold text-xl sm:text-2xl text-center">Pengumuman Terbaru</h1>
            <p class="mt-3 sm:mt-4 text-sm sm:text-[15px] sm:leading-relaxed font-normal text-center">Jelajahi pengumuman terkini untuk tetap terhubung dengan perkembangan terbaru SMA Tanjung Priok Jakarta.</p>
            <ul id="sliderPengumuman" class="flex gap-5">
                @foreach($pengumumans as $pengumuman)
                    <li class="mx-5 w-full sm:w-[300px]">
                        <a href="{{ route('detail-pengumuman', ['slug' => $pengumuman->slug]) }}">
                            <div class="justify-center items-center mt-5 border rounded-md border-black border-opacity-25">
                                <div class="border-b h-[180px] border-black border-opacity-25 rounded-md">
                                    <img src="{{ asset('storage/public/pengumuman/gambar/' . $pengumuman->gambar) }}" class="rounded-t-md w-full h-[180px] object-cover object-center" />
                                </div>
                                <div class="bg-white rounded-b-md py-3 px-3">
                                    <h1 class="text-sm font-semibold text-justify">{{ $pengumuman->judul }}</h1>
                                    <p class="mt-1 text-xs sm:text-[12.5px] font-normal text-left">{{ $pengumuman->updated_at->format('d M Y')}}</p>
                                    <p class="mt-1 text-xs sm:text-[12.5px] font-normal text-left">By {{ $pengumuman->penulis }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
                <script>
                    if (window.innerWidth < 640) {
                        currentSlideIDPengumuman = 1;
                        sliderElementPengumuman =
                            document.getElementById("sliderPengumuman");
                        totalSlidesPengumuman = sliderElementPengumuman.childElementCount;

                        function nextPengumuman() {
                            if (currentSlideIDPengumuman < totalSlidesPengumuman) {
                                currentSlideIDPengumuman++;
                                showSlidePengumuman();
                            }
                        }
                        function prevPengumuman() {
                            if (currentSlideIDPengumuman > 1) {
                                currentSlideIDPengumuman--;
                                showSlidePengumuman();
                            }
                        }
                        function showSlidePengumuman() {
                            slidesPengumuman = document
                                .getElementById("sliderPengumuman")
                                .getElementsByTagName("li");
                            for (let index = 0; index < totalSlidesPengumuman; index++) {
                                const elementPengumuman = slidesPengumuman[index];
                                if (currentSlideIDPengumuman === index + 1) {
                                    elementPengumuman.classList.remove("hidden");
                                } else {
                                    elementPengumuman.classList.add("hidden");
                                }
                            }
                        }
                        showSlidePengumuman();
                    }

                    if (window.innerWidth >= 640) {
                        currentSlideIDPengumuman2 = 0;
                        sliderElementPengumuman2 =
                            document.getElementById("sliderPengumuman");
                        totalSlidesPengumuman2 =
                            sliderElementPengumuman2.childElementCount;

                        function nextPengumuman() {
                            if (currentSlideIDPengumuman2 < totalSlidesPengumuman2 - 2) {
                                currentSlideIDPengumuman2++;
                                showSlidePengumuman2();
                            }
                        }
                        function prevPengumuman() {
                            if (currentSlideIDPengumuman2 > 0) {
                                currentSlideIDPengumuman2--;
                                showSlidePengumuman2();
                            } else if (currentSlideIDPengumuman2 === 0) {
                                // Tambahkan kondisi ini untuk menangani slide pertama
                                currentSlideIDPengumuman2 = 0; // Ubah currentSlideID menjadi 0 untuk menghindari slide negatif
                                showSlidePengumuman2();
                            }
                        }
                        function showSlidePengumuman2() {
                            slidesPengumuman2 = document
                                .getElementById("sliderPengumuman")
                                .getElementsByTagName("li");
                            for (let index = 0; index < totalSlidesPengumuman2; index++) {
                                const elementPengumuman2 = slidesPengumuman2[index];
                                if (
                                    currentSlideIDPengumuman2 <= index &&
                                    index < currentSlideIDPengumuman2 + 2
                                ) {
                                    elementPengumuman2.classList.remove("hidden");
                                } else {
                                    elementPengumuman2.classList.add("hidden");
                                }
                            }
                        }
                        showSlidePengumuman2();
                    }
                </script>
            </ul>
            <div class="flex justify-center items-center mt-5">
                <button onclick="prevPengumuman()" class="rounded-full bg-[#0D464B] p-1.5 sm:p-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5" fill="#fff">
                        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                    </svg>
                </button>
                <button onclick="nextPengumuman()" class="rounded-full bg-[#0D464B] p-1.5 sm:p-2 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5" fill="#fff">
                        <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                    </svg>
                </button>
            </div>

        </div>
        <!-- TAMPILAN LAPTOP DAN TABLET -->
        <div class="hidden md:block">
            <div class="flex">
                <div class="w-1/3 mr-8">
                    <div class="xl:mt-10">
                        <h1 class="text-3xl lg:text-[33px] xl:text-4xl font-bold text-left">Pengumuman Sekolah</h1>
                        <p class="mt-4 lg:mt-5 xl:mt-6 font-normal text-[15px] lg:text-base xl:text-[17px] xl:leading-relaxed text-left">Jelajahi pengumuman terkini untuk tetap terhubung dengan perkembangan terbaru SMA Tanjung Priok Jakarta.</p>
                        <div class="flex justify-start mt-6 lg:mt-8">
                            <button onclick="prevPengumumanLarge()" class="rounded-full bg-[#0D464B] p-2.5 lg:p-3 mr-2 xl:mr-3 hover:bg-[#FF8B42]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5 lg:w-[24px] lg:h-[24px]" fill="#fff">
                                    <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                </svg>
                            </button>
                            <button onclick="nextPengumumanLarge()" class="rounded-full bg-[#0D464B] p-2.5 lg:p-3 ml-2 xl:ml-3 hover:bg-[#FF8B42]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-5 h-5 lg:w-[24px] lg:h-[24px]" fill="#fff">
                                    <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-2/3 ml-8">
                    <ul class="flex justify-end" id="sliderPengumumanLarge">
                        @foreach($pengumumans as $pengumuman)
                            <li class="ml-7 lg:ml-12 xl:ml-20 w-[330px] xl:w-[380px]">
                                <a href="{{ route('detail-pengumuman', ['slug' => $pengumuman->slug]) }}">
                                    <div class="justify-center items-center border rounded-md border-black border-opacity-25">
                                        <img src="{{ asset('storage/public/pengumuman/gambar/' . $pengumuman->gambar) }}" class="w-full h-[170px] lg:h-[190px] xl:h-[230px] object-cover object-center border-b border-black border-opacity-25 rounded-t-md" />
                                        <div class="bg-white rounded-b-md py-3 px-3 lg:px-4 lg:py-4">
                                            <h1 class="text-sm lg:text-[15px] xl:text-[17px] font-semibold text-justify">{{ $pengumuman->judul }}</h1>
                                            <p class="mt-1 lg:mt-1.5 xl:mt-2 text-xs lg:text-[13px] xl:text-[15px] font-normal text-left">{{ $pengumuman->updated_at->format('d M Y')}}</p>
                                            <h2 class="mt-1 lg:mt-1.5 xl:mt-2 text-xs lg:text-[13px] xl:text-[15px] font-normal text-left">By {{ $pengumuman->penulis }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <script>
                    const sliderElementPengumuman = document.getElementById(
                        "sliderPengumumanLarge"
                    );
                    const totalSlidesPengumuman3 =
                        sliderElementPengumuman.childElementCount;
                    let currentSlideIDPengumuman3 = 0;

                    function nextPengumumanLarge() {
                        if (currentSlideIDPengumuman3 > 0) {
                            currentSlideIDPengumuman3--;
                        } else {
                            // Jika sudah mencapai batas akhir, jangan lakukan apa-apa
                            return;
                        }
                        showSlidePengumuman3();
                    }
                    function prevPengumumanLarge() {
                        if (currentSlideIDPengumuman3 < totalSlidesPengumuman3 - 2) {
                            currentSlideIDPengumuman3++;
                        } else {
                            // Jika sudah mencapai awal, jangan lakukan apa-apa
                            return;
                        }
                        showSlidePengumuman3();
                    }

                    function showSlidePengumuman3() {
                        const slidesPengumuman3 =
                            sliderElementPengumuman.getElementsByTagName("li");
                        const textH1Pengumuman =
                            sliderElementPengumuman.getElementsByTagName("h1");
                        const textH2Pengumuman =
                            sliderElementPengumuman.getElementsByTagName("h2");
                        const textPPengumuman =
                            sliderElementPengumuman.getElementsByTagName("p");
                        const highPengumuman =
                            sliderElementPengumuman.getElementsByTagName("img");

                        for (let index = 0; index <= totalSlidesPengumuman3; index++) {
                            const element = slidesPengumuman3[index];
                            const anchorTagPengumuman =
                                slidesPengumuman3[index].querySelector("a"); // Mengambil tag <a> di dalam slide

                            if (index === currentSlideIDPengumuman3) {
                                // Menampilkan slide saat ini
                                slidesPengumuman3[index].classList.remove("hidden");
                                slidesPengumuman3[index].classList.remove(
                                    "w-[240px]",
                                    "xl:w-[280px]",
                                    "opacity-55",
                                    "mt-5",
                                    "lg:mt-6",
                                    "xl:mt-7"
                                );
                                slidesPengumuman3[index].classList.add(
                                    "w-[330px]",
                                    "xl:w-[380px]",
                                    "opacity-100",
                                    "mt-0"
                                );
                                textH1Pengumuman[index].classList.remove(
                                    "text-[13px]",
                                    "lg:text-sm",
                                    "xl:text-[15px]"
                                );
                                textPPengumuman[index].classList.remove(
                                    "text-[11px]",
                                    "lg:text-xs",
                                    "xl:text-sm",
                                    "mt-1",
                                    "lg:mt-1.5"
                                );
                                textH2Pengumuman[index].classList.remove(
                                    "text-[11px]",
                                    "lg:text-xs",
                                    "xl:text-sm",
                                    "mt-0.5",
                                    "lg:mt-1"
                                );
                                highPengumuman[index].classList.remove(
                                    "h-[120px]",
                                    "lg:h-[140px]",
                                    "xl:h-[180px]"
                                );
                                textH1Pengumuman[index].classList.add(
                                    "text-sm",
                                    "lg:text-[15px]",
                                    "xl:text-[17px]"
                                );
                                textPPengumuman[index].classList.add(
                                    "text-xs",
                                    "lg:text-[13px]",
                                    "xl:text-[15px]",
                                    "mt-1",
                                    "lg:mt-1.5",
                                    "xl:mt-2"
                                );
                                textH2Pengumuman[index].classList.add(
                                    "text-xs",
                                    "lg:text-[13px]",
                                    "xl:text-[15px]",
                                    "mt-1",
                                    "lg:mt-1.5",
                                    "xl:mt-2"
                                );
                                highPengumuman[index].classList.add(
                                    "h-[170px]",
                                    "lg:h-[190px]",
                                    "xl:h-[230px]"
                                );

                                // Menghilangkan kemampuan klik pada tag <a>
                                anchorTagPengumuman.setAttribute("href", "#");
                            } else if (index === currentSlideIDPengumuman3 + 1) {
                                // Menampilkan slide sebelumnya
                                slidesPengumuman3[index].classList.remove("hidden");
                                slidesPengumuman3[index].classList.remove(
                                    "w-[330px]",
                                    "xl:w-[380px]",
                                    "opacity-100",
                                    "mt-0"
                                );
                                slidesPengumuman3[index].classList.add(
                                    "w-[240px]",
                                    "xl:w-[280px]",
                                    "opacity-55",
                                    "mt-5",
                                    "lg:mt-6",
                                    "xl:mt-7"
                                );
                                textH1Pengumuman[index].classList.remove(
                                    "text-sm",
                                    "lg:text-[15px]",
                                    "xl:text-[17px]"
                                );
                                textPPengumuman[index].classList.remove(
                                    "text-xs",
                                    "lg:text-[13px]",
                                    "xl:text-[15px]",
                                    "mt-1",
                                    "lg:mt-1.5",
                                    "xl:mt-2"
                                );
                                textH2Pengumuman[index].classList.remove(
                                    "text-xs",
                                    "lg:text-[13px]",
                                    "xl:text-[15px]",
                                    "mt-1",
                                    "lg:mt-1.5",
                                    "xl:mt-2"
                                );
                                highPengumuman[index].classList.remove(
                                    "h-[170px]",
                                    "lg:h-[190px]",
                                    "xl:h-[230px]"
                                );
                                textH1Pengumuman[index].classList.add(
                                    "text-[13px]",
                                    "lg:text-sm",
                                    "xl:text-[15px]"
                                );
                                textPPengumuman[index].classList.add(
                                    "text-[11px]",
                                    "lg:text-xs",
                                    "xl:text-sm",
                                    "mt-1",
                                    "lg:mt-1.5"
                                );
                                textH2Pengumuman[index].classList.add(
                                    "text-[11px]",
                                    "lg:text-xs",
                                    "xl:text-sm",
                                    "mt-0.5",
                                    "lg:mt-1"
                                );
                                highPengumuman[index].classList.add(
                                    "h-[120px]",
                                    "lg:h-[140px]",
                                    "xl:h-[180px]"
                                );

                                // Menonaktifkan tag <a>
                                anchorTagPengumuman.removeAttribute("href");
                            } else {
                                // Menyembunyikan slide lainnya
                                slidesPengumuman3[index].classList.add("hidden");
                            }
                        }
                    }

                    showSlidePengumuman3();
                </script>
            </div>
        </div>
    </div>
</section>

<!-- BERITA -->
<section class="relative mt-16 sm:mt-20 h-[1080px] sm:h-[1100px] md:h-[580px] lg:h-[650px] xl:h-[780px]">
    <!-- Div untuk overlay warna -->
    <div class="absolute top-0 left-0 w-full h-full bg-[#0D464B] bg-opacity-90 z-10"></div>
    <!-- Gambar Latar -->
    <img src={{asset("images/school-AI2.png")}} alt="School" class="top-0 left-0 w-full z-0 opacity-80 object-cover object-center h-[1080px] sm:h-[1100px] md:h-[580px] lg:h-[650px] xl:h-[780px]" />
    <div class="absolute top-0 left-0 w-full my-8 sm:my-12 md:my-12 lg:my-16 xl:my-20 z-20">
        <h1 class="text-white text-center font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl">Berita Terkini</h1>
        <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20 mt-7 sm:mt-8 md:mt-10 lg:mt-12 xl:mt-16 xxl:mt-12">
            <!-- TAMPILAN HP -->
            <div class="mx-5 md:hidden">
                @foreach($beritasHp as $row)
                    <div>
                        <a href="{{ route('detail-berita', ['slug' => $row->slug]) }}">
                            <div class="mt-6 bg-white rounded-md w-full">
                                <div class="w-full h-[180px]">
                                    <img src="{{asset('storage/public/berita/' . $row->gambar) }}" class="w-full rounded-t-md h-full object-cover object-center" />
                                </div>
                                <div class="border border-black border-opacity-30 px-3 py-2.5 text-justify">
                                    <h1 class="font-semibold text-sm sm:text-[15px] leading-relaxed underline underline-offset-2">{{ $row->judul }}</h1>
                                    <p class="mt-0.5 font-normal text-[12.5px] sm:text-[13px]">{{ $row->updated_at->format('d M Y')}}</p>
                                    <p class="mt-0.5 font-normal text-[12.5px] sm:text-[13px]">By {{ $row->penulis}} </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- TAMPILAN TABLET DAN LAPTOP -->
            <div class="hidden md:block">
                <div class="grid grid-cols-2 gap-5 lg:gap-6 xl:gap-7">
                    @if($berita)
                        <div class="mr-5">
                            <a href="{{ route('detail-berita', ['slug' => $berita->slug]) }}">
                                <div class="bg-white rounded-md w-full transition hover:scale-[1.03] duration-300 ease-in-out">
                                    <div class="w-full h-[200px] lg:h-[250px] xl:h-[350px]">
                                        <img src="{{asset('storage/public/berita/' . $berita->gambar) }}" class="w-full rounded-t-md h-full object-cover object-center" />
                                    </div>
                                    <div class="border border-black border-opacity-30 px-3 py-2.5 lg:px-4 lg:py-3 text-justify">
                                        <h1 class="font-semibold text-[15px] lg:text-base xl:text-[17px] leading-relaxed underline underline-offset-2">{{ $berita->judul }}</h1>
                                        <p class="mt-0.5 lg:mt-1.5 font-normal text-[13px] lg:text-sm xl:text-[15px]">{{ $berita->updated_at->format('d M Y')}}</p>
                                        <p class="mt-0.5 lg:mt-1 text-[13px] lg:text-sm xl:text-[15px]">
                                            {!! strlen($berita->konten) > 180 ? substr($berita->konten, 0, 180) . '...' : $berita->konten !!}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                    @endif
                    <div class="grid grid-rows-3 gap-3.5 justify-evenly ml-5">
                        @foreach($beritasDekstop as $row)
                            <div>
                                <a href="{{ route('detail-berita', ['slug' => $row->slug]) }}">
                                    <div class="bg-white rounded-md w-full transition hover:scale-[1.02] duration-300 ease-in-out">
                                        <div class="flex w-full h-[120px] lg:h-[130px] xl:h-[150px]">
                                            <div class="w-1/3 h-full">
                                                <img src="{{asset('storage/public/berita/' . $row->gambar) }}" class="w-full rounded-l-md h-full object-cover object-center" />
                                            </div>
                                            <div class="w-2/3 border border-black border-opacity-30 px-3 py-3 xl:py-5 text-justify">
                                                <h1 class="font-semibold text-sm lg:text-[15px] xl:text-base leading-relaxed underline underline-offset-2">{!! strlen($row->judul) > 70 ? substr($row->judul, 0, 70) . '...' : $row->judul !!}</h1>
                                                <p class="mt-1.5 lg:mt-3 xl:mt-2 font-normal text-[13px] lg:text-sm xl:text-[15px]">{{ $row->updated_at->format('d M Y')}}</p>
                                                <p class="hidden xl:block mt-1.5 lg:mt-3 xl:mt-1.5 font-normal text-[13px] lg:text-sm xl:text-[15px]">By {{ $row->penulis }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTO -->
<section class="my-12 sm:my-16 md:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1 class="text-center font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl">Hubungi & Kunjungi Kami</h1>
        <!-- TAMPILAN HP -->
        <div class="block md:hidden mt-5 sm:mt-7">
            <div class="">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5">
                        <path
                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                        />
                    </svg>
                    <p class="text-sm sm:text-[15px] font-normal ml-2">Smatanjungpriok2@gmail.com</p>
                </div>
                <div class="flex mt-3 sm:mt-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5">
                        <path
                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                        />
                    </svg>
                    <p class="text-sm sm:text-[15px] font-normal ml-2">(021) 43900659</p>
                </div>
                <div class="flex mt-3 sm:mt-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5">
                        <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                    </svg>
                    <p class="text-sm sm:text-[15px] font-normal ml-2">Senin - Sabtu (07.00 - 15.00)</p>
                </div>
                <div class="flex mt-3 sm:mt-3.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-5 h-5">
                        <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <p class="text-sm sm:text-[15px] font-normal ml-2">Jl. Mangga No.40, RT.9/RW.9, Lagoa, Kec. Koja, Jkt Utara, Daerah Khusus Ibukota Jakarta 14270</p>
                </div>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1185106958574!2d106.90850987570869!3d-6.114744293871848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a201f9790436b%3A0xe7648e8e720cd1e!2sSenior%20High%20School%20of%20Tanjung%20Priok!5e0!3m2!1sen!2sid!4v1707656544679!5m2!1sen!2sid"
                class="w-full rounded-md h-[250px] sm:h-[300px] mt-5"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
        <!-- TAMPILAN TABLET & LAPTOP -->
        <div class="hidden md:block">
            <div class="md:flex mt-10 lg:mt-12 xl:mt-16">
                <div class="md:w-1/2 md:mr-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1185106958574!2d106.90850987570869!3d-6.114744293871848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a201f9790436b%3A0xe7648e8e720cd1e!2sSenior%20High%20School%20of%20Tanjung%20Priok!5e0!3m2!1sen!2sid!4v1707656544679!5m2!1sen!2sid"
                        class="w-full rounded-md h-[250px] lg:h-[280px] xl:h-[300px]"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
                <div class="md:w-1/2 md:ml-6">
                    <div class="mt-8 lg:mt-10 xl:mt-12">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 lg:w-6 h-5 lg:h-6">
                                <path
                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                                />
                            </svg>
                            <p class="lg:text-base xl:text-[17px] text-[15px] font-normal ml-2 lg:ml-3">Smatanjungpriok2@gmail.com</p>
                        </div>
                        <div class="flex mt-4 xl:mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 lg:w-6 h-5 lg:h-6">
                                <path
                                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                                />
                            </svg>
                            <p class="text-[15px] lg:text-base xl:text-[17px] font-normal ml-2 lg:ml-3">(021) 43900659</p>
                        </div>
                        <div class="flex mt-4 xl:mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 lg:w-6 h-5 lg:h-6">
                                <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            <p class="lg:text-base xl:text-[17px] text-[15px] font-normal ml-2 lg:ml-3">Senin - Sabtu (07.00 - 15.00)</p>
                        </div>
                        <div class="flex mt-4 xl:mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-5 lg:w-6 h-5 lg:h-6">
                                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                            <p class="lg:text-base xl:text-[17px] text-[15px] font-normal ml-2 lg:ml-3">Jl. Mangga No.40, RT.9/RW.9, Lagoa, Kec. Koja, Jkt Utara, Daerah Khusus Ibukota Jakarta 14270</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KRITIK & SARAN -->
<section class="my-12 sm:my-16 md:py-5">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1 class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl">Kritik & Saran</h1>
        @if(isset($status))
            <div class="rounded-md w-full px-2 mt-5 text-[13px] sm:text-sm md:text-[15px] xl:text-base font-normal bg-amber-300 text-black mb-4">
                <p class="text-center">{{$status}}</p>
            </div>
        @endif
        <form method="post" class="mt-4 sm:mt-5 md:mt-6 lg:mt-8 xl:mt-12">
            @csrf
            <div class="sm:flex">
                <div class="sm:w-1/3 font-normal text-sm sm:text-[15px] md:text-[15.5px] lg:text-base xl:text-[17px] sm:mt-2.5 md:mt-0">Nama Lengkap</div>
                <div class="sm:w-2/3 w-full mt-1.5 sm:mt-2 md:mt-0">
                    <input type="text" id="nama" name="nama" class="w-full px-2 py-1.5 lg:py-2 bg-white rounded-md border border-black border-opacity-30 text-[13px] sm:text-sm md:text-[15px] lg:text-[15.5px] xl:text-base" />
                </div>
            </div>
            <!-- Tambahkan validasi error untuk nama -->
            @error('nama')
            <p class="text-red-500 text-[13px] sm:text-sm md:text-[15px] font-normal"> {{ $message }} </p>
            @enderror
            <div class="sm:flex mt-2 md:mt-3 lg:mt-4">
                <div class="sm:w-1/3 font-normal text-sm sm:text-[15px] md:text-[15.5px] lg:text-base xl:text-[17px] sm:mt-2.5 md:mt-0">Email</div>
                <div class="sm:w-2/3 w-full mt-1.5 sm:mt-2 md:mt-0">
                    <input type="email" id="email" name="email" class="w-full px-2 py-1.5 lg:py-2 bg-white rounded-md border border-black border-opacity-30 text-[13px] sm:text-sm md:text-[15px] lg:text-[15.5px] xl:text-base" />
                </div>
            </div>
            <!-- Tambahkan validasi error untuk email -->
            @error('email')
            <p class="text-red-500 text-[13px] sm:text-sm md:text-[15px] font-normal"> {{ $message }} </p>
            @enderror
            <div class="sm:flex mt-2 md:mt-3 lg:mt-4">
                <div class="sm:w-1/3 font-normal text-sm sm:text-[15px] md:text-[15.5px] lg:text-base xl:text-[17px] sm:mt-2.5 md:mt-0">Kritik dan Saran</div>
                <div class="sm:w-2/3 w-full mt-1.5 sm:mt-2 md:mt-0">
                    <textarea rows="5" id="isi" name="isi" class="w-full px-2 py-1 lg:py-2 bg-white rounded-md border border-black border-opacity-30 text-[13px] sm:text-sm md:text-[15px] lg:text-[15.5px] xl:text-base"></textarea>
                </div>
            </div>
            <!-- Tambahkan validasi error untuk isi -->
            @error('isi')
            <p class="text-red-500 text-[13px] sm:text-sm md:text-[15px] font-normal"> {{ $message }} </p>
            @enderror
            <div class="ml-auto justify-end flex mt-4 md:mt-5">
                <button
                    class="bg-[#0D464B] transition ease-in-out hover:scale-105 duration-300 py-2 lg:py-2.5 px-4 md:px-5 lg:px-6 xl:px-7 rounded-md text-white font-semibold text-[13px] sm:text-sm md:text-[15px] lg:text-[15.5px] xl:text-base"
                    type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</section>

{{-- pop up --}}
<div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 right-0 bottom-0 left-0 z-50 flex justify-center items-center bg-black bg-opacity-50">
    <div class="relative bg-[#E5F3EF] rounded-lg overflow-hidden h-[90%] w-full max-w-2xl">
      <!-- Modal content -->
      <div class="relative flex flex-col h-full">
        <!-- Modal header -->
        <div class="p-2 md:p-2 border-b rounded-t dark:border-gray-600">

            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        @foreach($welcomes as $welcome)
        <div class="flex-grow p-4 md:p-5 overflow-auto">
            <img src="{{asset('storage/welcome/' . $welcome->gambar) }}" class="w-full h-full rounded-t-md object-cover object-center" />
        </div>
        @endforeach
        <div class="mt-auto">
            <!-- Modal footer -->
            <div class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 dark:border-gray-600">

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
         const modal = document.getElementById('default-modal');
         const closeButton = modal.querySelector('[data-modal-hide="default-modal"]');
         
         // Periksa apakah popup sudah ditutup sebelumnya
         if (sessionStorage.getItem('popupClosed') === 'true') {
             modal.classList.add('hidden');
             modal.setAttribute('aria-hidden', 'true');
         }
         
         closeButton.addEventListener('click', function() {
             modal.classList.add('hidden');
             modal.setAttribute('aria-hidden', 'true');
             sessionStorage.setItem('popupClosed', 'true');
         });
     });
     
         </script>
     
</div>




</div>
@include('front.footer')
</body>
</html>
