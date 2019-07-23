<?php
session_start();

	if(trim($_POST['documento']) != "" && trim($_POST['id_prod']) != "" && trim($_POST['txt_producto']) != "" 
		&& (trim($_POST['salida']) != "" || trim($_POST['entrada']) != "") && trim($_POST['valor_unitario']) != "") {

		

		require_once('../../class/classGlobal.php');
 
		$oGlobals    = new Globals();

		$id         = $oGlobals->iFilter->process($_POST["id"]);
		$ref     	= explode("-", $oGlobals->iFilter->process($_POST['txt_producto']));	
		$documento  = $oGlobals->iFilter->process($_POST['documento']);	
		$codigo  	= $ref[0];
		
		$mov	  = $oGlobals->verOpcionesPor("mov", " AND id = '$documento'", 0);
		$producto = $oGlobals->verOpcionesPor("referencias", " AND codigo = '$codigo'", 0);
		$exis_mvr = $oGlobals->verOpcionesPor("mov_r", " AND documento = '".$mov["documento"]."' AND codigo = '$codigo'", 0);
		
		//if($exis_mvr != 2) { echo '<div class="error">La referencia ya se encuentra en el documento</div>'; return;}
		
		if($producto != 2){
			
			
			$_POST["id_entrada"] 	 = $mov["id"];
			$_POST["documento"] 	 = $mov["documento"];
			$_POST["tipo_documento"] = $mov["tipo_documento"];
			$_POST["codigo"] 		 = $producto["codigo"];
			$_POST["referencia"] 	 = $producto["referencia"];
			$_POST["detalle"] 		 = utf8_encode($producto["nombre"]);
			$_POST["periodo"] 		 = $mov["periodo"];
			$_POST["year"]			 = $mov["year"];
			$_POST["entrada"] 		 = 0;
			$_POST["sub_total"]		 = $_POST["salida"] * $_POST["valor_unitario"];
			$_POST["bodega_salida"]  = $mov["bodega_salida"];
			$_POST["bodega_entrada"] = $mov["bodega_entrada"];
			
			
			
			if($exis_mvr == 2) {
				
				$_POST['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador'] = $_SESSION['idUsuario'];
				$_POST['id_empresa'] 		 = $mov["id_empresa"];
				$_POST['fecha_registro'] 	 = date("Y-m-d h:i:s");

				$mov_r = $oGlobals->insert_data_array($_POST, "mov_r");

			}
			else {  $_POST['fecha_modificacion'] = date("Y-m-d h:i:s"); $mov_r = $oGlobals->update_data_array($_POST, "mov_r", "id", $id); $mov_r = $id;}
			
			if($mov_r != 0 && $mov_r != 2) { 
				
				$movr  = $oGlobals->verOpcionesPor("mov_r", " id = $mov_r", 0); 
				
				if($mov_r != 0){
					
					$a_tiqui["id_entrada"] 	   = $mov["id"];
					$a_tiqui["documento"] 	   = $mov["documento"];
					$a_tiqui["tipo_documento"] = 'TRE';
					$a_tiqui["codigo"] 		   = $producto["codigo"];
					$a_tiqui["referencia"] 	   = $producto["referencia"];
					$a_tiqui["detalle"] 	   = utf8_encode($producto["nombre"]);
					$a_tiqui["periodo"] 	   = $mov["periodo"];
					$a_tiqui["year"]		   = $mov["year"];
					$a_tiqui["entrada"] 	   = $_POST["salida"];
					$a_tiqui["salida"] 	       = 0;
					$a_tiqui["valor_unitario"] = $_POST["valor_unitario"];
					$a_tiqui["sub_total"]	   = $a_tiqui["entrada"] * $_POST["valor_unitario"];
					$a_tiqui["bodega_salida"]  = $mov["bodega_salida"];
					$a_tiqui["bodega_entrada"] = $mov["bodega_entrada"];
					$a_tiqui["fecha_creacion"] = date("Y-m-d h:s:i");
					$a_tiqui['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
					$a_tiqui['id_usuario_creador'] = $_SESSION['idUsuario'];
					$a_tiqui['id_empresa'] 		 = $mov["id_empresa"];
					$a_tiqui['fecha_registro'] 	 = date("Y-m-d h:i:s");

					$exis_mvr_tre = $oGlobals->verOpcionesPor("mov_r", " AND documento = '".$mov["documento"]."' AND codigo = '$codigo' AND tipo_documento = 'TRE'", 0);
					
					
					if($exis_mvr_tre == 2) $mov_r_r = $oGlobals->insert_data_array($a_tiqui, "mov_r");
					else                   $mov_r_r = $oGlobals->update_data_array($a_tiqui, "mov_r", "id", $exis_mvr_tre["id"] ); 
					
					$producto = $oGlobals->verOpcionesPor("mov_r", " AND id = $mov_r", 0);
				
				}
				
				
				if($id == ""){
?>
					<script>
						
						$('#id_prod').val('');
						$('#txt_producto').val('');
						$('#salida').val('');
						$('#entrada').val('');
						$('#valor_unitario').val('');
						
						html = '<tr id="trttrr_<?= $producto["id"];?>">\
				                  <td class="p-a-1" align="center"><?= utf8_encode($producto["codigo"]);?></td>\
				                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($producto["detalle"]);?></div></td>\
				                  <td class="p-a-1" align="right"><?= utf8_encode($producto["salida"]);?></td>\
				                  <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>\
				                  <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>\
				                  <td align="center">\
				                  	<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $producto["id"]."_".$mov["id"];?>\', \'add_producto_a_traslado\', \'load_modulo\', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>\
				                    <i onclick="Funciones.eliminar_registro(\'<?= $producto["id"];?>\',\'admin_mov_r\',\'rspdasds\', \'trttrr_\');" class="btn btn-xs fa fa-trash"></i>\
				                  </td>\
				              </tr>';
						$('#tr_body_ref_fac').append(html);
						
						$("#frm-producto-ref")[0].reset();
						
					</script>  
                    
<?php
				echo "<div class='exito'>Referencia agregada con éxito</div>";

				}
				else {

?>
					<script>
										
						html = '<td class="p-a-1" align="center"><?= utf8_encode($producto["codigo"]);?></td>\
			                    <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($producto["detalle"]);?></div></td>\
			                    <td class="p-a-1" align="right"><?= utf8_encode($producto["salida"]);?></td>\
			                    <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>\
			                    <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>\
			                    <td align="center">\
			                  	  <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $producto["id"]."_".$mov["id"];?>\', \'add_producto_a_traslado\', \'load_modulo\', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>\
			                      <i onclick="Funciones.eliminar_registro(\'<?= $producto["id"];?>\',\'admin_mov_r\',\'rspdasds\', \'trttrr_\');" class="btn btn-xs fa fa-trash"></i>\
			                    </td>';
						$('#trttrr_<?= $id?>').html(html);
					
						
					</script>
<?php

				}
			
			}
			else echo "<div class='error'>No se ha podido agregar la referencia</div>";
		
		}
	}
	else echo "<div class='error'>Debes rellenar los campos obligatorios</div>";

?>

