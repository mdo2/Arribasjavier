<?php
	/*
	|--------------------------------------------------------------------------
	| Less processor script
	|--------------------------------------------------------------------------
	|
	| This script process all the less files stored at the public folder and
	| put the .min.css file at the same folder.
	|
	*/
	
	namespace ServerScripts\Less;
	
	/**
	 * Process the less files in the given directory path
	 *
	 * @return true|String
	 */
	function processDir($path){
		$dir_sons=scandir($path);
		foreach($dir_sons as $son){
			if($son!="." and $son!=".."){
				if(is_dir($path."/".$son)){
					// echo "\nProcessing: $son";
					$out=processDir($path."/".$son);
					if($out!==true)
						return $out;
				}
				elseif(substr($son,-5)===".less"){
					$out=0;
					$output=array();
					exec("lessc -x ".$path."/".$son." ".$path."/".(substr($son,0,-4)."min.css"),$output,$out);
					exec("lessc ".$path."/".$son." ".$path."/".(substr($son,0,-4)."css"),$output,$out);
					if($out!==0){
						return false;
					}
				}
			}
		}
		return true;
	}
	
	//Path a la carpeta donde empezar a procesar de manera recursiva
	$start_path=__DIR__."/../public";
	$start_dir=dir($start_path);
	echo "Start process at path: ".$start_dir->path."\n";
	$out=processDir($start_path);
	if($out!==true)
		echo $out;
	else
		echo "\nLess files processed well!";
?>