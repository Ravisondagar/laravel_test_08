@extends('Admin.layouts.listing')
@section('title','tasks')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>tasks</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">Home</a></li>
									<li class="breadcrumb-item"><a href="{!! route('projects.index') !!}">Project</a></li>
									<li class="breadcrumb-item active" aria-current="page">tasks</li>
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
						<div class="pull-left">
							<h5 class="text-blue">tasks</h5>
						</div>
						<div class="text-right">
							<a href="{!! route('projects.tasks.create',$project_id) !!}" class="btn btn-primary">Add task</a>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th>Complate</th>
									<th class="table-plus datatable-nosort">Name</th>
									<th>User Name</th>
									<th>Task Category</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tasks as $task)
								<tr>
									<td><input type="checkbox" name="complate" class="complate" value="{!! $task->id !!}"></td>
									<td class="table-plus">{!! $task->name !!}</td>
									<td>{!! $task->user->name !!}</td>
									<td>{!! $task->task_category->name !!}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{!! route('projects.tasks.show',['project_id' => $project_id ,'task_id' =>$task->id]) !!}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{!! route('projects.tasks.edit',['project_id' => $project_id ,'task_id' =>$task->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" href="{!! route('projects.tasks.task-logs.index',['project_id' => $project_id ,'task_id' => $task->id]) !!}"><i class="fa fa-pencil"></i> Task logs</a>
												{!! Former::open()->action( URL::route("projects.tasks.destroy",['project_id' => $project_id,'task_id' => $task->id]) )->method('delete')->class('form'.$task->id) !!}
													<a class="dropdown-item submit" href="javascript:;" data-id="{{$task->id}}" ><i class="fa fa-trash"></i> Delete</a>
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
		$('.complate').click(function(){
			var id = $(this).val();
			$.ajax({
				url: "{!! route('complate') !!}",
				type: 'post',
				data:{
					'id': id,
					'project_id':{!! $project_id !!},
					"_token": "{!! csrf_token() !!}",
				},
				success:function(response) {
					window.location.reload();
					
				},
				error: function(data) {
				       console.log(data);
				}
			});
		});
</script>
@endsection