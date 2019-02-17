@extends('layouts.home')
@section('title','Employment > Add Employment')
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
									<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Employment</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Employment</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add Employment</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('users.index') !!}" data-toggle="tooltip" title="Back to Employment" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="POST" action="{!! route('users.post_employment') !!}">
						@csrf
						@method('PATCH')
						<input type="hidden" name="id" value="{!! $id !!}">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Department</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="department_id">
									<option selected="" value="">Choose Department</option>
									@foreach($departments as $key => $department )
										<option value="{!! $key!!}" @if($user->department != '') @if($user->department->name == $department) selected @endif @endif>{!! $department !!}</option>
									@endforeach
								</select>
								@if($errors->has('department_id'))<span>{!! $errors->first('department_id') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Designation</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="designation_id">
									<option selected="" value="">Choose Designation</option>
									@foreach($designations as $key => $designation )
										<option value="{!! $key!!}" @if($user->designation != '') @if($user->designation->name == $designation) selected @endif @endif>{!! $designation !!}</option>
									@endforeach
								</select>
								@if($errors->has('designation_id'))<span>{!! $errors->first('designation_id') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Management Level</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="management_level">
									<option selected="" value="">Choose Management Level</option>
									@foreach($management_levels as $key => $management_level )
										<option value="{!! $key !!}">{!! $management_level !!}</option>
									@endforeach
								</select>
								@if($errors->has('management_level'))<span>{!! $errors->first('management_level') !!}</span>@endif
							</div>
						</div>
						{{-- <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Member</label>
						    <div class="col-sm-12 col-md-10">
						        <select class="form-control selectpicker" name="member[]" multiple data-selected-text-format="count">
						            <option value="">select Member</option>
						            @foreach($members as $key => $member)
						            <option value="{!! $key !!}">{!! $member !!}</option>
						            @endforeach
						        </select>
						        @if($errors->has('member'))<span class="help-block" style="margin-left: 15px;">{!! $errors->first('member') !!}</span>@endif
						    </div>
							
						</div> --}}
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Join Date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Select Date" type="text" name="join_date" id="join_date" @if($user->user_profile != '') value="{!! $user->user_profile->join_date  !!}" @endif>
								@if($errors->has('join_date'))<span>{!! $errors->first('join_date') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pan Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="pan_number" @if( old('pan_number') != '') value="{{ old('pan_number') }}" @endif @if($user->user_profile != '') value="{!! $user->user_profile->pan_number  !!}" @endif>
								@if($errors->has('pan_number'))<span>{!! $errors->first('pan_number') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<input type="submit" name="submit" value="Save" id="submit" class="btn btn-primary ml-3">
						</div>
						@if($user->department != '')
						<div class="form-group row">
							<a href="" class="btn btn-warning ml-3">Delete</a>
						</div>
						@endif
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript">
var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();
    var new_date = "{!! $user->user_profile->join_date !!}";
	$("#join_date").datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),
        changeMonth: true,
        changeYear: true,
        yearRange: '-115:+0',
        setDate: new Date(new_date),
        language: 'en',
        autoClose: true,
        dateFormat: 'dd-mm-yyyy',
	});
</script>
@endsection