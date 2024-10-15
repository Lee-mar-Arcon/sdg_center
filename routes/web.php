<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\WelcomeController;




Route::get('/news', function () {
    return Inertia::render('SDG_News');

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


//Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// route for viewing single article
Route::get('/sdg/article/', function () {
    return Inertia::render('SDG/view');
});



// LEE-MAR
