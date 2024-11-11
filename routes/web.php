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

//REAN
// route for viewing SDG HOME
Route::get('/', [GuestController::class, 'sdgHomePage']);

// route for viewing single article
Route::get('/articles/{id}', [GuestController::class, 'singleArticle']);

//route for viewing per SDG
Route::get('/news', [GuestController::class, 'show']);


Route::middleware(['role:Admin', 'verified', 'auth:sanctum'])->prefix('admin')->name('admin.')->group(function () {
    // LEE-MAR

    // SDG
    Route::resource('sdg', SdgController::class)->only(['index', 'store'])->names([
        'index' => 'sdg.index',
        'store' => 'sdg.store',
    ]);
    Route::post('/sdg/{sdg}/delete', [SdgController::class, 'destroy'])->name('sdg.destroy');
    Route::post('/sdg/{sdg}', [SdgController::class, 'update'])->name('sdg.update');

    // INDICATOR
    Route::resource('indicator', IndicatorController::class)->only(['index', 'store'])->names([
        'index' => 'indicator.index',
        'store' => 'indicator.store',
    ]);
    Route::post('/indicator/{indicator}/delete', [IndicatorController::class, 'destroy'])->name('indicator.destroy');
    Route::post('/indicator/{indicator}', [IndicatorController::class, 'update'])->name('indicator.update');

    // METRIC
    Route::resource('metric', MetricController::class)->only(['index', 'store'])->names([
        'index' => 'metric.index',
        'store' => 'metric.store',
    ]);
    Route::post('/metric/{metric}', [MetricController::class, 'update'])->name('metric.update');
    Route::post('/metric/{metric}/delete', [MetricController::class, 'destroy'])->name('metric.destroy');

    // CATEGORY
    Route::resource('category', CategoryController::class)->only(['index', 'store'])->names([
        'index' => 'category.index',
        'store' => 'category.store',
        'create' => 'category.create',
    ]);
    Route::post('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');

    // ARTICLE
    Route::resource('article', ArticleController::class)->only(['index', 'store', 'create', 'edit'])->names([
        'index' => 'article.index',
        'store' => 'article.store',
        'edit' => 'article.edit',
    ]);
    Route::post('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::post('/article/{article}', [ArticleController::class, 'update'])->name('article.update');
});




