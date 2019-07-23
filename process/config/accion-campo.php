<?php
session_start();
			
	if($_POST['nombre_campo'] != "" && $_POST['campo'] != "" && $_POST['tipo'] != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;
		
		$_POST["input_name"] = $oGlobals->input_name($_POST['nombre_campo']);

		if($id == "") 	{ 
			
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 
			$_POST["creado_por"]			= $_SESSION["nombre"]." ".$_SESSION["apellido"];
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			
			$insert = $oGlobals->insert_data_array($_POST, "informes_campos"); 
		}
		else $update = $oGlobals->update_data_array($_POST, "informes_campos", "id", $id);

			if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$campo = $oGlobals->verOpcionesPor("informes_campos"," AND id = $insert", 0); 
				$obl   = "No";
                if($campo["obligatorio"] == 1) $obl = "Si";
?>
				<script>
					
					html = '<tr id="tr_cam_<?= $campo["id"];?>">\
                                <td><?= utf8_encode($campo["nombre_campo"]);?></td>\
                                <td><?= utf8_encode($campo["campo"]);?></td>\
                                <td><?= utf8_encode($campo["tipo"]);?></td>\
                                <td align="center"><?= $obl;?></td>\
                                <td align="center">\
                                    <i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $campo["id"];?>, \'informes_campos\', \'rsp-camp\', \'div-campos\', \'frm-campos\');" title="Editar campo"></i>\
                                    <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $campo["id"];?>, \'informes_campos\', \'rsp-camp\');" title="Eliminar campo"></i>\
                                </td>\
                            </tr>';
				
					$("#tr_body_campo").append(html);
					$("#frm-campo")[0].reset();
				</script>
<?php				
			}
			else if($update != 2) {
				
				$campo = $oGlobals->verOpcionesPor("informes_campos"," AND id = $id", 0);
				echo "<div class='exito'>Guardado correctamente</div>";  
				
				$obl   = "No";
                if($campo["obligatorio"] == 1) $obl = "Si";
?>
				<script>

					html = '<td><?= utf8_encode($campo["nombre_campo"]);?></td>\
							<td><?= utf8_encode($campo["campo"]);?></td>\
							<td><?= utf8_encode($campo["tipo"]);?></td>\
							<td align="center"><?= $obl;?></td>\
							<td align="center">\
								<i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $campo["id"];?>, \'informes_campos\', \'rsp-camp\', \'div-campos\', \'frm-campos\');" title="Editar campo"></i>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $campo["id"];?>, \'informes_campos\', \'rsp-camp\');" title="Eliminar campo"></i>\
							</td>';
				
					$("#tr_cam_<?= $id;?>").html(html);
					
				</script>
<?php
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




