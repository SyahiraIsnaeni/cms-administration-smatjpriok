<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

Route::controller(\App\Http\Controllers\EkstrakurikulerController::class)->group(
    function (){
        Route::get("/dashboard/beranda/ekstrakurikuler", "ekstrakurikuler")->name("ekstrakurikuler")->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class);
        Route::get("/dashboard/beranda/ekstrakurikuler/add", "addEkstrakurikuler")->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class);
        Route::post("/dashboard/beranda/ekstrakurikuler/add", "addDataEkstrakurikuler")->name("add-ekstrakurikuler")->middleware(\App\Http\Middleware\OnlyAdminMiddleware::class);
    }
);

