<?php
session_start();

	if(trim($_POST["text_cliente"]) != ""){
		

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();
		
		$variable = explode("-", $oGlobals->iFilter->process($_POST['text_cliente']));			
		
		if(isset($variable[0])){
			
			$codigo = trim($variable[0]);
			$ven    = "";
			
			if($_SESSION['rol'] == 0)	$ven = "AND vendedor = ".$_SESSION['idUsuario']; 
			
			$con 	= " AND codigo = '$codigo' $ven";
			$arbol  = "../../pedidos/";
			
			
			$tercero     = $oGlobals->verOpcionesPor("terceros", $con, 0);
			$cupoUsa     = $oGlobals->verCupoUsadoTercero(" AND ped.cliente_codigo = '$codigo' AND ped.facturado = 0", 0);
			$cupoUsaFac  = $oGlobals->verCupoUsadoCartera(" AND car.cliente = '$codigo'", 0);
			
			if($tercero != 2){
				
				unset($_SESSION["tercero"]);
				unset($_SESSION["usado"]);
				
				if(isset($_SESSION["documentos"])){
					
					foreach($_SESSION["documentos"] as $docs) { unset($_SESSION[$docs["num_session"]]);}
					unset($_SESSION["documentos"]);
				
				}
				
				$_SESSION["tercero"]  = $tercero;
				$_SESSION["usado"]    = $cupoUsa;
				$_SESSION["usadoFac"] = $cupoUsaFac;
						
				include '../../pedidos/estructura/estructura-tab-info-tercero-pedido.php';
			
			}
			else echo "<div class=''>El cliente NO existe o no tiene permisos para consultarlo</div>";
		}
		
	}

?>
