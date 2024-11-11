<?php

namespace App\Http\Controllers;

use App\Models\SDG;
use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class GuestController extends Controller
{
    public function show(Request $request) {
        $list = SDG::with('metrics.indicators')->get();
        $articles = Article::with('sdgs')
            ->whereHas('sdgs', function (Builder $q) use ($request) {
                $q->where('sdg_id', $request->sdg ? $request->sdg : 1);
            })
            ->get();
        return Inertia::render('SDG_News', [
            'list' => $list,
            'articles' => $articles
        ]);
    }

    public function sdgHomePage() {
        $articles = Article::with('categories','sdgs')->orderBy('event_date', 'desc')->take(4)->get();
        $sdgs = SDG::all();
        return Inertia::render('SDG_Home', [
            'articles' => $articles,
            'sdgs' => $sdgs,
        ]);
    }

    public function singleArticle($id) {
        $articles = Article::with('categories','sdgs')->orderBy('event_date', 'desc')->get();
        $article = Article::with('categories','sdgs')->findOrFail($id);
        $sdgs = SDG::all();
        return Inertia::render('SDG/view', [
            'article' => $article,
            'articles' => $articles,
            'sdgs' => $sdgs,
        ]);
    }
}
