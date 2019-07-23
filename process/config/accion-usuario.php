<?php
session_start();
			
	//if($_POST['id_rol'] != "" && $_POST['nombre'] != "" && $_POST['usuario'] != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST["id"]);

		
		$insert = 0;
		$update = 2;		
		
		if(isset($_POST["clave"]) && $_POST["clave"] != "") $_POST["clave"]  = md5($_POST["clave"]);
		
		if($id == ""){
			
			if($_POST["clave"] == "") { echo "<div class='error'>Debes asignar una clave</div>"; return;}
			
			
			$usuario = $oGlobals->verOpcionesPor("config_usuarios", " AND usuario = '".$_POST["usuario"]."'", 0);
			
			if($usuario == 2){
			
				$_POST['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador'] 		= $_SESSION['idUsuario'];
				$_POST['id_empresa'] 				= $_SESSION["id_empresa"];
				$_POST['fecha_registro'] 			= date("Y-m-d h:i:s");

				$insert = $oGlobals->insert_data_array($_POST, "config_usuarios");
				
			}
			else echo "<div class='error'>Ya hay un usuario con este '".$_POST["usuario"]."' nombre de usuario</div>";

		} else {
				
			$_POST['fecha_modificacion'] = date("Y-m-d h:i:s");
			$update = $oGlobals->update_data_array($_POST, "config_usuarios", "id", $id); 
		}

		
		if($insert != 0) { echo "<div class='exito'>El usuario ha sido creado con éxito </div>"; echo "<script>$('#frm-crear-usuario')[0].reset();</script>";}
		if($update != 2) { echo "<div class='exito'>Los cambios han sido guardados correctamente </div>";}
		
	//} 
	//else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>


