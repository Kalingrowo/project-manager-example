<?php

namespace App\Http\Controllers;

use App\Company;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dump() to debug code
        //dump(Auth::user()->id);

        if(Auth::check()){
          if(Auth::user()->role_id == 1){
            $projects = Project::get();
            return view('projects.index', ['projects' => $projects]);
          }
          // in the end query used get() to retrieve all rows from table in db
          $projects = Project::where('user_id', Auth::user()->id)->get();
          return view('projects.index', ['projects' => $projects]);
        }

        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        //
        $companies = null;
        if(!$company_id){
          $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create', ['company_id'=>$company_id, 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()) {
          $projCreate = Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'company_id' => $request->input('company_id'),
            'user_id' => Auth::user()->id
          ]);

          if ($projCreate) {
            return redirect()->route('projects.show', ['project'=>$projCreate])
                              ->with('success', 'Project created succesfully !');
          }
        }

        return back()->withInput()->with('errors', 'Error creating a new Project !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        //$Proj = Project::where('id', $project->id)->first();
        $Proj = Project::find($project->id);
        $Comments = $project->comments;
        return view('projects.show', ['project'=>$Proj, 'comments'=>$Comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        // in the end of query used first() to retrieve a single row from table in db
        $Proj = Project::where('id', $project->id)->first();

        return view('projects.edit', ['project'=>$Proj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        $ProjUpdate = Project::where('id', $project->id)
                              ->update([
                                'name' => $request->input('name'),
                                'description' => $request->input('description')
                              ]);

        if($ProjUpdate){
          return redirect()->route('projects.show', ['project'=>$project->id])
                          ->with('success', 'Project update success');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $findProject = Project::where('id', $project->id)->first();

        if($findProject->delete()){
          return redirect()->route('projects.index')
                ->with('success', 'Project deleted succesfully !');
        }

        return back()->withInput()->with('errors', 'Project could not be deleted !');

    }
}
