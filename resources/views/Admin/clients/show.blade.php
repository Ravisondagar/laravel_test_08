@extends('Admin.layouts.home')
@section('title','Clients > Show client')
@section('content')
<div class="main-container">
	<div class="min-height-200px">
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="text-blue">client Details</h4>
					<p class="mb-30 font-14"></p>
				</div>	
				<div class="pull-right">
					<a href="{!! route('clients.index') !!}" data-toggle="tooltip" title="Back to Clients" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th scope="col">No</th>
							<td>{!! $client->id !!}</td>
						</tr>
						<tr>
							<th scope="col" class="table-plus datatable-nosort">Name</th>
							<td class="table-plus">{!! $client->name !!}</td>
						</tr>
						<tr>
							<th scope="col">Email</th>
							<td>{!! $client->email !!}</td>
						</tr>
						<tr>
							<th scope="col">website</th>
							<td>{!! $client->website !!}</td>
						</tr>
						<tr>
							<th scope="col">phone</th>
							<td>{!! $client->phone !!}</td>
						</tr>
						<tr>
							<th scope="col">Address</th>
							<td>{!! $client->address_1 !!}</td>
						</tr>
						<tr>
							<th scope="col">Address 2</th>
							<td>{!! $client->address_2 !!}</td>
						</tr>
						<tr>
							<th scope="col">City</th>
							<td>{!! $client->city !!}</td>
						</tr>
						<tr>
							<th scope="col">State</th>
							<td>{!! $client->state !!}</td>
						</tr>
						<tr>
							<th scope="col">Country</th>
							<td>{!! $client->country !!}</td>
						</tr>
						<tr>
							<th scope="col">fax</th>
							<td>{!! $client->fax !!}</td>
						</tr>
						<tr>
							<th scope="col">zipcode</th>
							<td>{!! $client->zipcode !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection