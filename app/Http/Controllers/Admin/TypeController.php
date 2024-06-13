<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required|max:150|string',
            ]);

        $base_slug = Str::slug($form_data['name']);
        $slug = $base_slug;
        $n = 0;

        do {
            $isthere = Type::where('slug', $slug)->first();
            if ($isthere !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($isthere !== null);

        $form_data['slug'] = $slug;

        $type = Type::create($form_data);
        
        return to_route('admin.types.index');
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
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|max:150|string',
        ]);

        $form_data = $request->all();
        $type->update($form_data);

        return to_route('admin.types.index');
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
