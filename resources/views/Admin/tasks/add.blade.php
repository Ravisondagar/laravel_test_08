@extends('Admin.layouts.home')
@section('title','tasks > Add task')
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
									<li class="breadcrumb-item"><a href="{!! route('dashboard.index') !!}">Home</a></li>
									<li class="breadcrumb-item"><a href="{!! route('projects.index') !!}">Project</a></li>
									<li class="breadcrumb-item"><a href="{!! route('projects.tasks.index',$project_id) !!}">tasks</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add task</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add task</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('projects.tasks.index',$project_id) !!}" data-toggle="tooltip" title="Back to tasks" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="post" action="{!! route('projects.tasks.store',$project_id) !!}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Select Task Category</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="task_category_id">
									<option selected="" value="">Choose Task Category</option>
									@foreach($task_categories as $key => $task_category )
										<option value="{!! $task_category!!}">{!! $key !!}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="name" value="{!! old('name') !!}">
								@if($errors->has('name'))<span>{!! $errors->first('name') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Notes</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
								@if($errors->has('notes'))<span>{!! $errors->first('notes') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Start Date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" placeholder="Select Date" type="text" name="start_date" id="start_date">
								@if($errors->has('start_date'))<span>{!! $errors->first('start_date') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">End Date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" placeholder="Select Date" type="text" name="end_date" id="end_date">
								@if($errors->has('end_date'))<span>{!! $errors->first('end_date') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">priority</label>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio1" name="priority" class="custom-control-input" value="none" checked>
								<label class="custom-control-label" for="customRadio1">none</label>
							</div>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio2" name="priority" class="custom-control-input" value="low">
								<label class="custom-control-label" for="customRadio2">low</label>
							</div>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio3" name="priority" class="custom-control-input" value="medium">
								<label class="custom-control-label" for="customRadio3">medium</label>
							</div>
							<div class="custom-control custom-radio mb-5 ml-3">
								<input type="radio" id="customRadio4" name="priority" class="custom-control-input" value="high">
								<label class="custom-control-label" for="customRadio4">high</label>
							</div>
							@if($errors->has('priority'))<span>{!! $errors->first('priority') !!}</span>@endif
						</div>
						<div class="form-group row">
							<input type="submit" name="submit" value="Save" class="btn btn-primary ml-3">
						</div>
					</form>
				</div>
				<!-- Default Basic Forms End -->
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript">
</script>
@endsection