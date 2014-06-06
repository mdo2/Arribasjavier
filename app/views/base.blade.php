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
		<div class="main-content">
			<div class="container">
				@yield('content')
			</div>
		</div>
	
		@section("footer")
			@include('inc.footer_base')
		@show
		
		@section("foot")
			@include("inc.foot_base")
		@show
    </body>
</html>