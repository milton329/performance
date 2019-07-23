<?php
session_start();
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$criterio    = $oGlobals->iFilter->process($_GET['term']);			
		$con     = "";
		$con_emp = ""; 

		if($_SESSION["tipo_rol"] != 1) $con_emp = " AND id_empresa = ".$_SESSION['id_empresa']; 
		
		$sql = "SELECT * FROM servicios WHERE (codigo_servicio LIKE '%$criterio%' OR nombre_servicio LIKE '%$criterio%') $con_emp  LIMIT 15";
		
		$productos = $oGlobals->verPorConsultaPor($sql, 1);
		
		$data       = array();
		$pre_data   = array();
		$final_data = array();
		
		foreach($productos as $producto) {

			$empresa = $oGlobals->verOpcionesPor("empresas", " AND id = ".$producto["id_empresa"], 0);
		
			$pre_data["value"] = $producto['codigo_servicio'];
			$pre_data["label"] = utf8_encode($producto['codigo_servicio'])." - ".utf8_encode($producto['nombre_servicio']);
			$pre_data["precio"]= $producto['valor_servicio'];
				
			$final_data = $pre_data;
			array_push($data, $final_data);	
		}
			
		echo json_encode($data);
		

?>
