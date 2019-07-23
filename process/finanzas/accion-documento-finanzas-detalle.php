<?php
session_start();
		
	if(trim($_POST["documento"]) != "" && trim($_POST["tipo_movimiento"]) != ""){	
		

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$con_emp = ""; 

		if($_SESSION["tipo_rol"] != 1) $con_emp = " AND id_empresa = ".$_SESSION['id_empresa']; 
		
		$documento       = $oGlobals->iFilter->process($_POST["documento"]);
		$tipo_movimiento = $oGlobals->iFilter->process($_POST["tipo_movimiento"]);
		$rc			     = $oGlobals->verOpcionesPor("mov_cartera"," AND id = '$documento' ".$con_emp, 0);
		$cerrado         = 0;

		$con_emp = " AND id_empresa = ".$rc["id_empresa"];
		
		if($rc != 2){
		

			$_POST["documento"]				= $rc["documento"];
			$_POST["id_documento_cartera"]	= $rc["id"];
			$_POST['creado_por'] 		 	= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST['id_usuario_creador'] 	= $_SESSION['idUsuario'];
			$_POST['id_empresa'] 		 	= $rc["id_empresa"];
			$_POST['fecha_registro'] 	 	= date("Y-m-d h:i:s");
			
			$car_rc = $oGlobals->insert_data_array($_POST, "mov_r_cartera");

			if($car_rc != 0) {
				
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
			                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($movimiento["detalle"]);?></div></td>\
			                  <td class="p-a-1" align="right"><?= number_format($movimiento["debito"], 0, "", ".");?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($movimiento["credito"], 0, "", ".");?></td>\
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


