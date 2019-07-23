<?php
session_start();
			
	if(trim($_POST['fecha_documento']) != "" && trim($_POST['id_tipo_documento']) != "" && trim($_POST['id_empresa']) != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	

		
		$id     	= $oGlobals->iFilter->process($_POST['id']);
		$cliente_id = $oGlobals->iFilter->process($_POST['cliente_id']);
		$id_tipo    = $oGlobals->iFilter->process($_POST['id_tipo_documento']);
		$id_empresa = $oGlobals->iFilter->process($_POST['id_empresa']);
		$fecha      = explode("-", $oGlobals->iFilter->process($_POST['fecha_documento']));
		$insert = 0;
		$update = 2;

		$con_emp    = " AND id_empresa = ".$id_empresa;
		
		$usuario  = $oGlobals->verOpcionesPor("terceros", " AND id = $cliente_id", 0);
		$tipo_doc = $oGlobals->verOpcionesPor("tipos_documentos", " AND id_tipo_origen = $id_tipo ".$con_emp, 0);
		
		if($id == "") {
			
			$_POST["documento"] 	      = $oGlobals->generarConsecutivoDe("AND codigo = '".$tipo_doc["codigo"]."'".$con_emp,"-", 1);
			$_POST["tipo_documento"]      = $tipo_doc["codigo"];
			$_POST["periodo"]     		  = $fecha[1];
			$_POST["year"]     			  = $fecha[0];
			$_POST["cliente_id"]    	  = $usuario["id"];
			$_POST["cliente_codigo"]      = $usuario["codigo"];
			$_POST["cliente_nombre"]      = utf8_encode($usuario["nombre"]." ".$usuario["apellido"]);
			$_POST['creado_por'] 		  = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST['id_usuario_creador']  = $_SESSION['idUsuario'];
			$_POST['id_empresa'] 		  = $id_empresa;
			$_POST['fecha_registro'] 	  = date("Y-m-d h:i:s"); 

			$insert  = $oGlobals->insert_data_array($_POST, "mov");
			
		}
		else {
			
			$_POST['fecha_modificacion'] = date("Y-m-d h:i:s");
			$update  = $oGlobals->update_data_array($_POST, "mov", "id", $id);
		}

		if($insert != 0)  	  echo "<div class='exito'>El documento se ha creado correctamente</div> <script>setTimeout('self.location=\"menu_detalle-traslado_$insert.html\"', 2000)</script>";
		else if($update != 2) echo "<div class='exito'>Categoría modificada correctamente</div>";
		else 				  echo "<div class='error'>No se puede guardar la categoría</div>";
	}
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";
?>


             

    

