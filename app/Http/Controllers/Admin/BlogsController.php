<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\BlogCategory;
use Former;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Imports\BlogsImport;
use App\Exports\BlogsExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;
use PHPExcel;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $blogs = Blog::all(); 
            return view('Admin.blogs.index',compact('blogs'));
        }
        else
        {
            $blogs = Blog::where('user_id', '=', Auth::user()->id)->get();
            return view('Admin.blogs.user_index',compact('blogs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = BlogCategory::all()->pluck('id','name');
        return view('Admin.blogs.add',compact('blog_categories'));
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
          'blog_category_id' => 'required',
          'name' => 'required',
          'description' => 'required',
          'photo' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
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
        try
        {
          $blog = New Blog;
          $blog->user_id = Auth::user()->id;
          $blog->blog_category_id = $request->get('blog_category_id');
          $blog->name = $request->get('name');
          $blog->description = $request->get('description');
          $blog->photo = $request->get('photo');
          $blog->status = $request->get('status');
          $blog->save();
          return redirect()->route('blogs.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $from = Input::get('from');
        $blog = Blog::find($id);
        return view('Admin.blogs.show',compact('blog','from'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog_categories = BlogCategory::all()->pluck('id','name');
        $blog = Blog::find($id);
        return view('Admin.blogs.edit',compact('blog_categories','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Rules for validation
        $rules=[
          'blog_category_id' => 'required',
          'name' => 'required',
          'description' => 'required',
          'photo' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter name.',
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
          $blog = Blog::find($id);
          $blog->update($request->all());
          return redirect()->route('blogs.index')->withSuccess("Update record successfully.");
        /*}
        catch(\Exception $e)
        {
          return redirect()->route('blogs.index')->withError('Something went wrong, Please try after sometime.');
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index')->withSuccess('Deleted successfully');
    }

    public function import(Request $request) 
    {
        //$file = URL::to('').'/tmp/'.$request->get('file');
        $file = public_path().'/tmp/'.$request->get('file');

        $excel = Excel::import(new BlogsImport, $file);
        
        return redirect()->route('blogs.index')->with('success', 'All good!');
    }

    public function export() 
    {
        
        return Excel::download(new BlogsExport, 'blogs.xlsx');
    }
}
