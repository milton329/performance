<?php
session_start();
		
	if(trim($_POST["nombre"]) != "" && trim($_POST["id_rol"]) != ""){	
	

		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	


		
		$id 			= $_POST['id'];
        $id_empresa 	= $_SESSION["id_empresa"];
		$tipo 			= $_POST['tipo'];
		$id_rol 		= $_POST['id_rol'];

        //consultar nombre del rol 
        $nombre_rol   = $oGlobals->verOpcionesPor("config_roles", " AND id = '$id_rol'", 0);
        $nombre_roles = $nombre_rol["rol"];
 
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 

			$_POST["rol"]					= $nombre_roles;
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $id_empresa;
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 
			$_POST["fecha_modificacion"]        = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "competencias_1"); 
		}
		else {

		    $_POST["rol"]    				=$nombre_roles;
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "competencias_1", "id", $id);
			$update2 = $oGlobals->update_data_array($_POST, "competencias_2", "id_competencias_1", $id);

		}
			
			if($insert != 0){
				echo "<div class='exito'>El registro se ha agregado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("competencias_1", " AND id = $insert", 0);
?>
				<script>
					html = '<tr id="tr_user_<?= $objetivo["id"];?>">\
			                  <td class="p-a-1"><?= $objetivo["tipo"];?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= $objetivo["rol"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["creado_por"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["fecha_modificacion"];?></td>\
	                          <td align="center">\
	                          <a href="../competencias/menu_detalle-competencia_<?= $objetivo["id"];?>.html" target="_blank" class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>\',\'competencias_1\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_1\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>\
			              </tr>';
			        $("#tb_body").append(html);
			        $("#frm-crear-objetivo")[0].reset();

				</script>
<?php
			}
			else if($update != 2){

				echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("competencias_1", " AND id = '$id'", 0);
?>
				<script>
					
					html = 	 '<td class="p-a-1"><?= $objetivo["tipo"];?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= $objetivo["rol"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["creado_por"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["fecha_modificacion"];?></td>\
	                          <td align="center">\
	                          <a href="../competencias/menu_detalle-competencia_<?= $objetivo["id"];?>.html" target="_blank" class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>\',\'competencias_1\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_1\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>';
			        $("#tr_user_<?= $id;?>").html(html);

				</script>
<?php				
			}
			else echo "<div class='error'>Ha ocurrido un error agregando el registro</div>";				
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
