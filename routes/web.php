<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Feed\FeedController;
use App\Http\Controllers\Feed\PostController;
use App\Http\Controllers\Perfil\PerfilController;



Route::middleware(['auth'])->group(function(){

    //Rotas Tela Feed
    Route::get('/',[FeedController::class, 'index'])->name('feed');

    //Rotas Postagens
    Route::post('/post/store',[PostController::class, 'store'])->name('posts.store');
    Route::delete('/post/{id}/destroy',[PostController::class, 'destroy'])->name('posts.destroy');

    //Rota de Perfil
    Route::get('/perfil/{id}',[PerfilController::class, 'index'])->name('perfil');

    //Rotas de administrar seguidos

    Route::get('/perfil/{id}/seguidores', [PerfilController::class, 'seguidores'])
    ->name('perfil.seguidores');

    Route::get('/perfil/{id}/seguindo',   [PerfilController::class, 'seguindo'])
    ->name('perfil.seguindo');

});

Route::middleware(['auth', 'is_admin'])->group(function(){
    Route::get('/admin/users',[AdminUserController::class,'index'])->name('adminUser');
    Route::get('/admin/post',[AdminPostController::class,'index'])->name('adminPost');
    Route::get('/admin',[AdminDashboardController::class,'index'])->name('adminDashboard');
});



