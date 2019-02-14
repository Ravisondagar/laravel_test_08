<?php

namespace App\Http\Controllers;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_categories = ProjectCategory::all();
        return view('project_categories.index',compact('project_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_categories_parents = ProjectCategory::where('parent_id', '=', null)->pluck('name','id');
        return view('project_categories.add',compact('project_categories_parents'));
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
          'lft' => 'required',
          'rgt' => 'required',
          'depth' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter first name.',
          'lft.required' => 'Please enter lft.',
        ];
        
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
          //Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        /*try
        {*/
          $project_category = New ProjectCategory;
          $project_category->parent_id = $request->get('parent_id');
          $project_category->name = $request->get('name');
          $project_category->lft = $request->get('lft');
          $project_category->rgt = $request->get('rgt');
          $project_category->depth = $request->get('depth');
          $project_category->save();

          return redirect()->route('project-categories.index')->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project_category = ProjectCategory::find($id);
        return view('project_categories.show',compact('project_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project_categories_parents = ProjectCategory::where('parent_id', '=', null)->pluck('name','id');
        $project_category = ProjectCategory::find($id);
        return view('project_categories.edit',compact('project_category','project_categories_parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
          'name' => 'required',
          'lft' => 'required',
          'rgt' => 'required',
          'depth' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter first name.',
          'lft.required' => 'Please enter lft.',
        ];
        
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
          //Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        /*try
        {*/
          $project_category = ProjectCategory::find($id);
          $project_category->update($request->all());

          return redirect()->route('project-categories.index')->withSuccess("Update record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project_category = ProjectCategory::find($id);
        $project_category->delete();
        return redirect()->route('project-categories.index')->withSuccess('Deleted successfully');
    }
}
