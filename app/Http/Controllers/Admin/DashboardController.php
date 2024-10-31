<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() {
        $articles = Article::all(); // Fetch all articles
        return Inertia::render('Admin/Article/Index', [
            'articles' => $articles
        ]);

    }

    public function show() {
        return Inertia::render('Admin/Article/Show');
    }

    public function store() {
        return Inertia::render('Admin/Article/Create');
    }

    public function update() {
        return Inertia::render('Admin/Article/Edit');
    }

    public function destroy() {

    }
}
