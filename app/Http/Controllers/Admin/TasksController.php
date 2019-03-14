<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\TaskCategory;
use Former;
use Validator;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
      $tasks = Task::where('complate', '=', '0')->where('project_id', '=', $project_id)->get();

      //dd($billable = $tasks[0]->tasklogs);

      return view('Admin.tasks.index',compact('tasks','project_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id)
    {
        $task_categories = TaskCategory::all()->pluck('id','name');
        return view('Admin.tasks.add',compact('task_categories','project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$project_id)
    {
        //Rules for validation
        $rules=[
          'task_category_id' => 'required',
          'name' => 'required',
          'notes' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
          'notes.required' => 'Please enter hours.',
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
          $task = New Task;
          $task->user_id = Auth::user()->id;
          $task->project_id = $project_id;
          $task->task_category_id = $request->get('task_category_id');
          $task->name = $request->get('name');
          $task->notes = $request->get('notes');
          $task->start_date = date('Y-m-d', strtotime($request->get('start_date')));
          $task->end_date = date('Y-m-d', strtotime($request->get('end_date')));
          $task->priority = $request->get('priority');
          $task->complate = 0;
          $task->save();
          return redirect()->route('projects.tasks.index',$project_id)->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('projects.tasks.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($project_id,$id)
    {
        $task = Task::find($id);
        return view('Admin.tasks.show',compact('task','project_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id,$task_id)
    {
        $task_categories = TaskCategory::all()->pluck('task_id','name');
        $task = Task::find($task_id);
        return view('Admin.tasks.edit',compact('task_categories','task','project_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project_id, $task_id)
    {
        //Rules for validation
        $rules=[
          'task_category_id' => 'required',
          'name' => 'required',
          'notes' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
          'notes.required' => 'Please enter hours.',
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
          $task = Task::find($task_id);
          $task->start_date = date('Y-m-d', strtotime($request->get('start_date')));
          $task->end_date = date('Y-m-d', strtotime($request->get('end_date')));
          $task->update($request->except('start_date','end_date'));
          return redirect()->route('projects.tasks.index',$project_id)->withSuccess("update record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('projects.tasks.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id,$task_id)
    {
        $task = Task::find($task_id);
        $task->delete();
        return redirect()->route('projects.tasks.index')->withSuccess('Deleted successfully');
    }

    public function complate(Request $request)
    {
      $task = Task::find($request->get('id'));
      $task->complate = 1;
      $task->save();

      return redirect()->route('projects.tasks.index',$request->get('project_id'));
    }
}
