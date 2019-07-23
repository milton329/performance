<?php
session_start();
		
	if(trim($_POST["documento"]) != "" && trim($_POST["nombre"]) != "" && trim($_POST["salida"]) != "" && trim($_POST["valor_unitario"]) != ""){	
	

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();
		
		$id        = $oGlobals->iFilter->process($_POST["id"]);
		$id_doc    = $oGlobals->iFilter->process($_POST["documento"]);
		$nombre    = explode("-", $oGlobals->iFilter->process($_POST["nombre"]));
		$cantidad  = $oGlobals->iFilter->process($_POST["salida"]);
		$valor     = $oGlobals->iFilter->process($_POST["valor_unitario"]);

		$insert    = 0;
		$update    = 2;
		
		$documento = $oGlobals->verOpcionesPor("mov_pedido", " AND id = '$id_doc'", 0);
		$producto  = $oGlobals->verOpcionesPor("referencias", " AND codigo = '".trim($nombre[0])."'", 0);
		$mov_r     = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND documento = '".$documento["documento"]."' AND codigo = '".$producto["codigo"]."'", 0);
		
		
		if(!is_numeric($cantidad)) { echo "<div class='error'>La cantidad debe ser numérica</div>"; return;}
		if(!is_numeric($valor))    { echo "<div class='error'>El costo unitario debe ser numérico</div>"; return;}

		if($producto != 2) {
		$producto_codigo 		= $producto["codigo"];
		$producto_referencia 	= $producto["referencia"];
		$producto_detalle 		= utf8_encode($producto["nombre"]);        
		}
		if($producto == 2) {        
        $var = explode("-", $_POST["nombre"]);
        $producto_codigo 		= $var[0];
		$producto_referencia 	= 'SERVICIO';
		$producto_detalle 		= $var[1];
		}

		if($documento != 2){

			$array['id_entrada'] 			= $documento["id"];
			$array['documento'] 			= $documento["documento"];
			$array['id_tipo_documento'] 	= '3';
			$array['tipo_documento'] 		= 'PED';
			$array['codigo'] 				= $producto_codigo;
			$array['referencia'] 			= $producto_referencia;
			$array['detalle'] 				= $producto_detalle;
			$array['cant_bultos'] 			= $producto["cantidad_por_bulto"] / $cantidad;
			$array['cant_x_bulto'] 			= $producto["cantidad_por_bulto"];
			$array['can_ped'] 				= "0";
			$array['alto'] 					= "0";
			$array['largo'] 				= "0";
			$array['ancho'] 				= "0";
			$array['t_cubicaje'] 			= "0";
			$array['t_cubijcaje_unidad'] 	= "0";
			$array['cantidad_pedida'] 		= $cantidad;
			$array['entrada'] 				= "0";
			$array['valor_sugerido'] 		= "0";
			$array['valor_unitario'] 		= $valor;
			$array['valor_real'] 			= $valor;
			$array['sub_pedido'] 			= $valor * $cantidad;
			$array['sub_real'] 				= $valor * $cantidad;
			$array['sub_total_sugerido'] 	= "0";
			$array['periodo'] 				= $documento["periodo"];
			$array['year'] 					= $documento["year"];
			$array['dcto_comercial_porc'] 	= "0";
			$array['dcto_finan_porc'] 		= "0";
			$array['dcto_comercial'] 		= "0";
			$array['dcto_finan'] 			= "0";
			$array['costo'] 				= $valor;
			$array['bodega_entrada'] 		= '0';
			$array['bodega_salida'] 		= "0";
			$array['fila'] 					= "";
			$array['columna'] 				= "";
			$array['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$array['id_usuario_creador'] 	= $_SESSION['idUsuario'];
			$array['id_empresa'] 			= $documento["id_empresa"];
			$array['fecha_registro'] 		= date("Y-m-d h:i:s");

			if($id == "") $insert = $oGlobals->insert_data_array($array, "mov_r_pedidos");
			else 		  $update = $oGlobals->update_data_array($array, "mov_r_pedidos", "id", $mov_r["id"]);
			
			if($insert != 0){

				echo "<div class='exito'>El registro se ha agregado correctamente</div>";
				$producto = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND id = $insert", 0);
				if ($producto["referencia"]=='SERVICIO'){$ref='servicio';}
				if ($producto["referencia"]!='SERVICIO'){$ref='producto';}
?>
				<script>
					html = '<tr id="tradfasasdf_<?= $producto["id"];?>">\
			                  <td class="p-a-1" align="center"><?= utf8_encode($producto["codigo"]);?></td>\
			                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($producto["detalle"]);?></div></td>\
			                  <td class="p-a-1" align="right"><?= utf8_encode($producto["referencia"]);?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($producto["salida"], 0, "", ".");?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>\
			                  <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>\
	                          <td align="center">\
	                          	<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $producto["id"]."_".$documento["id"];?>\', \'add_<?= $ref;?>_a_cotizacion\', \'load_modulo\', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>\
	                          	<i onclick="Funciones.eliminar_registro(\'<?= $producto["id"];?>\',\'mov_r_pedidos\',\'rspdasds\', \'tradfasasdf_\');" class="btn btn-xs fa fa-trash"></i>\
	                          </td>\
			              </tr>';
			        $("#tr_body_ref_com").append(html);
			        $("#frm-producto-ref")[0].reset();

				</script>
<?php
			}
			else if($update != 2){

				echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
				$producto = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND id = '$id'", 0);
				if ($producto["referencia"]=='SERVICIO'){$ref='servicio';}
				if ($producto["referencia"]!='SERVICIO'){$ref='producto';}
?>
				<script>
					
					html = '<td class="p-a-1" align="center"><?= utf8_encode($producto["codigo"]);?></td>\
			                <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($producto["detalle"]);?></div></td>\
			                <td class="p-a-1" align="right"><?= utf8_encode($producto["referencia"]);?></td>\
			                <td class="p-a-1" align="right"><?= number_format($producto["salida"], 0, "", ".");?></td>\
			                <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>\
			                <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>\
	                        <td align="center">\
                          		<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $producto["id"]."_".$documento["id"];?>\', \'add_<?= $ref;?>_a_cotizacion\', \'load_modulo\', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>\
                          		<i onclick="Funciones.eliminar_registro(\'<?= $producto["id"];?>\',\'mov_r_pedidos\',\'rspdasds\', \'tradfasasdf_\');" class="btn btn-xs fa fa-trash"></i>\
                          	</td>';
			        $("#tradfasasdf_<?= $id;?>").html(html);

				</script>
<?php				
			}
			else echo "<div class='error'>Ha ocurrido un error agregando el registro</div>";				
		}
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
