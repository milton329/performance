<?php 
		
		/**************************** Configuración *******************************/
		
			$get    = "";
			$id     = "";
			$action = "";
			$true   = 2;
			$con    = "";
	
			if($folderDirect != "" && isset($_GET["var"]))		$get = $_GET["var"];		
			
			if(isset($get)) { 
				
				$url = explode("_", $get); 
				$action = $url[0];
				
				if		(isset($url[4]))	$id = $url[4];
				else if	(isset($url[3]))	$id = $url[3];
				else if	(isset($url[2]))	$id = $url[2];
				else if	(isset($url[1]))	$id = $url[1];
	
			}

		/*********************** Configuración proyecto ******************************/	
		
			require_once('../class/class.inputfilter.php');
			require_once '../class/classGlobal.php';
			
			$iFilter   = new InputFilter();	
			$oGlobals  = new Globals();

			if(isset($_SESSION['empresa'])) $id_empresa = $_SESSION['empresa'];
			else $id_empresa = 1;
			
			$info_empresa = $oGlobals->verOpcionesPor("config_informacion_empresa", " AND id = $id_empresa", 0);
			
			if(isset($_SESSION['Usuario']))		$usuario    = $_SESSION['Usuario'];
			if(isset($_SESSION['idUsuario']))	$id_usuario = $_SESSION['idUsuario'];
			if(isset($_SESSION['nombre']))		$nombre 	= $_SESSION['nombre'];
			if(isset($_SESSION['apellido']))	$apellido 	= $_SESSION['apellido'];
			if(isset($_SESSION['email']))		$email 		= $_SESSION['email'];
			if(isset($_SESSION['admin']))		$admin 		= $_SESSION['admin'];
			if(isset($_SESSION['rol']))			$rol 		= $_SESSION['rol'];
			if(isset($_SESSION['id_empresa']))	$id_empresa = $_SESSION['id_empresa'];
			if(isset($_SESSION['tipo_rol']))	$tipo_rol   = $_SESSION['tipo_rol'];


			$con_emp     = "";
			$con_empresa = "";

			if($_SESSION["tipo_rol"] != 1) {
				
				$con_emp     = " AND id_empresa = ".$id_empresa;
				$con_empresa = " AND id = ".$id_empresa;
			}
			

?>

