<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Language;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('languages','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //dump($request);
        $data = $request->validated();

        
        //dump($data);
        if($request->hasFile("imgPath")) {

            //dato dalla request, non validato
            // $img_path = $request->file("image")->store("uploads");
            $img_path = Storage::put("uploads", $data['imgPath']);

            // $img_path = $data["image"]->store("uploads");

            $data['imgPath'] = $img_path;
        }

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();
        //dd($data);
        $newProject->technologies()->attach( $data["technologies"] );


        return to_route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact("project"));
        // return view('admin.projects.show', compact($project));
        // return View::make('admin.projects.show')->with('posts', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $languages = Language::all();
        $technologies = Technology::all();
        
        return view('admin.projects.edit', compact("project", "languages", "technologies") );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        
        $project->fill($data);
        $project->save();

        $project->technologies()->sync( $data['technologies'] );

        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
