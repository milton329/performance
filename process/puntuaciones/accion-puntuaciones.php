<?php
session_start();
			
	if(trim($_POST['nombre']) != "" && trim($_POST['valor']) != "" && trim($_POST['detalle']) != ""){
							
		
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

			$insert = $oGlobals->insert_data_array($_POST, "puntuaciones"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "puntuaciones", "id", $id);

		}

			if($insert != 0){
				echo "<div class='exito'>El registro se ha agregado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("puntuaciones", " AND id = $insert", 0);
?>
				<script>
					html = '<tr id="tr_user_<?= $objetivo["id"];?>">\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["detalle"]);?></td>\
			                  <td class="p-a-1"><?= $objetivo["valor"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["creado_por"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["fecha_modificacion"];?></td>\
			                  <td align="center">\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $objetivo["id"];?>\',\'puntuaciones\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'puntuaciones\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>\
                              </tr>';
			        $("#tb_body").append(html);
			        $("#frm-crear-puntuaciones")[0].reset();

				</script>
<?php
			}
			else if($update != 2){

				echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("puntuaciones", " AND id = '$id'", 0);
?>
				<script>
					
					html = 	 '<td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["detalle"]);?></td>\
			                  <td class="p-a-1"><?= $objetivo["valor"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["creado_por"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["fecha_modificacion"];?></td>\
			                  <td align="center">\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $objetivo["id"];?>\',\'puntuaciones\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'puntuaciones\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>';
			        $("#tr_user_<?= $id;?>").html(html);

				</script>
<?php				
			}
			
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




