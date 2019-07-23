<?php
session_start();
			
	if(trim($_POST['codigo']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 
			
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $_SESSION["id_empresa"];
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "ciiu"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "ciiu", "id", $id);

		}

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$marca = $oGlobals->verOpcionesPor("marcas"," AND id = $id", 0);
?>
				<script>

					html = '<td width="" align="center"><?= utf8_encode($marca["marca"]);?></td>\
							<td width="" align="center">\
								<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $marca["id"];?>, \'marcas\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar marcas"></i></a>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $marca["id"];?>, \'marcas\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar marcas"></i>\
							</td>';
				
					$('#tr_marca_<?= $id;?>').html(html);
					
				</script>
<?php			
			} 
			else if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$marca = $oGlobals->verOpcionesPor("marcas"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_marca_<?= $marca["id"];?>">\
								<td width="" align="center"><?= utf8_encode($marca["marca"]);?></td>\
								<td width="" align="center">\
									<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $marca["id"];?>, \'marcas\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar marcas"></i></a>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $marca["id"];?>, \'marcas\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar marcas"></i>\
								</td>\
							</tr>';
				
					$('#tr_body').append(html);
					$("#frm-marca")[0].reset();
				</script>
<?php				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




