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

