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
                        <h3>Data Riwayat Blog</h3>
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
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Judul</th>
                                                            <th>Penulis</th>
                                                            <th>Gambar</th>
                                                            <th>Status</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($blogs as $blog)
                                                            <tr>
                                                                <td class="text-bold-500">{{ $blog->judul }}</td>
                                                                <td class="text-bold-500">{{ $blog->penulis }}</td>
                                                                <td><img src={{asset('storage/blog/' . $blog->gambar) }} width="100" height="100"></td>
                                                                <td>
                                                                    @if ($blog->is_active == '1')
                                                                        Diterbitkan
                                                                    @else
                                                                        Draf
                                                                    @endif
                                                                </td>
                                                                <td>{{ $blog->updated_at->format('d M Y')}}</td>
                                                                <td class="text-bold-500">
                                                                    <form method="post" action="{{ route('restore-riwayat-blog', $blog->id) }}" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn icon btn-primary" style="margin-top: 10px">
                                                                            Restore Data
                                                                        </button>
                                                                    </form>
                                                                    <br>
                                                                    <form method="post" action="{{ route('delete-riwayat-blog', $blog->id) }}" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn icon btn-danger" style="margin-top: 10px">
                                                                            Hapus Permanen
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">Data Masih Kosong</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                    {{$blogs->links()}}
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
