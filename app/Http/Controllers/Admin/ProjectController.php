<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        $formData = $request->validated();
        // creo SLUG
        $slug = Project::getSlug($formData['title']);
        // aggiungo slug al form data
        $formData['slug'] = $slug;
        //prendo l'ID dell'utente che si è loggato
        $userId = Auth::id();
        //aggiungo l'id utente in form data
        $formData['user_id'] = $userId;
        if ($request->hasFile('image')) {
            $img_path = Storage::put('images', $formData['image']);
            $formData['image'] = $img_path;
        }
        // dd($img_path);
        $project = Project::create($formData);
        // dd($formData);
        return to_route('admin.projects.show', $project->slug);
    }




    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
        $formData = $request->validated();
        $formData['slug'] = $project->slug;
        if ($project->title !== $formData['title']) {
            //CREATE SLUG
            $slug = Project::getSlug($formData['title']);
            $formData['slug'] = $slug;
        }
        //add slug to formData

        //aggiungiamo l'id dell'utente proprietario del post
        $formData['user_id'] = $project->user_id;
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }

            $path = Storage::putFileAs('images', $formData['image']);
            $formData['image'] = $path;
        }
        $project->update($formData);
        return to_route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', "il $project->title è stato eliminato");
    }
}
