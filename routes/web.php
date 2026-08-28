<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Feed\FeedController;
use App\Http\Controllers\Feed\InteractionsController;
use App\Http\Controllers\Feed\PostController;
use App\Http\Controllers\Perfil\PerfilController;



Route::middleware(['auth'])->group(function(){

    //Rotas Tela Feed
    Route::get('/',[FeedController::class, 'index'])->name('feed');
    Route::get('/seguindo/posts',[FeedController::class, 'postsSeguindo'])->name('feed.seguindo');
    Route::get('/posts/curtidos', [FeedController::class, 'postsCurtidos'])->name('feed.curtidos');
    //Rotas Postagens
    Route::post('/post/store',[PostController::class, 'store'])->name('posts.store');
    Route::delete('/post/{id}/destroy',[PostController::class, 'destroy'])->name('posts.destroy');

    //Rota interacoe
    Route::post('/posts/{post}/interact', [InteractionsController::class, 'store'])->name('posts.interact');

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
    
    //Admin Dashboard
    Route::get('/admin',[AdminDashboardController::class,'index'])->name('adminDashboard');

    //Admin User
    Route::get('/admin/users',[AdminUserController::class,'index'])->name('admin.user');
    Route::delete('/admin/users/{id}/destroy',[AdminUserController::class,'destroy'])->name('admin.user.destroy');
    Route::get('admin/users/{id}/edit',[AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::put('admin/users/{id}/update',[AdminUserController::class ,'update'])->name('admin.user.update');
    Route::get('admin/users/create',[AdminUserController::class ,'create'])->name('admin.user.create');
    Route::post('admin/users/store',[AdminUserController::class ,'store'])->name('admin.user.store');

    //Admin Posts
    Route::get('/admin/posts',[AdminPostController::class,'index'])->name('admin.post');
    Route::delete('/admin/posts/{id}/destroy',[AdminPostController::class,'destroy'])->name('admin.post.destroy');
    Route::get('/admin/posts/{id}/view',[AdminPostController::class, 'viewPost'])->name('admin.post.view');
});



