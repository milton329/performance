<?php
session_start();
			
	if($_POST['variable'] != "" && $_POST['tabla'] != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals  = new Globals();	
		
		$variable = explode("_", $oGlobals->iFilter->process($_POST['variable']));
		$tabla    = $oGlobals->iFilter->process($_POST['tabla']);
		
		$select  = ""; 		
		$insert  = 0;
		$delete  = 2;
		
		if($tabla == "config_cajas_roles"){
			
			$caja 	= $variable[0];
			$id_rol = $variable[1];
			
			$array["id_caja"]  = $caja;
			$array["id_rol"]   = $id_rol;
			
			$condicion = " AND id_caja = $caja AND id_rol = $id_rol";
			
			
		}
		else if($tabla == "usuarios_almacenes"){
			
			$codigotienda 	= $variable[0];
			$codigousuario 	= $variable[1];
			
			$array["codigotienda"]  = $codigotienda;
			$array["codigousuario"] = $codigousuario;
			
			$condicion = " AND codigotienda = $codigotienda AND codigousuario = $codigousuario";
			
		} 
		else if($tabla == "estado_planilla"){
			
			
		}
		else {
		
			$id_modulo 			   = $variable[0];
			$id_modulo_opcion 	   = $variable[1];
			$id_modulo_opcion_tres = $variable[2];
			$id_informe            = $variable[3];
			$id_rol				   = $variable[4];

			$array["id_informe"] 			= $id_informe;
			$array["id_modulo"]             = $id_modulo;
			$array["id_modulo_opcion"]      = $id_modulo_opcion;
			$array["id_modulo_opcion_tres"] = $id_modulo_opcion_tres;
			$array["id_rol"]                = $id_rol;
			$array["creado_por"]            = $_SESSION["nombre"]." ".$_SESSION["apellido"];
			$array["id_usuario_creador"]    = $_SESSION["idUsuario"];
			$array["fecha_registro"]        = date("Y-m-d h:i:s"); 
	
			if($id_modulo != 0)             $select .= " AND id_modulo = $id_modulo ";
			if($id_modulo_opcion != 0)      $select .= " AND id_modulo_opcion = $id_modulo_opcion ";
			if($id_modulo_opcion_tres != 0) $select .= " AND id_modulo_opcion_tres = $id_modulo_opcion_tres ";
			if($id_informe != 0) 			$select .= " AND id_informe = $id_informe ";
			
			$condicion = $select." AND id_rol = $id_rol";
		}
		
		$existe = $oGlobals->verOpcionesPor($tabla, $condicion, 0);
		
		if($existe == 2)	$insert = $oGlobals->insert_data_array($array, $tabla);
		else 				$delete = $oGlobals->eliminar_por_condicion($tabla, "id", $existe["id"], "");
		
		if($insert != 0) echo "<center>El permiso fue asignado correctamente</center><br />";
		if($delete != 2) echo "<center>El permiso fue borrado correctamente</center><br />";
		
		
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




