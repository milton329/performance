<?php
session_start();

		
	if(trim($_POST["precio"]) != "" && trim($_POST["codigo"]) != "" && trim($_POST["lista"]) != ""){	
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();
		

		$_POST["talla"] 			 = "U";
		$_POST["activo"] 			 = "0";
		$_POST['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
		$_POST['id_usuario_creador'] = $_SESSION['idUsuario'];
		$_POST['id_empresa'] 		 = $_SESSION["id_empresa"];
		$_POST['fecha_registro'] 	 = date("Y-m-d h:i:s");

		$insert = $oGlobals->insert_data_array($_POST, "precios");

		if($insert != 0) {

			echo '<div class="exito">El precio ha sido agregado correctamenet</div>';


			$sql = "SELECT P.*, PL.nombre_lista 
					FROM precios AS P LEFT JOIN precios_lista AS PL ON P.lista = PL.codigo 
					WHERE P.id = '$insert'";
			$precio = $oGlobals->verPorConsultaPor($sql, 0);
?>
			<script>
				html = '<tr id="tr_prec_<?= $precio["id"];?>">\
                            <td width="" align="center"><?= utf8_encode($precio["nombre_lista"]);?></td>\
                            <td width="" align="center"><?= utf8_encode($precio["lista"]);?></td>\
                            <td width="" align="center"><?= number_format($precio["precio"], 0, "", ".");?></td>\
                            <td width="" align="center"><?= $oGlobals->fecha($precio["fecha_creacion"]);?></td>\
                            <td width="" align="center"><?= ($precio["lista"]);?></td>\
                            <td width="" align="center">\
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $precio["id"];?>, \'precios\', \'resp_status\', \'tr_prec_\');" title="Eliminar precio"></i>\
                            </td>\
                        </tr>';
                $("#tr_body_prec").append(html);        
			</script>
<?php			
		}
		else echo '<div class="error">Ha ocurrido un error creando el precio</div>';
			
	}
	else echo '<div class="error"></div>';

?>

