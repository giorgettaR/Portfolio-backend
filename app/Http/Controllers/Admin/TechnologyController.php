<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
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
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required|max:150|string',
            ]);

        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        $n = 0;

        do {
            $isthere = Technology::where('slug', $slug)->first();
            if ($isthere !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($isthere !== null);

        $form_data['slug'] = $slug;

        $technology = Technology::create($form_data);
        
        return to_route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }
    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required|max:150|string',
        ]);

        $form_data = $request->all();
        $technology->update($form_data);

        return to_route('admin.technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return to_route('admin.technologies.index');
    }
}
