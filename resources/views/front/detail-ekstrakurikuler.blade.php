<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Ekstrakurikuler SMA Tanjung Priok Jakarta</title>
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
                href="{{route("home")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]"
            >Beranda</a
            >
            <a
                href="{{route("profil-sekolah")}}"
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
                        href="{{route("list-guru")}}"
                        class="block text-black hover:text-[#FF8B42] py-1 -mt-5 text-[13px] text-center"
                    >Data Guru</a
                    >
                    <a
                        href="{{route("list-staf")}}"
                        class="block text-black hover:text-[#FF8B42] py-1 text-[13px] text-center"
                    >Data Staf</a
                    >
                </div>
            </a>
            <a
                href="{{route("konten-sekolah")}}"
                class="text-white py-2.5 block text-center text-sm hover:text-[#FF8B42]"
            >Konten</a
            >
            <a
                href="https://e-learning.smatanjungpriokjakarta.sch.id/"
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
            <a href="{{route("home")}}">
                <p class="hover:text-[#FF8B42]">Beranda</p>
            </a>
            <a href="{{route("profil-sekolah")}}">
                <p class="hover:text-[#FF8B42]">Profil</p>
            </a>
            <a href="#" id="dataDropdown1" class="relative block">
                <p class="hover:text-[#FF8B42]">Data Sekolah</p>
                <div
                    class="hidden font-medium absolute bg-[#FF8B42] xl:mt-[49px] text-center lg:mt-[48px] mt-[42px] px-4 py-4 w-[100px] lg:w-[120px] rounded-b-md shadow-md text-xs lg:text-[13px] xl:text-[14px] -ml-8"
                    id="dataDropdownContent1"
                >
                    <a href="{{route("list-guru")}}" class="block text-black hover:font-bold py-1"
                    >Data Guru</a
                    >
                    <a
                        href="{{route("list-staf")}}"
                        class="block text-black hover:font-bold py-1 mt-2"
                    >Data Staf</a
                    >
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

<!-- KONTEN EKSTRAKURIKULER -->
<section class="my-10 sm:my-12">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20">
        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-[33px] xl:text-4xl font-bold">Futsal SMA Tanjung Priok Jakarta</h1>
        <!-- TAMPILAN HP -->
        <div class="block sm:hidden">
            <img src="{{ asset('storage/ekstrakurikuler-logos/' . $ekskul->logo) }}" class="w-[200px] h-[200px] mx-auto mt-5" >
            <p class="indent-[45px] text-justify mt-5 text-sm sm:text-[14.5px] text-[15px] lg:text-base xl:text-[17px]">
                {!!  $ekskul->deskripsi !!}
            </p>
        </div>

        <!-- TAMPILAN TABLET DAN DEKSTOP -->
        <div class="hidden sm:block mt-5 md:mt-7 lg:mt-10 xl:mt-12">
            <div class="float-left">
                <img src="{{ asset('storage/public/ekstrakurikuler-logos/' . $ekskul->logo) }}" class="w-[250px] h-[250px] md:w-[270px] md:h-[270px] lg:h-[300px] lg:w-[300px] xl:h-[320px] xl:w-[320px] mr-5 md:mr-10 lg:mr-12 xl:mr-16" >
            </div>
            <div class="">
                <p class="indent-[45px] lg:indent-[55px] text-justify mt-5 sm:text-[14.5px] text-[15px] lg:text-base xl:text-[17px] md:leading-relaxed xl:leading-[1.8]">
                    {!!  $ekskul->deskripsi !!}
                </p>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
</section>

<!-- GALERI EKSTRAKURIKULER -->
<section class="my-10 sm:my-12 lg:my-16">
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20 mt-5 lg:mt-10 xl:mt-12">
        <h1 class="text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold">Foto Kegiatan</h1>
    </div>
    <div class="mx-5 sm:mx-8 md:mx-10 lg:mx-16 xl:mx-20 mt-5 grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 sm:gap-5 md:gap-7 lg:gap-10">
        @foreach($ekskul->images as $image)
        <img src="{{ asset('storage/public/ekstrakurikuler-images/' . $image->image) }}" class="rounded-md h-[250px] w-full object-cover object-center">
        @endforeach
    </div>
</section>

<!-- FOOTER -->
@include('front.footer')
</body>
</html>
