@extends('layouts.home')
@section('title','Blog Category > View Blog Category')
@section('content')
<div class="main-container">
	<div class="min-height-200px">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue">Blog Category Details</h4>
					<p class="mb-30 font-14"></p>
				</div>	
				<div class="pull-right">
					<a href="{!! route('blog-categories.index') !!}" data-toggle="tooltip" title="Back to Blog Category" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="col">No</th>
							<td>{!! $blog_category->id !!}</td>
						</tr>
						<tr>
							<th scope="col" class="table-plus datatable-nosort">Blog Category Name</th>
							<td class="table-plus">{!! $blog_category->name !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection