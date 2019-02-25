@extends('Admin.layouts.listing')
@section('title','Task Logs')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Task Logs</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Task Logs</li>
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
							<h5 class="text-blue">Task Logs</h5>
						</div>
						<div class="text-right">
							<a href="{!! route('tasks.task-logs.create', ['task_id' => $task_id]) !!}" class="btn btn-primary">Add Task Log</a>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Task Name</th>
									<th >date</th>
									<th>Start time</th>
									<th>End time</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($task_logs as $task_log)
								<tr>
									<td class="table-plus">{!! $task_log->task->name !!}</td>
									<td>{!! $task_log->date !!}</td>
									<td>{!! $task_log->start_time !!}</td>
									<td>{!! $task_log->end_time !!}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{!! route('tasks.task-logs.show',['task_id' => $task_id, 'task_log_id' => $task_log->id]) !!}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{!! route('tasks.task-logs.edit',['task_id' => $task_id, 'task_log_id' => $task_log->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
												{!! Former::open()->action( URL::route("tasks.task-logs.destroy",['task_id' => $task_id, 'task_log_id' => $task_log->id]) )->method('delete')->class('form'.$task_log->id) !!}
													<a class="dropdown-item submit" href="javascript:;" data-id="{{$task_log->id}}" ><i class="fa fa-trash"></i> Delete</a>
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
			alert(id);
			$.ajax({
				url: "{!! route('complate') !!}",
				type: 'post',
				data:{
					'id': id, 
					"_token": "{!! csrf_token() !!}",
				},
				success:function(response) {
					location.reload();
					
				},
				error: function(data) {
				       console.log(data);
				}
			});
		})
</script>
@endsection