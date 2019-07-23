<?php
session_start();
	
	$close		= '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
	$espacio    = '&nbsp;';
		
	if($_POST["nombre"] != ""){	
		

		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();
		
		$tercero = $oGlobals->verOpcionesPor("terceros", " AND codigo = '".$_POST["codigo"]."'", 0);
		
		if($tercero  == 2) {
			
			if($_POST["codigo"] == "")	$_POST["codigo"] = $oGlobals->generarConsecutivoDe(" AND id = 6", "", 0);
			
			$_POST['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST['id_usuario_creador'] = $_SESSION['idUsuario'];
			$_POST['id_empresa'] 		 = $_SESSION["id_empresa"];
			$_POST['fecha_registro'] 	 = date("Y-m-d h:i:s");
			$_POST['proveedor']          = "1";

			$array = $_POST;

			$insert = $oGlobals->insert_data_array($array, "terceros");
			
			if($insert != 0) echo '<div class="cloudAlertProd alert alert-success">'.$close.'<strong>Proveedor creado correctamente</strong>'.$espacio.' <script>$("#codigo").val("'.$_POST["codigo"].'");</script></div> ';
			else			 echo '<div class="cloudAlertProd alert alert-danger">'.$close.' <strong>No se ha podido crear el proveedor</strong>'.$espacio.'</div>';
		}
		else {

			 $_POST['fecha_modificacion'] 	 = date("Y-m-d h:i:s");
			 
			 $update = $oGlobals->update_data_array($_POST, "terceros", "id", $_POST["id"]);

			if($update != 2) echo '<div class="cloudAlertProd alert alert-success">'.$close.'<strong>Cambios guardados correctamente</strong>'.$espacio.' <script>$("#codigo").val("'.$_POST["codigo"].'");</script></div> ';
			else			 echo '<div class="cloudAlertProd alert alert-danger">'.$close.' <strong>No se ha podido guardar los cambios</strong>'.$espacio.'</div>';
		}
				
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
<script>$(".cloudAlertProd").fadeOut(11000);</script>