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

<<<<<<< HEAD

=======
Route::get('/', [WelcomeController::class,'index'])->name('welcome');
>>>>>>> 344ad240f82c5a3776d3c14eee77825c1070c31f
