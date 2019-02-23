<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Industry;
use App\Department;
use App\Designation;
use App\Client;
use App\ProjeCtCategory;
use App\TaskCategory;
use App\Team;
use App\BlogCategory;
use App\Blog;
use ConsoleTVs\Charts\Facades\Charts;
use DB;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$users = User::select('id', 'created_at')
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($usermcount[$i])){
                $userArr[$i] = $usermcount[$i];    
            }else{
                $userArr[$i] = 0;    
            }
        }
        $data[] = array(
            'name' => $key_for_map,
            'data' => $enrollments_data
        );
        
        $user_encode = json_encode($userArr);*/
        //dd($user_encode);

        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                            ->where('role', '=', 'user')->get();
        $chart = Charts::database($users, 'donut', 'highcharts')
              ->title("Monthly new Register Users")
              ->elementLabel("Total Users")
              ->dimensions(1000, 500)
              ->responsive(false)
              ->groupByMonth(date('Y'), true);

              /*Charts::create('pie', 'highcharts')
                  ->title('My nice chart')
                  ->labels(['First', 'Second', 'Third'])
                  ->values([5,10,20])
                  ->dimensions(1000,500)
                  ->responsive(false);*/
        $user = User::where('id', '=', Auth::user()->id)->get()->first();
        $user_count = User::count();
        $client = Client::count();
        $project = Project::count();
        return view('index',compact('user_count','client','project','chart','user'));
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
        //
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
        //
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

    public function orange()
    {
        return view('orange');
    }
}
