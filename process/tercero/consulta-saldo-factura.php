<?php
session_start();

	if($_POST["documento"] != ""){
		

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$documento       = $oGlobals->iFilter->process($_POST['documento']);
		$tipo_movimiento = $oGlobals->iFilter->process($_POST['tipo_movimiento']);
		$documento_prin  = $oGlobals->iFilter->process($_POST['documento_prin']);

		$rc = $oGlobals->verOpcionesPor("mov_cartera", " AND id = '$documento_prin' AND cerrado = 0", 0);

		$con_emp = " AND id_empresa = ".$rc["id_empresa"];
		
		
		$form = $oGlobals->verOpcionesPor("tipos_movimientos", " AND tipo_movimiento = '$tipo_movimiento'", 0);
		
		if($form != 2){
			
			echo '<script>$("#credito").val(""); $("#debito").val("");</script>';
			
			if($form["naturaleza"] == 1){
				
				echo '<script>
							$("#credito").removeAttr("disabled", "disabled");
							$("#debito").removeAttr("disabled", "disabled");
							$("#credito").attr("disabled", "disabled");
							$("#debito").attr("enabled", "enabled");
						</script>';
			
			} else if($form["naturaleza"] == 2){
				
				echo '<script>
							$("#credito").removeAttr("disabled", "disabled");
							$("#credito").attr("enabled", "enabled");
							$("#debito").attr("disabled", "disabled");
						</script>';
			
			} else if($form["naturaleza"] == 3){
				
				echo '<script>
							
							$("#credito").removeAttr("disabled", "disabled");
							$("#debito").removeAttr("disabled", "disabled");
							$("#credito").attr("enabled", "enabled");
							$("#debito").attr("enabled", "enabled");
					  </script>';
			}
			
		}
		
		if($tipo_movimiento == "Pago factura"){

			$factura = $oGlobals->verOpcionesPor("admin_mov_cartera", " AND documento = '$documento' AND cerrado = 0", 0);
			$factura = $oGlobals->verSaldoCarteraPor("AND car.documento = '$documento' AND car.id_empresa = ".$rc["id_empresa"], 0);
			
			if($factura != 2) echo "<script>$('#credito').val('".$factura["cupo_usado_cartera"]."');</script>";
			else echo "<div class='error'>La factura no se puede procesar</div>";
		
		} else if($tipo_movimiento != "Descuento" && $tipo_movimiento != "Ajuste al peso"){
			
			///echo $documento_prin;

			$mov_r_doc = $oGlobals->verTotalesMovRPor(" AND id_documento_cartera = '$documento_prin' ".$con_emp, 0);
			
			if($mov_r_doc["t_documento"] != "")	$val_doc = $mov_r_doc["t_documento"];
			else								$val_doc = $mov_r_doc["t_credito"];
			
			
			if($tipo_movimiento == "Anticipos")  { 
				
				$val_doc = $mov_r_doc["t_debito"] - $mov_r_doc["t_credito"];
				echo "<script>$('#credito').val('".$val_doc."');</script>";
				return;
			}
				
			if($mov_r_doc != 2) echo "<script>$('#debito').val('".$val_doc."');</script>";
		}

		
	}
			


?>
