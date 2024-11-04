<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sdgCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SdgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sdgs = SdgCategory::all(); // Fetch all SDG categories
        return Inertia::render('Admin/sdgCategory/Index', [
            'sdgCategories' => $sdgs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/sdgCategory/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        SdgCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('sdgCategory.index')->with('success', 'SDG Category added successfully!');
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
    public function edit(SdgCategory $sdgCategory)
    {
        return Inertia::render('Admin/sdgCategory/Edit', [
            'sdgCategory' => $sdgCategory
        ]);
    }

    public function update(Request $request, SdgCategory $sdgCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $sdgCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('sdgCategory.index')->with('success', 'SDG Category updated successfully!');
    }

    public function destroy(SdgCategory $sdgCategory)
    {
        $sdgCategory->delete();

        return redirect()->route('sdgCategory.index')->with('success', 'SDG Category deleted successfully!');
    }
}
