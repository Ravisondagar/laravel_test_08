<?php

namespace App\Http\Controllers;

use App\UserExperience;
use Illuminate\Http\Request;
use Validator;
use Session;
use Former;
use Hash;
use Auth;

class UserExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        // If no error than go inside otherwise go to the catch section
        /*try
        {*/
          
          foreach ($request->get('company_name') as $key => $value) {
              $user_exprience = New UserExperience;
              $user_exprience->user_id = $request->get('user_id');
              $user_exprience->company_name = $request->get('company_name')[$key];
              $user_exprience->from = date('Y-m-d', strtotime($request->get('from')[$key]));
              $user_exprience->to = date('Y-m-d', strtotime($request->get('to')[$key]));
              $user_exprience->salary = $request->get('salary')[$key];
              $user_exprience->reason = $request->get('reason')[$key];
              $user_exprience->save();
          }


          return redirect()->route('users.index')->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function show(UserExperience $userExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('users.exp',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserExperience $userExperience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserExperience  $userExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserExperience $userExperience)
    {
        //
    }
}
