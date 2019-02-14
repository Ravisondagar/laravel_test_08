@extends('layouts.home')
@section('title','Clients > Edit Client')
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
									<li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">Clients</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Client</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add Client</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('clients.index') !!}" data-toggle="tooltip" title="Back to Clients" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="POST" action="{!! route('clients.update',$client->id) !!}">
						@csrf
						@method('PATCH')
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Industry</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="industry_id">
									<option selected="" value="">Choose Industry</option>
									@foreach($industries as $key => $industry )
										<option value="{!! $key!!}" @if($industry == $client->industry->name) selected @endif>{!! $industry !!}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Johnny Brown" name="name" value="{{ $client->name }}">
								@if($errors->has('name'))<span>{!! $errors->first('name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="email" name="email" value="{{ $client->email }}">
								@if($errors->has('email'))<span>{!! $errors->first('email') !!}</span>@endif
							</div>
						</div>
						<div class="form-group">
							<div id="container">
							{{-- <label>Image</label>
							<div id="previewDiv">
								<img id="img" src="{!! asset('/image/default.jpg') !!}">
							</div> --}}
							<a href="javascript:;" class="btn btn-primary" id="uploader">Upload Photo</a>
							@if($errors->has('logo'))<p class="help-block">{!! $errors->first('logo') !!}</p>@endif
							</div>
							<input type="hidden" name="logo" id="image">
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Phone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="phone" value="{{ $client->phone }}">
								@if($errors->has('phone'))<span>{!! $errors->first('phone') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">address 1</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="address_1" class="form-control">{{ $client->address_1 }}</textarea>
								@if($errors->has('address_1'))<span>{!! $errors->first('address_1') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">address 2</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="address_2" class="form-control">{{ $client->address_2 }}</textarea>
								@if($errors->has('address_2'))<span>{!! $errors->first('address_2') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">city</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="city" value="{{ $client->city }}">
								@if($errors->has('city'))<span>{!! $errors->first('city') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">State</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="state" value="{{ $client->state }}">
								@if($errors->has('state'))<span>{!! $errors->first('state') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contry</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="country" value="{{ $client->country }}">
								@if($errors->has('country'))<span>{!! $errors->first('country') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Zip code</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="zipcode" value="{{ $client->zipcode }}">
								@if($errors->has('zipcode'))<span>{!! $errors->first('zipcode') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">website</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" placeholder="" name="website" value="{{ $client->website }}">
								@if($errors->has('website'))<span>{!! $errors->first('website') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">fax</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="link" placeholder="" name="fax" value="{{ $client->fax }}">
								@if($errors->has('fax'))<span>{!! $errors->first('fax') !!}</span>@endif
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
</script>
@endsection