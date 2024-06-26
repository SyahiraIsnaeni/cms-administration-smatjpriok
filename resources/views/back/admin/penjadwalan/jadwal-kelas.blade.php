<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    <link rel="shortcut icon" href={{asset("./assets/image/logosma.png")}} type="image/x-icon">

    <link rel="stylesheet" href={{asset("./assets/compiled/css/app.css")}}>
    <link rel="stylesheet" href={{asset("./assets/compiled/css/app-dark.css")}}>
</head>

<body>
<script src={{asset("assets/static/js/initTheme.js")}}></script>
<div id="app">
    @include('back.admin.sidebar')
    @include('sweetalert::alert')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data Penjadwalan Sekolah</h3>
                    </div>
                </div>
            </div>

            <!-- Bordered table start -->
            <section class="section"  style="margin-top: 30px">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-header">
                                                <div class="card-head-row">
                                                    <a href="{{route("view-jadwal-kelas")}}" style="margin-left: -20px; margin-bottom: 10px" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i> Kembali </a>
                                                </div>
                                            </div>
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Hari</th>
                                                            <th>Mata Pelajaran</th>
                                                            <th>Guru</th>
                                                            <th>Jam Mulai</th>
                                                            <th>Jam Selesai</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($jadwals as $jadwal)
                                                            <tr>
                                                                <td class="text-bold-500">{{ $jadwal->day->name }}</td>
                                                                <td class="text-bold-500">{{ $jadwal->mapel->nama }}</td>
                                                                <td class="text-bold-500">{{ $jadwal->mapel->guru->nama }}</td>
                                                                <td class="text-bold-500">{{ \Carbon\Carbon::parse($jadwal->start_time)->format('H:i') }}</td>
                                                                <td class="text-bold-500">{{ \Carbon\Carbon::parse($jadwal->end_time)->format('H:i') }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">Data Masih Kosong</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Basic Tables start -->
            <section class="section" style="margin-top: 30px">
                <div class="row" id="basic-table">
                    <div class="col-lg-12 col-md-6">
                        <div class="card">
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Tables end -->
        </div>


    </div>
</div>
<script src={{asset("assets/static/js/components/dark.js")}}></script>
<script src={{asset("assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")}}></script>

{{--@include('sweetalert::alert', ['cdn'=>"https://cdn.jsdelivr.net/npm/sweetalert2@9"])--}}

<script src={{asset("assets/compiled/js/app.js")}}></script>

@include('back.admin.footer')
</body>

</html>
