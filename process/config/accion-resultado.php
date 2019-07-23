<?php
session_start();
			
	if($_POST['titulo_campo'] != "" && $_POST['posicion_campo'] != "" && $_POST['formato'] != "" && $_POST['totaliza'] != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;
	

		if($id == "") 	{ 
			
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 
			$_POST["creado_por"]			= $_SESSION["nombre"]." ".$_SESSION["apellido"];
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			
			$insert = $oGlobals->insert_data_array($_POST, "informes_titulos"); 
		}
		else $update = $oGlobals->update_data_array($_POST, "informes_titulos", "id", $id);

			if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$titulo = $oGlobals->verOpcionesPor("informes_titulos"," AND id = $insert", 0); 
?>
				<script>
					
					html = '<tr id="tr_titu_<?= $titulo["id"];?>">\
                                <td><?= utf8_encode($titulo["titulo_campo"]);?></td>\
                                <td><?= utf8_encode($titulo["formato"]);?></td>\
                                <td><?= utf8_encode($titulo["posicion_campo"]);?></td>\
                                <td align="center">\
									<i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $titulo["id"];?>, \'informes_titulos\', \'rsp-titu\', \'div-titulo\', \'frm-titulo\');" title="Editar título"></i>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $titulo["id"];?>, \'informes_titulos\', \'rsp-titu\');" title="Eliminar título"></i>\
								</td>\
                            </tr>';
				
					$("#tr_body_titulo").append(html);
					$("#frm-titulo")[0].reset();
				</script>
<?php				
			}
			else if($update != 2) {
				
				$titulo = $oGlobals->verOpcionesPor("informes_titulos"," AND id = $id", 0);
				echo "<div class='exito'>Guardado correctamente</div>";  
?>
				<script>

					html = '<td><?= utf8_encode($titulo["titulo_campo"]);?></td>\
							<td><?= utf8_encode($titulo["formato"]);?></td>\
							<td><?= utf8_encode($titulo["posicion_campo"]);?></td>\
							<td align="center">\
								<i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $titulo["id"];?>, \'informes_titulos\', \'rsp-titu\', \'div-titulo\', \'frm-titulo\');" title="Editar título"></i>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $titulo["id"];?>, \'informes_titulos\', \'rsp-titu\');" title="Eliminar título"></i>\
							</td>\';
				
					$("#tr_titu_<?= $id;?>").html(html);
					
				</script>
<?php
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




