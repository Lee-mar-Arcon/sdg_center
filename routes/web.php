<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\WelcomeController;

Route::get('/news', function () {
   return Inertia::render('SDG_News');
});

Route::get('/home', function () {
    return Inertia::render('SDG_Home');
});

Route::get('/mini', function () {
    return Inertia::render('SDG_mini');
});

Route::get('/', [WelcomeController::class,'index'])->name('welcome');
