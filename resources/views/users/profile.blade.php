@extends('layouts.home')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div id="message"></div>
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
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 bg-white border-radius-4 box-shadow">
							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="{{ Auth::user()->user_profile->photo_url() }}" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="{{ Auth::user()->user_profile->photo_url() }}" alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
												{{-- <input type="submit" value="Update" class="btn btn-primary" id="uploader"> --}}
												<div id="container">
													<a href="javascript:;" class="btn btn-primary" id="uploader">Upload Photo</a>
												</div>
												<button type="button" id="update" class="btn btn-primary">Update</button>
												<input type="hidden" name="photo" id="photo">
												<button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center">{{ $user->name }}</h5>
							<p class="text-center text-muted">Lorem ipsum dolor sit amet</p>
							<div class="profile-info">
								<h5 class="mb-20 weight-500">Contact Information</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										{!! $user->email !!}
									</li>
									<li>
										<span>Phone Number:</span>
										{!! $user->user_profile->phone !!}
									</li>
									<li>
										<span>Country:</span>
										{!! $user->user_profile->country !!}
									</li>
									<li>
										<span>Address:</span>
										{!! $user->user_profile->address !!}
										
									</li>
								</ul>
							</div>
							<div class="profile-social">
								<h5 class="mb-20 weight-500">Social Links</h5>
								<ul class="clearfix">
									<li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
									<li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
								</ul>
							</div>
							<div class="profile-skills">
								<h5 class="mb-20 weight-500">Key Skills</h5>
								<h6 class="mb-5">HTML</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">Css</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">jQuery</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<h6 class="mb-5">Bootstrap</h6>
								<div class="progress mb-20" style="height: 6px;">
									<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" role="tab">Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Setting Tab start -->
										<div class="profile-setting container">
											{!! Former::open()->action( route("users.profile_update"))->method('post') !!}
												<h4 class="text-blue mb-20">Edit Your Personal Setting</h4>
												@if($user->role == 'user')
												<div class="form-group">
													<label>Select Department</label>
													<select class="custom-select col-12 form-control-lg" disabled name="department_id">
														<option selected="" value="">Choose Department</option>
														@foreach($departments as $key => $department )
															<option value="{!! $key!!}" @if($user->department->name == $department) selected @endif>{!! $department !!}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label>Select Designation</label>
													<select class="custom-select col-12 form-control-lg" disabled name="designation_id">
														<option selected="" value="">Choose Designation</option>
														@foreach($designations as $key => $designation )
															<option value="{!! $key!!}" @if($user->designation->name == $designation) selected @endif>{!! $designation !!}</option>
														@endforeach
													</select>
												</div>
												@endif
												<div class="form-group">
													<label>Name</label>
													<input class="form-control form-control-lg" type="text" name="name" value="{!! $user->name !!}">
													@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Name</label>
													<input class="form-control form-control-lg" type="text" name="middle_name" value="{!! $user->middle_name !!}">
													@if($errors->has('middle_name'))<p class="help-block">{!! $errors->first('middle_name') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Last Name</label>
													<input class="form-control form-control-lg" type="text" name="last_name" value="{!! $user->last_name !!}">
													@if($errors->has('last_name'))<p class="help-block">{!! $errors->first('last_name') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Date of birth</label>
													<input class="form-control form-control-lg" name="dob" type="text" value="{!! $user->user_profile->dob !!}" id="dob"> 
													@if($errors->has('dob'))<p class="help-block">{!! $errors->first('dob') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Join Date</label>
													<input class="form-control form-control-lg" name="join_date" type="text" value="{!! $user->user_profile->join_date !!}" id="join_date">
													@if($errors->has('join_date'))<p class="help-block">{!! $errors->first('join_date') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Gender</label>
													<div class="d-flex">
														<div class="custom-control custom-radio mb-5 mr-20">
															<input type="radio" id="customRadio4" name="gender"  value="male" class="custom-control-input" @if($user->user_profile->gender == 'male') checked @endif> 
															<label class="custom-control-label weight-400" for="customRadio4">Male</label>
														</div>
														<div class="custom-control custom-radio mb-5">
															<input type="radio" id="customRadio5" name="gender" value="female" class="custom-control-input" @if($user->user_profile->gender == 'female') checked @endif>
															<label class="custom-control-label weight-400" for="customRadio5">Female</label>
														</div>
													</div>
													@if($errors->has('gender'))<p class="help-block">{!! $errors->first('gender') !!}</p>@endif
												</div>
												<div class="form-group">
													<label >Marital status</label>
													<div class="d-flex">
														<div class="custom-control custom-radio mb-5 mr-20" >
															<input type="radio" id="customRadio1" name="marital_status" class="custom-control-input" value="single" @if($user->user_profile->marital_status == 'single') checked @endif>
															<label class="custom-control-label" for="customRadio1">Male</label>
														</div>
														<div class="custom-control custom-radio mb-5 mr-20">
															<input type="radio" id="customRadio2" name="marital_status" class="custom-control-input" value="married" @if($user->user_profile->marital_status == 'married') checked @endif>
															<label class="custom-control-label" for="customRadio2">Female</label>
														</div>
													</div>
													@if($errors->has('marital_status'))<span>{!! $errors->first('marital_status') !!}</span>@endif
												</div>
												<div class="form-group">
													<label>Address 1</label>
													<textarea class="form-control" name="address_1">{!! $user->user_profile->address_1 !!}</textarea>
													@if($errors->has('address_1'))<p class="help-block">{!! $errors->first('address_1') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Address 2</label>
													<textarea class="form-control" name="address_2">{!! $user->user_profile->address_2 !!}</textarea>
													@if($errors->has('address_2'))<p class="help-block">{!! $errors->first('address_2') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Hobby</label>
													<textarea class="form-control" name="hobby">{!! $user->user_profile->hobby !!}</textarea>
													@if($errors->has('hobby'))<p class="help-block">{!! $errors->first('hobby') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Phone number</label>
													<input class="form-control form-control-lg" type="text" name="phone" value="{!! $user->user_profile->phone !!}">
													@if($errors->has('phone'))<p class="help-block">{!! $errors->first('phone') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>mobile number</label>
													<input class="form-control form-control-lg" type="text" name="mobile" value="{!! $user->user_profile->mobile !!}">
													@if($errors->has('mobile'))<p class="help-block">{!! $errors->first('mobile') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Zip code</label>
													<input class="form-control form-control-lg" type="text" name="zipcode" value="{!! $user->user_profile->zipcode !!}">
													@if($errors->has('zipcode'))<p class="help-block">{!! $errors->first('zipcode') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Management level</label>
													<input class="form-control form-control-lg" type="text" name="management_level" value="{!! $user->user_profile->management_level !!}">
													@if($errors->has('management_level'))<p class="help-block">{!! $errors->first('management_level') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>Pan Number</label>
													<input class="form-control form-control-lg" type="text" name="pan_number" value="{!! $user->user_profile->pan_number !!}">
													@if($errors->has('pan_number'))<p class="help-block">{!! $errors->first('pan_number') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>City</label>
													<input class="form-control form-control-lg" type="text" name="city" value="{!! $user->user_profile->city !!}">
													@if($errors->has('city'))<p class="help-block">{!! $errors->first('city') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>state</label>
													<input class="form-control form-control-lg" type="text" name="state" value="{!! $user->user_profile->state !!}">
													@if($errors->has('state'))<p class="help-block">{!! $errors->first('state') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>country</label>
													<input class="form-control form-control-lg" type="text" name="country" value="{!! $user->user_profile->country !!}">
													@if($errors->has('country'))<p class="help-block">{!! $errors->first('country') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>google</label>
													<input class="form-control form-control-lg" type="text" name="google" value="{!! $user->user_profile->google !!}">
													@if($errors->has('google'))<p class="help-block">{!! $errors->first('google') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>facebook</label>
													<input class="form-control form-control-lg" type="text" name="facebook" value="{!! $user->user_profile->facebook !!}">
													@if($errors->has('facebook'))<p class="help-block">{!! $errors->first('facebook') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>website</label>
													<input class="form-control form-control-lg" type="text" name="website" value="{!! $user->user_profile->website !!}">
													@if($errors->has('website'))<p class="help-block">{!! $errors->first('website') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>skype</label>
													<input class="form-control form-control-lg" type="text" name="skype" value="{!! $user->user_profile->skype !!}">
													@if($errors->has('skype'))<p class="help-block">{!! $errors->first('skype') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>twitter</label>
													<input class="form-control form-control-lg" type="text" name="twitter" value="{!! $user->user_profile->twitter !!}">
													@if($errors->has('twitter'))<p class="help-block">{!! $errors->first('twitter') !!}</p>@endif
												</div>
												<div class="form-group">
													<label>linkedin</label>
													<input class="form-control form-control-lg" type="text" name="linkedin" value="{!! $user->user_profile->linkedin !!}">
													@if($errors->has('linkedin'))<p class="help-block">{!! $errors->first('linkedin') !!}</p>@endif
												</div>
												<div class="form-group mb-0">
													<input type="submit" class="btn btn-primary" value="Update Information">
												</div>
											{!! Former::close() !!}
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="filelist"></div>
 
<br />
<pre id="console"></pre>
@endsection
@section('script')
<script type="text/javascript">
	var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();
    var dob = "{!! $user->user_profile->dob !!}";
    var join_date = "{!! $user->user_profile->join_date !!}";
    $("#dob").datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),
        changeMonth: true,
        changeYear: true,
        yearRange: '-115:+0',
        setDate: new Date(dob),
        language: 'en',
        autoClose: true,
        dateFormat: 'dd-mm-yyyy',
	});
	$("#join_date").datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),
        changeMonth: true,
        changeYear: true,
        yearRange: '-115:+0',
        setDate: new Date(join_date),
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
	                    $('#photo').val(file.name);            
	                     
	                     $('.img-container >img').remove();
	                     $('.img-container').append("<img src='"+tmp_url +"/"+ file.name+"' alt='Picture' />");
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

$(document).on('click','#update',function(e){
	var photo = $('#photo').val();
	$.ajax({
          url: "{!! route('users.photo_update') !!}",
          type: 'POST',
          data: {
                   "_token": "{!! csrf_token() !!}",
                   photo: photo,
                 },
          success:function(response) {
          	console.log(response.photo);
          	$('.profile-photo >img').attr('src','/uploads/photo/'+response.photo);
          	$('#close').click();
          	$('#message').append("<div class='alert alert-success'><p>Profile Update Succesfully</p></div>");
          },
          error: function(data) {
                 console.log(data);
          }
     });
});
</script>
@endsection