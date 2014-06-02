<!DOCTYPE html>
<html lang="en">
	<head>
		@section("head")
			@include("inc.head_base")
		@show
	</head>
    <body>
		@section("header")
			@include('inc.header_base')
		@show
		
		@section("navigation")
			@include("navigation.navigation")
		@show
		
		<div class="container">
			@yield('content')
		</div>
	
		@section("footer")
		@show
		
		@section("foot")
			@include("inc.foot_base")
		@show
    </body>
</html>