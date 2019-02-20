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
		<script src="{!! asset('js/plupload.full.min.js') !!}"></script>
		@yield('script')
		<script type="text/javascript">
			$(document).ready(function(){
				$('#logout').click(function(e){
					e.preventDefault(this);
					$('#form').submit();
				});
			});
		</script>
	{{-- @include('include/footer') --}}
</body>
</html>