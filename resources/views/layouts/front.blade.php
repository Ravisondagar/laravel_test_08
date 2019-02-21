<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	@include('shared/head')
	<link rel="stylesheet" href="{!! asset('css/main.css') !!}">
	<style type="text/css">
	</style>
</head>
<body>
		@yield('content')
		<script src="{!! asset('js/main.js') !!}"></script>
		<script src="{!! asset('js/plupload.full.min.js') !!}"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		@yield('script')
		<script type="text/javascript">
		</script>
</body>
</html>