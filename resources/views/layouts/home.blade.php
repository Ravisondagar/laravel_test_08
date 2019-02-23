<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	@include('shared/head')
	<link rel="stylesheet" href="{!! asset('css/main.css') !!}">
	<style type="text/css">
	.orange{
		background-color: orange;
	}
	</style>
	{!! Charts::styles() !!}
</head>
<body>
	@include('shared/header')
	@include('shared/sidebar')
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
	{{-- @include('shared/footer') --}}
</body>
</html>