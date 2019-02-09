@extends('layout.app')
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
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add User</h4>
						</div>
					</div>
					<form method="post" action="{!! route('users.store') !!}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Johnny Brown" name="name">
								@if($errors->has('name'))<span>{!! $errors->first('name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Middle Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" type="text" name="middle_name">
								@if($errors->has('middle_name'))<span>{!! $errors->first('middle_name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="text" name="last_name">
								@if($errors->has('last_name'))<span>{!! $errors->first('last_name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
							<div class="custom-control custom-radio mb-5">
								<input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="male" checked>
								<label class="custom-control-label" for="customRadio1">Male</label>
							</div>
							<div class="custom-control custom-radio mb-5">
								<input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="female">
								<label class="custom-control-label" for="customRadio2">Female</label>
							</div>
							@if($errors->has('gender'))<span>{!! $errors->first('gender') !!}</span>@endif
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Date of birth</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" placeholder="Select Date" type="text" name="dob">
								@if($errors->has('dob'))<span>{!! $errors->first('dob') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">hobby</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="hobby" class="form-control"></textarea>
								@if($errors->has('hobby'))<span>{!! $errors->first('hobby') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">address</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="address" class="form-control"></textarea>
								@if($errors->has('address'))<span>{!! $errors->first('address') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">city</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="city">
								@if($errors->has('city'))<span>{!! $errors->first('city') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">State</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="state">
								@if($errors->has('state'))<span>{!! $errors->first('state') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contry</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="country">
								@if($errors->has('country'))<span>{!! $errors->first('country') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<input type="submit" name="submit" value="Save" class="btn btn-primary">
						</div>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection