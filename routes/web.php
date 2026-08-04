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
    Route::get('/seguindo/posts',[FeedController::class, 'postsSeguindo'])->name('feed.seguindo');
    //Rotas Postagens
    Route::post('/post/store',[PostController::class, 'store'])->name('posts.store');
    Route::delete('/post/{id}/destroy',[PostController::class, 'destroy'])->name('posts.destroy');

    //Rota de Perfil
    Route::get('/perfil/{id}',[PerfilController::class, 'index'])->name('perfil');
    Route::put('/perfil/{id}/update', [PerfilController::class , 'update'])->name('perfil.update');
    
    //Rotas de administrar seguidos

    Route::get('/perfil/{id}/seguidores', [PerfilController::class, 'seguidores'])
    ->name('perfil.seguidores');

    Route::get('/perfil/{id}/seguindo',   [PerfilController::class, 'seguindo'])
    ->name('perfil.seguindo');
    
    Route::post('/perfil/seguir/{id}', [PerfilController::class, 'seguir'])->name('perfil.seguir');
    Route::post('/perfil/deixar-de-seguir/{id}', [PerfilController::class, 'deixarDeSeguir'])
    ->name('perfil.deixarDeSeguir');

});

Route::middleware(['auth', 'is_admin'])->group(function(){
    Route::get('/admin/users',[AdminUserController::class,'index'])->name('admin.user');
    Route::delete('/admin/users/{id}/destroy',[AdminUserController::class,'destroy'])->name('admin.user.destroy');


    Route::get('/admin/post',[AdminPostController::class,'index'])->name('adminPost');
    Route::get('/admin',[AdminDashboardController::class,'index'])->name('adminDashboard');
});



