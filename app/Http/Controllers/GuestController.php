<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SDG;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GuestController extends Controller
{
    public function show() {
        $list = SDG::with('metrics.indicators')->get();
        $articles = Article::with('sdgs')->get();
        dd($articles);

        return Inertia::render('SDG_News', [
            'list' => $list
        ]);
    }
}
