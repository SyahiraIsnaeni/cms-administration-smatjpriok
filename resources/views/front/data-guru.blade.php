<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Guru SMA Tanjung Priok Jakarta</title>
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
            <a href="beranda.html" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Beranda</a>
            <a href="profil.html" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Profil</a>
            <a href="#" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]" id="dataDropdownHP"
            >Data
                <div class="hidden absolute -mt-12 -left-28 bg-[#FF8B42] p-2 w-28 rounded-l-md font-medium" id="dataDropdownContentHP">
                    <a href="guru.html" class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center">Data Guru</a>
                    <a href="staf.html" class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center">Data Staf</a>
                </div>
            </a>
            <a href="konten.html" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Konten</a>
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
            <a href="beranda.html">
                <p class="hover:text-[#FF8B42]">Beranda</p>
            </a>
            <a href="profil.html">
                <p class="hover:text-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42] font-semibold underline underline-offset-8 decoration-2 decoration-[#FF8B42]">Data Sekolah</p>
                <div class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8" id="dataDropdownContent1">
                    <a href="guru.html" class="block text-black hover:font-bold py-1">Data Guru</a>
                    <a href="staf.html" class="block text-black hover:font-bold py-1 mt-2">Data Staf</a>
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
<section class="relative">
    <!-- Gambar Latar -->
    <img src="{{ asset('images/guru-staf.jpg') }}" alt="School" class="top-0 left-0 z-0 opacity-80 w-full object-cover object-center h-[250px] sm:h-[260px] md:h-[270px] lg:h-[290px] xl:h-[320px]" />
    <!-- overlay warna -->
    <div class="absolute top-0 left-0 w-full bg-[#001A1C] bg-opacity-80 z-10 h-[250px] sm:h-[260px] md:h-[270px] lg:h-[290px] xl:h-[320px]"></div>
    <!-- Kalimat -->
    <div class="absolute inset-0 flex flex-col items-center justify-center z-20">
        <p class="text-white font-semibold text-[22px] sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl text-center tracking-wide mx-5">Guru SMA Tanjung Priok Jakarta</p>
        <p class="text-white font-medium text-[15px] sm:text-base md:text-lg lg:text-xl xl:text-2xl text-center mt-2 sm:mt-2 md:mt-2 lg:mt-4 xl:mt-5 mx-5">Temukan lebih banyak tentang para Pengajar SMA Tanjung Priok Jakarta!</p>
    </div>
</section>

<!-- foto guru -->
<section class="my-12 sm:my-16 md:py-5 mb-10">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <div class="w-full">
            <div class="grid min-[500px]:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-16 min-[500px]:gap-y-12 sm:gap-y-16 md:gap-y-12 lg:gap-y-16 min-[500px]:gap-7 sm:gap-16 md:gap-16 lg:gap-5 xl:gap-16">
                @foreach($gurus as $guru)
                <div class="w-full">
                    <div class="relative ">
                        <div class="w-full">
                            <img src="{{ asset('storage/guru/' . $guru->foto) }}" class="object-cover rounded-md w-full h-[370px] min-[400px]:h-[500px] min-[500px]:h-[320px] sm:h-[330px] md:h-[300px] lg:h-[300px] xl:h-[350px] object-top" />
                        </div>
                        <div class="absolute inset-x-0 -bottom-7 flex justify-center items-center">
                            <div class="bg-[#FF8B42] rounded-xl py-2.5 px-3 w-4/5 lg:px-3 lg:py-3 xl:px-3 xl:py-3">
                                <h1 class="text-[15px] sm:text-base md:text-[16.5px] lg:text-[17px] xl:text-[18px] font-bold text-center">{{ $guru->nama}}</h1>
                                <p class="text-center text-sm lg:text-[15px] xl:text-base font-medium mt-[1px]">{{ $guru->jabatan}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
@include('front.footer')
</body>
</html>
