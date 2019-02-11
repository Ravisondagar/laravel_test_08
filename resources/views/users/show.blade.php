@extends('layouts.home')
@section('title','Users > Show User')
@section('content')
<div class="main-container">
	<div class="min-height-200px">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue">User Details</h4>
					<p class="mb-30 font-14"></p>
				</div>	
				<div class="pull-right">
					<a href="{!! route('users.index') !!}" data-toggle="tooltip" title="Back to Users" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="col">No</th>
							<td>{!! $user->id !!}</td>
						</tr>
						<tr>
							<th scope="col" class="table-plus datatable-nosort">Name</th>
							<td class="table-plus">{!! $user->name !!}</td></tr>
						<tr>
							<th scope="col">Last name</th>
							<td>{!! $user->last_name !!}</td>
						</tr>
						<tr>
							<th scope="col">Email</th>
							<td>{!! $user->email !!}</td>
						</tr>
						<tr>
							<th scope="col">Date of Birth</th>
							<td>{!! $user->dob !!}</td>
						</tr>
						<tr>
							<th scope="col">Age</th>
							<td>{!! $user->age !!}</td>
						</tr>
						<tr>
							<th scope="col">Address</th>
							<td>{!! $user->address !!}</td>
						</tr>
						<tr>
							<th scope="col">Gender</th>
							<td>{!! $user->gender !!}</td>
						</tr>
						<tr>
							<th scope="col">Hobby</th>
							<td>{!! $user->hobby !!}</td>
						</tr>
						<tr>
							<th scope="col">City</th>
							<td>{!! $user->city !!}</td>
						</tr>
						<tr>
							<th scope="col">State</th>
							<td>{!! $user->state !!}</td>
						</tr>
						<tr>
							<th scope="col">Country</th>
							<td>{!! $user->country !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection