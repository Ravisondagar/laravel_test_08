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
    public function index()
    {
        $tasks = Task::where('complate', '=', '0')->get(); 
        return view('Admin.tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task_categories = TaskCategory::all()->pluck('id','name');
        return view('Admin.tasks.add',compact('task_categories'));
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
          $task->task_category_id = $request->get('task_category_id');
          $task->name = $request->get('name');
          $task->notes = $request->get('notes');
          $task->start_date = date('Y-m-d', strtotime($request->get('start_date')));
          $task->end_date = date('Y-m-d', strtotime($request->get('end_date')));
          $task->priority = $request->get('priority');
          $task->complate = 0;
          $task->save();
          return redirect()->route('tasks.index')->withSuccess("Insert record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('Admin.tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task_categories = TaskCategory::all()->pluck('id','name');
        $task = Task::find($id);
        return view('Admin.tasks.edit',compact('task_categories','task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
          $task = Task::find($id);
          $task->start_date = date('Y-m-d', strtotime($request->get('start_date')));
          $task->end_date = date('Y-m-d', strtotime($request->get('end_date')));
          $task->update($request->except('start_date','end_date'));
          return redirect()->route('tasks.index')->withSuccess("update record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index')->withSuccess('Deleted successfully');
    }

    public function complate(Request $request)
    {
      $task = Task::find($request->get('id'));
      $task->complate = 1;
      $task->save();

      return redirect()->route('tasks.index');
    }
}
