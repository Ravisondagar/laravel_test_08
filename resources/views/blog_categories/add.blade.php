@extends('layouts.home')
@section('title','Blog Categories > Add Blog Category')
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
									<li class="breadcrumb-item"><a href="{!! route('blog-categories.index') !!}">Blog Categories</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Blog Category</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add Blog Category</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('blog-categories.index') !!}" data-toggle="tooltip" title="Back to Blog Categories" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="post" action="{!! route('blog-categories.store') !!}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select parent</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="parent_id">
									<option selected="" value="">Choose parent</option>
									@foreach($blog_categories_parents as $key => $blog_categories_parent )
										<option value="{!! $key !!}">{!! $blog_categories_parent !!}</option>
									@endforeach
								</select>
								@if($errors->has('parent_id'))<span>{!! $errors->first('parent_id') !!}</span>@endif
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
							<input type="submit" name="submit" value="Save" id="submit" class="btn btn-primary ml-3">
						</div>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection