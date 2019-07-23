<?php
session_start();
		
		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();
		
		$tag = $iFilter->process(utf8_decode($_GET['term']));			
		$con = "";
		$ven = "";
		
		if($tag != "")		$con = " AND (id LIKE ('%$tag%') OR ciudad LIKE ('%$tag%')) LIMIT 0, 12";
		

		
		$ciudades = $oGlobals->verOpcionesPor("ciudades", $con, 1);
		
		$data       = array();
		$pre_data   = array();
		$final_data = array();
		
		foreach($ciudades as $ciudad) {
			 
				$pre_data["value"] = $ciudad['id'];
				$pre_data["label"] = $ciudad['ciudad'];
				
				$final_data = $pre_data;
				array_push($data, $final_data);	
			
		}
	
		echo json_encode($data);
		

?>
