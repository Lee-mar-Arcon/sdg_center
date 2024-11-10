<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ShowSdgController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\SdgController;
use App\Http\Controllers\Admin\MetricController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\IndicatorController;




Route::get('/', function () {
    return Inertia::render('SDG_Home');
});

Route::get('/page', function () {
    return Inertia::render('SDG_Page');
});

Route::get('/test', function () {
    return Inertia::render('test');
});

// route for viewing single article
Route::get('/sdg/article/', function () {
    return Inertia::render('SDG/view');
});

//REAN

Route::get('/SDG/article{articleId}', function ($articleId) {
    return Inertia::render('SDG/index', ['articleId' => $articleId]);
});


Route::middleware(['role:Admin', 'verified', 'auth:sanctum'])->prefix('admin')->name('admin.')->group(function () {
    // LEE-MAR

    // SDG
    Route::resource('sdg', SdgController::class)->only(['index', 'store', 'destroy'])->names([
        'index' => 'sdg.index',
        'store' => 'sdg.store',
        'destroy' => 'sdg.destroy',
    ]);
    Route::post('/sdg/{sdg}', [SdgController::class, 'update'])->name('sdg.update');

    // INDICATOR
    Route::resource('indicator', IndicatorController::class)->only(['index', 'store', 'destroy'])->names([
        'index' => 'indicator.index',
        'store' => 'indicator.store',
        'destroy' => 'indicator.destroy',
    ]);
    Route::post('/indicator/{indicator}', [IndicatorController::class, 'update'])->name('indicator.update');

    // METRIC
    Route::resource('metric', MetricController::class)->only(['index', 'store', 'destroy', 'update'])->names([
        'index' => 'metric.index',
        'store' => 'metric.store',
        'destroy' => 'metric.destroy',
        'update' => 'metric.update',
    ]);


    // CATEGORY
    Route::resource('category', CategoryController::class)->only(['index', 'store', 'destroy', 'update'])->names([
        'index' => 'category.index',
        'store' => 'category.store',
        'destroy' => 'category.destroy',
        'update' => 'category.update',
        'create' => 'category.create',
    ]);

    // ARTICLE
    Route::resource('article', ArticleController::class)->only(['index', 'store', 'destroy', 'create', 'edit'])->names([
        'index' => 'article.index',
        'store' => 'article.store',
        'destroy' => 'article.destroy',
        'edit' => 'article.edit',
    ]);
    Route::post('/article/{article}', [ArticleController::class, 'update'])->name('article.update');
});

//Jee
Route::get('/news', [GuestController::class, 'show']);


