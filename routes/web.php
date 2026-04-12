<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Feed\FeedController;


Route::get('/', function () {
    return redirect()->route('feed');
})->middleware('auth');


Route::middleware(['auth'])->group(function(){

    Route::get('/feed',[FeedController::class, 'index'])->name('feed');

    
    
});

    
    Route::get('admin/users',[AdminUserController::class,'index'])->name('adminUser');
    Route::get('admin/post',[AdminPostController::class,'index'])->name('adminPost');
    Route::get('admin/dashboard',[AdminDashboardController::class,'index'])->name('adminDashboard');
    

