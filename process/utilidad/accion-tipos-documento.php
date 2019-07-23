<?php
session_start();
			
	if(trim($_POST['tipo_documento']) != "" && trim($_POST['consecutivo']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 
			
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $_SESSION["id_empresa"];
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "tipos_documentos"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "tipos_documentos", "id", $id);

		}

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$tipo = $oGlobals->verOpcionesPor("tipos_documentos"," AND id = $id", 0);
?>
				<script>

					html = '<td width="" align="center"><?= utf8_encode($tipo["tipo_documento"]);?></td>\
							<td width="" align="center"><?= utf8_encode($tipo["codigo"]);?></td>\
                            <td width="" align="center"><?= utf8_encode($tipo["consecutivo"]);?></td>\
							<td width="" align="center">\
								<a href="#load_color" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $tipo["id"];?>, \'tipos_documento\', \'load_color\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar tipo de documento"></i></a>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $tipo["id"];?>, \'tipos_documento\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar tipo de documento"></i>\
							</td>';
				
					$('#tr_tipo_<?= $id;?>').html(html);
					
				</script>
<?php			
			} 
			else if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$tipo = $oGlobals->verOpcionesPor("tipos_documentos"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_talla_<?= $tipo["id"];?>">\
								<td width="" align="center"><?= utf8_encode($tipo["tipo_documento"]);?></td>\
								<td width="" align="center"><?= utf8_encode($tipo["codigo"]);?></td>\
                            	<td width="" align="center"><?= utf8_encode($tipo["consecutivo"]);?></td>\
								<td width="" align="center">\
									<a href="#load_color" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $tipo["id"];?>, \'tipos_documento\', \'load_color\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar tipo de documento"></i></a>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $tipo["id"];?>, \'tipos_documento\', \'resp_status\', \'tr_tipo_\');" title="Eliminar tipo de documento"></i>\
								</td>\
							</tr>';
				
					$('#tr_body').append(html);
					$("#frm-tipo-documento")[0].reset();
				</script>
<?php				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




