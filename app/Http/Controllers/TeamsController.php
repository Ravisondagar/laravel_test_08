<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Department;
use App\User;
use Validator;
use Session;
use Former;
use Hash;
use Auth;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all()->pluck('name','id');
        $team_leads = User::where('team_lead', '=', 'yes')->pluck('name','id');
        $members = User::where('team_lead', '=', 'no')->pluck('name','id');
        return view('teams.add',compact('departments','team_leads','members'));
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
          'department_id' => 'required',
          'team_lead' => 'required',
          'member' => 'required',
        ];

        // Messages for validation
        $messages=[
          'department_id.required' => 'Please Select Department.',
          'team_lead.required' => 'Please Select Designation.',
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
            $members = $request->get('member');
            foreach ($members as $key => $member) {
                $team = New Team;
                $team->department_id = $request->get('department_id');
                $team->team_lead = $request->get('team_lead');
                $team->member = $member;
                $team->save();
            }
          return redirect()->route('teams.index')->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('teams.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all()->pluck('name','id');
        $team_leads = User::where('team_lead', '=', 'yes')->pluck('name','id');
        $members = User::where('team_lead', '=', 'no')->pluck('name','id');
        $teams = Team::find($id);
        return view('teams.edit',compact('departments','team_leads','members','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
