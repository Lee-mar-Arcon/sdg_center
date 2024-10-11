<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\WelcomeController;



Route::get('/', [WelcomeController::class,'index'])->name('welcome');

Route::get('/admin', function () {
    return Inertia::render('Admin/Article');
});
Route::get('/footer', function () {
    return view('layouts.core.footer');
});

Route::get('/home', function () {
    return Inertia::render('SDG_Home');
});

Route::get('/mini', function () {
    return Inertia::render('SDG_mini');
});


