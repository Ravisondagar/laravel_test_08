<?php

namespace App\Http\Controllers\Admin;

use App\ProjectCategory;
use Illuminate\Http\Request;
use Validator;
use Session;
use Former;
use Hash;
use Auth;
use App\Project;

class ProjectCategoriesController extends Controller
{

  public function index()
  {
    $project_categories = ProjectCategory::all();
    return view('project_categories.index',compact('project_categories'));
  }

  public function create()
  {
    $project_categories_parents = ProjectCategory::where('parent_id', '=', null)->pluck('name','id');
    return view('project_categories.add',compact('project_categories_parents'));
  }

  public function store(Request $request)
  {
    //Rules for validation
    $rules=[
      'name' => 'required',
    ];

    // Messages for validation
    $messages=[
      'name.required' => 'Please enter first name.',
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
      $project_category = New ProjectCategory;
      $project_category->parent_id = $request->get('parent_id');
      $project_category->name = $request->get('name');
      $project_category->save();

      return redirect()->route('project-categories.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function show($id)
  {
    $project_category = ProjectCategory::find($id);
    return view('project_categories.show',compact('project_category'));
  }

  public function edit($id)
  {
    $project_categories_parents = ProjectCategory::where('parent_id', '=', null)->pluck('name','id');
    $project_category = ProjectCategory::find($id);
    return view('project_categories.edit',compact('project_category','project_categories_parents'));
  }

  public function update(Request $request, $id)
  {
    //Rules for validation
    $rules=[
      'name' => 'required',
    ];

    // Messages for validation
    $messages=[
      'name.required' => 'Please enter first name.',
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
      $project_category = ProjectCategory::find($id);
      $project_category->update($request->all());

      return redirect()->route('project-categories.index')->withSuccess("Update record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function destroy($id)
  {
    //Find project category
    $project_category = ProjectCategory::find($id);
    $project_category->delete();
    return redirect()->route('project-categories.index')->withSuccess('Deleted successfully');
  }
}
