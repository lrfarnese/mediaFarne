<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Feed\FeedController;
use App\Http\Controllers\Perfil\PerfilController;



Route::middleware(['auth'])->group(function(){

    Route::get('/',[FeedController::class, 'index'])->name('feed');
    Route::get('/perfil',[PerfilController::class, 'index'])->name('perfil');

    Route::get('/perfil/seguidores', [PerfilController::class, 'seguidores'])
    ->name('perfil.seguidores');
    Route::get('/perfil/seguindo',   [PerfilController::class, 'seguindo'])
    ->name('perfil.seguindo');

});


Route::get('/admin/users',[AdminUserController::class,'index'])->name('adminUser');
Route::get('/admin/post',[AdminPostController::class,'index'])->name('adminPost');
Route::get('/admin',[AdminDashboardController::class,'index'])->name('adminDashboard');


