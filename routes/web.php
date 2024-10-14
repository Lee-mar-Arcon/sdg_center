<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\WelcomeController;

<<<<<<< HEAD


//
//Route::get('/', [WelcomeController::class,'index'])->name('welcome');

//Route::get('/admin', function () {
//    return Inertia::render('Admin/Article');
//});
//Route::get('/footer', function () {
//    return view('layouts.core.footer');
//});

Route::get('/news', function () {
   return Inertia::render('SDG_News');
=======
Route::get('/news', function () {
    return Inertia::render('SDG_News');
>>>>>>> 41cd099bb3539f25f7f1b2cf1085eeac6a4f4636
});

Route::get('/', function () {
    return Inertia::render('SDG_Home');
});

Route::get('/page', function () {
    return Inertia::render('SDG_Page');
});

Route::get('/mini', function () {
    return Inertia::render('SDG_mini');
});

<<<<<<< HEAD
//Route::get('/', [WelcomeController::class,'index'])->name('welcome');

=======
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// route for viewing single article
Route::get('/sdg/article/', function () {
    return Inertia::render('SDG/view');
});
>>>>>>> 41cd099bb3539f25f7f1b2cf1085eeac6a4f4636
