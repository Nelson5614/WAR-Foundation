<?php

namespace App\Http\Controllers\Admin;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::paginate(10);
        return view('admin.projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->authorize('add projects');
        $request->validate([
            'title'=>'required|string|max:255',
            'manager'=>'required|string|max:255',
            'start_date'=>'required|date|max:255',
            'end_date'=>'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description'=>'required|string|max:255'
        ]);

       Project::create($request->all());

        return redirect()->back()->with('success', 'You have just added a new project successfully! Goodluck');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));

       $this->authorize('edit projects');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'manager'=>'required|string|max:255',
            'start_date'=>'required|date|max:255',
            'end_date'=>'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description'=>'required|string|max:255'
        ]);

       $project->update($request->all());

        return redirect()->back()->with('success', 'Project Updated successfully! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->authorize('delete projects');
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
