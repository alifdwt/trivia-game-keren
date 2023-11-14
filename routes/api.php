<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\AvatarController;
use App\Http\Controllers\api\QuestionController;
use App\Http\Controllers\api\AnswerController;

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

// AVATARS
Route::apiResource('avatar', AvatarController::class);
// Route::get('/avatars', [AvatarController::class, 'findAll']);
// Route::get('/avatar/{id}', [AvatarController::class, 'getAvatarById']);
// Route::post('/avatar', [AvatarController::class, 'store']);


// USERS
Route::apiResource('user', UserController::class);
// Route::get('/users', [UserController::class, 'findAll']);
// Route::get('/user/{id}', [UserController::class, 'getUserById']);
// Route::post('/user', [UserController::class, 'store']);

// QUESTIONS
Route::apiResource('question', QuestionController::class);

// ANSWERS
Route::apiResource('answer', AnswerController::class);
