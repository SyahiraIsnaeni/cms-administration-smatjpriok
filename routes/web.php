<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function (){
    return view("front.not-found");
});

Route::controller(\App\Http\Controllers\BerandaController::class)->group(
    function (){
        Route::get("/", "index")->name("home");
        Route::post("/", "index");
    }
);

Route::controller(\App\Http\Controllers\ProfilController::class)->group(
    function (){
        Route::get("/profil", "index")->name("profil-sekolah");
    }
);

Route::controller(\App\Http\Controllers\KontenController::class)->group(
    function (){
        Route::get("/konten", "index")->name("konten-sekolah");
    }
);

Route::controller(\App\Http\Controllers\FrontendGaleriController::class)->group(
    function (){
        Route::get("/detail-galeri/{id}", "detail")->name("detail-galeri");
    }
);

Route::controller(\App\Http\Controllers\FrontendEkstrakurikulerController::class)->group(
    function (){
        Route::get("/detail-ekstrakurikuler/{id}", "detail")->name("detail-ekstrakurikuler");
    }
);

Route::controller(\App\Http\Controllers\FrontendPengumumanController::class)->group(
    function (){
        Route::get("/list-pengumuman", "list")->name("list-pengumuman");
        Route::get("/detail-pengumuman/{slug}", "detail")->name("detail-pengumuman");
    }
);

Route::controller(\App\Http\Controllers\FrontendBeritaController::class)->group(
    function (){
        Route::get("/list-berita", "list")->name("list-berita");
        Route::get("/detail-berita/{slug}", "detail")->name("detail-berita");
    }
);

Route::controller(\App\Http\Controllers\FrontendBlogController::class)->group(
    function (){
        Route::get("/list-blog", "list");
        Route::get("/detail-blog/{slug}", "detail")->name("detail-blog");
    }
);

Route::controller(\App\Http\Controllers\FrontendPrestasiController::class)->group(
    function (){
        Route::get("/prestasi", "index")->name("list-prestasi");
    }
);

Route::controller(\App\Http\Controllers\FrontendGuruController::class)->group(
    function (){
        Route::get("/guru", "index")->name("list-guru");
    }
);

Route::controller(\App\Http\Controllers\FrontendStafController::class)->group(
    function (){
        Route::get("/staf", "index")->name("list-staf");
    }
);


Route::controller(\App\Http\Controllers\UserController::class)->group(
    function (){
        Route::get("/login", "login")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
        Route::post("/login", "doLogin")->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
        Route::post("/logout/admin", "logout")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class])->name("logout-admin");
        Route::post("/logout/osis", "logout")->middleware([\App\Http\Middleware\OnlyOsisMiddleware::class])->name("logout-osis");
    }
);

Route::controller(\App\Http\Controllers\AdminController::class)->group(
    function (){
        Route::get("/dashboard/admin", "dashboard")->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class);
    }
);

Route::controller(\App\Http\Controllers\OsisController::class)->group(
    function (){
        Route::get("/dashboard-osis/admin", "dashboard")->middleware(\App\Http\Middleware\OnlyOsisMiddleware::class);
    }
);

Route::controller(\App\Http\Controllers\BlogOsisController::class)->middleware(\App\Http\Middleware\OnlyOsisMiddleware::class)->group(
    function (){
        Route::get("/dashboard-osis/blog", "blog")->name("blog-osis");
        Route::get("/dashboard-osis/blog/add", "addBlog");
        Route::get("/dashboard-osis/blog/{id}/edit", "editBlog")->name("edit-blog-osis");
        Route::post("/dashboard-osis/blog/add", "addDataBlog")->name("add-blog-osis");
        Route::patch("/dashboard-osis/blog/{id}/edit", "editDataBlog")->name("edit-blog-osis");
        Route::delete("/dashboard-osis/blog/{id}/delete", "deleteDataBlog")->name("delete-blog-osis");
    }
);

