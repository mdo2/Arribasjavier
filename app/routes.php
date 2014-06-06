<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Base Route */

Route::get('/', function()
{
	return View::make('base');
});

/* User routes */

Route::group(array('prefix' => 'user'), function()
{
	/* Login */
	Route::get("login",array("before"=>"guest",function (){
		return View::make("user.login");
	}));
	
	Route::post("login",array("before"=>"guest",function(){
		$data=array(
			"email" => Input::get("login_email"),
			"password" => Input::get("login_password")
		);
		$validator=Validator::make($data, array(
			"email" => "required|email",
			"password" => "required|min:6"
		));
		if($validator->passes()){
			if (Auth::attempt(array('email' => $data["email"], 'password' => $data['password']),(!empty(Input::get("login_remember")) and Input::get("login_remember")==="on")))
				return Redirect::intended("/");
			else
				return Redirect::back()->withInput()->withErrors(array("bad_credentials" => ["El email o la contraseña son incorrectos."]));
		}
		else
			return Redirect::back()->withInput()->withErrors($validator);
	}));
	
	/* Register */
	Route::post("register",array("before"=>"guest","uses" => "UserController@store"));
	Route::get("register",array("before"=>"guest",function(){
		return View::make("user.login");
	}));
	
	/* Remind */
	Route::get("remind",array("before"=>"guest","uses"=>"RemindersController@getRemind"));
	Route::post("remind",array("before"=>"guest","uses"=>"RemindersController@postRemind"));
	
	Route::get("reset/{token}",array("before"=>"guest","uses"=>"RemindersController@getReset"));
	Route::post("reset",array("before"=>"guest","uses"=>"RemindersController@postReset"));
	
	/* Resto */
	Route::group(array('before' => 'auth'), function()
	{
		Route::get('/', function()
		{
			return View::make("user.profile");
		});
		
		Route::get("logout",function(){
			Auth::logout();
			return Redirect::to("/");
		});
		
		Route::get('{page}', function($page="login")
		{
			return View::make("user.".$page);
		});
	});
});


/*
|--------------------------------------------------------------------------
| Composers
|--------------------------------------------------------------------------
|
| Let's set some composers
|
*/
View::composer('BaseComposer' , 'base');
