<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href={{asset("../assets/extensions/quill/quill.snow.css")}}>
    <link rel="stylesheet" href={{asset("../assets/extensions/quill/quill.bubble.css")}}>

    <link rel="shortcut icon" href={{asset("../../assets/image/logosma.png")}} type="image/x-icon">

    <link rel="stylesheet" href={{asset("../../assets/compiled/css/app.css")}}>
    <link rel="stylesheet" href={{asset("../../assets/compiled/css/app-dark.css")}}>
</head>

<body>
<script src={{asset("../../assets/static/js/initTheme.js")}}></script>
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
                        <h3>Edit Data Struktur Organisasi</h3>
                    </div>
                </div>
            </div>

            <section id="input-style" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <a href="{{route("struktur-organisasi")}}" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i></i> Kembali </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" action="{{ route('edit-struktur-organisasi', $struktur->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="squareText">Nama Kepala Sekolah</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Kepala Sekolah" name="kepsek" value="{{$struktur->kepsek}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Nama Wakil Bidang Kurikulum</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Wakil Kurikulum" name="wakil_kurikulum" value="{{$struktur->wakil_kurikulum}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Nama Wakil Bidang Kesiswaan</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Wakil Kesiswaan" name="wakil_kesiswaan" value="{{$struktur->wakil_kesiswaan}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Nama Wakil Bidang Sarana Prasarana</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Wakil Sarana Prasarana" name="wakil_sarpras" value="{{$struktur->wakil_sarpras}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Nama Pembimbing Konseling</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Wakil Pembimbing Konseling" name="bk" value="{{$struktur->bk}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="squareText">Nama Pembimbing OSIS</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Wakil Pembimbing OSIS" name="osis" value="{{$struktur->osis}}">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-info btn-sm" type="submit"> Simpan </button>
                                                <button class="btn btn-danger btn-sm" type="reset"> Reset </button>
                                            </div>
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
<script src={{asset("../../assets/static/js/components/dark.js")}}></script>
<script src={{asset("../../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js")}}></script>

{{--@include('sweetalert::alert', ['cdn'=>"https://cdn.jsdelivr.net/npm/sweetalert2@9"])--}}
<script src={{asset("../assets/extensions/quill/quill.min.js")}}></script>
<script src={{asset("../assets/static/js/pages/quill.js")}}></script>

@include('back.admin.footer')
<script src={{asset("../../assets/compiled/js/app.js")}}></script>


</body>

</html>