Route::controller(\App\Http\Controllers\RiwayatBlogOsisController::class)->middleware(\App\Http\Middleware\OnlyOsisMiddleware::class)->group(
    function (){
        Route::get("/dashboard-osis/riwayat/blog", "riwayatBlog")->name("riwayat-blog-osis");
        Route::delete("/dashboard-osis/riwayat/blog/{id}/delete", "deleteBlog")->name("delete-riwayat-blog-osis");
        Route::delete("/dashboard-osis/riwayat/blog/{id}/restore", "restoreBlog")->name("restore-riwayat-blog-osis");
    }
);

Route::controller(\App\Http\Controllers\GaleriOsisController::class)->middleware(\App\Http\Middleware\OnlyOsisMiddleware::class)->group(
    function (){
        Route::get("/dashboard-osis/galeri", "galeri")->name("galeri-osis");
        Route::get("/dashboard-osis/galeri/add", "addGaleri");
        Route::get("/dashboard-osis/galeri/{id}/edit", "editGaleri")->name("edit-galeri-osis");
        Route::post("/dashboard-osis/galeri/add", "addDataGaleri")->name("add-galeri-osis");
        Route::patch("/dashboard-osis/galeri/{id}/edit", "editDataGaleri")->name("edit-galeri-osis");
        Route::delete("/dashboard-osis/galeri/{id}/delete", "deleteDataGaleri")->name("delete-galeri-osis");
    }
);


Route::controller(\App\Http\Controllers\EkstrakurikulerController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/beranda/ekstrakurikuler", "ekstrakurikuler")->name("ekstrakurikuler");
        Route::get("/dashboard/beranda/ekstrakurikuler/add", "addEkstrakurikuler");
        Route::get("/dashboard/beranda/ekstrakurikuler/{id}/edit", "editEkstrakurikuler")->name("edit-ekstrakurikuler");
        Route::post("/dashboard/beranda/ekstrakurikuler/add", "addDataEkstrakurikuler")->name("add-ekstrakurikuler");
        Route::patch("/dashboard/beranda/ekstrakurikuler/{id}/edit", "editDataEkstrakurikuler")->name("edit-ekstrakurikuler");
        Route::delete("/dashboard/beranda/ekstrakurikuler/{id}/delete", "deleteDataEkstrakurikuler")->name("delete-ekstrakurikuler");
    }
);

Route::controller(\App\Http\Controllers\PrestasiController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/beranda/prestasi", "prestasi")->name("prestasi");
        Route::get("/dashboard/beranda/prestasi/add", "addPrestasi");
        Route::get("/dashboard/beranda/prestasi/{id}/edit", "editPrestasi")->name("edit-prestasi");
        Route::post("/dashboard/beranda/prestasi/add", "addDataPrestasi")->name("add-prestasi");
        Route::patch("/dashboard/beranda/prestasi/{id}/edit", "editDataPrestasi")->name("edit-prestasi");
        Route::delete("/dashboard/beranda/prestasi/{id}/delete", "deleteDataPrestasi")->name("delete-prestasi");
    }
);

Route::controller(\App\Http\Controllers\KategoriPengumumanController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/kategori/kategori-pengumuman", "kategoriPengumuman")->name("kategori-pengumuman");
        Route::get("/dashboard/kategori/kategori-pengumuman/add", "addKategoriPengumuman");
        Route::get("/dashboard/kategori/kategori-pengumuman/{id}/edit", "editKategoriPengumuman")->name("edit-kategori-pengumuman");
        Route::post("/dashboard/kategori/kategori-pengumuman/add", "addDataKategoriPengumuman")->name("add-kategori-pengumuman");
        Route::patch("/dashboard/kategori/kategori-pengumuman/{id}/edit", "editDataKategoriPengumuman")->name("edit-kategori-pengumuman");
        Route::delete("/dashboard/kategori/kategori-pengumuman/{id}/delete", "deleteDataKategoriPengumuman")->name("delete-kategori-pengumuman");
    }
);

