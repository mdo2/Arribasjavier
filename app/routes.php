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

Route::get('user/{page}', function($page="login")
{
	if(Auth::check()){
		if($page=="login")
			return Redirect::to("home");
	}
	elseif($page!=="login")
		return Redirect::to("user/login");
    return View::make("user.".$page);
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
