<?php

namespace App\Http\Controllers\Admin;

use App\Models\SDG;
use Inertia\Inertia;
use App\Models\Metric;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Metric\StoreMetricRequest;
use App\Http\Requests\Metric\UpdateMetricRequest;

class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sdgs = SDG::select(['id', 'name'])->get();
        return Inertia::render('Admin/Metric/Index', [
            'sdgs' => $sdgs,
            'metrics' => Metric::select(['metrics.*', 'sdgs.name as sdg_name'])
                ->orderBy('sub_category')
                ->join('sdgs', 'sdg_id', '=', 'sdgs.id')
                ->where(function (Builder $q) use ($request) {
                    if ($request->sdg != 'All' && $request->sdg) {
                        $q->where('sdg_id', $request->sdg);
                    }
                })->get()
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