Route::controller(\App\Http\Controllers\KategoriBeritaController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/kategori/kategori-berita", "kategoriBerita")->name("kategori-berita");
        Route::get("/dashboard/kategori/kategori-berita/add", "addKategoriBerita");
        Route::get("/dashboard/kategori/kategori-berita/{id}/edit", "editKategoriBerita")->name("edit-kategori-berita");
        Route::post("/dashboard/kategori/kategori-berita/add", "addDataKategoriBerita")->name("add-kategori-berita");
        Route::patch("/dashboard/kategori/kategori-berita/{id}/edit", "editDataKategoriBerita")->name("edit-kategori-berita");
        Route::delete("/dashboard/kategori/kategori-berita/{id}/delete", "deleteDataKategoriBerita")->name("delete-kategori-berita");
    }
);

Route::controller(\App\Http\Controllers\PengumumanController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/beranda/pengumuman", "pengumuman")->name("pengumuman");
        Route::get("/dashboard/beranda/pengumuman/add", "addPengumuman");
        Route::get("/dashboard/beranda/pengumuman/{id}/edit", "editPengumuman")->name("edit-pengumuman");
        Route::post("/dashboard/beranda/pengumuman/add", "addDataPengumuman")->name("add-pengumuman");
        Route::patch("/dashboard/beranda/pengumuman/{id}/edit", "editDataPengumuman")->name("edit-pengumuman");
        Route::delete("/dashboard/beranda/pengumuman/{id}/delete", "deleteDataPengumuman")->name("delete-pengumuman");
    }
);

Route::controller(\App\Http\Controllers\BeritaController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/beranda/berita", "berita")->name("berita");
        Route::get("/dashboard/beranda/berita/add", "addBerita");
        Route::get("/dashboard/beranda/berita/{id}/edit", "editBerita")->name("edit-berita");
        Route::post("/dashboard/beranda/berita/add", "addDataBerita")->name("add-berita");
        Route::patch("/dashboard/beranda/berita/{id}/edit", "editDataBerita")->name("edit-berita");
        Route::delete("/dashboard/beranda/berita/{id}/delete", "deleteDataBerita")->name("delete-berita");
    }
);

Route::controller(\App\Http\Controllers\BlogController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/beranda/blog", "blog")->name("blog");
        Route::get("/dashboard/beranda/blog/add", "addBlog");
        Route::get("/dashboard/beranda/blog/{id}/edit", "editBlog")->name("edit-blog");
        Route::post("/dashboard/beranda/blog/add", "addDataBlog")->name("add-blog");
        Route::patch("/dashboard/beranda/blog/{id}/edit", "editDataBlog")->name("edit-blog");
        Route::delete("/dashboard/beranda/blog/{id}/delete", "deleteDataBlog")->name("delete-blog");
    }
);

Route::controller(\App\Http\Controllers\WelcomeController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/beranda/welcome", "welcome")->name("welcome");
        Route::get("/dashboard/beranda/welcome/add", "addWelcome");
        Route::post("/dashboard/beranda/welcome/add", "addDataWelcome")->name("add-welcome");
        Route::delete("/dashboard/beranda/welcome/{id}/delete", "deleteDataWelcome")->name("delete-welcome");
    }
);

Route::controller(\App\Http\Controllers\FasilitasController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/profil/fasilitas", "fasilitas")->name("fasilitas");
        Route::get("/dashboard/profil/fasilitas/add", "addFasilitas");
        Route::get("/dashboard/profil/fasilitas/{id}/edit", "editFasilitas")->name("edit-fasilitas");
        Route::post("/dashboard/profil/fasilitas/add", "addDataFasilitas")->name("add-fasilitas");
        Route::patch("/dashboard/profil/fasilitas/{id}/edit", "editDataFasilitas")->name("edit-fasilitas");
        Route::delete("/dashboard/profil/fasilitas/{id}/delete", "deleteDataFasilitas")->name("delete-fasilitas");
    }
);

