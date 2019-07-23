<?php
session_start();
		
		if($_POST['id'] != "" && $_POST['table'] != "" && $_POST['value'] != ""){
								

			require_once '../../classP/classGlobal.php';
			
			$oGlobals    = new Globals();	

			
			$id    = $oGlobals->iFilter->process($_POST['id']);
			$table = $oGlobals->iFilter->process($_POST['table']);
			$value = $oGlobals->iFilter->process($_POST['value']);
			$up_doc["cerrado"] = $value;
			$up_doc['fecha_modificacion'] = date("Y-m-d h:i:s");
			
			$mov   = $oGlobals->verOpcionesPor($table, "AND id = $id", 0);
			
			if($mov != 2){
				
				if($table == "documentos"){
					
					$sql      = "SELECT SUM(cantidad) as cantidad FROM documentos_productos WHERE documento = '".$mov["documento"]."'";
					$cantidad = $oGlobals->verPorConsultaPor($sql, 0);
					
					$up_doc["cantidad_productos"] = $cantidad["cantidad"];
				}
				
				$update = $oGlobals->update_data_array($up_doc, $table, "id", $id);
			
			}
		} 

?>
