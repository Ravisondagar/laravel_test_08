<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use Former;
use Validator;

class DepartmentsController extends Controller
{

    public function index()
    {
        $departments = Department::all(); 
        return view('departments.index',compact('departments'));
    }

    public function create()
    {
        return view('departments.add');
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
          $department = New Department;
          $department->name = $request->get('name');
          $department->save();
          return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        $department = Department::find($id);
        return view('departments.show',compact('department'));
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('departments.edit',compact('department'));
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
          $department = Department::find($id);
          $department->name = $request->get('name');
          $department->update();
          return redirect()->route('departments.index')->withSuccess("Update record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('departments.index')->withSuccess('Deleted successfully');
    }
}
