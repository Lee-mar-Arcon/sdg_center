<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ArticleCategory::all(); // Fetch all SDG categories
        return Inertia::render('Admin/articleCategory/Index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/articleCategory/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ArticleCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('Category.index')->with('success', 'SDG Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleCategory $Category)
    {
        return Inertia::render('Admin/articleCategory/Edit', [
            'Category' => $Category
        ]);
    }

    public function update(Request $request, ArticleCategory $Category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('Category.index')->with('success', 'Article Category updated successfully!');
    }

    public function destroy(ArticleCategory $Category)
    {
        $Category->delete();

        return redirect()->route('Category.index')->with('success', 'Article Category deleted successfully!');
    }
}
