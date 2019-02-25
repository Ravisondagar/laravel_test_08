<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use Validator;
use Session;
use Former;
use Hash;
use Auth;
use App\Industry;

class ClientsController extends Controller
{
  
  public function index()
  {
    $clients = Client::all();
    return view('Admin.clients.index',compact('clients'));
  }

  public function create()
  {
    $industries = Industry::all()->pluck('name','id');
    return view('Admin.clients.add',compact('industries'));
  }

  public function store(Request $request)
  {
    //Rules for validation
    $rules=[
      'industry_id' => 'required',
      'name' => 'required',
      'address_1' => 'required',
      'phone' => 'required',
      'email' => 'required|email|unique:clients,email',
    ];

    // Messages for validation
    $messages=[
      'name.required' => 'Please enter first name.',
      'email.required' => 'Please enter email.',
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
      $client = New Client;
      $client->industry_id=$request->get('industry_id');
      $client->name = $request->get('name');
      $client->logo=$request->get('logo');
      $client->email=$request->get('email');
      $client->website=$request->get('website');
      $client->phone=$request->get('phone');
      $client->fax=$request->get('fax');
      $client->address_1=$request->get('address_1');
      $client->address_2=$request->get('address_2');
      $client->city=$request->get('city');
      $client->state=$request->get('state');
      $client->country=$request->get('country');
      $client->zipcode= $request->get('zipcode');
      $client->save();

      return redirect()->route('clients.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function show($id)
  {
    $client = Client::find($id);
    return view('Admin.clients.show',compact('client'));
  }

  public function edit($id)
  {
    $industries = Industry::all()->pluck('name','id');
    $client = Client::find($id);
    return view('Admin.clients.edit',compact('client','industries'));
  }

  public function update(Request $request, $id)
  {
    //Rules for validation
    $rules=[
      'industry_id' => 'required',
      'name' => 'required',
      'address_1' => 'required',
      'phone' => 'required',
      'email' => 'required|email',
    ];

    // Messages for validation
    $messages=[
      'name.required' => 'Please enter first name.',
      'email.required' => 'Please enter email.',
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
      $client = Client::find($id);
      $client->update($request->all());

      return redirect()->route('clients.index')->withSuccess("Update record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

  public function destroy($id)
  {
    $client = Client::find($id);
    $client->delete();
    return redirect()->route('clients.index')->withSuccess('Deleted successfully');
  }
}
