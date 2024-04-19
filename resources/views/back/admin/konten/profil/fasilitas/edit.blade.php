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
                        <h3>Edit Data Fasilitas</h3>
                    </div>
                </div>
            </div>

            <section id="input-style" style="margin-top: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <a href="{{route("fasilitas")}}" class="btn btn-warning btn-sm ml-auto"> <i class="bi bi-arrow-left-circle"></i></i> Kembali </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" action="{{ route('edit-fasilitas', $fasilitas->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="squareText">Nama Fasilitas (20 karakter)</label>
                                                <input type="text" id="squareText" class="form-control square" placeholder="Nama Fasilitas" name="nama" value="{{$fasilitas->nama}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Gambar Fasilitas (.jpg, .png, .jpeg)</label>
                                                <input class="form-control" type="file" id="formFile" name="gambar">
                                                <br>
                                                <label for="formFile" class="form-label" style="color: red">Gambar saat ini</label> <br>
                                                <img src="{{ asset('storage/public/fasilitas/'.$fasilitas->gambar) }}" width="100" style="margin-left: 10px">
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
