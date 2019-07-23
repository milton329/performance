<?php
session_start();

		
	if(trim($_POST["barra"]) != "" && trim($_POST["codigo"]) != ""){	
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();
		
		$_POST['codigo'];
		$_POST['tipo'];
		$_POST["talla"];
		$_POST['color'];
		$_POST['barra'];
		$_POST['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
		$_POST['id_usuario_creador'] = $_SESSION['idUsuario'];
		$_POST['fecha_modificado'] 	 = date("Y-m-d h:i:s");
		$_POST['fecha_registro'] 	 = date("Y-m-d h:i:s");

		$insert = $oGlobals->insert_data_array($_POST, "referencias_barras");
		$codigo = $_POST['codigo'];

		if($insert != 0) {

			echo '<div class="exito">El codigo de barras ha sido agregado correctamente</div>';

			$sql = "SELECT * 
					FROM referencias_barras
					WHERE codigo = $codigo";
			$barra = $oGlobals->verPorConsultaPor($sql, 0);
?>
			<script>
				html = '<tr id="tr_cod_<?= $barra["id"];?>">\
                            <td width="" align="center"><?= utf8_encode($barra["codigo"]);?></td>\
                            <td width="" align="center"><?= utf8_encode($barra["tipo"]);?></td>\
							<td width="" align="center"><?= utf8_encode($barra["talla"]);?></td>\
							<td width="" align="center"><?= utf8_encode($barra["color"]);?></td>\
							<td width="" align="center"><?= utf8_encode($barra["barra"]);?></td>\
							<td width="" align="center"><?= utf8_encode($barra["creado_por"]);?></td>\
                            <td width="" align="center"><?= $oGlobals->fecha($barra["fecha_registro"]);?></td>\
							<td width="" align="center">\
							<button href="#upd_cod_barra" onclick="Funciones.cargar_modal_estructura('<?= $barra['id'];?>', 'upd-cod-barra', 'upd_cod_barra', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">\
                                    Editar\
                                  </button>\
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $barra["id"];?>, \'precios\', \'resp_status\', \'tr_prec_\');" title="Eliminar codigo de barras"></i>\
                            </td>\
                        </tr>';
                $("#tr_body_cod").append(html);        
			</script> 
<?php			
		}
		else echo '<div class="error">Ha ocurrido un error creando el codigo de barras</div>';
			
	}
	else echo '<div class="error"></div>';

?>

