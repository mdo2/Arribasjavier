<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::to("/") }}">@rribasjavier</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
			@section('nav_links')
				<li><a href="#">Aplicaciones</a></li>			
			@show
			</ul>
			<ul class="nav navbar-nav navbar-right">			
				@if(Auth::check())
				 <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to('/user/logout') }}">Logout</a></link>
					</ul>
				</li>
				@else
				<li class="@if(URL::to('/user/login')==URL::current()){{ 'active' }}@endif"><a href="{{ URL::to('/user/login') }}">Login/Register</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>