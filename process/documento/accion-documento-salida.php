<?php
session_start();
		
	if(trim($_POST["id_tipo_documento"]) != "" && trim($_POST["fecha_documento"]) != "" && trim($_POST["id_empresa"]) != ""){	
	

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();
		
		
		$tipo   	  = $oGlobals->iFilter->process($_POST["id_tipo_documento"]);
		$remision     = $oGlobals->iFilter->process($_POST["remision"]);
		$id_empresa   = $oGlobals->iFilter->process($_POST["id_empresa"]);
		$client       = explode(" - ", $oGlobals->iFilter->process($_POST["text_cliente"]));

		$con_emp    = " AND id_empresa = ".$id_empresa;
		$tipo_d 	= $oGlobals->verOpcionesPor("tipos_documentos", " AND id_tipo_origen = $tipo ".$con_emp, 0);

		if($remision != ''){

			$doc_rem = $oGlobals->verOpcionesPor("mov", " AND documento = '$remision' ".$con_emp, 0);

			if($doc_rem == 2) { echo "<div class='error'>La factura que estás ingresando NO existe</div>"; return; }
		}
		
		if($tipo_d != 2){
		
			$documento = $oGlobals->generarConsecutivoDe(" AND id_tipo_origen = $tipo ".$con_emp, "-", 1);
			
			if($documento != 2){

				$cliente_id   = $oGlobals->iFilter->process($_POST["cliente_id"]);
				
				$tercero = $oGlobals->verOpcionesPor("terceros", " AND codigo = '".trim($client[0])."' ".$con_emp, 0);

				if($tercero == 2) { echo "<div class='error'>El cliente ingresado NO existe, debes colocar un cliente que exista</div>"; return;}

			
				$_POST["documento"] 				= $documento;
				$_POST["tipo_documento"]			= $tipo_d["codigo"];
				$_POST["cerrado"]   				= 0;
				$_POST["cliente_direccion"]       	= utf8_encode($tercero["direccion"]);	
				$_POST["cliente_telefono"]       	= utf8_encode($tercero["telefono"]);				
				$_POST["cliente_codigo"] 			= utf8_encode($tercero["codigo"]);
				$_POST["cliente_ciudad"] 			= utf8_encode($tercero["ciudad"]);
				$_POST["cliente_identificacion"] 	= utf8_encode($tercero["identificacion"]);
				$_POST["cliente_email"] 			= utf8_encode($tercero["email"]);
				$_POST["cliente_nombre"] 			= utf8_encode($tercero["nombre"])." ".utf8_encode($tercero["apellido"]);
				$_POST["cliente_movil"] 			= utf8_encode($tercero["movil"]);
				$_POST['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador'] 		= $_SESSION['idUsuario'];
				$_POST['id_empresa'] 				= $id_empresa;
				$_POST['fecha_registro'] 			= date("Y-m-d h:i:s");
				
				$array = $_POST;
			
				$insert = $oGlobals->insert_data_array($array, "mov");
				
				if($insert != 0) {
					
					if($tipo_d["codigo"] == "DVS"){

						$mov_r = $oGlobals->verOpcionesPor("mov_r", " AND documento = '".$_POST["remision"]."'", 1);

						if($mov_r != 2){

							foreach ($mov_r as $detalle) {

								$_POST["entrada"]			  = $detalle["salida"];
								$_POST["tipo_documento"]	  = $tipo_d["codigo"];
								$_POST["valor_unitario"]	  = $detalle["valor_unitario"];
								$_POST["sub_total"]		      = $detalle["sub_total"];
								$_POST["codigo"]     		  = $detalle["codigo"];
								$_POST["referencia"] 		  = $detalle["referencia"];
								$_POST["detalle"]     		  = utf8_encode($detalle["detalle"]);
								$_POST['creado_por'] 		  = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
								$_POST['id_usuario_creador']  = $_SESSION['idUsuario'];
								$_POST['id_empresa'] 		  = $_SESSION["id_empresa"];
								$_POST['fecha_registro'] 	  = date("Y-m-d h:i:s");
						
								$dvs = $oGlobals->insert_data_array($_POST, "mov_r"); 
								
							}
						}

					}

					echo "<div class='exito'>El documento se ha creado con éxito</div> <script>setTimeout('self.location=\"../documentos/menu_detalle-devolucion_$insert.html\"', 2000)</script>";

				}
				else echo "<div class='error'>Ha ocurrido un error creando el documento</div>";			
				
			}
		}
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
