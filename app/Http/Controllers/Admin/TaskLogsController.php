<?php

namespace App\Http\Controllers\Admin;

use App\TaskLog;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Former;
use Validator;
use Auth;

class TaskLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($task_id)
    {
        $task_logs = TaskLog::where('task_id', '=', $task_id)->get(); 
        return view('Admin.task_logs.index',compact('task_logs','task_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('Admin.task_logs.add',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,$task_id)
    {
        //Rules for validation
        $rules=[
          'date' => 'required',
          'description' => 'required',
          'start_time' => 'required',
          'end_time' => 'required',
        ];

        // Messages for validation
        $messages=[
          'date.required' => 'Please select date.',
          'description.required' => 'Please enter description.',
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
            $start_time = strtotime($request->get('start_time'));
            $end_time = strtotime($request->get('end_time'));
            $spent_time = ($end_time - $start_time);
          $task_log = New TaskLog;
          $task_log->task_id = $task_id;
          $task_log->user_id = Auth::user()->id;
          $task_log->date = date('Y-m-d', strtotime($request->get('date')));
          $task_log->start_time = $request->get('start_time');
          $task_log->end_time = $request->get('end_time');
          $task_log->description = $request->get('description');
          $task_log->billable = $request->get('billable');
          $task_log->spent_time = date('h:i',$spent_time);
          $task_log->save();
          return redirect()->route('tasks.task-logs.index',['task_id' => $task_id])->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function show($task_id,$task_log_id)
    {
        $task_log = TaskLog::find($task_log_id);
        return view('Admin.task_logs.show',compact('task_log','task_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function edit($task_id)
    {
        $task_log = TaskLog::find($task_id);
        Former::populate($task_log);
        return view('Admin.task_logs.edit',compact('task_log','task_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task_id, $task_log_id)
    {
        //Rules for validation
        $rules=[
          'date' => 'required',
          'description' => 'required',
          'start_time' => 'required',
          'end_time' => 'required',
        ];

        // Messages for validation
        $messages=[
          'date.required' => 'Please select date.',
          'description.required' => 'Please enter description.',
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
            $start_time = strtotime($request->get('start_time'));
            $end_time = strtotime($request->get('end_time'));
            $spent_time = ($end_time - $start_time);
          $task_log = TaskLog::find($task_log_id);
          $task_log->date = date('Y-m-d', strtotime($request->get('date')));
          $task_log->spent_time = date('h:i',$spent_time);
          $task_log->update($request->except('date','spent_time'));
          return redirect()->route('tasks.task-logs.index',['task_id' => $task_id])->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($task_id,$task_blog_id)
    {
        $taskblog = TaskLog::find($task_blog_id);
        $taskblog->delete();

        return redirect()->route('tasks.task-logs.index',['task_id' => $task_id])->withSuccess('Deleted successfully');
    }
}
