<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return view("welcome");
});

Route::middleware("auth")->group(function () {
    Route::get("/admin", function () {
        return view("pages.home");
    });
    Route::resource("/user", \App\Http\Controllers\UserViewController::class);
    Route::resource(
        "/avatar",
        \App\Http\Controllers\AvatarViewController::class
    );
    Route::resource(
        "/question",
        \App\Http\Controllers\QuestionViewController::class
    );
});

require __DIR__ . "/auth.php";
