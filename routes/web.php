<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('test');
});

Route::get('/home', function () {
    return Inertia::render('SDG_Home');
});

Route::get('/mini', function () {
    return Inertia::render('SDG_mini');
});
