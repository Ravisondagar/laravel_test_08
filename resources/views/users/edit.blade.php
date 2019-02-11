@extends('layouts.home')
@section('title','Users > Edit User')
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
									<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Users</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit User</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit User</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('users.index') !!}" data-toggle="tooltip" title="Back to Users" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="POST" action="{!! route('users.update',$user->id) !!}">
						@csrf
						@method('PATCH')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Johnny Brown" value="{!! $user->name !!}" name="name">
								@if($errors->has('name'))<span>{!! $errors->first('name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Middle Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" value="{!! $user->middle_name !!}" type="text" name="middle_name">
								@if($errors->has('middle_name'))<span>{!! $errors->first('middle_name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text" name="last_name" value="{!! $user->last_name !!}">
								@if($errors->has('last_name'))<span>{!! $errors->first('last_name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
							<div class="custom-control custom-radio mb-5 ml-3" >
								<input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="male" @if($user->gender == 'male') checked @endif>
								<label class="custom-control-label" for="customRadio1">Male</label>
							</div>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="female" @if($user->gender == 'female') checked @endif>
								<label class="custom-control-label" for="customRadio2">Female</label>
							</div>
							@if($errors->has('gender'))<span>{!! $errors->first('gender') !!}</span>@endif
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Date of birth</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" id="dob" placeholder="Select Date" type="text" name="dob" readonly value="{!! $user->dob !!}">
								<input type="hidden" name="age" id="age" value="{!! $user->age !!}">
								@if($errors->has('dob'))<span>{!! $errors->first('dob') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">hobby</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="hobby" class="form-control">{!! $user->hobby !!}</textarea>
								@if($errors->has('hobby'))<span>{!! $errors->first('hobby') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">address</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="address" class="form-control">{!! $user->address !!}</textarea>
								@if($errors->has('address'))<span>{!! $errors->first('address') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">city</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="city" value="{!! $user->city !!}">
								@if($errors->has('city'))<span>{!! $errors->first('city') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">State</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="state" value="{!! $user->state !!}"> 
								@if($errors->has('state'))<span>{!! $errors->first('state') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Country</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="country" value="{!! $user->country !!}">
								@if($errors->has('country'))<span>{!! $errors->first('country') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<input type="submit" name="submit" value="Update" id="submit" class="btn btn-primary ml-3">
						</div>
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
    var new_date = "{!! $user->dob !!}";
    $("#dob").datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),
        changeMonth: true,
        changeYear: true,
        yearRange: '-115:+0',
        setDate: new Date(new_date),
        language: 'en',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
	});
$('#submit').click(function(){
	var dob = $('#dob').val();
	if (dob == '') {
		dob = '{!! $user->dob !!}';
	}
	var year = new Date(dob);
	var get_year = year.getFullYear();
	var age = currentYear - get_year;
	$('#age').val(age);
});
</script>
@endsection