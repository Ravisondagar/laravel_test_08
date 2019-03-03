<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Session;
use Former;
use Hash;
use Auth;
use App\Department;
use App\Designation;
use App\UserProfile;
use App\Blog;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\UserProject;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::where('role', '=', 'user')->get();
      return view('Admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $departments = Department::all()->pluck('name','id');
      $designations = Designation::all()->pluck('name','id');
      return view('Admin.users.add',compact('departments','designations'));
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
        'designation_id' => 'required',
        'name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
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
      /*try
      {*/
        //dd($request->get('dob'));
        $age = null;
        if ($request->get('dob') != '') {
          $date = date('Y-m-d', strtotime($request->get('dob')));
          $year = date('Y', strtotime($date));
          $current_year = date('Y');
          $age = $current_year - $year;
        }
        $user = New User;
        $user->department_id = $request->get('department_id');
        $user->designation_id = $request->get('designation_id');
        $user->name = $request->get('name');
        $user->middle_name = $request->get('middle_name');
        $user->last_name = $request->get('last_name');
        $user->role = 'user';
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->status = $request->get('status');
        $user->team_lead = $request->get('team_lead');
        $user->save();

        $user_profile = new UserProfile;
        $user_profile->user_id= $user->id;
        $user_profile->photo= $request->get('photo');
        $user_profile->mobile= $request->get('mobile');
        $user_profile->phone= $request->get('phone');
        $user_profile->zipcode= $request->get('zipcode');
        $user_profile->marital_status= $request->get('marital_status');
        $user_profile->management_level= $request->get('management_level');
        $user_profile->gender= $request->get('gender');
        $user_profile->dob = date('Y-m-d', strtotime($request->get('dob')));
        $user_profile->join_date= date('Y-m-d', strtotime($request->get('join_date')));
        $user_profile->age = $age;
        $user_profile->hobby = $request->get('hobby');
        $user_profile->pan_number = $request->get('pan_number');
        $user_profile->address_1 = $request->get('address_1');
        $user_profile->address_2 = $request->get('address_2');
        $user_profile->city = $request->get('city');
        $user_profile->state = $request->get('state');
        $user_profile->country = $request->get('country');
        $user_profile->attach = $request->get('attach');
        $user_profile->google = $request->get('google');
        $user_profile->facebook = $request->get('facebook');
        $user_profile->website = $request->get('website');
        $user_profile->skype = $request->get('skype');
        $user_profile->linkedin = $request->get('linkedin');
        $user_profile->Twitter = $request->get('twitter');
        $user_profile->save();

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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);
      $blogs = Blog::where('user_id', '=', $id)->get();
      return view('Admin.users.show',compact('user','blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $departments = Department::all()->pluck('name','id');
      $designations = Designation::all()->pluck('name','id');
      $user = User::find($id);
      return view('Admin.users.edit',compact('user','departments','designations'));
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
          'department_id' => 'required',
          'designation_id' => 'required',
          'name' => 'required',
          'middle_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required',
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
        /*try
        {*/
          $age = '';
          if ($request->get('dob') != '') {
            $date = date('Y-m-d', strtotime($request->get('dob')));
            $year = date('Y', strtotime($date));
            $current_year = date('Y');
            $age = $current_year - $year;
          }
          $user = User::find($id);
          $user->update($request->all());

          $user_profile = $user->user_profile;
          $user_profile->dob = date('Y-m-d', strtotime($request->get('dob')));
          $user_profile->join_date= date('Y-m-d', strtotime($request->get('join_date')));
          $user_profile->update($request->except('dob','join_date'));

          return redirect()->route('users.index')->withSuccess("Update record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('users.index')->withSuccess('Deleted successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect('/login');
    }

    public function profile()
    {
      $user = User::find(Auth::user()->id);
      $departments = Department::all()->pluck('name','id');
      $designations = Designation::all()->pluck('name','id');
      return view('Admin.Users.profile',compact('user','departments','designations'));
    }

    public function post_profile(Request $request) 
    {
      //Rules for validation
      $rules=[
        'name' => 'required',
        'middle_name' => 'required',
        'last_name' => 'required',
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
          $user = user::find(Auth::user()->id);
          $user->update($request->all());

          $user_profile = $user->user_profile;
          $user_profile->dob = date('Y-m-d', strtotime($request->get('dob')));
          $user_profile->join_date= date('Y-m-d', strtotime($request->get('join_date')));
          $user_profile->update($request->except('dob','join_date')); 
          return redirect()->back()->with('success','Profile Update successfully.');
      }
      catch(\Exception $e)
      {
        return redirect()->back()->with('error','Something went wrong, Please try after sometime.');
      }

    }

    public function photo_update(Request $request)
    {
      try
      {
        $photo_update = User::find(Auth::user()->id);
        $photo_update_profile = $photo_update->user_profile;
        $photo_update_profile->photo = $request->get('photo');
        $photo_update_profile->save();
        return response(['photo' => $request->get('photo'), 'status' => '200']);
      }
      catch(\Exception $e)
      {
        return response(['status' => '422']);
      }
    }

    public function import(Request $request)
    {
      $file = public_path().'/tmp/'.$request->get('file');

      $excel = Excel::import(new UsersImport, $file);
        
      return redirect()->route('users.index')->with('success', 'All good!');
    }

    public function export() 
    {
      return Excel::download(new UsersExport, 'users.xlsx');
    }
}
