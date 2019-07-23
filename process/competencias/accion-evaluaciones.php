<?php
session_start();
			
	if(trim($_POST['cerrado']) != ""){
							
		
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

			$insert = $oGlobals->insert_data_array($_POST, "mov"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "mov", "id", $id);

		}

			if($insert != 0){
				echo "<div class='exito'>El registro se ha agregado correctamente</div>";
				$sql = "select mov.id as id , u.nombre as nombre, r.rol as rol, documento, fecha_documento, e.nombre as estados_mov from mov
                INNER JOIN config_usuarios as u ON u.id = mov.id_usuario
                INNER JOIN config_roles as r ON r.id = u.id_rol
                INNER JOIN estados_mov as e ON e.id = mov.cerrado
                where id = $insert";
				$objetivo = $oGlobals->verPorConsultaPor($sql, 0);
?>
				<script>
					html = '<tr id="tr_user_<?= $objetivo["id"];?>">\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["rol"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["documento"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["fecha_documento"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode(strtoupper($objetivo["estados_mov"]));?></td>\
			                  <td align="center">\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $objetivo["id"];?>\',\'evaluaciones\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
	                          </td>\
                              </tr>';
			        $("#tb_body").append(html);
			        $("#frm-crear-evaluaciones")[0].reset();

				</script>
<?php
			}
			else if($update != 2){

				echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
				$sql = "select mov.id as id , u.nombre as nombre, r.rol as rol, documento, fecha_documento, e.nombre as estados_mov from mov
                INNER JOIN config_usuarios as u ON u.id = mov.id_usuario
                INNER JOIN config_roles as r ON r.id = u.id_rol
                INNER JOIN estados_mov as e ON e.id = mov.cerrado
                where mov.id = '$id'";
				$objetivo = $oGlobals->verPorConsultaPor($sql, 0);
?>
				<script>
					
					html = 	 '<td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["rol"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["documento"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["fecha_documento"]);?></td>\
			                  <td class="p-a-1"><?= utf8_encode(strtoupper($objetivo["estados_mov"]));?></td>\
			                  <td align="center">\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'<?= $objetivo["id"];?>\',\'evaluaciones\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
	                          </td>';
			        $("#tr_user_<?= $id;?>").html(html);

				</script>
<?php				
			}
			
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




