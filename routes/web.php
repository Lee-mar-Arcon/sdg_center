<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\SdgController;
use App\Http\Controllers\Admin\MetricController;
use App\Http\Controllers\Page\WelcomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\IndicatorController;

Route::get('/news', function () {
    return Inertia::render('SDG_News');
});
Route::get('/admin', function () {
    return Inertia::render('Article');
});

Route::get('/', function () {
    return Inertia::render('SDG_Home');
});

Route::get('/page', function () {
    return Inertia::render('SDG_Page');
});

Route::get('/test', function () {
    return Inertia::render('test');
});


//Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// route for viewing single article
Route::get('/sdg/article/', function () {
    return Inertia::render('SDG/view');
});

//REAN

Route::get('/SDG/article{articleId}', function ($articleId) {
    return Inertia::render('SDG/index', ['articleId' => $articleId]);
});


// LEE-MAR
Route::middleware(['role:Admin', 'verified', 'auth:sanctum'])->prefix('admin')->name('admin.')->group(function () {
    // sdg
    Route::resource('sdg', SdgController::class)->only(['index', 'store', 'destroy'])->names([
        'index' => 'sdg.index',
        'store' => 'sdg.store',
        'destroy' => 'sdg.destroy',
    ]);
    Route::post('/sdg/{sdg}', [SdgController::class, 'update'])->name('sdg.update');
    // indicator
    Route::resource('indicator', IndicatorController::class)->only(['index', 'store', 'destroy'])->names([
        'index' => 'indicator.index',
        'store' => 'indicator.store',
        'destroy' => 'indicator.destroy',
    ]);
    Route::post('/indicator/{indicator}', [IndicatorController::class, 'update'])->name('indicator.update');
    // metric
    Route::resource('metric', MetricController::class)->only(['index', 'store', 'destroy', 'update'])->names([
        'index' => 'metric.index',
        'store' => 'metric.store',
        'destroy' => 'metric.destroy',
        'update' => 'metric.update',
    ]);
});

//Jee

Route::get('/admin/article/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('Category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('Category.create');
Route::post('/admin/category', [CategoryController::class, 'store'])->name('Category.store');
Route::get('/admin/category/{Category}/edit', [CategoryController::class, 'edit'])->name('Category.edit');
Route::put('/admin/category/{Category}', [CategoryController::class, 'update'])->name('Category.update');
Route::delete('/admin/category/{Category}', [CategoryController::class, 'destroy'])->name('Category.destroy');

Route::get('/admin/article/create', [DashboardController::class, 'store']);
