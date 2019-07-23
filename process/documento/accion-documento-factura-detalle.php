<?php
session_start();
			
	if(trim($_POST['documento']) != "" && trim($_POST['id_prod']) != "" && trim($_POST['txt_producto']) != "" 
		&& (trim($_POST['salida']) != "" || trim($_POST['entrada']) != "") && trim($_POST['valor_unitario']) != "") {

		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
		
		$insert = 0;
		$update = 2;
		
		$id        = $oGlobals->iFilter->process($_POST["id"]);
		$id_prod   = $oGlobals->iFilter->process($_POST["id_prod"]);
		$documento = $oGlobals->iFilter->process($_POST["documento"]);
		$salida    = $oGlobals->iFilter->process($_POST["salida"]);
		$entrada   = $oGlobals->iFilter->process($_POST["entrada"]);

		$con_doc  = "";

		$con_doc .= " AND MR.codigo IN ($id_prod)";
		
		$doc         = $oGlobals->verOpcionesPor("mov", " AND id = '$documento'", 0);
		$producto    = $oGlobals->verOpcionesPor("referencias", " AND codigo = '$id_prod'", 0);
		$inventario  = $oGlobals->verConsultaInventarioPor($con_doc, $doc["bodega_salida"], 0);

		$t_disponible = ($inventario["entrada"] - $inventario["salida"]) - $inventario["pedido"];

		if($producto != 2){
			
			if($salida != 0){

				$cantidad = $oGlobals->number_no_format($_POST["salida"]);
				$_POST["entrada"] = "0";
				$_POST["salida"]  = $cantidad;
				$_POST["bodega_salida"]  = $doc["bodega_salida"];
				$_POST["bodega_entrada"] = "0";
			}  
			if($entrada != 0){

				$cantidad = $oGlobals->number_no_format($_POST["entrada"]);
				$_POST["salida"] = "0";
				$_POST["entrada"]  = $cantidad;
				$_POST["bodega_entrada"] = $doc["bodega_entrada"];
				$_POST["bodega_salida"]  = "0";
			} 

			$precio   = $oGlobals->number_no_format($_POST["valor_unitario"]);
			
			$_POST["id_entrada"]	  	  = $doc["id"];
			$_POST["documento"]	  		  = $doc["documento"];
			$_POST["tipo_documento"]	  = $doc["tipo_documento"];
			$_POST["valor_unitario"]	  = $precio;
			
			$_POST["sub_total"]		      = $cantidad * $precio;
			$_POST["codigo"]     		  = $producto["codigo"];
			$_POST["referencia"] 		  = $producto["referencia"];
			$_POST["detalle"]     		  = utf8_encode($producto["nombre"]);
			$_POST["periodo"]     		  = $doc["periodo"];
			$_POST["year"] 		  		  = $doc["year"];
			
	
			if($id == ""){

				$_POST['creado_por'] 		  = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador']  = $_SESSION['idUsuario'];
				$_POST['id_empresa'] 		  = $_SESSION["id_empresa"];
				$_POST['fecha_registro'] 	  = date("Y-m-d h:i:s"); 
				
				$insert = $oGlobals->insert_data_array($_POST, "mov_r"); 
			}
			else {
			 	
				$_POST['fecha_modificacion'] = date("Y-m-d h:i:s");
			 	$update = $oGlobals->update_data_array($_POST, "mov_r", "id", $id);
			}
					
			if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$producto  = $oGlobals->verOpcionesPor("mov_r"," AND id = $insert", 0); 

				if($cantidad > $t_disponible && $doc["tipo_documento"] == "REM" ) echo "<div class='error'>Pero la cantidad facturada NO estaba disponible, las unidades de este producto quedarán en negativo</div>"; 
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
			                  <td class="p-a-1" align="right"><?= utf8_encode($cantidad);?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>\
			                  <td align="center">\
			                  	<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $producto["id"]."_".$doc["id"];?>\', \'add_producto_a_factura\', \'load_modulo\', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>\
			                    <i onclick="Funciones.eliminar_registro(\'<?= $producto["id"];?>\',\'admin_mov_r\',\'rspdasds\', \'trttrr_\');" class="btn btn-xs fa fa-trash"></i>\
			                  </td>\
			              </tr>';
					$('#tr_body_ref_fac').append(html);
				</script>
	<?php				
			}
			else if($update != 2){
				
				echo "<div class='exito'>Guardado correctamente</div>"; 
				$producto  = $oGlobals->verOpcionesPor("mov_r"," AND id = $id", 0); 
	?>
				<script>

					html = '<td class="p-a-1" align="center"><?= utf8_encode($producto["codigo"]);?></td>\
			                <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($producto["detalle"]);?></div></td>\
			                <td class="p-a-1" align="right"><?= utf8_encode($producto["salida"]);?></td>\
			                <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>\
			                <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>\
			                <td align="center">\
			                  <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $producto["id"]."_".$doc["id"];?>\', \'add_producto_a_factura\', \'load_modulo\', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>\
			                  <i onclick="Funciones.eliminar_registro(\'<?= $producto["id"];?>\',\'admin_mov_r\',\'rspdasds\', \'trttrr_\');" class="btn btn-xs fa fa-trash"></i>\
			                </td>';
				
					$('#trttrr_<?= $id;?>').html(html);

				</script>
	<?php	
				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
		}
		else echo "<div class='error'>El producto NO existe en la base de datos</div>";
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




