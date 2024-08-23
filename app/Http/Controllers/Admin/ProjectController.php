<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['type'])->get();

        return view ('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderBy('name', 'desc')->get();
        $technologies = Technology::orderBy('name', 'desc')->get();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();
        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n = 0;

        do {
            $isthere = Project::where('slug', $slug)->first();
            if ($isthere !== null) {
                $n++;
                $slug = $base_slug . '-' . $n;
            }
        } while ($isthere !== null);

        $form_data['slug'] = $slug;


        if ($request->hasFile('img')) {

            $image_path = Storage::disk('public')->put('projects_images', $request->img);
            $form_data['img'] = $image_path;

        }

        $project = Project::create($form_data);

        if ($request->has('technologies')){
            $project->technologies()->attach($request->technologies);
        }

        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['type', 'type.project']);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name', 'desc')->get();
        $technologies = Technology::orderBy('name', 'desc')->get();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if ($request->hasFile('img')) {

            $image_path = Storage::disk('public')->put('projects_images', $request->img);
            $form_data['img'] = $image_path;

            if($project->img) {
                Storage::disk('public')->delete($project->img);
            }

        }

        $project->update($form_data);

        $project->technologies()->sync($request->technologies ?? []);

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index');
    }
}
