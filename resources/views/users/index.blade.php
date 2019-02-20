@extends('layouts.listing')
@section('title','Users')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Users</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Users</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				@if ($message = Session::get('success'))
				        <div class="alert alert-success">
				            <p>{{ $message }}</p>
				        </div>
				@endif
				@if ($message = Session::get('error'))
				        <div class="alert alert-warning">
				            <p>{{ $message }}</p>
				        </div>
				@endif
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">Users</h5>
						</div>
						<div class="text-right">
							<a href="{!! route('users.create') !!}" class="btn btn-primary">Add User</a>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus">Name</th>
									<th>middle name</th>
									<th>last name</th>
									<th>gender</th>
									<th>dob</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td class="table-plus">{!! $user->name !!}</td>
									<td>{!! $user->middle_name !!}</td>
									<td>{!! $user->last_name !!}</td>
									<td>{!! $user->user_profile->gender !!}</td>
									<td>{!! $user->user_profile->dob !!}</td>
									<td>
										<a href="{!! route('users.show',$user->id) !!}" data-toggle="tooltip" title="View User" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>						
										<a href="{!! route('users.edit',$user->id) !!}" data-toggle="tooltip" title="Edit User" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
										<a href="{!! route('user-experience.edit',$user->id) !!}" data-toggle="tooltip" title="User Experience" class="btn btn-sm btn-info"><i class="fa fa-money"></i></a>								
										{{-- <a href="{!!route('courses.dates.index', $course->id)!!}" data-toggle="tooltip" title="@lang('words.evaluation_dates')" class="btn btn-sm btn-primary"><i class="fa fa-calendar"></i></a> --}}
										{!! Former::open()->action( URL::route("users.destroy",$user->id) )->method('delete')->class('form'.$user->id) !!}
											<a href="javascript:;" data-toggle="tooltip" title="Delete User" class="btn btn-sm btn-danger submit"><i class="fa fa-trash"></i></a>	
										{!! Former::close() !!}							
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection