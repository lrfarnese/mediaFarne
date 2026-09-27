<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PerfilApiController;
use App\Http\Controllers\Api\PostsApiController;
use Illuminate\Support\Facades\Route;


Route::post('/login',[AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/me', [AuthApiController::class, 'me']);

   Route::get('/posts', [PostsApiController::class,'index']);

   Route::get('/user/seguindo',[PerfilApiController::class, 'seguindo']);

   Route::post('/posts/{post}/interaction', [PostsApiController::class, 'storeInteraction']);
});
