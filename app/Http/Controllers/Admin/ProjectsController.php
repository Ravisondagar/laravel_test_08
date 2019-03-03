<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\User;
use Former;
use Validator;
use App\UserProject;
use Auth;

class ProjectsController extends Controller
{
  
  public function index()
  {
    $projects = Project::all(); 
    return view('Admin.projects.index',compact('projects'));
  }

  public function create()
  {
    $users = User::where('role', '=', 'user')->pluck('id','name');
    return view('Admin.projects.add',compact('users'));
  }

  public function store(Request $request)
  {
    //Rules for validation
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
      $project->user_id = Auth::user()->id;
      $project->hours = $request->get('hours');
      $project->save();
      $users = $request->get('user_id');
      foreach ($users as $key => $user) {
        $user_project = new UserProject;
        $user_project->project_id = $project->id;
        $user_project->user_id = $user;
        $user_project->save();
      }
      return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function show($id)
  {
    $project = Project::find($id);
    return view('Admin.projects.show',compact('project'));
  }

  public function edit($id)
  {
    $users = User::where('role', '=', 'user')->pluck('id','name');
    $project = Project::find($id);
    return view('Admin.projects.edit',compact('users','project'));
  }

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

  public function destroy($id)
  {
    $project = Project::find($id);
    $project->delete();
    return redirect()->route('projects.index')->withSuccess('Deleted successfully');
  }

  public function user_project()
  {
    $user_projects = UserProject::where('user_id', '=', Auth::user()->id)->get();
    /*dd($user_projects->project);*/
    return view('User.projects.index',compact('user_projects'));
  }
}
