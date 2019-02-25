@extends('Admin.layouts.listing')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="container pd-0">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Blogs</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Blogs</li>
									</ol>
								</nav>
								<div class="text-right">
									<a href="{!! route('blogs.create') !!}" class="btn btn-primary">Add Blog</a>
								</div>
							</div>
						</div>
					</div>
					<div class="contact-directory-list">
						<ul class="row">
							@foreach($blogs as $blog)
							<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="contact-directory-box">
									<div class="contact-dire-info text-center">
										<div class="contact-avatar">
											<span>
												<img src="{!! $blog->photo_url('circle') !!}" alt="">
											</span>
										</div>
										<div class="contact-name">
											<h4>{!! $blog->name !!}</h4>
											<p>UI/UX designer</p>
											<div class="work text-success"><i class="ion-android-person"></i> Freelancer</div>
										</div>
										<div class="contact-skill">
											<span class="badge badge-pill">UI</span>
											<span class="badge badge-pill">UX</span>
											<span class="badge badge-pill">Photoshop</span>
											<span class="badge badge-pill badge-primary">+ 8</span>
										</div>
										<div class="profile-sort-desc">
											{!! $blog->description !!}
										</div>
									</div>
									<div class="btn-list row">
										<a href="{!! route('blogs.show',$blog->id) !!}" class="btn btn-primary ml-5">Show</a>
										<a href="{!! route('blogs.edit',$blog->id) !!}" class="btn btn-success">Edit</a>
										{!! Former::open()->action( URL::route("blogs.destroy",$blog->id) )->method('delete')->class('form'.$blog->id) !!}
											<a class="btn btn-danger submit" href="javascript:;" data-id="{{$blog->id}}" >Delete</a>
										{!! Former::close() !!}
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection