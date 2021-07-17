<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\FileService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::sortable(['id' => 'desc'])->paginate(m_per_page());
        return response()->view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $project = Project::create($data);
        if ($request->file('image')){
            (new FileService())->saveImage($request->file('image'), $project, 'projects');
        }
        flash()->success(__('Project created'));
        return response()->redirectToRoute('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $projects = Project::all();
        $boards = $project->boards()->with(['tasks' => function ($q) {
            return $q->orderBy('order', 'asc');
        }])->orderBy('order', 'asc')->get();
        return response()->view('projects.show', compact('project', 'projects', 'boards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return response()->view('projects.edit', compact('project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        if ($request->file('image')){
            (new FileService())->saveImage($request->file('image'), $project, 'projects');
        }
        flash()->success(__('Project updated'));
        return response()->redirectToRoute('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();
        flash()->success(__('Project deleted'));
        return response()->redirectToRoute('projects.index');
    }
}