Route::controller(\App\Http\Controllers\StrukturOrganisasiController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/profil/struktur-organisasi", "strukturOrganisasi")->name("struktur-organisasi");
        Route::get("/dashboard/profil/struktur-organisasi/add", "addStrukturOrganisasi");
        Route::get("/dashboard/profil/struktur-organisasi/{id}/edit", "editStrukturOrganisasi")->name("edit-struktur-organisasi");
        Route::post("/dashboard/profil/struktur-organisasi/add", "addDataStrukturOrganisasi")->name("add-struktur-organisasi");
        Route::patch("/dashboard/profil/struktur-organisasi/{id}/edit", "editDataStrukturOrganisasi")->name("edit-struktur-organisasi");
        Route::delete("/dashboard/profil/struktur-organisasi/{id}/delete", "deleteDataStrukturOrganisasi")->name("delete-struktur-organisasi");
    }
);

Route::controller(\App\Http\Controllers\KritikSaranController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/beranda/kritik-saran", "kritikSaran")->name("kritik-saran");
        Route::delete("/dashboard/beranda/kritik-saran/{id}/delete", "deleteDataKritikSaran")->name("delete-kritik-saran");
    }
);

Route::controller(\App\Http\Controllers\GaleriController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/galeri", "galeri")->name("galeri");
        Route::get("/dashboard/galeri/add", "addGaleri");
        Route::get("/dashboard/galeri/{id}/edit", "editGaleri")->name("edit-galeri");
        Route::post("/dashboard/galeri/add", "addDataGaleri")->name("add-galeri");
        Route::patch("/dashboard/galeri/{id}/edit", "editDataGaleri")->name("edit-galeri");
        Route::delete("/dashboard/galeri/{id}/delete", "deleteDataGaleri")->name("delete-galeri");
    }
);

Route::controller(\App\Http\Controllers\RiwayatBeritaController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/riwayat/berita", "riwayatBerita")->name("riwayat-berita");
        Route::delete("/dashboard/riwayat/berita/{id}/delete", "deleteBerita")->name("delete-riwayat-berita");
        Route::delete("/dashboard/riwayat/berita/{id}/restore", "restoreBerita")->name("restore-riwayat-berita");
    }
);

Route::controller(\App\Http\Controllers\RiwayatPengumumanController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/riwayat/pengumuman", "riwayatPengumuman")->name("riwayat-pengumuman");
        Route::delete("/dashboard/riwayat/pengumuman/{id}/delete", "deletePengumuman")->name("delete-riwayat-pengumuman");
        Route::delete("/dashboard/riwayat/pengumuman/{id}/restore", "restorePengumuman")->name("restore-riwayat-pengumuman");
    }
);

Route::controller(\App\Http\Controllers\RiwayatBlogController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/riwayat/blog", "riwayatBlog")->name("riwayat-blog");
        Route::delete("/dashboard/riwayat/blog/{id}/delete", "deleteBlog")->name("delete-riwayat-blog");
        Route::delete("/dashboard/riwayat/blog/{id}/restore", "restoreBlog")->name("restore-riwayat-blog");
    }
);

Route::controller(\App\Http\Controllers\GuruController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/guru", "guru")->name("guru");
        Route::get("/dashboard/guru/add", "addGuru");
        Route::get("/dashboard/guru/{id}/edit", "editGuru")->name("edit-guru");
        Route::post("/dashboard/guru/add", "addDataGuru")->name("add-guru");
        Route::patch("/dashboard/guru/{id}/edit", "editDataGuru")->name("edit-guru");
        Route::delete("/dashboard/guru/{id}/delete", "deleteDataGuru")->name("delete-guru");
        Route::delete("/dashboard/guru/reset", "deleteAllDataGuru")->name("reset-guru");
        Route::post('/dashboard/guru/import', 'importDataGuru')->name('import-guru');
        Route::get('/dashboard/guru/import', 'importGuru')->name('import-guru');
    }
);

