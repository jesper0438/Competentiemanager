<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
        //Only vissible after authentication
        public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $projects = Project::where(['user_id' => Auth::user()->id])->get();
        return response()->json([
            'projects'    => $projects,
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function store(Request $request)
    {
        $this->validate($request, [
            'opdrachtgever' => 'required',
            'uitvoerlocatie' => 'required',
            'doel' => 'required',
            'competenties' => 'required',
            'maxleden' => 'required',
        ]);

        $project = Project::create([
            'opdrachtgever'   => request('opdrachtgever'),
            'uitvoerlocatie' => request('uitvoerlocatie'),
            'doel' => request('doel'),
            'competenties' => request('competenties'),
            'maxleden' => request('maxleden'),
            'user_id'     => Auth::user()->id
        ]);

        return response()->json([
            'project'    => $project,
            'message' => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $projectproject
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'opdrachtgever' => 'required',
            'uitvoerlocatie' => 'required',
            'doel' => 'required',
            'competenties' => 'required',
            'maxleden' => 'required|min:1|max:20',
            
        ]);

        $project->opdrachtgever = request('opdrachtgever');
        $project->uitvoerlocatie = request('uitvoerlocatie');
        $project->doel = request('doel');
        $project->competenties = request('competenties');
        $project->maxleden = request('maxleden');
        $project->save();

        return response()->json([
            'message' => 'Het projet is bijgewerkt!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
     {
        $project->id = request('id');
        $project->delete();
        // Op basis van het geselecteerde id wordt deze verwijderd
        return response()->json([
        'message' => 'het project is verwijderd!',
        ], 200);
    }
}

