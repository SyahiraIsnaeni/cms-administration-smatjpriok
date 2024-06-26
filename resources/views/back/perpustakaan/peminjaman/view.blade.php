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
    @include('back.perpustakaan.sidebar')
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
                        <h3>Data Peminjaman Buku Perpustakaan</h3>
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
                                            <a href="{{route("add-peminjaman-perpus")}}" class="btn btn-info btn=sm ml-auto"> <i class="bi bi-plus-circle" style="margin-right: 4px"></i>Tambah Data</a>
                                        </div>
                                    </div>
                                    <section class="section">
                                        <div class="card" >
                                            <div class="card-body" >
                                                <div class="table-responsive" style="margin-left: -20px;margin-top: -20px;">
                                                    <table class="table table-bordered mb-3" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Nama Peminjam</th>
                                                            <th>Kelas</th>
                                                            <th>Telepon</th>
                                                            <th>Judul Buku</th>
                                                            <th>Jumlah</th>
                                                            <th>Status</th>
                                                            <th>Tanggal Dikembalikan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @forelse($peminjaman as $row)
                                                            <tr>
                                                                <td class="text-bold-500">{{ $row->nama }}</td>
                                                                <td class="text-bold-500">{{ $row->kelas }}</td>
                                                                <td class="text-bold-500">{{ $row->telepon }}</td>
                                                                <td class="text-bold-500">{{ $row->buku->judul }}</td>
                                                                <td class="text-bold-500">{{ $row->jumlah }}</td>
                                                                @if($row->status == 1)
                                                                    <td class="text-bold-500">Dikembalikan</td>
                                                                @elseif($row->status == 0)
                                                                    <td class="text-bold-500">Belum Dikembalikan</td>
                                                                @endif
                                                                @if($row->tanggal_dikembalikan == null)
                                                                    <td class="text-bold-500">-</td>
                                                                @elseif($row->tanggal_dikembalikan != null)
                                                                    <td class="text-bold-500">{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                                                                @endif
                                                                <td class="text-bold-500">
                                                                    @if($row->status == 0)
                                                                        <a href="{{ route('edit-peminjaman-perpus', ['id' => $row->id]) }}" class="btn icon btn-primary">
                                                                            <i class="bi bi-pencil"></i>
                                                                        </a>
                                                                        <form method="post" action="{{ route('delete-peminjaman-perpus', $row->id) }}" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn icon btn-danger" style="margin-left: 5px">
                                                                                <i class="bi bi-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                    @if($row->status == 0)
                                                                        <form method="post" action="{{ route('dikembalikan-peminjaman-perpus', $row->id) }}" class="d-inline">
                                                                            @csrf
                                                                            <button class="btn icon btn-success" style="margin-left: 5px">
                                                                                Dikembalikan
                                                                            </button>
                                                                        </form>
                                                                    @elseif($row->status == 1)
                                                                        <form method="post" action="{{ route('batal-dikembalikan-peminjaman-perpus', $row->id) }}" class="d-inline">
                                                                            @csrf
                                                                            <button class="btn icon btn-warning" style="margin-left: 5px">
                                                                                Batal Dikembalikan
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">Data Masih Kosong</td>
                                                            </tr>
                                                        @endforelse
                                                        </tbody>
                                                    </table>
                                                    {{$peminjaman->links()}}
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
