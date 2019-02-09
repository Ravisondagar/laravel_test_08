<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\User;
use Former;
use Validator;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all(); 
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck('id','name');
        return view('projects.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
          'user_id' => 'required',
          'name' => 'required',
          'hours' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
          'hours.required' => 'Please enter hours.',
        ];
        
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
          //Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {
          $project = New Project;
          $project->name = $request->get('name');
          $project->user_id = $request->get('user_id');
          $project->hours = $request->get('hours');
          $project->save();
          return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all()->pluck('id','name');
        $project = Project::find($id);
        return view('projects.edit',compact('users','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
          'user_id' => 'required',
          'name' => 'required',
          'hours' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
          'hours.required' => 'Please enter hours.',
        ];
        
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
          //Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {
          $project = Project::find($id);
          $project->name = $request->get('name');
          $project->user_id = $request->get('user_id');
          $project->hours = $request->get('hours');
          $project->update();
          return redirect()->route('projects.index')->withSuccess("Update record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects.index')->withSuccess('Deleted successfully');
    }
}
