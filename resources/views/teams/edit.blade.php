@extends('layouts.home')
@section('title','Team > Edit Team')
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
									<li class="breadcrumb-item"><a href="{!! route('home') !!}">Home</a></li>
									<li class="breadcrumb-item"><a href="{!! route('teams.index') !!}">Team</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Team</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit Team</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('teams.index') !!}" data-toggle="tooltip" title="Back to Team" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="POST" action="{!! route('teams.update',$id) !!}">
						@csrf
						@method('PATCH')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Department</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="department_id">
									<option selected="" value="">Choose Department</option>
									@foreach($departments as $key => $department )
										<option value="{!! $key !!}" {!! $key == $team->department_id ? 'selected' : '' !!}>{!! $department !!}</option>
									@endforeach
								</select>
								@if($errors->has('department_id'))<span>{!! $errors->first('department_id') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Team lead</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="team_lead">
									<option selected="" value="">Choose Team lead</option>
									@foreach($team_leads as $key => $team_lead )
										<option value="{!! $key !!}"  {!! $key == $team->team_lead ? 'selected' : '' !!}>{!! $team_lead !!}</option>
									@endforeach
								</select>
								@if($errors->has('team_lead'))<span>{!! $errors->first('team_lead') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Member</label>
						    <div class="col-sm-12 col-md-10">
						        <select class="form-control selectpicker" name="member[]" multiple data-selected-text-format="count">
						            <option value="">select Member</option>
						            @foreach($members as $key => $member)
						            <option value="{!! $key !!}" {!! in_array($member, $members_select) ? 'selected' : '' !!}>{!! $member !!}</option>
						            @endforeach
						        </select>
						        @if($errors->has('member'))<span class="help-block" style="margin-left: 15px;">{!! $errors->first('member') !!}</span>@endif
						    </div>
							
						</div>
						<div class="form-group row">
							<input type="submit" name="submit" value="Save" id="submit" class="btn btn-primary ml-3">
						</div>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection