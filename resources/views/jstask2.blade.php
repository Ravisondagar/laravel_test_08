@extends('Admin.layouts.listing')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<h1>25/02/2019</h1>

		<h1>Give div's all element selected background.</h1>

		<select>
			<option value="orange">Orange</option>
			<option value="pink">Pink</option>
			<option value="blue">Blue</option>
		</select>

		<div>
			<p>Hello</p>
			<p>How are you ?</p>
		</div>

		<div></div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('select').change(function(){
		var color_value = $('select').val();
		$('p').css('background-color',color_value);
		$('p:last').remove();
		$('p:last').parent().next('div').append('<p>'+ color_value +' Background applied.</p>');
		setTimeout(function() {
			    window.location.reload();
			}, 3000);
	});
</script>
@endsection