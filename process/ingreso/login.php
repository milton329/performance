<?php
session_start();
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();

		if($_POST['user'] != "" && $_POST['pass'] != ""){
					
			$user = $oGlobals->iFilter->process($_POST['user']);
			$pass = md5($_POST['pass']);
			
			$usuario = $oGlobals->verOpcionesPor("config_usuarios", " AND usuario = '$user' AND clave = '$pass' AND inactivo = 0", 0);
			
			if($usuario != 2) {	


				$rol = $oGlobals->verOpcionesPor("config_roles", " AND id = ".$usuario["id_rol"]."", 0);			
				
				$_SESSION['Usuario'] 	= $usuario;
				$_SESSION['idUsuario']  = $usuario["id"];
				$_SESSION['usuario'] 	= $usuario["usuario"];
				$_SESSION['nombre'] 	= $usuario["nombre"];
				$_SESSION['apellido']   = $usuario["apellido"];
				$_SESSION['email']      = $usuario["nombre"];
				$_SESSION['admin']      = $usuario["admin"];
				$_SESSION['rol']     	= $usuario["id_rol"];
				$_SESSION['id_empresa'] = $rol["id_empresa"];
				$_SESSION['tipo_rol']   = $rol["id_tipo_rol"];

					
				$_SESSION['empresa']    = $rol["empresa"];
				
				
				$sql_opc = "SELECT cmo.*
						FROM config_modulos_opciones_roles AS cmor
						LEFT JOIN config_modulos_opciones AS cmo ON cmor.id_modulo_opcion = cmo.id
						WHERE cmor.id_rol = ".$usuario["id_rol"]." AND cmor.id_modulo = 5 AND mostrar_menu = 1 ORDER BY cmo.id ASC";
						
				$opciones  = $oGlobals->verPorConsultaPor($sql_opc, 1);
				
				if($opciones != 2){
					
					$enlace = "";
					
					foreach($opciones as $opc){
						
						if($opc["id"] == 22)	{ $enlace = "dashboard-tmf.html"; }
						if($opc["id"] == 23)	{ $enlace = "grupo-tdm.html";  }
		
					}
				}
				
				$ini["id_usuario"] 		= $usuario["id"];
				$ini["nombre"] 			= $usuario["nombre"];
				$ini["identificacion"] 	= $usuario["usuario"];
				$ini["email"] 			= $usuario["email"];
				$ini["id_rol"] 			= $usuario["id_rol"];
				$ini["id_empresa"] 		= $usuario["id_empresa"];
				$ini["fecha_ingreso"] 	= date("Y-m-d h:i:s");			
				
				$inicio = $oGlobals->insert_data_array($ini, "inicio_sesion");
				
				echo "<div class='exito'>Iniciando sesión, por favor espere...<script>setTimeout('self.location=\"dashboard/balanced.html\"', 2000)</script></div>";
			}
			else echo "<div class='error'>Usuario o contraseña incorrecta</div>";

		} 
		 else echo "<div class='error'>Debes rellenar los campos obligatorios</div>";

?>

