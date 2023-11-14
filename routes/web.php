<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('pages.home');
});

Route::resource('/user', \App\Http\Controllers\UserViewController::class);
Route::resource('/avatar', \App\Http\Controllers\AvatarViewController::class);
Route::resource('/question', \App\Http\Controllers\QuestionViewController::class);
