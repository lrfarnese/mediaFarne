<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;


Route::get('/', function () {
    return redirect()->route('login');
});

//Route::middleware(['auth'])->group(function(){

    Route::get('/admin', function(){
        return view('admin.admin_page');
    });
//});


