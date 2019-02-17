@extends('layouts.listing')
@section('title','Teams')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Teams</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Teams</li>
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
							<h5 class="text-blue">Teams</h5>
						</div>
						<div class="text-right">
							<a href="{!! route('teams.create') !!}" class="btn btn-primary">Add Team</a>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus">Name</th>
									<th>Team Lead</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($teams as $team)
								<tr>
									<td class="table-plus">{!! $team->department->name !!}</td>
									<td>{!! $team->team_leads->name !!}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{!! route('teams.show',$team->department_id) !!}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{!! route('teams.edit',$team->department_id) !!}"><i class="fa fa-pencil"></i> Edit</a>
												{!! Former::open()->action( URL::route("teams.destroy",$team->department_id) )->method('delete')->class('form'.$team->department_id) !!}
													<a class="dropdown-item submit" href="javascript:;" data-id="{{$team->department_id}}" ><i class="fa fa-trash"></i> Delete</a>
												{!! Former::close() !!}
											</div>
										</div>
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