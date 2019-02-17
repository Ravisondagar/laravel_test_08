@extends('layouts.home')
@section('title','Team > View Team')
@section('content')
<div class="main-container">
	<div class="min-height-200px">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue">Team Details</h4>
					<p class="mb-30 font-14"></p>
				</div>	
				<div class="pull-right">
					<a href="{!! route('teams.index') !!}" data-toggle="tooltip" title="Back to Team" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="col" class="table-plus datatable-nosort">Department name</th>
							<td class="table-plus">{!! $team->department->name !!}</td>
						</tr>
						<tr>
							<th scope="col">Team Lead name</th>
							<td>{!! $team->team_leads->name !!}</td>
						</tr>
						<table border="1" class="table table-striped table-bordered">
							<th scope="row">No</th>
							<th scope="row">Member name</th>
							@foreach($members as $key => $member)
								<tr>
									<td>{!! $key+1 !!}</td>
									<td>{!! $member->members->name !!}</td>
								</tr>
							@endforeach
						</table>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection