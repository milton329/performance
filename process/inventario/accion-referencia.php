<?php
session_start();
	
	$close		= '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
	$espacio    = '&nbsp;';	
		
	if($_POST["nombre"] != ""){	
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();
		
		$id = $oGlobals->iFilter->process($_POST["id"]);
	
		if($id == "") {
			
			$existe = $oGlobals->verOpcionesPor("referencias", " AND codigo = '".$_POST["codigo"]."'", 0);
			
			if($existe == 2){

				$_POST["codigo"] = $oGlobals->verConsecutivo();
			
				$_POST['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador'] = $_SESSION['idUsuario'];
				$_POST['id_empresa'] 		 = $_SESSION["id_empresa"];
				$_POST['fecha_registro'] 	 = date("Y-m-d h:i:s");
						
				$insert = $oGlobals->insert_data_array($_POST, "referencias");
				
				if($insert != 0) echo '<div class="cloudAlertProd alert alert-success">'.$close.'<strong>Referencia creada correctamente</strong>'.$espacio.' <script>$("#codigo").val("'.$_POST["codigo"].'"); $("#id").val("'.$insert.'");</script></div> ';
				else			 echo '<div class="cloudAlertProd alert alert-success">'.$close.'<strong>No se ha podido crear la referencia</strong>'.$espacio.'</div>';
			}
			else echo '<div class="cloudAlertProd alert alert-danger">'.$close.'<strong>La referencia ingresada ya está creada</strong>'.$espacio.'</div>'; 
		}
		else {
			
			$_POST['fecha_modificacion'] = date("Y-m-d h:i:s");

			$update = $oGlobals->update_data_array($_POST, "referencias", "id", $id);
			if($update != 2) echo '<div class="cloudAlertProd alert alert-success">'.$close.'<strong>Cambios guardados correctamente</strong>'.$espacio.'</div>';
			else			 echo '<div class="cloudAlertProd alert alert-danger">'.$close.'<strong>No se ha podido guardar los cambios</strong>'.$espacio.'</div>';
		}
				
	}
	else echo '<div class="cloudAlertProd alert alert-danger">'.$close.'<strong>Debes ingresar compos obligatorios</strong>'.$espacio.'</div>';

?>
<script>$(".cloudAlertProd").fadeOut(11000);</script>
