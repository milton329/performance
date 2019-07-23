<?php
session_start();
			
	if(trim($_POST['nombre_servicio']) != "" && trim($_POST['codigo_servicio']) != "" && trim($_POST['valor_servicio']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $_POST['id'];
        $id_empresa = $_SESSION["id_empresa"];
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 
			
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $id_empresa;
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "servicios"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "servicios", "id", $id);

		}

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$servicio = $oGlobals->verOpcionesPor("servicios"," AND id = $id", 0);
				$empresa = $oGlobals->verOpcionesPor("empresas", " AND id = ".$servicio["id_empresa"], 0);
				if ($servicio["servicio_activo"]==1) {$servicio_activo='Activo';} else {$servicio_activo='Inactivo';}
?>
				<script>

					html = '<td width="" align="center"><?= utf8_encode($servicio["codigo_servicio"]);?></td>\
					        <td width="" align="center"><?= utf8_encode($servicio["nombre_servicio"]);?></td>\
							<td width="" align="center">$ <?= number_format($servicio["valor_servicio"],0, "", ".");?></td>\
                            <td width="" align="center"><?= $servicio_activo;?></td>\
                            <td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>\
							<td width="" align="center">\
								<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $servicio["id"];?>, \'servicios\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar bodega"></i></a>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $servicio["id"];?>, \'servicios\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar bodega"></i>\
							</td>';
				
					$('#tr_servicio_<?= $id;?>').html(html);
					
				</script>
<?php			
			} 
			else if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$servicio = $oGlobals->verOpcionesPor("servicios"," AND id = $insert", 0);
				$empresa = $oGlobals->verOpcionesPor("empresas", " AND id = ".$servicio["id_empresa"], 0); 
				if ($servicio["servicio_activo"]==1) {$servicio_activo='Activo';} else {$servicio_activo='Inactivo';}   
?>
				<script>
					
					html = '<tr id="tr_servicio_<?= $servicio["id"];?>">\
					            <td width="" align="center"><?= utf8_encode($servicio["codigo_servicio"]);?></td>\
								<td width="" align="center"><?= utf8_encode($servicio["nombre_servicio"]);?></td>\
								<td width="" align="center">$ <?= number_format($servicio["valor_servicio"],0, "", ".");?></td>\
	                            <td width="" align="center"><?= $servicio_activo;?></td>\
	                            <td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>\
								<td width="" align="center">\
									<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $servicio["id"];?>, \'servicios\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar bodega"></i></a>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $servicio["id"];?>, \'servicios\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar bodega"></i>\
								</td>\
							</tr>';
				
					$('#tr_body').append(html);
					$("#frm-servicios")[0].reset();
				</script>
<?php				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




