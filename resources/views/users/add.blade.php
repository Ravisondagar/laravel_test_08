@extends('layouts.home')
@section('title','Users > Add User')
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
									<li class="breadcrumb-item active" aria-current="page">Add User</li>
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
						<div class="pull-right">
							<a href="{!! route('users.index') !!}" data-toggle="tooltip" title="Back to Users" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="post" action="{!! route('users.store') !!}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Department</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="department_id">
									<option selected="" value="">Choose Department</option>
									@foreach($departments as $key => $department )
										<option value="{!! $key!!}">{!! $department !!}</option>
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
										<option value="{!! $key!!}">{!! $designation !!}</option>
									@endforeach
								</select>
								@if($errors->has('designation_id'))<span>{!! $errors->first('designation_id') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Johnny Brown" name="name" value="{{ old('name') }}">
								@if($errors->has('name'))<span>{!! $errors->first('name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Middle Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" type="text" name="middle_name" value="{{ old('middle_name') }}">
								@if($errors->has('middle_name'))<span>{!! $errors->first('middle_name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}">
								@if($errors->has('last_name'))<span>{!! $errors->first('last_name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="email" name="email" value="{{ old('email') }}">
								@if($errors->has('email'))<span>{!! $errors->first('email') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="password" name="password" value="{{ old('password') }}">
								@if($errors->has('password'))<span>{!! $errors->first('password') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Conform Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
								@if($errors->has('password_confirmation'))<span>{!! $errors->first('password_confirmation') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="male" checked>
								<label class="custom-control-label" for="customRadio1">Male</label>
							</div>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="female">
								<label class="custom-control-label" for="customRadio2">Female</label>
							</div>
							@if($errors->has('gender'))<span>{!! $errors->first('gender') !!}</span>@endif
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Team lead</label>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio3" name="team_lead" class="custom-control-input" value="yes" checked>
								<label class="custom-control-label" for="customRadio3">Yes</label>
							</div>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio4" name="team_lead" class="custom-control-input" value="no">
								<label class="custom-control-label" for="customRadio4">No</label>
							</div>
							@if($errors->has('team_lead'))<span>{!! $errors->first('team_lead') !!}</span>@endif
						</div>
						<div class="form-group">
							<div id="container">
							{{-- <label>Image</label>
							<div id="previewDiv">
								<img id="img" src="{!! asset('/image/default.jpg') !!}">
							</div> --}}
							<a href="javascript:;" class="btn btn-primary" id="uploader">Upload Photo</a>
							@if($errors->has('image'))<p class="help-block">{!! $errors->first('image') !!}</p>@endif
							</div>
							<input type="hidden" name="photo" id="image">
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Date of birth</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" placeholder="Select Date" type="text" name="dob" id="dob">
								<input type="hidden" name="age" id="age">
								@if($errors->has('dob'))<span>{!! $errors->first('dob') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Phone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="phone" value="{{ old('phone') }}">
								@if($errors->has('phone'))<span>{!! $errors->first('phone') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="mobile" value="{{ old('mobile') }}">
								@if($errors->has('mobile'))<span>{!! $errors->first('mobile') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">hobby</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="hobby" class="form-control">{{ old('hobby') }}</textarea>
								@if($errors->has('hobby'))<span>{!! $errors->first('hobby') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">address 1</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="address_1" class="form-control">{{ old('address_1') }}</textarea>
								@if($errors->has('address_1'))<span>{!! $errors->first('address_1') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">address 2</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="address_2" class="form-control">{{ old('address_2') }}</textarea>
								@if($errors->has('address_2 '))<span>{!! $errors->first('address_2') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Join Date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Select Date" type="text" name="join_date" id="join_date" >
								@if($errors->has('join_date'))<span>{!! $errors->first('join_date') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Pan Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="pan_number" >
								@if($errors->has('pan_number'))<span>{!! $errors->first('pan_number') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">city</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="city" value="{{ old('city') }}">
								@if($errors->has('city'))<span>{!! $errors->first('city') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">State</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="state" value="{{ old('state') }}">
								@if($errors->has('state'))<span>{!! $errors->first('state') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contry</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="country" value="{{ old('country') }}">
								@if($errors->has('country'))<span>{!! $errors->first('country') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Zip code</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="zipcode" value="{{ old('zipcode') }}">
								@if($errors->has('zipcode'))<span>{!! $errors->first('zipcode') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Marital status</label>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" name="marital_status" class="custom-control-input" value="single" id="customRadio5" checked>
								<label class="custom-control-label" for="customRadio5">Single</label>
							</div>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" name="marital_status" id="customRadio6" class="custom-control-input" value="married" >
								<label class="custom-control-label" for="customRadio6">Married</label>
							</div>
							@if($errors->has('marital_status'))<span>{!! $errors->first('marital_status') !!}</span>@endif
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Management Level</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="management_level" value="{{ old('management_level') }}">
								@if($errors->has('management_level'))<span>{!! $errors->first('management_level') !!}</span>@endif
							</div>
						</div>
						{{-- <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Attach</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" placeholder="" name="attach" value="{{ old('attach') }}">
								@if($errors->has('attach'))<span>{!! $errors->first('attach') !!}</span>@endif
							</div>
						</div> --}}
						<div class="form-group">
							<div id="container">
							{{-- <label>Image</label>
							<div id="previewDiv">
								<img id="img" src="{!! asset('/image/default.jpg') !!}">
							</div> --}}
							<a href="javascript:;" class="btn btn-primary" id="attach_file">Attach Document</a>
							@if($errors->has('attach'))<p class="help-block">{!! $errors->first('attach') !!}</p>@endif
							</div>
							<input type="hidden" name="attach" id="attach">
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Google</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" name="google" value="{{ old('google') }}">
								@if($errors->has('google'))<span>{!! $errors->first('google') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">facebook</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" placeholder="" name="facebook" value="{{ old('facebook') }}">
								@if($errors->has('facebook'))<span>{!! $errors->first('facebook') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">website</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" placeholder="" name="website" value="{{ old('website') }}">
								@if($errors->has('website'))<span>{!! $errors->first('website') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">skype</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" placeholder="" name="skype" value="{{ old('skype') }}">
								@if($errors->has('skype'))<span>{!! $errors->first('skype') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">linkedin</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" placeholder="" name="linkedin" value="{{ old('linkedin') }}">
								@if($errors->has('linkedin'))<span>{!! $errors->first('linkedin') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Twitter</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" placeholder="" name="twitter" value="{{ old('twitter') }}">
								@if($errors->has('twitter'))<span>{!! $errors->first('twitter') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">status</label>
							<div class="col-sm-12 col-md-10">
								<input type="hidden" name="status" value="0">
								<input  type="checkbox" value="1" name="status" value="{{ old('status') }}">
								@if($errors->has('status'))<span>{!! $errors->first('status') !!}</span>@endif
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
<div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
 
<br />
<pre id="console"></pre>
@endsection
@section('script')
<script type="text/javascript">
var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();
    $("#dob").datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),
        changeMonth: true,
        changeYear: true,
        yearRange: '-115:+0',
        language: 'en',
        autoClose: true,
        dateFormat: 'dd-mm-yyyy',
	});
	$("#join_date").datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),
        changeMonth: true,
        changeYear: true,
        yearRange: '-115:+0',
        language: 'en',
        autoClose: true,
        dateFormat: 'dd-mm-yyyy',
	});

var uploader = new plupload.Uploader({
    runtimes : 'html5,flash,silverlight,html4',
     
    browse_button : 'uploader', // you can pass in id...
    container: document.getElementById('container'), // ... or DOM Element itself
     
    url : "{{ asset('plupload/upload.php') }}",

    filters : {
        max_file_size : '10mb',
        mime_types: [
            {title : "Image files", extensions : "jpg,gif,png"},
            {title : "Zip files", extensions : "zip"}
        ]
    },
 
    // Flash settings
    flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
 
    // Silverlight settings
    silverlight_xap_url : "{{ asset('plupload/Moxie.xap') }}",
     
 
    init: {
        PostInit: function() {
            document.getElementById('filelist').innerHTML = '';
        },
 
        FilesAdded: function(up, files) {
            
            uploader.start();
        },
 
        // UploadProgress: function(up, file) {
        //     document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        // },
        UploadFile: function(up, file){
                    var tmp_url = '{!! asset('/tmp/') !!}';
                    console.log(file);
                    
                        $('#image').val(file.name);
                        

                        /*$('#preview').val(file.name);
                        $('#previewDiv >img').remove();
                        $('#previewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");*/
                    
                },
        UploadComplete: function(up, files){
        	
                var tmp_url = '{!! asset('/tmp/') !!}';
                console.log(files);
                plupload.each(files, function(file) {
                    $('#image').val(file.name);
                    $('#previewDiv > img').remove();
                    $('#previewDiv').append("<img src='"+"/tmp/"+ file.name+"' id='preview' height='100px' width='100px'/>");
                });
                jQuery('.loader').fadeToggle('medium');
        },
 
        Error: function(up, err) {
            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
        }
    }
});
 
uploader.init();

var uploader1 = new plupload.Uploader({
    runtimes : 'html5,flash,silverlight,html4',
     
    browse_button : 'attach_file', // you can pass in id...
    container: document.getElementById('container'), // ... or DOM Element itself
     
    url : "{{ asset('plupload/upload.php') }}",

    filters : {
        max_file_size : '10mb',
        mime_types: [
            {title : "Image files", extensions : "jpg,gif,png"},
            {title : "Zip files", extensions : "zip"}
        ]
    },
 
    // Flash settings
    flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
 
    // Silverlight settings
    silverlight_xap_url : "{{ asset('plupload/Moxie.xap') }}",
     
 
    init: {
        PostInit: function() {
            document.getElementById('filelist').innerHTML = '';
        },
 
        FilesAdded: function(up, files) {
            
            uploader1.start();
        },
 
        // UploadProgress: function(up, file) {
        //     document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        // },
        UploadFile: function(up, file){
                    var tmp_url = '{!! asset('/tmp/') !!}';
                    console.log(file);
                    
                        $('#attach').val(file.name);
                        

                        /*$('#preview').val(file.name);
                        $('#previewDiv >img').remove();
                        $('#previewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");*/
                    
                },
        UploadComplete: function(up, files){
        	
                var tmp_url = '{!! asset('/tmp/') !!}';
                console.log(files);
                plupload.each(files, function(file) {
                    $('#image').val(file.name);
                    $('#previewDiv > img').remove();
                    $('#previewDiv').append("<img src='"+"/tmp/"+ file.name+"' id='preview' height='100px' width='100px'/>");
                });
                jQuery('.loader').fadeToggle('medium');
        },
 
        Error: function(up, err) {
            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
        }
    }
});
 
uploader1.init();
</script>
@endsection