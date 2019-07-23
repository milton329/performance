<?php
session_start();
			
	if(trim($_POST['tipo_movimiento']) != "" && trim($_POST['tipo_cuenta']) != "" && trim($_POST['id_empresa']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		$id_empresa = $oGlobals->iFilter->process($_POST['id_empresa']);
		
		$insert = 0;
		$update = 2;

		$clase = $oGlobals->verOpcionesPor("con_clases", " AND id = ".$_POST["tipo_cuenta"], 0);	

		$_POST["financiero"] = 1;
		$_POST["naturaleza"] = $clase["id_naturaleza"];

		if($id == "" || $id == 0) 	{ 
			
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $id_empresa;
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "tipos_movimientos"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "tipos_movimientos", "id", $id);

		}

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$movimiento = $oGlobals->verOpcionesPor("tipos_movimientos"," AND id = $id", 0);
				$empresa = $oGlobals->verOpcionesPor("empresas", "  AND id = ".$movimiento["id_empresa"], 0);  
                $clase   = $oGlobals->verOpcionesPor("con_clases", "  AND id = ".$movimiento["tipo_cuenta"], 0);  
?>
				<script>

					html = '<td width="" align="center"><?= utf8_encode($movimiento["tipo_movimiento"]);?></td>\
							<td width="" align="center"><?= utf8_encode($clase["clase"]);?></td>\
							<td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>\
                            <td width="" align="center">\
								<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $movimiento["id"];?>, \'movimiento\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar movimiento"></i></a>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $movimiento["id"];?>, \'tipos_movimientos\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar movimiento"></i>\
							</td>';
				
					$('#tr_tte_<?= $id;?>').html(html);
					
				</script>
<?php			
			} 
			else if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$movimiento = $oGlobals->verOpcionesPor("tipos_movimientos"," AND id = $insert", 0);
				$empresa = $oGlobals->verOpcionesPor("empresas", "  AND id = ".$movimiento["id_empresa"], 0);  
                $clase   = $oGlobals->verOpcionesPor("con_clases", "  AND id = ".$movimiento["tipo_cuenta"], 0); 
?>
				<script>
					
					html = '<tr id="tr_tte_<?= $movimiento["id"];?>">\
								<td width="" align="center"><?= utf8_encode($movimiento["tipo_movimiento"]);?></td>\
								<td width="" align="center"><?= utf8_encode($clase["clase"]);?></td>\
								<td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>\
	                            <td width="" align="center">\
									<a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $movimiento["id"];?>, \'movimiento\', \'load_talla\', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar movimiento"></i></a>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $movimiento["id"];?>, \'tipos_movimientos\', \'resp_status\',  \'tr_tipo_\');" title="Eliminar movimiento"></i>\
								</td>\
							</tr>';
				
					$('#tbody_fin_tip').append(html);
					$("#frm-tip")[0].reset();
				</script>
<?php				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




