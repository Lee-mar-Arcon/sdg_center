<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\WelcomeController;


//Route::get('/', function () {
//    return Inertia::render('test');
//});
Route::get('/', [WelcomeController::class,'index'])->name('welcome');


Route::get('/home', function () {
    return Inertia::render('SDG_Home');
});

Route::get('/mini', function () {
    return Inertia::render('SDG_mini');
});

