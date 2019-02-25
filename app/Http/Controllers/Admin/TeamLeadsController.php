<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\TeamLead;
use Illuminate\Support\Facades\Input;
use App\User;
use Validator;
use Session;
use Former;
use Hash;
use Auth;
use DB;

class TeamLeadsController extends Controller
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
    public function create($id)
    {
        $select_members = [];
        $select_team_lead = null;
        if (TeamLead::where('department_id', '=', $id)->count() > 0) {
            $select_members = TeamLead::select('member_id')->where('department_id', '=', $id)->pluck('member_id')->toarray();
            $select_team_lead = TeamLead::select('team_lead_id')->where('department_id', '=', $id)->pluck('team_lead_id')->unique()->first();
        }
        $team_leads = User::where('team_lead', '=', 'yes')->pluck('name','id');
        $members = User::where('department_id', '=', $id)->where('team_lead', '=', 'no')->pluck('name','id');
        return view('Admin.departments.team',compact('id','team_leads','members','select_members','select_team_lead'));
        
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
                $team = New TeamLead;
                $team->department_id = $request->get('department_id');
                $team->team_lead_id = $request->get('team_lead');
                $team->member_id = $member;
                $team->save();
            }
          return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        /*try
        {*/
            $departments = TeamLead::where('department_id', '=', $id)->get();
            foreach ($departments as $key => $value) {
                $value->delete();
            }
            $members = $request->get('member');
            foreach ($members as $key => $member) {
                $team = New TeamLead;
                $team->department_id = $request->get('department_id');
                $team->team_lead_id = $request->get('team_lead');
                $team->member_id = $member;
                $team->save();
            }
          return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('departments.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
