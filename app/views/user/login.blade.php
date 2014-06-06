@extends("base")

@section('content')
<div class="row">
	<div class="col-sm-6 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<b>Inicia sesión</b> si ya tienes usuario
				</h3>
			</div>
			<div class="panel-body">
			@section('login_form')
				@if (URL::current()==URL::to('user/login') and isset($errors) and $errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }}<br>
					@endforeach
				</div>
				@endif
				<form role="form" method="POST" action="{{ URL::to('user/login') }}">
					<div class="form-group @if(URL::current()==URL::to('user/login') and $errors->first('email')){{ 'has-error' }}@endif">
						<label for="login_email">Email</label>
						<input type="email" class="form-control" id="login_email" name="login_email" placeholder="Dirección de correo electrónico (Ej: prueba@arribasjavier.com)" value="{{ Input::old('login_email') }}">
					</div>
					<div class="form-group @if(URL::current()==URL::to('user/login') and $errors->first('password')){{ 'has-error' }}@endif">
						<label for="login_password">Contraseña</label>
						<input type="password" class="form-control" id="login_password" name="login_password" placeholder="Contraseña con la que te registraste" value="{{ Input::old('login_password') }}">
						<br>
						<a href="{{ URL::to('user/remind') }}">He olvidado la contraseña</a>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="login_remember" />
							Recordarme en este ordenador
						</label>
					</div>
					<button type="submit" class="btn btn-primary">Entrar</button>
				</form>
			@show
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-xs-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					O bién <b>registrate</b> para conseguir acceso
				</h3>
			</div>
			<div class="panel-body">
			@section('register_form')
				@if (URL::current()==URL::to('user/register') and isset($errors) and $errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }}<br>
					@endforeach
				</div>
				@endif
				<form method="POST" action="{{ URL::to('user/register') }}" role="form">
					<div class="form-group @if(URL::current()==URL::to('user/register') and $errors->first('name')){{ 'has-error' }}@endif">
						<label for="register_name">Nombre completo</label>
						<input type="text" class="form-control" id="register_name" name="register_name" placeholder="Nombre completo con apellidos" value="{{ Input::old('register_name') }}"/>
					</div>
					<div class="form-group @if(URL::current()==URL::to('user/register') and $errors->first('username')){{ 'has-error' }}@endif">
						<label for="register_username">Nombre de usuario</label>
						<input type="text" class="form-control" id="register_username" name="register_username" placeholder="Nombre corto del usuario" value="{{ Input::old('register_username') }}"/>
					</div>
					<div class="form-group @if(URL::current()==URL::to('user/register') and $errors->first('email')){{ 'has-error' }}@endif">
						<label for="register_email">Email</label>
						<input type="email" class="form-control" id="register_email" name="register_email" placeholder="Dirección de correo electrónico (Ej: prueba@arribasjavier.com)" value="{{ Input::old('register_email') }}">
					</div>
					<div class="form-group @if(URL::current()==URL::to('user/register') and $errors->first('password')){{ 'has-error' }}@endif">
						<label for="register_password">Contraseña</label>
						<input type="password" class="form-control" id="register_password" name="register_password" placeholder="Contraseña con la que te registraste">
					</div>
					<button type="submit" class="btn btn-info">Registrarse</button>
				</form>
			@show
			</div>
		</div>
	</div>
</div>
@stop