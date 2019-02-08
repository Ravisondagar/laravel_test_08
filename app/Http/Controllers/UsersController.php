<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Session;
use Former;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Rules for validation
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Rules for validation
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
          $user = User::find($id);
          $user->name = $request->get('name');
          $user->middle_name = $request->get('middle_name');
          $user->last_name = $request->get('last_name');
          $user->gender = $request->get('gender');
          $user->age = 1;
          $user->dob = date('Y-m-d', strtotime($request->get('dob')));
          $user->hobby = $request->get('hobby');
          $user->address = $request->get('address');
          $user->city = $request->get('city');
          $user->state = $request->get('state');
          $user->country = $request->get('country');
          $user->update();
          return redirect()->route('users.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
