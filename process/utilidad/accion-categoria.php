<?php
session_start();
			
	if(trim($_POST['categoria']) != ""){
							
		
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

			$insert = $oGlobals->insert_data_array($_POST, "categorias"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "categorias", "id", $id);

		}

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$categoria = $oGlobals->verOpcionesPor("categorias"," AND id = $id", 0);
?>
				<script>

					html = '<td width="" align="center"><?= utf8_encode($categoria["categoria"]);?></td>\
							<td width="" align="center">\
								<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $categoria["id"];?>, \'categorias\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar categoría"></i></a>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $categoria["id"];?>, \'categorias\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar categoría"></i>\
							</td>';
				
					$('#tr_categoria_<?= $id;?>').html(html);
					
				</script>
<?php			
			} 
			else if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$categoria = $oGlobals->verOpcionesPor("categorias"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_categoria_<?= $categoria["id"];?>">\
								<td width="" align="center"><?= utf8_encode($categoria["categoria"]);?></td>\
								<td width="" align="center">\
									<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $categoria["id"];?>, \'categorias\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar categoría"></i></a>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $categoria["id"];?>, \'categorias\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar categoría"></i>\
								</td>\
							</tr>';
				
					$('#tr_body').append(html);
					$("#frm-categoria")[0].reset();
				</script>
<?php				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




