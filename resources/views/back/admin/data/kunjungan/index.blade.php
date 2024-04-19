<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
                        <h3>Kunjungan Perpustakaan</h3>
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
                                    <div class="card-header" style="display: flex">
                                        <div class="card-head-row" style="margin-left: -20px">
                                            <a href="/dashboard/kunjungan/add" class="btn btn-info btn=sm ml-auto"> <i class="bi bi-plus-circle" style="margin-right: 4px"></i>Tambah Data</a>
                                        </div>

                                        <div class="card-head-row" style="margin-left: 10px">
                                            <form action="/dashboard/kunjungan/reset" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-auto">
                                                    <i class="bi bi-arrow-clockwise" style="margin-right: 4px"></i> Reset Data
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Nama Siswa</th>
                                                            <th>Tanggal Kunjungan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($kunjungans as $kunjungan)
                                                            <tr>
                                                                <td>{{ $kunjungan->siswa->nama }} {{ $kunjungan->siswa->kelas->nama_kelas }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($kunjungan->tanggal)->format('d/m/Y') }}</td>
                                                                <td>
                                                                <div class='d-inline-flex'>
                                                                    <a href="{{ route('edit-kunjungan', ['id' => $kunjungan->id]) }}" class='btn btn-warning mr-2'><i class="bi bi-pencil-fill"></i></a>
                                                                    <form action="{{ route('delete-kunjungan', $kunjungan->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" style="margin-left: 8px" class='btn btn-danger btn-delete'>
                                                                            <i class="bi bi-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{$kunjungans->links()}}
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