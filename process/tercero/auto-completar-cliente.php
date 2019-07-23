<?php
session_start();
		
		require_once('../../class/classGlobal.php');
	
		$iFilter  = new InputFilter();
		$oGlobals = new Globals();
		
		$tag = $iFilter->process(utf8_decode($_GET['term']));	
		
		if($tag != ""){

			$con_emp = ""; 

			if($_SESSION["tipo_rol"] != 1) $con_emp = " AND id_empresa = ".$_SESSION['id_empresa']; 
				
			$con = " AND (id LIKE ('%$tag%') OR  identificacion LIKE ('%$tag%') OR nombre LIKE ('%$tag%') OR apellido LIKE ('%$tag%')) $con_emp LIMIT 0, 20";
			
			$usuarios = $oGlobals->verOpcionesPor("config_usuarios", $con, 1);
			
			$data       = array();
			$pre_data   = array();
			$final_data = array(); 
			
			if($usuarios != 2){
			
				foreach($usuarios as $usuario) {
					
					$nombre = $usuario["id"]." - ".utf8_encode($usuario['nombre'])." ".utf8_encode($usuario['apellido']);//." - ".$usuario['identificacion'];
					
					$pre_data["value"]          = $usuario['id'];
					$pre_data["label"]          = $nombre;
		
					$final_data = $pre_data;
					array_push($data, $final_data);	
				}
					
				echo json_encode($data);	
			}

		}
	

?>

