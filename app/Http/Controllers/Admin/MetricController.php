<?php

namespace App\Http\Controllers\Admin;

use App\Models\SDG;
use Inertia\Inertia;
use App\Models\Metric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Metric\StoreMetricRequest;
use App\Http\Requests\Metric\UpdateMetricRequest;

class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sdgs = SDG::select(['id', 'name'])->get();
        return Inertia::render('Admin/Metric/Index', [
            'sdgs' => $sdgs,
            'metrics' => Metric::orderBy('sub_category')->get()
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
    public function store(StoreMetricRequest $request)
    {
        Metric::create($request->validated());
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
    public function update(UpdateMetricRequest $request, Metric $metric)
    {
        $metric->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metric $metric)
    {
        $metric->delete();
    }
}
