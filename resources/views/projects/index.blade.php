@extends('layout.app')
@section('content')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Projects</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Projects</li>
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
							<h5 class="text-blue">Projects</h5>
						</div>
						<div class="text-right">
							<a href="{!! route('projects.create') !!}" class="btn btn-primary">Add Project</a>
						</div>
					</div>
					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Name</th>
									<th>User Name</th>
									<th>hours</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($projects as $project)
								<tr>
									<td class="table-plus">{!! $project->name !!}</td>
									<td>{!! $project->user->name !!}</td>
									<td>{!! $project->hours !!}</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="{!! route('projects.show',$project->id) !!}"><i class="fa fa-eye"></i> View</a>
												<a class="dropdown-item" href="{!! route('projects.edit',$project->id) !!}"><i class="fa fa-pencil"></i> Edit</a>
												{!! Former::open()->action( URL::route("projects.destroy",$project->id) )->method('delete')->class('form'.$project->id) !!}
													<a class="dropdown-item submit" href="javascript:;" data-id="{{$project->id}}" ><i class="fa fa-trash"></i> Delete</a>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$(document).on('click','.submit',function(e){
		var r=$(this).data('id');
			e.preventDefault(this);
			swal({
					  title: "Are you sure?",
					  text: "Once deleted, you will not be able to recover this imaginary file!",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
					})
					.then((willDelete) => {
					  if (willDelete) {	
					    $('.form'+r).submit();
					  } else {
					    //swal("Your imaginary file is safe!");
					    return false;
					  }
				});
	});
	$('document').ready(function(e){
		$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});
		$('.data-table-export').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
			dom: 'Bfrtip',
			buttons: [
			'copy', 'csv', 'pdf', 'print'
			]
		});
		var table = $('.select-row').DataTable();
		$('.select-row tbody').on('click', 'tr', function () {
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
			}
		});
		var multipletable = $('.multiple-select-row').DataTable();
		$('.multiple-select-row tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	});
</script>
@endsection