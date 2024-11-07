<?php

namespace App\Http\Controllers\Admin;

use App\Models\SDG;
use Inertia\Inertia;
use App\Models\sdgCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SDG\StoreSDGRequest;
use App\Http\Requests\SDG\UpdateSDGRequest;

class SdgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sdgs = SDG::all(); // Fetch all SDG categories
        return Inertia::render('Admin/Sdg/Index', [
            'sdgs' => $sdgs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/sdgCategory/Create');
    }

    public function store(StoreSDGRequest $request)
    {
        $iconPath = $request->file('icon')->store('images/sdgs', 'public');
        $data = $request->all();
        $data['icon'] = $iconPath;
        SDG::create($data);
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

    public function update(UpdateSDGRequest $request, SDG $sdg)
    {
        $data = [];

        if ($request->all()['icon'] !== null) {
            Storage::disk('public')->delete($sdg->icon);
            $iconPath = $request->file('icon')->store('images/sdgs', 'public');
            $data['icon'] = $iconPath;
        }

        $data['name'] = $request->all()['name'];
        $data['description'] = $request->all()['description'];
        $data['sdg_no'] = $request->all()['sdg_no'];
        $data['bg_color'] = $request->all()['bg_color'];
        $sdg->update($data);
    }

    public function destroy(SDG $sdg)
    {
        Storage::disk('public')->delete($sdg->icon);
        $sdg->delete();
    }
}
