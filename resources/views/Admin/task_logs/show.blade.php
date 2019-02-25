@extends('Admin.layouts.home')
@section('title','Task logs > View Task log')
@section('content')
<div class="main-container">
	<div class="min-height-200px">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue">Task log Details</h4>
					<p class="mb-30 font-14"></p>
				</div>	
				<div class="pull-right">
					<div class="pull-right">
							<a href="{!! route('tasks.task-logs.index',['task_id' => $task_id]) !!}" data-toggle="tooltip" title="Back to task logs" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="col">Task Name</th>
							<td>{!! $task_log->task->name !!}</td>
						</tr>
						<tr>
							<th scope="col">Date</th>
							<td>{!! $task_log->date !!}</td>
						</tr>
						<tr>
							<th scope="col">Start time</th>
							<td>{!! $task_log->start_time !!}</td>
						</tr>
						<tr>
							<th scope="col">End Time</th>
							<td>{!! $task_log->end_time !!}</td>
						</tr>
						<tr>
							<th scope="col">Spent time</th>
							<td>{!! $task_log->spent_time !!}</td>
						</tr>
						<tr>
							<th scope="col">Description</th>
							<td>{!! $task_log->description !!}</td>
						</tr>
						<tr>
							<th scope="col">Billable</th>
							<td>{!! $task_log->billable !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection