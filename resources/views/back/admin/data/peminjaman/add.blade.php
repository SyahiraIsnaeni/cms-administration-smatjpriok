<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="shortcut icon" href={{asset("../assets/image/logosma.png")}} type="image/x-icon">
    <link rel="stylesheet" href={{asset("../assets/extensions/quill/quill.snow.css")}}>
    <link rel="stylesheet" href={{asset("../assets/extensions/quill/quill.bubble.css")}}>

    <link rel="stylesheet" href={{asset("../assets/compiled/css/app.css")}}>
    <link rel="stylesheet" href={{asset("../assets/compiled/css/app-dark.css")}}>

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

<body>
<script src={{asset("../assets/static/js/initTheme.js")}}></script>
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
                        <h3>Tambah Data Peminjaman</h3>
                    </div>
                </div>
            </div>

            <section id="input-style" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <a href="/dashboard/peminjaman" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i> Kembali </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <form action="{{ route('store-peminjaman') }}" method="POST" class='mt-3' >
                                            @csrf
                                            <div class="form-group row">
                                                <label for="squareText" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="squareText" class="form-control square" placeholder="Nama Siswa" name="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class='col-md-2 col-form-label'>Kelas</label>
                                                <div class="col-md-10">
                                                    <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror">
                                                        <option value="">Pilih kelas..</option>
                                                        @foreach($kelas as $kelas)
                                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kelas')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="squareText" class="col-sm-2 col-form-label">Judul Buku</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="squareText" class="form-control square" placeholder="Judul Buku" name="judul_buku">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tanggal_pinjam" class="col-md-2 col-form-label">Tanggal Peminjaman</label>
                                                <div class="col-md-10">
                                                    <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                                                    @error('tanggal_pinjam')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tanggal_kembali" class="col-md-2 col-form-label">Tanggal Pengembalian</label>
                                                <div class="col-md-10">
                                                    <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror">
                                                    @error('tanggal_kembali')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit" class='btn btn-primary float-right'>Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Input Style end -->
        </div>
    </div>
</div>
<script src={{asset("../assets/static/js/components/dark.js")}}></script>
<script src={{asset("../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")}}></script>

{{--@include('sweetalert::alert', ['cdn'=>"https://cdn.jsdelivr.net/npm/sweetalert2@9"])--}}
@include('back.admin.footer')
<script src={{asset("../assets/compiled/js/app.js")}}></script>

<script src={{asset("../assets/extensions/quill/quill.min.js")}}></script>
<script src={{asset("../assets/static/js/pages/quill.js")}}></script>


</body>

</html>