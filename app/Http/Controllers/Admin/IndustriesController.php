<?php

namespace App\Http\Controllers\Admin;

use App\Industry;
use Illuminate\Http\Request;
use Former;
use Validator;

class IndustriesController extends Controller
{

    public function index()
    {
        $industries = Industry::all(); 
        return view('Admin.industries.index',compact('industries'));
    }

    public function create()
    {
        return view('Admin.industries.add');
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
          $industry = New Industry;
          $industry->name = $request->get('name');
          $industry->save();
          return redirect()->route('industries.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('industries.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        $industry = Industry::find($id);
        return view('Admin.industries.show',compact('industry'));
    }

    public function edit($id)
    {
        $industry = Industry::find($id);
        return view('Admin.industries.edit',compact('industry'));
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
          $industry = Industry::find($id);
          $industry->name = $request->get('name');
          $industry->update();
          return redirect()->route('industries.index')->withSuccess("Update record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('industries.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    
    public function destroy($id)
    {
        $industry = Industry::find($id);
        $industry->delete();
        return redirect()->route('industries.index')->withSuccess('Deleted successfully');
    }
}
