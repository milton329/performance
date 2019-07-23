<?php
session_start();
			
	if($_POST['modulo'] != "" && $_POST['icono'] != "" && $_POST['orden'] != "" && $_POST['principal'] != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 
			
			$_POST["fecha_creacion"]        = date("Y-m-d h:i:s"); 
			$_POST["creado_por"]			= $_SESSION["nombre"]." ".$_SESSION["apellido"];
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			
			$insert = $oGlobals->insert_data_array($_POST, "config_modulos"); 
		}
		else $update = $oGlobals->update_data_array($_POST, "config_modulos", "id", $id);

			if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$modulo = $oGlobals->verOpcionesPor("config_modulos"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_mod_<?= $modulo["id"];?>">\
								<td><?= utf8_encode($modulo["modulo"]);?></td>\
								<td><i class="<?= utf8_encode($modulo["icono"]);?>"></i></td>\
								<td align="center">\
									<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $modulo["id"];?>\', \'info-modulo\', \'load_modulo\', 2);" title="Ver opciones de módulo" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-bars"></i></a>\
									<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $modulo["id"];?>\', \'config_modulos\', \'load_modulo\', 1);" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
								</td>\
							</tr>';
				
					$("#tb_body").append(html);
					$("#frm-modulo")[0].reset();
				</script>
<?php				
			}
			else if($update != 2) {
				
				$modulo = $oGlobals->verOpcionesPor("config_modulos"," AND id = $id", 0);
				echo "<div class='exito'>Guardado correctamente</div>";  
?>
				<script>

					html = '<td><?= utf8_encode($modulo["modulo"]);?></td>\
							<td><i class="<?= utf8_encode($modulo["icono"]);?>"></i></td>\
							<td align="center">\
								<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $modulo["id"];?>\', \'info-modulo\', \'load_modulo\', 2);" title="Ver opciones de módulo" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-bars"></i></a>\
								<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $modulo["id"];?>\', \'config_modulos\', \'load_modulo\', 1);" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
							</td>';
				
					$("#tr_mod_<?= $id;?>").html(html);
					
				</script>
<?php
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




