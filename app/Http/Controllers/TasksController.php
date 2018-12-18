<?php

namespace App\Http\Controllers;

use App\Task;
use App\Company;
use App\Project;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
          if(Auth::user()->role_id == 1){
            $tasks = Task::get();
            //return view('companies.index', ['companies' => $companies]);
            return null;
          }
          // in the end query used get() to retrieve all rows from table in db
          $tasks = Task::where('user_id', Auth::user()->id)->get();
          //return view('companies.index', ['companies' => $companies]);
          return null;
        }
        //return view('auth.login');
        return null;

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
        if (Auth::check()) {
          $taskCreate = Task::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
          ]);

          if ($compCreate) {
            return redirect()->route('companies.show', ['company'=>$compCreate])
                              ->with('success', 'Company created succesfully !');
          }
        }

        return back()->withInput()->with('errors', 'Error creating a new Company !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
