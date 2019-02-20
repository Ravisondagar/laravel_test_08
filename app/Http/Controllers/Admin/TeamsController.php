<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use Illuminate\Http\Request;
use App\Department;
use App\User;
use Validator;
use Session;
use Former;
use Hash;
use Auth;
use DB;

class TeamsController extends Controller
{
    
    public function index()
    {
        $teams = Team::select('department_id','team_lead')->distinct()->get();
        return view('teams.index',compact('teams'));
    }

    public function create()
    {
        $departments = Department::all()->pluck('name','id');
        $team_leads = User::where('team_lead', '=', 'yes')->pluck('name','id');
        $members = User::where('team_lead', '=', 'no')->pluck('name','id');
        return view('teams.add',compact('departments','team_leads','members'));
    }

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
        try
        {
            $members = $request->get('member');
            foreach ($members as $key => $member) {
                $team = New Team;
                $team->department_id = $request->get('department_id');
                $team->team_lead = $request->get('team_lead');
                $team->member = $member;
                $team->save();
            }
          return redirect()->route('teams.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('teams.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    public function show($id)
    {
        $team = Team::select('department_id','team_lead')->where('department_id', '=', $id)->distinct()->get()->first();
        $members = Team::where('department_id', '=', $id)->get();
        return view('teams.show',compact('members','team'));
    }

    public function edit($id)
    {
        $departments = Department::all()->pluck('name','id');
        $team_leads = User::where('team_lead', '=', 'yes')->pluck('name','id');
        $members = User::where('team_lead', '=', 'no')->pluck('name','id');
        $team = Department::find($id);
        $members_select = [];
        foreach ($team->teams as $key => $value) {
            array_push($members_select, $value->members->name);
        }
        $team = Team::select('department_id','team_lead')->where('department_id', '=', $id)->distinct()->get()->first();
        return view('teams.edit',compact('departments','team_leads','members','members_select','id','team'));
    }

    public function update(Request $request, $id)
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
        try
        {
            $teams = Team::where('department_id', '=', $id)->get();
            foreach ($teams as $key => $value) {
                $value->delete();
            }
            $members = $request->get('member');
            foreach ($members as $key => $member) {
                $team = New Team;
                $team->department_id = $request->get('department_id');
                $team->team_lead = $request->get('team_lead');
                $team->member = $member;
                $team->save();
            }
          return redirect()->route('teams.index')->withSuccess("update record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('teams.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    
    public function destroy($id)
    {
        $teams = Team::where('department_id', '=', $id)->get();
        foreach ($teams as $key => $value) {
            $value->delete();
        }
        return redirect()->route('teams.index')->withSuccess("Delete record successfully.");
    }
}
