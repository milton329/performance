<?php
		
		$opciones = 2;
		
		if($action == "menu") {
			
			$sql  = "SELECT cmot.*
					 FROM config_modulos_opciones_tres_roles AS cmotr
					 INNER JOIN config_modulos_opciones AS cmo ON cmotr.id_modulo_opcion = cmo.id
					 INNER JOIN config_modulos_opciones_tres AS cmot ON cmotr.id_modulo_opcion_tres = cmot.id
					 WHERE cmotr.id_rol = $rol AND cmo.directorio = '$folderDirect'"; //AND cmotr.id_modulo_opcion = $id
			$opciones = $oGlobals->verPorConsultaPor($sql, 1);
			
			$action = $url[1];
		}
		else{
			
			$sql  = "SELECT cmo.*
					 FROM config_modulos_opciones_roles AS cmor
					 LEFT JOIN config_modulos_opciones AS cmo ON cmor.id_modulo_opcion = cmo.id
					 WHERE 1=1 AND cmo.directorio = '$folderDirect' AND cmor.id_rol = $rol
					 ORDER BY cmo.opcion_modulo DESC";
			$opciones = $oGlobals->verPorConsultaPor($sql, 1);
		}
		
		if($action == "informe") {
			
			if($folderDirect == "informes")	include 'ver/ver-informe.php';
		}
		
	
		if($opciones != 2){	
			
			foreach($opciones as $opcion) { 

				if($action == $opcion["enlace"]) include $opcion["archivo"].'.php'; 
			}
		}
?>