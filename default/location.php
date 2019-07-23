<?php	
	$url			= $_SERVER["HTTP_HOST"];
	if($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "localhost:8080"){
		$urlPartes 		= explode("/", $_SERVER["PHP_SELF"]);
		$urlDirect 		= $urlPartes[1];
		$folderDirect 	= $urlPartes[2];
	}else{
		$urlPartes 		= explode("/", $_SERVER["PHP_SELF"]);
		$urlDirect 		= $urlPartes[0];
		$folderDirect 	= $urlPartes[2];
	}	
?>