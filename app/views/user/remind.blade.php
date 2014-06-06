@extends("base")

@section('content')
	<div class="row" style="margin-bottom:20px;">
		<div class="col-xs-12">
			{{ trans('messages.password-recovery-system') }}
		</div>
	</div>
	@if(!empty(Session::get('status')))
	<div class="alert alert-success">
		{{ Session::get('status') }}
	</div>	
	@else
		@if (isset($errors) and $errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
			{{ $error }}<br>
			@endforeach
		</div>
		@endif
		<div class="row">
			<div class="col-xs-12">
				<form class="form-inline" role="form" method="POST" action="{{ action('RemindersController@postRemind') }}">
					<div class="form-group @if($errors->first('email')){{ 'has-error has-feedback' }}@endif">
						<label class="" for="email">{{ trans('messages.password-recovery-email-label') }}:&nbsp;</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="{{ trans('messages.password-recovery-email-placeholder') }}" value="{{ Input::old('email') }}">
						@if($errors->first('email'))
						<span class="glyphicon glyphicon-remove form-control-feedback"></span>
						@endif
					</div>
					<button type="submit" class="btn btn-primary">{{ trans('messages.password-recovery-email-button') }}</button>
				</form>
			</div>
		</div>
	@endif
@stop