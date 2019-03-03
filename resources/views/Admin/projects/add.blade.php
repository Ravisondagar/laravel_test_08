@extends('Admin.layouts.home')
@section('title','Projects > Add Projects')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">Home</a></li>
									<li class="breadcrumb-item"><a href="{!! route('projects.index') !!}">Projects</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Project</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add Project</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('projects.index') !!}" data-toggle="tooltip" title="Back to Projects" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="post" action="{!! route('projects.store') !!}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select User</label>
							<div class="col-sm-12 col-md-10">
								<select class="form-control selectpicker" name="user_id[]" multiple data-selected-text-format="count">
									@foreach($users as $key => $user )
										<option value="{!! $user!!}">{!! $key !!}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Johnny Brown" name="name">
								@if($errors->has('name'))<span>{!! $errors->first('name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Hours</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" type="text" name="hours">
								@if($errors->has('hours'))<span>{!! $errors->first('hours') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<input type="submit" name="submit" value="Save" class="btn btn-primary ml-3">
						</div>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection