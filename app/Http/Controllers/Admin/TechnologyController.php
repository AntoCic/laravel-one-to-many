<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $form_data = $request->validated();
        $name = Str::slug($form_data['name']);
        $slug = $name;
        do {
            $find = Technology::where('slug', $slug)->first();
            if ($find !== null) {
                $slug = $name . '-' . rand(1,99);
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        Technology::create($form_data);
        
        return to_route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $form_data = $request->validated();
        $name = Str::slug($form_data['name']);
        $slug = $name;
        do {
            $find = Technology::where('slug', $slug)->whereNot('id',$technology->id)->first(); 
            if ($find !== null) {
                $slug = $name . '-' . rand(1,99);
            }
        } while ($find !== null);
        
        $form_data['slug'] = $slug;

        $technology->update($form_data);
        return to_route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return to_route('admin.dashboard');
    }
}
