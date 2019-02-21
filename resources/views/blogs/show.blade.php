@extends('layouts.home')
@section('title','Blogs > Show Blog')
@section('content')
<div class="main-container">
	<div class="min-height-200px">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue">Blog Detail</h4>
					<p class="mb-30 font-14"></p>
				</div>	
				<div class="pull-right">
					@if($from == 'user')
					<a href="{!! route('users.show',$blog->user->id) !!}" data-toggle="tooltip" title="Back to Blogs" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
					@else
					<a href="{!! route('blogs.index') !!}" data-toggle="tooltip" title="Back to Blogs" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
					@endif
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="col">Name</th>
							<td>{!! $blog->name !!}</td>
						</tr>
						<tr>
							<th scope="col">User Name</th>
							<td>{!! $blog->user->name !!}</td>
						</tr>
						<tr>
							<th scope="col">Name</th>
							<td>{!! $blog->description !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection