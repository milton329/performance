<?php
session_start();
		
	if(trim($_POST["text_cliente"]) != "" && trim($_POST["id_tipo_documento"]) != ""){	
	

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$id     	= $oGlobals->iFilter->process($_POST['id']);
		$cliente    = explode("-", $oGlobals->iFilter->process($_POST["text_cliente"]));
        $cliente_id = $cliente[0];

		$insert = 0;
		$update = 2;

				
		$con_emp = " AND id_empresa = '1'";
		$tipo    = $oGlobals->iFilter->process($_POST["id_tipo_documento"]);
		$tipo_d  = $oGlobals->verOpcionesPor("tipos_documentos", " AND id_tipo_origen = $tipo ".$con_emp, 0);
		
		
		if($tipo_d != 2){
		
			$documento = $oGlobals->generarConsecutivoDe(" AND id_tipo_origen = $tipo ".$con_emp , "-", 1);

			if($documento != 2){
				
				$tercero = $oGlobals->verOpcionesPor("terceros", " AND codigo = '$cliente_id'", 0);
			
				$_POST["documento"] 				= $documento;
				$_POST["tipo"]						= $tipo_d["codigo"];
				$_POST["cerrado"]   				= 0;
				$_POST["cliente_direccion"]       	= utf8_encode($tercero["direccion"]);	
				$_POST["cliente_telefono"]       	= utf8_encode($tercero["telefono"]);				
				$_POST["cliente_codigo"] 			= utf8_encode($tercero["codigo"]);
				$_POST["cliente_identificacion"] 	= utf8_encode($tercero["identificacion"]);
				$_POST["cliente_email"] 			= utf8_encode($tercero["email"]);
				$_POST["cliente_nombre"] 			= utf8_encode($tercero["nombre"])." ".utf8_encode($tercero["apellido"]);
				$_POST["cliente_movil"] 			= utf8_encode($tercero["movil"]);
				$_POST['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador'] 		= $_SESSION['idUsuario'];
				$_POST['id_empresa'] 				= $_SESSION["id_empresa"];
				$_POST['fecha'] 					= date("Y-m-d h:i:s");

				$array = $_POST;
			
				$insert = $oGlobals->insert_data_array($array, "mov_pedido");
				
				if($insert != 0) echo "<div class='exito'>El documento se ha creado con éxito</div> <script>setTimeout('self.location=\"../pedidos/menu_detalle-pedidos_$insert.html\"', 2000)</script>";
				else			 echo "<div class='error'>Ha ocurrido un error creando el documento</div>";			
				
			}
		}
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
