@extends("base")

@section('content')
<div class="row" style="margin-bottom:20px;">
	<div class="col-xs-12">
	{{ Lang::get("messages.password-reset-text",array('link' => URL::to('user/remind'))) }}
	</div>
</div>
@if (isset($errors) and $errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }}<br>
	@endforeach
</div>
@endif
<div class="row">
	<div class="col-xs-12">
		<form class="form-horizontal" role="form" method="POST" action="{{ action('RemindersController@postReset') }}">
			<input type="hidden" name="token" value="{{ $token }}" />
			@if (!empty(Session::get('recoveryEmail')))
			<div class="row">
				<div class="col-xs-12 col-xs-6">
					<div class="form-group">
						<label class="col-xs-12 col-sm-6">{{ trans("messages.email-field") }}</label>
						<div class="col-xs-12 col-sm-6">
							<p class="form-control-static">{{ Session::get('recoveryEmail') }}</p>
						</div>
					</div>
				</div>
			</div>
			@endif
			<div class="row">
				<div class="col-xs-12 col-xs-6">
					<div class="form-group">
						<label class="col-xs-12 col-sm-6" for="password">{{ trans('messages.password-field') }}:&nbsp;</label>
						<div class="col-xs-12 col-sm-6">
							<input type="password" class="form-control" id="password" name="password" />
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-xs-6">
					<div class="form-group">
						<label class="col-xs-12 col-sm-6" for="password">{{ trans('messages.password-confirmation-field') }}:&nbsp;</label>
						<div class="col-xs-12 col-sm-6">
							<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">{{ trans('messages.submit-button') }}</button>
		</form>
	</div>
</div>
@stop