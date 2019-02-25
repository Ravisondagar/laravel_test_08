<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use Illuminate\Http\Request;
use Validator;
use Session;
use Former;
use Hash;
use Auth;

class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_categories = BlogCategory::all();
        return view('Admin.blog_categories.index',compact('blog_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories_parents = BlogCategory::where('parent_id', '=', null)->pluck('name','id');
        return view('Admin.blog_categories.add',compact('blog_categories_parents'));
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
          'name' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter first name.',
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
          $blog_category = New BlogCategory;
          $blog_category->parent_id = $request->get('parent_id');
          $blog_category->name = $request->get('name');
          $blog_category->save();

          return redirect()->route('blog-categories.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog_category = BlogCategory::find($id);
        return view('Admin.blog_categories.show',compact('blog_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog_categories_parents = BlogCategory::where('parent_id', '=', null)->pluck('name','id');
        $blog_category = BlogCategory::find($id);
        return view('Admin.blog_categories.edit',compact('blog_category','blog_categories_parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Rules for validation
        $rules=[
          'name' => 'required',
        ];

        // Messages for validation
        $messages=[
          'name.required' => 'Please enter first name.',
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
          $blog_category = BlogCategory::find($id);
          $blog_category->update($request->all());

          return redirect()->route('blog-categories.index')->withSuccess("Update record successfully.");
        }
        catch(\Exception $e)
        {
          return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find blog category
        $blog_category = BlogCategory::find($id);
        $blog_category->delete();
        return redirect()->route('blog-categories.index')->withSuccess('Deleted successfully');
    }
}
