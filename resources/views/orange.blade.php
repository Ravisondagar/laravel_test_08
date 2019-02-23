@extends('layouts.listing')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	<div id="me">Please give me some orange colour.</div>
		<div class="section-div">Please give me some orange colour.</div>
		<div class="min-height-200px">
			<div class="page-header">
				<ul>
					<li>Please give me some orange colour.</li>
					<li></li>
					<li></li>
					<li>Please give me some orange colour.</li>
					<li></li>
					<li>Please give me some orange colour.</li>
				</ul>
				<section>
					<p>Treacherous HTML ahead!</p>

					<div id="section-div">
						----- Please give me some orange colour. -----
					</div>

					<div></div>

					<div>----- Please give me some orange colour.</div> -----
				</section>

				<section>

					<p>Can you make this span orange too? <span>----- Please give me some orange -----colour.</span></p>
					<p>But not <span>this one!</span></p>

					<div></div>

					<p>Yes, I know, HTML can be mean sometimes. But it is not on purpose! 
						<span>Or is <i>it?</i> <i>----- Please give me some orange colour.</i></span></p> -----

						<div><div>----- Please give me some orange colour.</div></div> -----
					</section>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		/*$("div:contains('orange')").each(function () {
		    $(this).html($(this).css("background-color: orange"));
		});
		$("li:contains('orange')").each(function () {
		    $(this).html($(this).html().replace("orange", '<span style="color: orange ">orange</span>'));
		});
		$("p:contains('orange')").each(function () {
		    $(this).html($(this).html().replace("orange", '<span style="color: orange ">orange</span>'));
		});*/
		$("p:contains(orange)").css("background-color", "orange");
		$("li:contains(orange)").css("background-color", "orange");
		$("#me:contains(orange)").css("background-color", "orange");
		$("#section-div:contains(orange)").css("background-color", "orange");
		$(".section-div:contains(orange)").css("background-color", "orange");


		/*var elementCount = $("orange").css( "border", "3px solid red" ).length;
		$( "body" ).prepend( "<h3>" + elementCount + " elements found</h3>" );*/

		// Replace 'td' with your html tag
		    /*$("div").html(function() { 

		    // Replace 'ok' with string you want to change, you can delete 'hello everyone' to remove the text
		          return $(this).css("background-color", "orange");  

		    });*/
	});
</script>
@endsection