Route::controller(\App\Http\Controllers\StafController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/staf", "staf")->name("staf");
        Route::get("/dashboard/staf/add", "addStaf");
        Route::get("/dashboard/staf/{id}/edit", "editStaf")->name("edit-staf");
        Route::post("/dashboard/staf/add", "addDataStaf")->name("add-staf");
        Route::patch("/dashboard/staf/{id}/edit", "editDataStaf")->name("edit-staf");
        Route::delete("/dashboard/staf/{id}/delete", "deleteDataStaf")->name("delete-staf");
        Route::delete("/dashboard/staf/reset", "deleteAllDataStaf")->name("reset-staf");
        Route::post('/dashboard/staf/import', 'importDataStaf')->name('import-staf');
        Route::get('/dashboard/staf/import', 'importStaf')->name('import-staf');
    }
);

Route::controller(\App\Http\Controllers\KelasController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/kelas", "kelas")->name("kelas");
        Route::get("/dashboard/kelas/add", "addKelas");
        Route::get("/dashboard/kelas/{id}/edit", "editKelas")->name("edit-kelas");
        Route::post("/dashboard/kelas/add", "addDataKelas")->name("add-kelas");
        Route::patch("/dashboard/kelas/{id}/edit", "editDataKelas")->name("edit-kelas");
        Route::delete("/dashboard/kelas/{id}/delete", "deleteDataKelas")->name("delete-kelas");
    }
);

Route::controller(\App\Http\Controllers\MataPelajaranController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/mapel/kelas", "kelas")->name("mapel");
        Route::get("/dashboard/mapel/{kelasId}/detail-mapel", "mapel")->name("detail-mapel");
        Route::get("/dashboard/mapel/{kelasId}/add", "addMapel")->name("add-mapel");
        Route::get("/dashboard/mapel/{kelasId}/{id}/edit", "editMapel")->name("edit-mapel");
        Route::post("/dashboard/mapel/{kelasId}/add", "addDataMapel")->name("add-mapel");
        Route::patch("/dashboard/mapel/{kelasId}/{id}/edit", "editDataMapel")->name("edit-mapel");
        Route::delete("/dashboard/mapel/{kelasId}/{id}/delete", "deleteDataMapel")->name("delete-mapel");
        Route::delete("/dashboard/mapel/{kelasId}/delete", "deleteAllDataMapel")->name("reset-mapel");
    }
);

Route::controller(\App\Http\Controllers\SiswaController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/siswa/kelas", "kelas")->name("siswa");
        Route::get("/dashboard/siswa/{kelasId}/detail-siswa", "siswa")->name("detail-siswa");
        Route::get("/dashboard/siswa/{kelasId}/add", "addSiswa")->name("add-siswa");
        Route::get("/dashboard/siswa/{kelasId}/import", "importSiswa")->name("add-siswa-import");
        Route::post("/dashboard/siswa/{kelasId}/import", "importDataSiswa")->name("add-siswa-import");
        Route::get("/dashboard/siswa/{kelasId}/{id}/edit", "editSiswa")->name("edit-siswa");
        Route::post("/dashboard/siswa/{kelasId}/add", "addDataSiswa")->name("add-siswa");
        Route::patch("/dashboard/siswa/{kelasId}/{id}/edit", "editDataSiswa")->name("edit-siswa");
        Route::delete("/dashboard/siswa/{kelasId}/{id}/delete", "deleteDataSiswa")->name("delete-siswa");
        Route::delete("/dashboard/siswa/{kelasId}/delete", "deleteAllDataSiswa")->name("reset-siswa");
    }
);


Route::controller(\App\Http\Controllers\JadwalController::class)->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class)->group(
    function (){
        Route::get("/dashboard/jadwal", "jadwal")->name("jadwal");
        Route::get("/dashboard/jadwal/add", "addJadwal")->name("add-jadwal");
        Route::get("/dashboard/jadwal/{id}/edit", "editJadwal")->name("edit-jadwal");
        Route::post("/dashboard/kelas/store", "storeJadwal")->name("store-jadwal");
        Route::put("/dashboard/{id}/update", "updateJadwal")->name("update-jadwal");
        Route::delete("/dashboard/jadwal/{id}/delete", "deleteJadwal")->name("delete-jadwal");

    }
);
