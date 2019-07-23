<?php
session_start();

		
	if(trim($_POST["barra"]) != "" && trim($_POST["codigo"]) != ""){	
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();
		
        $_POST['id'];
        $_POST['codigo'];
		$_POST['tipo'];
		$_POST["talla"];
		$_POST['color'];
		$_POST['barra'];
		$_POST['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
		$_POST['id_usuario_creador'] = $_SESSION['idUsuario'];
		$_POST['fecha_modificado'] 	 = date("Y-m-d h:i:s");
		$_POST['fecha_registro'];

		$insert = $oGlobals->update_data_array($_POST, "referencias_barras", "id", $_POST['id']);

		if($insert != 0) {

            echo '<div class="exito">El codigo de barras ha sido actualizado correctamente</div>';
		}
	}
?>