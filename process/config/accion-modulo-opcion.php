<?php
session_start();
			
	if($_POST['opcion_modulo'] != "" && $_POST['directorio'] != "" && $_POST['mostrar_menu'] != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 
			
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 
			$_POST["creado_por"]			= $_SESSION["nombre"]." ".$_SESSION["apellido"];
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			
			$insert = $oGlobals->insert_data_array($_POST, "config_modulos_opciones"); 
		}
		else $update = $oGlobals->update_data_array($_POST, "config_modulos_opciones", "id", $id);

			if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$menu = $oGlobals->verOpcionesPor("config_modulos_opciones"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_opc_<?= utf8_encode($menu["id"])?>">\
								<td><?= utf8_encode($menu["opcion_modulo"]);?></td>\
								<td><?= utf8_encode($menu["directorio"]);?></td>\
								<td><?= utf8_encode($menu["enlace"]);?></td>\
								<td><?= utf8_encode($menu["icono"]);?></td>\
								<td align="center">\
									<i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $menu["id"];?>, \'config_modulos_opciones\', \'rspRed\', \'div-modulo-opcion\', \'frm-modulo-opcion\');" title="Editar opción"></i>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $menu["id"];?>, \'config_modulos_opciones\', \'rspRed\');" id="<?= utf8_encode($menu["id"])?>" title="Eliminar opción"></i>\
								</td>\
							</tr>';
				
					$("#tb_body_opc").append(html);
					$("#form-modulo-opcion")[0].reset();
					
				</script>
<?php				
			}
			else if($update != 2) {
				
				$menu = $oGlobals->verOpcionesPor("config_modulos_opciones"," AND id = $id", 0);
				echo "<div class='exito'>Guardado correctamente</div>";  
?>
				<script>

					html = '<td><?= utf8_encode($menu["opcion_modulo"]);?></td>\
							<td><?= utf8_encode($menu["directorio"]);?></td>\
							<td><?= utf8_encode($menu["enlace"]);?></td>\
							<td><?= utf8_encode($menu["icono"]);?></td>\
							<td align="center">\
								<i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $menu["id"];?>, \'config_modulos_opciones\', \'rspRed\', \'div-modulo-opcion\', \'frm-modulo-opcion\');" title="Editar opción"></i>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $menu["id"];?>, \'config_modulos_opciones\', \'rspRed\');" id="<?= utf8_encode($menu["id"])?>" title="Eliminar opción"></i>\
							</td>';
				
					$("#tr_opc_<?= $id;?>").html(html);
					
				</script>
<?php
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




