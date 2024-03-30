<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Pengumuman Detail SMA Tanjung Priok Jakarta</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png" />
    <!-- <link href="/public/css/output.css" rel="stylesheet" /> -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- PENTING!!!! -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head>
<body class="font-cms bg-[#E5F3EF]">
<!-- NAVBAR -->
<nav class="sticky bg-[#0D464B] py-3 lg:py-3.5 top-0 w-full z-30">
    <!-- TAMPILAN HP -->
    <div class="md:hidden relative">
        <div class="ml-5 sm:ml-8 flex items-center">
            <img src="{{ asset('images/logo.png') }}" class="w-10 my-auto" />
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
                href="beranda.html"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]"
            >Beranda</a
            >
            <a
                href="profil.html"
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
                        href="guru.html"
                        class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center"
                    >Data Guru</a
                    >
                    <a
                        href="staf.html"
                        class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center"
                    >Data Staf</a
                    >
                </div>
            </a>
            <a
                href="konten.html"
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
                src="{{ asset('images/logo.png') }}"
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
            <a href="beranda.html">
                <p class="hover:text-[#FF8B42]">Beranda</p>
            </a>
            <a href="profil.html">
                <p class="hover:text-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42]">Data Sekolah</p>
                <div
                    class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8"
                    id="dataDropdownContent1"
                >
                    <a href="guru.html" class="block text-black hover:font-bold py-1"
                    >Data Guru</a
                    >
                    <a
                        href="staf.html"
                        class="block text-black hover:font-bold py-1 mt-2"
                    >Data Staf</a
                    >
                </div>
            </a>
            <a href="konten.html">
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
            {{ $pengumuman->judul}}
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
                By {{ $pengumuman->penulis}}
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
                {{ \Carbon\Carbon::parse($pengumuman->updated_at)->setTimezone('Asia/Jakarta')->translatedFormat('d F Y, H:i') }} WIB
            </p>
        </div>
        <img
            src="{{ asset('storage/pengumuman/gambar/' . $pengumuman->gambar) }}"
            class="w-full h-[250px] sm:h-[300px] md:h-[380px] lg:h-[550px] xl:h-[600px] mt-4 lg:mt-5 xl:mt-7 object-cover object-center"
        />
        <p
            class="mt-5 lg:mt-7 sm:leading-relaxed lg:leading-[1.7] xl:leading-[1.8] text-sm sm:text-[14.5px] md:text-[15px] lg:text-base xl:text-[17px] text-justify"
        >
            {!!  $pengumuman->konten !!}
        </p>

        <a href="{{asset('storage/pengumuman/dokumen/'.$pengumuman->dokumen) }}">
            <div class="flex mt-5">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 384 512"
                    class="w-5 h-5 mr-1 mt-0.5"
                >
                    <path
                        d="M320 464c8.8 0 16-7.2 16-16V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320zM0 64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"
                    />
                </svg>
                <p class="underline underline-offset-2 text-[13px] sm:text-sm md:text-[14.5px] lg:text-[15px] xl:text-base">{{$pengumuman->dokumen}}</p>
            </div>
        </a>
    </div>
</section>

<!-- OTHER CONTENT -->
<section class="my-10 sm:my-12">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1 class="font-bold text-[17px] sm:text-lg md:text-[19px] lg:text-[21px] xl:text-2xl underline underline-offset-8 lg:underline-offset-[10px] xl:underline-offset-[12px] decoration-4 decoration-[#FF8B42]">
            Pengumuman Lainnya
        </h1>
        <div class="mt-7 grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 sm:gap-7 md:gap-10 lg:gap-12">
            @foreach($nextPengumuman as $row)
            <a href="{{ route('detail-pengumuman', ['slug' => $row->slug]) }}">
                <div class="bg-white rounded-md border border-black border-opacity-30 hover:scale-105 ease-in-out duration-300 w-full">
                    <img class="w-full h-[210px] object-cover object-center rounded-t-md" src="{{ asset('storage/pengumuman/gambar/' . $row->gambar) }}">
                    <div class="bg-white rounded-b-md py-2 xl:py-2.5 px-3 xl:px-3.5">
                        <h1 class="font-semibold text-[15px] sm:text-[15.5px] md:text-base lg:text-[15px] xl:text-[15.5px]">
                            {{$row->judul}}
                        </h1>
                        <p class="mt-1 xl:mt-1.5 font-light text-[13px] md:text-sm lg:text-[13.5px]">
                            {{ $row->updated_at->format('d M Y')}} | {{ $row->kategoriPengumuman->kategori }}
                        </p>
                        <p class="mt-0.5 font-light text-[13px] md:text-sm lg:text-[13.5px]">
                            By {{ $row->penulis}}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer
    class="mt-12 sm:mt-16 lg:mt-20 xl:mt-24 bg-[#0D464B] block inset-x-0 bottom-0"
