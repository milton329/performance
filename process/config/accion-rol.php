<?php
session_start();
			
	if($_POST['rol'] != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 
			
			$_POST["fecha_creacion"]        = date("Y-m-d h:i:s"); 
			$_POST["creado_por"]			= $_SESSION["nombre"]." ".$_SESSION["apellido"];
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			
			$insert = $oGlobals->insert_data_array($_POST, "config_roles"); 
		}
		else $update = $oGlobals->update_data_array($_POST, "config_roles", "id", $id);

			if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$rol = $oGlobals->verOpcionesPor("config_roles"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_rol_<?= $rol["id"];?>">\
								<td><?= utf8_encode($rol["rol"]);?></td>\
								<td align="center">\
									<a href="#load_rol" onClick="Funciones.cargar_modal_estructura(\'<?= $rol["id"];?>\', \'conf-rol\', \'load_rol\', 2);" title="Ver permisos de rol" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-bars"></i></a>\
									<a href="#load_rol" onClick="Funciones.cargar_modal_estructura(\'<?= $rol["id"];?>\', \'config_roles\', \'load_rol\', 1);" title="Editar rol" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
								</td>
							</tr>';
				
					$("#tb_body_rol").append(html);
					$("#frm-roles")[0].reset();
				</script>
<?php				
			}
			else if($update != 2) {
				
				$rol = $oGlobals->verOpcionesPor("config_roles"," AND id = $id", 0);
				echo "<div class='exito'>Guardado correctamente</div>";  
?>
				<script>

					html = '<td><?= utf8_encode($rol["rol"]);?></td>\
							<td align="center">\
								<a href="#load_rol" onClick="Funciones.cargar_modal_estructura(\'<?= $rol["id"];?>\', \'conf-rol\', \'load_rol\', 2);" title="Ver permisos de rol" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-bars"></i></a>\
								<a href="#load_rol" onClick="Funciones.cargar_modal_estructura(\'<?= $rol["id"];?>\', \'config_roles\', \'load_rol\', 1);" title="Editar rol" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
							</td>';
				
					$("#tr_rol_<?= $id;?>").html(html);
					
				</script>
<?php
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




