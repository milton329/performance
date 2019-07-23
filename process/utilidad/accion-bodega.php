<?php
session_start();
			
	if(trim($_POST['nombre_bodega']) != "" && trim($_POST['codigo_bodega']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		//$id = $oGlobals->iFilter->process($_POST['id']);
		$id = "";
		$id_empresa = $oGlobals->iFilter->process($_POST['id_empresa']);
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 
			
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $id_empresa;
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "bodegas"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "bodegas", "id", $id);

		}

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$bodega = $oGlobals->verOpcionesPor("bodegas"," AND id = $id", 0);
?>
				<script>

					html = '<td width="" align="center"><?= utf8_encode($bodega["nombre_bodega"]);?></td>\
							<td width="" align="center"><?= utf8_encode($bodega["codigo_bodega"]);?></td>\
                            <td width="" align="center"><?= utf8_encode($bodega["inventario_activo"]);?></td>\
							<td width="" align="center">\
								<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $bodega["id"];?>, \'bodegas\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar bodega"></i></a>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $bodega["id"];?>, \'bodegas\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar bodega"></i>\
							</td>';
				
					$('#tr_bodega_<?= $id;?>').html(html);
					
				</script>
<?php			
			} 
			else if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$bodega = $oGlobals->verOpcionesPor("bodegas"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_bodega_<?= $bodega["id"];?>">\
								<td width="" align="center"><?= utf8_encode($bodega["nombre_bodega"]);?></td>\
								<td width="" align="center"><?= utf8_encode($bodega["codigo_bodega"]);?></td>\
	                            <td width="" align="center"><?= utf8_encode($bodega["inventario_activo"]);?></td>\
								<td width="" align="center">\
									<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $bodega["id"];?>, \'bodegas\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar bodega"></i></a>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $bodega["id"];?>, \'bodegas\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar bodega"></i>\
								</td>\
							</tr>';
				
					$('#tr_body').append(html);
					$("#frm-bodega")[0].reset();
				</script>
<?php				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




