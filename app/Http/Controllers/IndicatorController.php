<?php

namespace App\Http\Controllers;

use App\Models\SDG;
use Inertia\Inertia;
use App\Models\Metric;
use App\Models\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sdgs = SDG::all();
        // dd($request);
        return Inertia::render('Admin/Indicator/Index', [
            'metrics' => Inertia::lazy(
                fn() => Metric::where('sdg_id', $request->sdg_id)->get()
            ),
            'sdgs' => $sdgs,
            'indicators' => Indicator::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
