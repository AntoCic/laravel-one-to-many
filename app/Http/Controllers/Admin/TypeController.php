<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $form_data = $request->validated();
        $name = Str::slug($form_data['name']);
        $slug = $name;
        do {
            $find = Type::where('slug', $slug)->first();
            if ($find !== null) {
                $slug = $name . '-' . rand(1,99);
            }
        } while ($find !== null);

        $form_data['slug'] = $slug;

        $type = type::create($form_data);
        return to_route('admin.types.show', $type);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->validated();
        $name = Str::slug($form_data['name']);
        $slug = $name;
        do {
            $find = Type::where('slug', $slug)->whereNot('id',$type->id)->first(); 
            if ($find !== null) {
                $slug = $name . '-' . rand(1,99);
            }
        } while ($find !== null);
        
        $form_data['slug'] = $slug;

        $type->update($form_data);
        dd($type);
        return to_route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return to_route('admin.types.index');
    }
}
