<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('user.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$validator=Validator::make(Input::only("email"), array(
			"email" => "required|email|exists:users"
		));
		if($validator->passes())
		{
			switch ($response = Password::remind(Input::only('email'),function($message){
				$message->subject("Reseteo de contraseña de @rribasjavier");
			}))
			{
				case Password::INVALID_USER:
					return Redirect::back()->withErrors(array($response,Lang::get($response)));

				case Password::REMINDER_SENT:
					Session::set('recoveryEmail',Input::get('email'));
					return Redirect::back()->with('status', Lang::get($response));
			}
		}
		else
			return Redirect::back()->withInput()->withErrors($validator);
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if(is_null($token))
			App::abort(404);
		return View::make('user.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'password', 'password_confirmation', 'token'
		);
		$credentials["email"]=Session::get('recoveryEmail');
		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->withErrors(array('error' => Lang::get($response)));

			case Password::PASSWORD_RESET:
				$user = User::where('email','=',$credentials["email"])->firstOrFail();
				Auth::login($user);
				return Redirect::to('/');
		}
	}
}
