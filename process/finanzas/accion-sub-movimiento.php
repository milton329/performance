<?php
session_start();
			
	if(trim($_POST['sub_movimiento']) != "" && trim($_POST['id_movimiento']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		$id_movimiento = $oGlobals->iFilter->process($_POST['id_movimiento']);

		
		$insert = 0;
		$update = 2;

		$movimiento = $oGlobals->verOpcionesPor("tipos_movimientos", " AND id = ".$id_movimiento, 0);	

		if($id == "" || $id == 0) 	{ 
			
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $movimiento["id_empresa"];
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "tipos_movimientos_subconceptos"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "tipos_movimientos_subconceptos", "id", $id);

		}

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$submovimiento = $oGlobals->verOpcionesPor("tipos_movimientos_subconceptos"," AND id = $id", 0);  
?>
				<script>

					html = '<td width="" align=""><?= utf8_encode($submovimiento["sub_movimiento"]);?></td>\
							<td width="" align="center">\
								<i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $submovimiento["id"];?>, \'tipos_movimientos_subconceptos\', \'rspRed\', \'div-modulo-opcion\', \'frm-modulo-opcion\');" title="Editar submovimiento"></i>\
								<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $submovimiento["id"];?>, \'tipos_movimientos_subconceptos\', \'rspRed\',  \'tr_opcttt_\');" title="Eliminar submovimiento"></i>\
							</td>';
				
					$('#tr_opcttt_<?= $id;?>').html(html);
					
				</script>
<?php			
			} 
			else if($insert != 0) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  
				$submovimiento = $oGlobals->verOpcionesPor("tipos_movimientos_subconceptos"," AND id = $insert", 0);
?>
				<script>
					
					html = '<tr id="tr_opcttt_<?= $submovimiento["id"];?>">\
								<td width="" align=""><?= utf8_encode($submovimiento["sub_movimiento"]);?></td>\
								<td width="" align="center">\
									<i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $submovimiento["id"];?>, \'tipos_movimientos_subconceptos\', \'rspRed\', \'div-modulo-opcion\', \'frm-modulo-opcion\');" title="Editar submovimiento"></i>\
									<i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $submovimiento["id"];?>, \'tipos_movimientos_subconceptos\', \'rspRed\',  \'tr_opcttt_\');" title="Eliminar submovimiento"></i>\
								</td>\
							</tr>';
				
					$('#tb_body_opc').append(html);
					$("#form-modulo-opcion")[0].reset();
				</script>
<?php				
			}
			else echo "<div class='error'>No se ha podido generar ninguna acción</div>"; 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




