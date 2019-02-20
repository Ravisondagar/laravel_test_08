<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use Illuminate\Http\Request;
use Former;
use Validator;

class DesignationsController extends Controller
{

    public function index()
    {
        $designations = Designation::all(); 
        return view('designations.index',compact('designations'));
    }

    public function create()
    {
        return view('designations.add');
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
          $designation = New Designation;
          $designation->name = $request->get('name');
          $designation->save();
          return redirect()->route('designations.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('designations.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        $designation = Designation::find($id);
        return view('designations.show',compact('designation'));
    }

    public function edit($id)
    {
        $designation = Designation::find($id);
        return view('designations.edit',compact('designation'));
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
          $designation = Designation::find($id);
          $designation->name = $request->get('name');
          $designation->update();
          return redirect()->route('designations.index')->withSuccess("Update record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('designations.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function destroy($id)
    {
        $designation = Designation::find($id);
        $designation->delete();
        return redirect()->route('designations.index')->withSuccess('Deleted successfully');
    }
}
