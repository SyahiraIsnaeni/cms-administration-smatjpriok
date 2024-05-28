<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Prestasi SMA Tanjung Priok Jakarta</title>
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
            <a href="{{route("home")}}" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Beranda</a>
            <a href="{{route("profil-sekolah")}}" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Profil</a>
            <a href="#" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]" id="dataDropdownHP"
            >Data
                <div class="hidden absolute -mt-12 -left-28 bg-[#FF8B42] p-2 w-28 rounded-l-md font-medium" id="dataDropdownContentHP">
                    <a href="{{route("list-guru")}}" class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center">Data Guru</a>
                    <a href="{{route("list-staf")}}" class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center">Data Staf</a>
                </div>
            </a>
            <a href="{{route("konten-sekolah")}}" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">Konten</a>
            <a href="https://e-learning.smatanjungpriokjakarta.sch.id/" class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]">E-Learning</a>
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
                <p class="hover:text-[#FF8B42]">Beranda</p>
            </a>
            <a href="{{route("profil-sekolah")}}">
                <p class="hover:text-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42] f">Data Sekolah</p>
                <div class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8" id="dataDropdownContent1">
                    <a href="{{route("list-guru")}}" class="block text-black hover:font-bold py-1">Data Guru</a>
                    <a href="{{route("list-staf")}}" class="block text-black hover:font-bold py-1 mt-2">Data Staf</a>
                </div>
            </a>
            <a href="{{route("konten-sekolah")}}">
                <p class="hover:text-[#FF8B42]">Konten</p>
            </a>
            <a href="https://e-learning.smatanjungpriokjakarta.sch.id/">
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
<section class="relative">
    <!-- Gambar Latar -->
    <img src="{{ asset('images/prestasi3.png') }}" alt="School" class="top-0 left-0 z-0 opacity-80 w-full object-cover object-center h-[290px] sm:h-[300px] md:h-[310px] lg:h-[330px] xl:h-[350px]" />
    <!-- overlay warna -->
    <div class="absolute top-0 left-0 w-full bg-[#001A1C] bg-opacity-80 z-10 h-[290px] sm:h-[300px] md:h-[310px] lg:h-[330px] xl:h-[350px]"></div>
    <!-- Kalimat -->
    <div class="absolute inset-0 flex flex-col items-center justify-center z-20">
        <p class="text-white font-semibold text-[22px] sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl text-center tracking-wide mx-5">Prestasi SMA Tanjung Priok Jakarta</p>
        <p class="text-white font-medium text-[15px] sm:text-base md:text-lg lg:text-xl xl:text-2xl text-center mt-2 sm:mt-2 md:mt-2 lg:mt-4 xl:mt-5 mx-5">
            Siswa kami meraih kesuksesan dalam dunia kompetitif dengan kecerdasan, integritas, dan keterampilan sosial yang membangun untuk menjadi individu yang proaktif di masa depan
        </p>
    </div>
</section>

<!-- PRESTASI -->
<section class="my-12 md:my-16">
    <!-- TAMPILAN HP -->
    <div class="block sm:hidden mx-5 mt-3">
        @foreach($prestasis as $prestasi)
        <div class="relative mt-5">
            <img src="{{ asset('storage/public/prestasi/' . $prestasi->gambar) }}" class="w-full h-[250px] object-cover object-center" />
            <div class="bg-[#0D464B] bg-gradient-to-t from-[#0D464B] via-[#13494D]/75 to-[#737373]/20 bg-opacity-25 absolute top-0 h-full w-full items-center flex">
                <h1 class="text-base font-medium w-full text-white text-end mt-auto mx-auto px-5 pb-5 leading-relaxed">
                    {{ $prestasi->nama}}
                    <p class="text-base font-light text-end mt-auto mx-auto pb-2 leading-relaxed">{{ $prestasi->kejuaraan}}</p>
                </h1>
            </div>
        </div>
        @endforeach
            <nav aria-label="Page navigation example ">
                <ul class="flex items-center mt-5 justify-center -space-x-px h-8 text-sm">
                    <li>
                        <a href="{{ $prestasis->previousPageUrl() }}" >
                            <div class="flex items-center justify-center ms-0 px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white mr-4 bg-[#0D464B] border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                                Prev
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ $prestasis->nextPageUrl() }}" >
                            <div class="flex items-center justify-center px-4 py-1.5 leading-tight hover:scale-105 ease-in-out duration-300 text-white ml-4 bg-[#0D464B] border border-gray-300">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" fill="#fff" class="w-5 h-4"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
    </div>
    <!-- TAMPILAN TABLET DAN LAPTOP -->
    <div class="hidden sm:mx-8 sm:block md:mx-10 lg:mx-16 xl:mx-20 mt-7 md:mt-8 lg:mt-10 xl:mt-12">
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-5 md:gap-7 lg:gap-8">
            @foreach($prestasis as $prestasi)
            <div class="relative">
                <img src="{{ asset('storage/public/prestasi/' . $prestasi->gambar) }}" class="w-full h-[270px] xl:h-[300px] object-cover rounded-md object-center" />
                <div class="bg-[#0D464B] bg-gradient-to-t from-[#0D464B] via-[#13494D]/20 to-[#737373]/10 bg-opacity-25 absolute top-0 h-full w-full items-center flex">
                    <h1 class="text-base font-medium text-white w-full text-end mr-5 mt-auto pb-2 leading-relaxed z-10">
                        {{ $prestasi->nama}}
                        <p class="text-base font-light text-white w-full text-end mr-10 pb-4 mt-auto leading-relaxed">{{ $prestasi->kejuaraan}}</p>
                    </h1>
                </div>
                <div class="opacity-0 hover:opacity-100 z-0">
                    <div class="bg-[#0D464B] bg-opacity-80 absolute top-0 h-full w-full items-center flex">
                        <p class="text-lg lg:text-[19px] xl:text-[21px] font-light text-white w-full h-full text-start mt-32 px-5 leading-relaxed">{{ $prestasi->deskripsi}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FOOTER -->
@include('front.footer')
</body>
</html>
