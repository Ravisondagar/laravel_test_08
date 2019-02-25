@extends('Admin.layouts.listing')
@section('title','Blogs')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Blogs</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
						<div class="btn-list row pull-right">
							<a href="{!! route('blogs.create') !!}" class="btn btn-primary">Add Blog</a>
							<a href="{!! route('blogs.export') !!}" class="btn btn-primary">Export Blog</a>
						<div id="container">
								<a href="javascript:;" class="btn btn-primary" id="import">Import Blog</a>
						</div>
					</div>
						<input type="hidden" name="file" id="file">
							
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Blog Category Name</th>
									<th>Description</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($blogs as $blog)
								<tr>
									<td class="table-plus">{!! $blog->name !!}</td>
									<td>{!! $blog->blog_category->name !!}</td>
									<td>{!! $blog->description !!}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{!! route('blogs.show',$blog->id) !!}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{!! route('blogs.edit',$blog->id) !!}"><i class="fa fa-pencil"></i> Edit</a>
												{!! Former::open()->action( URL::route("blogs.destroy",$blog->id) )->method('delete')->class('form'.$blog->id) !!}
													<a class="dropdown-item submit" href="javascript:;" data-id="{{$blog->id}}" ><i class="fa fa-trash"></i> Delete</a>
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
@section('script')
<script type="text/javascript">
	var uploader = new plupload.Uploader({
	    runtimes : 'html5,flash,silverlight,html4',
	     
	    browse_button : 'import', // you can pass in id...
	    container: document.getElementById('container'), // ... or DOM Element itself
	     
	    url : "{{ asset('plupload/upload.php') }}",

	    filters : {
	        max_file_size : '10mb',
	        mime_types: [
	            {title : "Image files", extensions : "jpg,gif,png,xlsx"},
	            {title : "Zip files", extensions : "zip"}
	        ]
	    },
	 
	    // Flash settings
	    flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
	 
	    // Silverlight settings
	    silverlight_xap_url : "{{ asset('plupload/Moxie.xap') }}",
	     
	 
	    init: {
	        PostInit: function() {
	            //document.getElementById('filelist').innerHTML = '';
	        },
	 
	        FilesAdded: function(up, files) {
	            
	            uploader.start();
	        },
	 
	        // UploadProgress: function(up, file) {
	        //     document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
	        // },
	        UploadFile: function(up, file){
	                    var tmp_url = '{!! asset('/tmp/') !!}';
	                    
	                        $('#file').val(file.name);
	                        $.ajax({
	                        	url: "{!! route('blogs.import') !!}",
	                        	type: 'post',
	                        	data : {'file': file.name , 
	                        			"_token": "{!! csrf_token() !!}",
	                        		},
	                        	success:function(response) {
	                        		console.log(response);
	                        	},
	                        	error: function(data) {
	                        	       console.log(data);
	                        	}
	                        });
	                        

	                        /*$('#preview').val(file.name);
	                        $('#previewDiv >img').remove();
	                        $('#previewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");*/
	                    
	                },
	        UploadComplete: function(up, files){
	        	
	                var tmp_url = '{!! asset('/tmp/') !!}';
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