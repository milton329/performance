<?php
session_start();
		
	if(trim($_POST["proveedor"]) != "" && trim($_POST["id_tipo_documento"]) != "" && trim($_POST["fecha_documento"]) != ""){	
	

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$id_empresa     = $oGlobals->iFilter->process($_POST["id_empresa"]);
		$bodega_entrada = $oGlobals->iFilter->process($_POST["bodega_entrada"]);
		$proveedor      = explode("-", $oGlobals->iFilter->process($_POST["proveedor"]));
		$id_proveedor   = $proveedor[0];

		if($id_empresa == "")     { echo "<div class='error'>Debes seleccionar una empresa</div>"; return; }
		if($bodega_entrada == "") { echo "<div class='error'>Debes seleccionar una bodega</div>"; return; }

		
		$con_emp = " AND id_empresa = ".$id_empresa;
		$tipo    = $oGlobals->iFilter->process($_POST["id_tipo_documento"]);
		$tipo_d  = $oGlobals->verOpcionesPor("tipos_documentos", " AND id_tipo_origen = $tipo ".$con_emp, 0);
		
		
		if($tipo_d != 2){
		
			$documento = $oGlobals->generarConsecutivoDe(" AND id_tipo_origen = $tipo ".$con_emp , "-", 1);

			if($documento != 2){
				
				$tercero = $oGlobals->verOpcionesPor("terceros", " AND id = $id_proveedor", 0);
			
				$_POST["documento"] 				= $documento;
				$_POST["tipo_documento"]			= $tipo_d["codigo"];
				$_POST["cerrado"]   				= 0;
				$_POST["cliente_direccion"]       	= utf8_encode($tercero["direccion"]);	
				$_POST["cliente_telefono"]       	= utf8_encode($tercero["telefono"]);				
				$_POST["cliente_codigo"] 			= utf8_encode($tercero["codigo"]);
				$_POST["cliente_ciudad"] 			= utf8_encode($tercero["id_ciudad"]);
				$_POST["cliente_identificacion"] 	= utf8_encode($tercero["identificacion"]);
				$_POST["cliente_email"] 			= utf8_encode($tercero["email"]);
				$_POST["cliente_nombre"] 			= utf8_encode($tercero["nombre"])." ".utf8_encode($tercero["apellido"]);
				$_POST["cliente_movil"] 			= utf8_encode($tercero["movil"]);
				$_POST['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador'] 		= $_SESSION['idUsuario'];
				$_POST['id_empresa'] 				= $_SESSION["id_empresa"];
				$_POST['fecha_registro'] 			= date("Y-m-d h:i:s");
				$_POST["id_proveedor"]		    	= $id_proveedor;

				$array = $_POST;
			
				$insert = $oGlobals->insert_data_array($array, "mov");
				
				if($insert != 0) echo "<div class='exito'>El documento se ha creado con éxito</div> <script>setTimeout('self.location=\"../documentos/menu_detalle-documento_$insert.html\"', 2000)</script>";
				else			 echo "<div class='error'>Ha ocurrido un error creando el documento</div>";			
				
			}
		}
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
