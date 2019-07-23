<?php
session_start();
		
	if(trim($_POST["documento_cruce"]) != "" && trim($_POST["documento"]) != "" && trim($_POST["tipo_movimiento"]) != ""){	
		

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$con_emp = ""; 

		if($_SESSION["tipo_rol"] != 1) $con_emp = " AND id_empresa = ".$_SESSION['id_empresa']; 
		
		$documento       = $oGlobals->iFilter->process($_POST["documento"]);
		$documento_cruce = $oGlobals->iFilter->process($_POST["documento_cruce"]);
		$tipo_movimiento = $oGlobals->iFilter->process($_POST["tipo_movimiento"]);
		$rc			     = $oGlobals->verOpcionesPor("mov_cartera"," AND id = '$documento' ".$con_emp, 0);
		$cerrado         = 0;

		$con_emp = " AND id_empresa = ".$rc["id_empresa"];
		
		if($tipo_movimiento != 'Ajuste al peso'){
		
			if($tipo_movimiento == 'Pago factura' || $tipo_movimiento == 'Anticipos') {if($_POST["credito"] == "") { echo "<div class='error'>Ingresar el valor en el crédito</div>"; return;}}
			else  {if($_POST["debito"] == "")  { echo "<div class='error'>Ingresar el valor en el débito</div>"; return;}}
		
		}
		
		if($rc != 2){
		
			$rem       = $oGlobals->verOpcionesPor("mov"," AND documento = '$documento_cruce' ".$con_emp, 0);
			$mov_r_doc = $oGlobals->verTotalesMovRPor(" AND id_documento_cartera = '$documento' ".$con_emp, 0);

			
			
			if($mov_r_doc != 2){
				
				if($tipo_movimiento != "Descuento" && $tipo_movimiento != "Ajuste al peso"){
					
					if($mov_r_doc["t_documento"] != "")	$val_doc = $mov_r_doc["t_documento"];
					else								$val_doc = $mov_r_doc["t_credito"];
					
					if($tipo_movimiento == "Anticipos"){
						
						$val_doc = $mov_r_doc["t_debito"] - $mov_r_doc["t_credito"];
						if(isset($_POST["credito"]) && $_POST["credito"] != $val_doc){ echo "<div class='error'>El valor ingresado es mayor al pagado</div>"; return;}
					}
					else {
						
						if($tipo_movimiento != "Nota debito"){
							if(isset($_POST["debito"]) && $_POST["debito"] > $val_doc){ echo "<div class='error'>El valor a ingresar es incorrecto y el documento NO cuadrará, o debes hacer un anticipo por la diferencia</div>"; ;}
						}
					}
					
				}
				else {
					
					if($mov_r_doc["t_documento"] != "")	$val_doc = $mov_r_doc["t_documento"];
					else								$val_doc = $mov_r_doc["t_credito"];
					
					if(isset($_POST["debito"]) && $_POST["debito"] > $val_doc){ echo "<div class='error'>El valor ingresado es mayor al pagado</div>"; return;}
				}
			}
			
			if($rem != 2){
				
				$_POST["documento"]				= $rc["documento"];
				$_POST["id_documento_cartera"]	= $rc["id"];
				$_POST["id_tipo_documento"] 	= $rem["id_tipo_documento"];
				$_POST["tipo_documento"] 		= $rem["tipo_documento"];
				$_POST["cliente_codigo"] 		= $rem["cliente_codigo"];
				$_POST["cliente_identifiacion"] = $rem["cliente_identificacion"];
				$_POST["cliente_nombre"] 		= utf8_encode($rem["cliente_nombre"]);
				$_POST["fecha_vence"] 			= $rem["fecha_vence"];
			}
			
			$_POST['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST['id_usuario_creador'] = $_SESSION['idUsuario'];
			$_POST['id_empresa'] 		 = $rc["id_empresa"];
			$_POST['fecha_registro'] 	 = date("Y-m-d h:i:s");
			
			$car_rc = $oGlobals->insert_data_array($_POST, "mov_r_cartera");

			if($car_rc != 0) {
				
				if($tipo_movimiento == 'Pago factura'){
					
					$factura = $oGlobals->verOpcionesPor("mov_cartera", " AND documento = '$documento_cruce' ".$con_emp, 0);
					
					$u_mov["saldo"] = $factura["saldo"] - $_POST["credito"];
					
					if($u_mov["saldo"] == 0) $u_mov["cerrado"] = 1;
					
					$actu = $oGlobals->update_data_array($u_mov, "mov_cartera", "id", $factura["id"]);
				}
				
				$movimiento = $oGlobals->verOpcionesPor("mov_r_cartera", " AND id = $car_rc ".$con_emp, 0);
				
				echo "<div class='exito'>El registro ha sido añadido con éxito</div>";
				echo "<script>
						$('#tipo_movimiento').val('');
						$('#debito').val('');
						$('#credito').val('');
				      </script>";
?>
				<script>
					
					html = '<tr id="trtcarr_<?= $movimiento["id"];?>">\
						      <td class="p-a-1" align="center"><?= utf8_encode($movimiento["tipo_movimiento"]);?></td>\
			                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($movimiento["cliente_nombre"]);?></div></td>\
			                  <td class="p-a-1" align="right"><?= utf8_encode($movimiento["tipo_documento"]);?></td>\
			                  <td class="p-a-1" align="right"><?= ($movimiento["documento_cruce"]);?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($movimiento["debito"], 0, "", ".");?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($movimiento["credito"], 0, "", ".");?></td>\
			                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($movimiento["cliente_identifiacion"]);?></div></td>\
			                  <td class="p-a-1" align="center"><?= $oGlobals->fecha($movimiento["fecha_vence"]);?></td>\
		                      <td align="center" width="8%">\
		                        <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $movimiento["id"];?>\', \'add_factura_a_rc\', \'load_modulo\', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>\
		                        <i onclick="Funciones.eliminar_registro(\'<?= $movimiento["id"];?>\',\'mov_r_cartera\',\'rspdasds\', \'trtcarr_\');" class="btn btn-xs fa fa-trash"></i>\
		                      </td>\
			              </tr>';
			         $("#tr_body_ref_rc").append(html);     

				</script>
<?php				      		  		  
			}
			else echo "<div class='error'>No se ha podido añadir el registro</div>";
			
		}
		else echo "asdfasdfs";
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>


