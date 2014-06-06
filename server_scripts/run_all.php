<?php
	/*
	|--------------------------------------------------------------------------
	| Executes all server scripts
	|--------------------------------------------------------------------------
	*/
	
	namespace ServerScripts;
	
	/**
	 * Process the less files in the given directory path
	 *
	 * @return true|String
	 */
	function processDir($path){
		$dir_sons=scandir($path);
		foreach($dir_sons as $son){
			if($son!=pathinfo(__FILE__, PATHINFO_BASENAME) and $son!="." and $son!=".."){
				if(is_dir($path."/".$son)){
					$out=processDir($path."/".$son);
					if($out!==true)
						return $out;
				}
				elseif(substr($son,-4)===".php"){
					echo "\n----- ".ucfirst(substr($son,0,-4))." -----\n";
					include($path."/".$son);
					echo "\n------".str_repeat("-",strlen($son)-4)."------\n";
				}
			}
		}
		return true;
	}
	
	$server_scripts_path=__DIR__;
	echo "\nSERVER SCRIPTS\n\n";
	$out=processDir($server_scripts_path);
	if($out!==true)
		echo $out;
	else
		echo "\n\nALL SERVER SCRIPTS processed well!!!\n";
?>