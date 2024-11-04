<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SdgController;
use App\Http\Controllers\ArticleController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\WelcomeController;




Route::get('/news', function () {
    return Inertia::render('SDG_News');

});Route::get('/admin', function () {
    return Inertia::render('Article');

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

//REAN

Route::get('/SDG/article{articleId}', function ($articleId) {
    return Inertia::render('SDG/index', ['articleId' => $articleId]);
});


// LEE-MAR

//Jee

Route::get('/admin/article/index', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');


Route::get('/admin/sdg/index', [SdgController::class, 'index'])->name('sdgCategory.index');
Route::get('/admin/sdg/create', [SdgController::class, 'create'])->name('sdgCategory.create');
Route::post('/admin/sdg', [SdgController::class, 'store'])->name('sdgCategory.store');
Route::get('/admin/sdg/{sdgCategory}/edit', [SdgController::class, 'edit'])->name('sdgCategory.edit');
Route::put('/admin/sdg/{sdgCategory}', [SdgController::class, 'update'])->name('sdgCategory.update');
Route::delete('/admin/sdg/{sdgCategory}', [SdgController::class, 'destroy'])->name('sdgCategory.destroy');

Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('Category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('Category.create');
Route::post('/admin/category', [CategoryController::class, 'store'])->name('Category.store');
Route::get('/admin/category/{Category}/edit', [CategoryController::class, 'edit'])->name('Category.edit');
Route::put('/admin/category/{Category}', [CategoryController::class, 'update'])->name('Category.update');
Route::delete('/admin/category/{Category}', [CategoryController::class, 'destroy'])->name('Category.destroy');

Route::get('/admin/article/create', [DashboardController::class, 'store']);
