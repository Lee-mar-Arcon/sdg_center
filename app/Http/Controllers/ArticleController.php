<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Article;
use App\Models\ArticleAttachment;
use App\Models\sdgCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        return Inertia::render('Admin/Article/Create');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return Inertia::render('Admin/Article/Edit', [
            'article' => $article
        ]);
    }
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'event_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // max 10MB
            'sdg_categories' => 'nullable|array',
            'sdg_categories.*' => 'exists:sdg_categories,id'
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Step 1: Create the Article
            $article = Article::create([
                'title' => $validated['title'],
                'category_id' => $validated['category_id'],
                'short_description' => $validated['short_description'] ?? null,
                'content' => $validated['content'] ?? null,
                'author' => $validated['author'] ?? null,
                'event_date' => $validated['event_date'] ?? null,
            ]);

            // Step 2: Save the photo to `article_attachment` table if provided
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('public/articles');
                ArticleAttachment::create([
                    'article_id' => $article->id,
                    'file_path' => $path,
                ]);
            }

            // Step 3: Attach selected SDG categories
            if (!empty($validated['sdg_categories'])) {
                $article->sdgCategories()->sync($validated['sdg_categories']);
            }

            // Commit the transaction
            DB::commit();

            return response()->json(['message' => 'Article created successfully', 'article' => $article], 201);
        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            return response()->json(['message' => 'Error creating article', 'error' => $e->getMessage()], 500);
        }
    }
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'short_description' => 'nullable|string',
            'content' => 'required',
            'author' => 'required',
            'event_date' => 'nullable|date',
        ]);

        $article->update($validated);
        return response()->json($article);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }


}
