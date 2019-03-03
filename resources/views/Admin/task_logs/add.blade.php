@extends('Admin.layouts.home')
@section('title','Task Logs > Add Task log')
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
									<li class="breadcrumb-item"><a href="{!! route('projects.tasks.index',$project_id) !!}">task</a></li>
									<li class="breadcrumb-item"><a href="{!! route('projects.tasks.task-logs.index',['project_id' => $project_id, $id]) !!}">Task Logs</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Task log</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Add Task log</h4>
						</div>
						<div class="pull-right">
							<a href="{!! route('projects.tasks.task-logs.index',['project_id' => $project_id, $id]) !!}" data-toggle="tooltip" title="Back to task logs" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div><br>
					<form method="post" action="{!! route('projects.tasks.task-logs.store',['project_id' => $project_id, $id]) !!}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" placeholder="Select Date" type="text" name="date" id="date">
								@if($errors->has('date'))<span>{!! $errors->first('date') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-12 col-md-2 col-form-label">Time</label>
						    <div class="row">
						        <div class="col-sm-8 col-md-6">
						            {!! Former::text('start_time')->class('timepicker form-control')->label(false)->autocomplete('off')->placeholder('start time')->dataTarget('#end_time')->dataMethod('min') !!}
						        </div>
						        <div class="col-sm-8 col-md-6" >
						            {!! Former::text('end_time')->class('timepicker form-control')->label(false)->autocomplete('off')->placeholder('end time')->dataTarget('#start_time')->dataMethod('max') !!}
						        </div>
						    </div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Description</label>
							<div class="col-sm-12 col-md-10">
								<textarea name="description" class="form-control">{{ old('description') }}</textarea>
								@if($errors->has('description'))<span>{!! $errors->first('description') !!}</span>@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Billable</label>
							<div class="custom-control custom-checkbox mb-5 ml-3">
								<input type="hidden" name="billable" value="0">
								<input type="checkbox" id="customCheckbox" name="billable" class="custom-control-input" value="1">
								<label class="custom-control-label" for="customCheckbox">none</label>
							</div>
							@if($errors->has('billable'))<span>{!! $errors->first('billable') !!}</span>@endif
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
	var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();
    $("#date").datepicker({
        maxDate: new Date(currentYear, currentMonth, currentDate),
        changeMonth: true,
        changeYear: true,
        yearRange: '-115:+0',
        language: 'en',
        autoClose: true,
        dateFormat: 'dd-mm-yyyy',
	});
	jQuery('.timepicker').datepicker({
            timepicker: true,
            language: 'en',
            autoClose: true,
            onlyTimepicker: true,
            maxHours: 24,
            timeFormat: 'hh:ii',
            onSelect: function (fd, d, picker) {
                if(jQuery(picker.el).data('method') == "min")
                    $(jQuery(picker.el).data('target')).data('datepicker').update('minDate', d);
                else
                    $(jQuery(picker.el).data('target')).data('datepicker').update('maxDate', d);
                $(jQuery(picker.el).data('target')).focus();
            }
        });
</script>
@endsection