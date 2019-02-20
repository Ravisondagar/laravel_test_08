<?php

namespace App\Http\Controllers\Admin;

use App\TaskCategory;
use Illuminate\Http\Request;
use Former;
use Validator;
use Session;

class TaskCategoriesController extends Controller
{

    public function index()
    {
        $task_categories = TaskCategory::all(); 
        return view('task_categories.index',compact('task_categories'));
    }

    public function create()
    {
        return view('task_categories.add');
    }

    public function store(Request $request)
    {
        //Rules for validation
        $rules=[
          'name' => 'required',
        ];
        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
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
          $project = New TaskCategory;
          $project->name = $request->get('name');
          $project->save();
          return redirect()->route('task-categories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('task-categories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        $task_category = TaskCategory::find($id);
        return view('task_categories.show',compact('task_category'));
    }

    public function edit($id)
    {
        $task_category = TaskCategory::find($id);
        return view('task_categories.edit',compact('task_category'));
    }

    public function update(Request $request, $id)
    {
        //Rules for validation
        $rules=[
          'name' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
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
          $project = TaskCategory::find($id);
          $project->update($request->all());
          return redirect()->route('task-categories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('task-categories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    
    public function destroy($id)
    {
        $task_category = TaskCategory::find($id);
        $task_category->delete();
        return redirect()->route('task-categories.index')->withSuccess('Deleted successfully');
    }
}
