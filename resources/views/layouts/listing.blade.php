<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	@include('include/head')
	<link rel="stylesheet" href="{!! asset('css/main.css') !!}">
	<style type="text/css">
	</style>
</head>
<body>
	@include('include/header')
	@include('include/sidebar')
		@yield('content')
		<script src="{!! asset('js/main.js') !!}"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		@yield('script')
		<script>
			$(document).ready(function(){
				$('#logout').click(function(e){
					e.preventDefault(this);
					$('#form').submit();
				});
			});
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
					"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
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
					"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
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
	{{-- @include('include/footer') --}}
</body>
</html>