<!DOCTYPE html>
<html>
<head>
	<title></title>
	@include('include/head')
	<link rel="stylesheet" href="{!! asset('css/main.css') !!}">
</head>
<body>
	@include('include/header')
	@include('include/sidebar')
	@include('include/flase')
		@yield('content')
		<script src="{!! asset('js/main.js') !!}"></script>
		@yield('script')
	@include('include/footer')
</body>
</html>