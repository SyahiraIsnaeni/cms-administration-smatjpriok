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
        Route::post("/logout", "doLogout")->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class, \App\Http\Middleware\OnlyOsisMiddleware::class]);
    }
);

Route::get('/dashboard/admin', function () {
    return view('back.admin.dashboard');
});

Route::get('/dashboard/osis', function () {
    return view('back.osis.dashboard');
});