>
    <!-- TAMPILAN HP -->
    <div class="mx-5 sm:mx-8 pt-6 block md:hidden">
        <div class="flex">
            <img src="{{ asset('images/logo.png') }}" class="w-[52px] h-[50px]" />
            <div class="ml-2">
                <h1 class="text-white text-sm sm:text-[15px] font-semibold">
                    SMA Tanjung Priok Jakarta
                </h1>
                <p
                    class="text-white text-[12.5px] sm:text-[13.5px] font-light mt-1"
                >
                    Jl. Mangga No.40, RT.9/RW.9, Lagoa, Kec. Koja, Jkt Utara, Daerah
                    Khusus Ibukota Jakarta 14270
                </p>
            </div>
        </div>
        <div class="mt-7">
            <h1
                class="text-white text-[13px] sm:text-sm font-medium underline underline-offset-8 decoration-[1.5px]"
            >
                Konten Sekolah
            </h1>
            <a href="prestasi.html"
            ><p class="text-white text-xs sm:text-[13px] font-light mt-3">
                    Prestasi
                </p></a
            >
            <a href="pengumuman.html"
            ><p class="text-white text-xs sm:text-[13px] font-light mt-2">
                    Pengumuman
                </p></a
            >
            <a href="berita.html"
            ><p class="text-white text-xs sm:text-[13px] font-light mt-2">
                    Berita
                </p></a
            >
            <a
                href="konten.html"
                class="text-white text-xs sm:text-[13px] font-light mt-1"
            ><p class="text-white text-xs sm:text-[13px] font-light mt-2">
                    Galeri dan Video
                </p></a
            >
        </div>

        <div class="mt-7">
            <h1
                class="text-white text-[13px] sm:text-sm font-medium underline underline-offset-8 decoration-[1.5px]"
            >
                Informasi Sekolah
            </h1>
            <a href="profil.html"
            ><p class="text-white text-xs sm:text-[13px] font-light mt-3">
                    Profil
                </p></a
            >
            <a href="guru.html"
            ><p class="text-white text-xs sm:text-[13px] font-light mt-2">
                    Data Guru
                </p></a
            >
            <a href="staf.html"
            ><p class="text-white text-xs sm:text-[13px] font-light mt-2">
                    Data Staf
                </p></a
            >
        </div>

        <div class="mt-7">
            <h1
                class="text-white text-[13px] sm:text-sm font-medium underline underline-offset-8 decoration-[1.5px]"
            >
                Media Sosial Sekolah
            </h1>
            <div class="flex mt-3">
                <a href="https://www.youtube.com/@smatanjungpriok8754">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 576 512"
                        class="w-5 h-5 sm:h-6 sm:w-6"
                        fill="#fff"
                        onmouseover="this.querySelector('path').setAttribute('fill', '#FF8B42')"
                        onmouseout="this.querySelector('path').setAttribute('fill', '#ffffff')"
                    >
                        >
                        <path
                            d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"
                        />
                    </svg>
                </a>
                <a href="https://www.instagram.com/smatanjungpriok_jkt/">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                        class="w-5 h-5 sm:h-6 sm:w-6 ml-[9.5px]"
                        fill="#fff"
                        onmouseover="this.querySelector('path').setAttribute('fill', '#FF8B42')"
                        onmouseout="this.querySelector('path').setAttribute('fill', '#ffffff')"
                    >
                        <path
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                        />
                    </svg>
                </a>
                <a href="https://www.facebook.com/SMATjPriok/">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 320 512"
                        class="w-5 h-[17px] sm:h-[23px] sm:w-6 ml-[7.5px]"
                        fill="#fff"
                        onmouseover="this.querySelector('path').setAttribute('fill', '#FF8B42')"
                        onmouseout="this.querySelector('path').setAttribute('fill', '#ffffff')"
                    >
                        <path
                            d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"
                        />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- TAMPILAN TABLET & LAPTOP -->
    <div
        class="md:mx-10 lg:mx-16 xl:mx-20 pt-7 md:pt-8 xl:pt-10 hidden md:block"
    >
        <div class="flex">
            <div class="w-1/3">
                <div class="flex">
                    <img src="{{ asset('images/logo.png') }}" class="w-12 h-12" />
                    <div class="ml-3">
                        <h1
                            class="text-white text-[15px] lg:text-[15.5px] xl:text-base font-semibold"
                        >
                            SMA Tanjung Priok Jakarta
                        </h1>
                        <p
                            class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-1"
                        >
                            Jl. Mangga No.40, RT.9/RW.9, Lagoa, Kec. Koja, Jkt Utara,
                            Daerah Khusus Ibukota Jakarta 14270
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-2/3 ml-10 lg:ml-16 xl:ml-20 grid grid-cols-3 gap-2">
                <div>
                    <h1
                        class="text-white text-sm lg:text-[14.5px] xl:text-[15px] font-medium underline underline-offset-8 decoration-[1.5px]"
                    >
                        Konten Sekolah
                    </h1>
                    <a href="prestasi.html"
                    ><p
                            class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-4 hover:text-[#FF8B42]"
                        >
                            Prestasi
                        </p></a
                    >
                    <a href="pengumuman.html"
                    ><p
                            class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-2 hover:text-[#FF8B42]"
                        >
                            Pengumuman
                        </p></a
                    >
                    <a href="berita.html"
                    ><p
                            class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-2 hover:text-[#FF8B42]"
                        >
                            Berita
                        </p></a
                    >
                    <a
                        href="konten.html"
                        class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-1"
                    ><p
                            class="text-white text-xs sm:text-[13px] font-light mt-2 hover:text-[#FF8B42]"
                        >
                            Galeri dan Video
                        </p></a
                    >
                </div>
                <div>
                    <h1
                        class="text-white text-sm lg:text-[14.5px] xl:text-[15px] font-medium underline underline-offset-8 decoration-[1.5px]"
                    >
                        Informasi Sekolah
                    </h1>
                    <a href="profil.html"
                    ><p
                            class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-4 hover:text-[#FF8B42]"
                        >
                            Profil
                        </p></a
                    >
                    <a href="guru.html"
                    ><p
                            class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-2 hover:text-[#FF8B42]"
                        >
                            Data Guru
                        </p></a
                    >
                    <a href="staf.html"
                    ><p
                            class="text-white text-[13px] lg:text-[13.5px] xl:text-sm font-light mt-2 hover:text-[#FF8B42]"
                        >
                            Data Staf
                        </p></a
                    >
                </div>
                <div>
                    <h1
                        class="text-white text-sm lg:text-[14.5px] xl:text-[15px] font-medium underline underline-offset-8 decoration-[1.5px]"
                    >
                        Media Sosial
                    </h1>
                    <div class="flex mt-4">
                        <a href="https://www.youtube.com/@smatanjungpriok8754">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512"
                                class="h-6 w-6"
                                fill="#fff"
                                onmouseover="this.querySelector('path').setAttribute('fill', '#FF8B42')"
                                onmouseout="this.querySelector('path').setAttribute('fill', '#ffffff')"
                            >
                                >
                                <path
                                    d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"
                                />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/smatanjungpriok_jkt/">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"
                                class="h-6 w-6 ml-[9.5px]"
                                fill="#fff"
                                onmouseover="this.querySelector('path').setAttribute('fill', '#FF8B42')"
                                onmouseout="this.querySelector('path').setAttribute('fill', '#ffffff')"
                            >
                                <path
                                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                                />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/SMATjPriok/">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 320 512"
                                class="h-[23px] w-6 ml-[7.5px]"
                                fill="#fff"
                                onmouseover="this.querySelector('path').setAttribute('fill', '#FF8B42')"
                                onmouseout="this.querySelector('path').setAttribute('fill', '#ffffff')"
                            >
                                <path
                                    d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20 pt-7 md:pt-10 lg:pt-12 xl:pt-[66px] pb-2 md:pb-3 lg:pb-3.5"
    >
        <p
            class="text-white text-[11px] sm:text-xs md:text-[12.5px] lg:text-[13px] xl:text-[13.5px] font-light text-center"
        >
            © SMA Tanjung Priok, 2024. All Right Reserved
        </p>
        <p
            class="text-white text-[11px] sm:text-xs md:text-[12.5px] lg:text-[13px] xl:text-[13.5px] font-light text-center sm:mt-0.5 md:mt-1"
        >
            Hand-crafted and made with ❤️ by Tim Capstone Undip
        </p>
    </div>
</footer>
</body>
</html>
