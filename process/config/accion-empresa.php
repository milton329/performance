<?php
session_start();
	
		
		if(trim($_POST['nombre_empresa']) != "" && trim($_POST['titulo_html']) != ""){
				
					
				require_once '../../class/classGlobal.php';
	
				$oGlobals  = new Globals();	
				
				$id = $oGlobals->iFilter->process($_POST['id']);
				$insert = 0;
				$update = 2;
				
				if($id == "") {
					
					if(isset($_FILES['archivo']['name'])) { $files = $_FILES['archivo']['name']; $_POST["imagen_logo"] = $oGlobals->subirImagen($files, "info");}
					else { echo "<div class='error'>Debes seleccionar la imagen</div>"; return;}
					
					$insert = $oGlobals->insert_data_array($_POST, "config_informacion_empresa");
					
					if($insert != 0) {
						
						echo "<div class='exito'>La empresa fue creada correctamente</div>";
						$empresa = $oGlobals->verOpcionesPor("config_informacion_empresa", " AND id = $insert", 0);
?>
						<script>
							
							html = '<tr id="tr_infddd_<?= $empresa["id"];?>">\
										<td><?= utf8_encode($empresa["nombre_empresa"]);?></td>\
                        				<td><?= utf8_encode($empresa["titulo_html"]);?></td>\
										<td width="" align="center">\
											<a href="#load_informe" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $empresa["id"];?>, \'empresa\', \'load_informe\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar caja"></i></a>\
										</td>\
									</tr>';
							$('#tb_body').append(html);
						
						</script>
<?php						
					}
					else echo "<div class='error'>No se ha podido crear el cajero</div>";
					
				} else {
					
					if(isset($_FILES['archivo']['name'])) { $files = $_FILES['archivo']['name']; $_POST["imagen_logo"] = $oGlobals->subirImagen($files, "info");}
			
					$update = $oGlobals->update_data_array($_POST, "config_informacion_empresa", "id", $id);
					
					if($update == 1) {
						
						echo "<div class='exito'>Los cambios han sido guardado correctamente</div>";
						$empresa = $oGlobals->verOpcionesPor("config_informacion_empresa", " AND id = $id", 0);

?>
						<script>
							
							html = '<td><?= utf8_encode($empresa["nombre_empresa"]);?></td>\
									<td><?= utf8_encode($empresa["titulo_html"]);?></td>\
									<td width="" align="center">\
										<a href="#load_informe" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $empresa["id"];?>, \'empresa\', \'load_informe\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar caja"></i></a>\
									</td>';
							$('#tr_infddd_<?= $id;?>').html(html);
						
						</script>
<?php
					}
					else echo "<div class='error'>No se ha podido guardar los cambios</div>";
				}

		}
		else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";
		
?>
