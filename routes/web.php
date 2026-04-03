<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;



Route::middleware(['auth'])->group(function(){

    Route::get('/feed', function(){
        return view('feed.indexFeed');
    });
});


