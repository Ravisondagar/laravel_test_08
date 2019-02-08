<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\User;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all(); 
        return view('projects.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->pluck('id','name');
        return view('project.add',compact('users'));
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
          'name' => 'required',
          'middle_name' => 'required',
          'last_name' => 'required',
          'gender' => 'required',
          'dob' => 'required',
          'hobby' => 'required',
          'address' => 'required',
          'city' => 'required',
          'state' => 'required',
          'country' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter first name.',
          'last_name.required' => 'Please enter last name.',
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
          $user = New User;
          $user->name=$request->get('name');
          $user->middle_name=$request->get('middle_name');
          $user->last_name=$request->get('last_name');
          $user->gender= $request->get('gender');
          $user->age = 1;
          $user->dob= date('Y-m-d', strtotime($request->get('dob')));
          $user->hobby = $request->get('hobby');
          $user->address = $request->get('address');
          $user->city = $request->get('city');
          $user->state = $request->get('state');
          $user->country = $request->get('country');
          $user->save();
          return redirect()->route('users.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
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
    }
}
