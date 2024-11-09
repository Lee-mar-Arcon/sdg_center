<?php

namespace App\Http\Controllers;

use App\Models\SDG;
use Inertia\Inertia;
use App\Models\Article;
use App\Models\Category;
use App\Models\ArticleSDG;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return Inertia::render('Admin/Article/Index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $categories = Category::all()->map(function ($item, $key) {
            return [
                'label' => $item->category,
                'value' => $item->id,
            ];
        });

        $sdgs = SDG::all()->map(function ($item, $key) {
            return [
                'label' => "SDG " . $item->sdg_no . " " . $item->name,
                'value' => $item->id,
            ];
        });

        return Inertia::render('Admin/Article/Create', [
            'categories' => $categories,
            'sdgs' => $sdgs,
        ]);
    }

    public function edit(Article $article)
    {
        $categories = Category::all()->map(function ($item, $key) {
            return [
                'label' => $item->category,
                'value' => $item->id,
            ];
        });

        $sdgs = SDG::all()->map(function ($item, $key) {
            return [
                'label' => "SDG " . $item->sdg_no . " " . $item->name,
                'value' => $item->id,
            ];
        });
        $articleSDGs = ArticleSDG::where('article_id', $article->id)->get()->map(function ($item) {
            return $item->sdg_id;
        });
        $articleCategories = ArticleCategory::where('article_id', $article->id)->get()->map(function ($item) {
            return $item->category_id;
        });
        return Inertia::render('Admin/Article/Edit', [
            'categories' => $categories,
            'sdgs' => $sdgs,
            'article' => $article,
            'articleSDGs' => $articleSDGs,
            'articleCategories' => $articleCategories
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $data['images'] = $this->storeImages($request);
        $article = Article::create($data);
        $this->storeArticleCategories($data['categories'], $article->id);
        $this->storeArticleSDGs($data['sdgs'], $article->id);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        if (!empty($data['images'])) {
            $this->deleteImages($article->images);
            $data['images'] = $this->storeImages($request);
        } else unset($data['images']);

        $this->deleteRelatedRows('article_category', $article->id);
        $this->deleteRelatedRows('article_sdg', $article->id);
        $this->storeArticleCategories($data['categories'], $article->id);
        $this->storeArticleSDGs($data['sdgs'], $article->id);
        $article->update($data);
    }

    public function destroy(Article $article) {
        $this->deleteImages($article->images);
        $article->delete();
    }

    private function storeImages($request)
    {
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');
            array_push($imagePaths, $path);
        }
        return $imagePaths;
    }

    private function storeArticleCategories($list, $article_id)
    {
        foreach ($list as $category) {
            ArticleCategory::create([
                'category_id' => $category,
                'article_id' => $article_id,
            ]);
        }
    }

    private function storeArticleSDGs($list, $article_id)
    {
        foreach ($list as $sdg) {
            ArticleSDG::create([
                'sdg_id' => $sdg,
                'article_id' => $article_id,
            ]);
        }
    }

    private function deleteImages($imagePaths)
    {
        foreach ($imagePaths as $image) {
            Storage::disk('public')->delete($image);
        }
    }

    private function deleteRelatedRows($table, $id)
    {
        DB::table($table)->where('article_id', $id)->delete();
    }
}
