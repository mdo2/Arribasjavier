<?php
/*
|--------------------------------------------------------------------------
| IncludeHelper
|--------------------------------------------------------------------------
|
| A helper class that includes stuff into view changing with variables like enviroment
|
*/

class IncludeHelper{
	
	/**
	 * Return the correct way to include a CSS stylesheet depending in less existence and enviroment
	 *
	 * @return String
	 */
	static function includeCSS($url,$have_less=false){
		$env=App::environment();
		return "<link rel='stylesheet".(($have_less and $env=="local")?"/less":"")."' href='".URL::to($url).($have_less?($env=="local"?".less":".min.css"):".css")."' />";
	}
	
	
}


?>