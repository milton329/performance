<?php

		$con_emp = " AND id_empresa = ".$_SESSION['id_empresa'];

		if(isset($_POST["bodega_salida"]) && $_POST["bodega_salida"] != ""){
		
			$variable = $_POST["bodega_salida"];
			
		}
		else if(isset($_SESSION["bodega_salida"])){

			$variable = $_SESSION["bodega_salida"];
		}
	    else {
			
			$bodegas  = $oGlobals->verOpcionesPor("bodegas", " AND inventario_activo = 1 ".$con_emp, 1);
			$variable = "";
			$cant_bod = count($bodegas);
			$cant     = 1;
			
			foreach($bodegas as $bodega){
				
				if($cant < $cant_bod) $coma = ", "; else $coma = "";
				$variable.= $bodega["codigo_bodega"].$coma;
				$cant++;
			}
		}
		
		$variable;
				
		/*$cant_ped   = $oPedido->cantidadPedida(" AND codigo = '$codigo' AND bodega IN ($variable)", 0);
		$entrada    = $oInventario->verEntradasPor(" AND codigo = '$codigo' AND bodega_entrada IN ($variable) ", 0);
		$salida     = $oInventario->verSalidasPor(" AND codigo = '$codigo' AND bodega_salida IN ($variable)", 0);

		$existencia = $entrada["entrada"] - $salida["salida"];
		
			
		$disponible = ($entrada["entrada"] - $salida["salida"]) - $cant_ped["can_ped"];*/
?>
