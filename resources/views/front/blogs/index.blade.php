@extends('Admin.layouts.front')
@section('content')
	<div class="container">
		<div class="pd-ltr-20 height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Blog</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="blog-list">
									<ul>
										@foreach($blogs as $blog)
											<li>
												<div class="row no-gutters">
													<div class="col-lg-4 col-md-12 col-sm-12">
														<div class="blog-img">
															<img src="{!! $blog->photo_url('thumb') !!}" alt="" class="bg_img">
														</div>
													</div>
													<div class="col-lg-8 col-md-12 col-sm-12">
														<div class="blog-caption">
															<h4><a href="#">{!! $blog->name !!}</a></h4>
															<h4>{!! $blog->blog_category->name !!}</h4>
															<div class="blog-by">
																<p>{!! $blog->description !!}</p>
																<div class="pt-10">
																	<a href="{!! route('blog_detail',[ 'id' => $blog->id]) !!}" class="btn btn-outline-primary">Read More</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>
										@endforeach
									</ul>
								</div>
								<div class="blog-pagination">
									<div class="btn-toolbar justify-content-center mb-15">
										<div class="btn-group">
											<a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
											<a href="#" class="btn btn-outline-primary">1</a>
											<a href="#" class="btn btn-outline-primary">2</a>
											<span class="btn btn-primary current">3</span>
											<a href="#" class="btn btn-outline-primary">4</a>
											<a href="#" class="btn btn-outline-primary">5</a>
											<a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="bg-white border-radius-4 box-shadow mb-30">
									<h5 class="pd-20">Categories</h5>
									<div class="list-group">
										@foreach($blog_categories as $blog_category)
											<a href="{!! route('blogs',['slug' => $blog_category->slug]) !!}" class="list-group-item d-flex align-items-center justify-content-between">{!! $blog_category->name!!} <span class="badge badge-primary badge-pill">{!! $blog_category->blogs->count() !!}</span></a>
										@endforeach
									</div>
								</div>
								<div class="bg-white border-radius-4 box-shadow mb-30">
									<h5 class="pd-20">Latest Post</h5>
									<div class="latest-post">
										<ul>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>HTML</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Css</span>
											</li>
											<li>
												<h4><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></h4>
												<span>jQuery</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Bootstrap</span>
											</li>
											<li>
												<h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
												<span>Design</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="bg-white border-radius-4 box-shadow">
									<h5 class="pd-20">Archives</h5>
									<div class="list-group">
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">January 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">February 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">March 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">April 2018</a>
										<a href="#" class="list-group-item d-flex align-items-center justify-content-between">May 2018</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection