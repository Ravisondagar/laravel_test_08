@extends('Admin.layouts.home')
@section('title','Users > Add Experience')
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
								<li class="breadcrumb-item"><a href="{!! route('users.index') !!}">Users</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Experience</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- Default Basic Forms Start -->
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue">Add Experience</h4>
					</div>
					<div class="pull-right">
						<a href="{!! route('users.index') !!}" data-toggle="tooltip" title="Back to Users" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
					</div>
				</div><br>
				<form method="post" action="{!! route('user-experience.store') !!}">
					@csrf
					<div id="sections">
						<div class="section">
							<span id="label">Experience</span>
							<input type="hidden" name="user_id" value="{!! $id !!}">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="company_name">Company Name</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" id="company_name" type="text" placeholder="" name="company_name[]" value="{{ old('company_name') }}">
									@if($errors->has('company_name[]'))<span>{!! $errors->first('company_name[]') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label form" for="from">From</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control date-picker" id="from" placeholder="Select Date" type="text" name="from[]" >
									@if($errors->has('from[]'))<span>{!! $errors->first('from[]') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label to" for="to">To</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control date-picker" placeholder="Select Date" type="text" name="to[]" id="to">
									@if($errors->has('to[]'))<span>{!! $errors->first('to[]') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="salary">Salary</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" placeholder="" name="salary[]" value="{{ old('salary') }}" id="salary">
									@if($errors->has('salary[]'))<span>{!! $errors->first('salary[]') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="reason">Reason</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" placeholder="" name="reason[]" id="reason" value="{{ old('reason') }}">
									@if($errors->has('reason[]'))<span>{!! $errors->first('reason[]') !!}</span>@endif
								</div>
							</div>
							<p><a href="#" class='remove'>Remove Section</a></p>
						</div>
					</div>
					<div class="form-group row">
						<input type="button" name="add" value="Add Exp" id="exp" class="btn btn-primary ml-3">
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
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/validate-js/2.0.1/validate.js"></script>
<script type="text/javascript">
	var template = $('#sections .section:first').clone();
	var sectionsCount = 1;

	$('body').on('click', '#exp', function() {

	    //increment
	    sectionsCount++;

	    //loop through each input
	    var section = template.clone().find(':input').each(function(){

	        //set id to store the updated section number
	        var newId = this.id + sectionsCount;
	        /*clone.find("input").val("");*/
	        //update for label
	        $(this).prev().attr('for', newId);


	        //update id
	        this.id = newId;

	    }).end()

	    //inject new section
	    .appendTo('#sections');
	    return false;
	});
	$('#sections').on('click', '.remove', function() {
	    //fade out section
	    swal({
	    	title: "Are you sure?",
	    	text: "Once deleted, you will not be able to recover this imaginary file!",
	    	icon: "warning",
	    	buttons: true,
	    	dangerMode: true,
	    })
	    .then((willDelete) => {
	    	if (willDelete) {	
	    		$(this).parent().fadeOut(300, function(){
    		        //remove parent element (main section)
    		        $(this).parent().empty();
    		        return false;
    		    });
	    		return false;
	    	} else {
    		    //swal("Your imaginary file is safe!");
    		    return false;
    		}
    	});

	});
	var date = new Date();
	var currentMonth = date.getMonth();
	var currentDate = date.getDate();
	var currentYear = date.getFullYear();
	$("#from").datepicker({
		maxDate: new Date(currentYear, currentMonth, currentDate),
		changeMonth: true,
		changeYear: true,
		yearRange: '-115:+0',
		language: 'en',
		autoClose: true,
		dateFormat: 'dd-mm-yyyy',
	});
	$("#to").datepicker({
		maxDate: new Date(currentYear, currentMonth, currentDate),
		changeMonth: true,
		changeYear: true,
		yearRange: '-115:+0',
		language: 'en',
		autoClose: true,
		dateFormat: 'dd-mm-yyyy',
	});
</script>
@endsection