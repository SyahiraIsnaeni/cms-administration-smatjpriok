<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\BerandaController::class)->group(
    function (){
        Route::get("/", "index");
    }
);

Route::get('/admin', function () {
    return view('welcome');
});

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
        Route::get("/dashboard/osis", "dashboard")->middleware(\App\Http\Middleware\OnlyOsisMiddleware::class);
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

