<?php
session_start();
		
		if($_POST['id'] != "" && $_POST['table'] != "" && $_POST['value'] != ""){
								

			require_once '../../class/classGlobal.php';
			
			$oGlobals    = new Globals();	

			$con_emp = ""; 

			if($_SESSION["tipo_rol"] != 1) $con_emp = " AND id_empresa = ".$_SESSION['id_empresa']; 
			
			$id    = $oGlobals->iFilter->process($_POST['id']);
			$table = $oGlobals->iFilter->process($_POST['table']);
			$value = $oGlobals->iFilter->process($_POST['value']);
			
			if($table == "finalizar-compra"){

				$documento      = $oGlobals->verOpcionesPor("mov", " AND id = '$id' ".$con_emp, 0);
				$upp["cerrado"] = 1;
				$upp['fecha_modificacion'] = date("Y-m-d h:i:s");

				$update = $oGlobals->update_data_array($upp, "mov", "id", $documento["id"]);

			
           if($update != 2) {

						$con_emp = " AND id_empresa = ".$documento['id_empresa']; 
						
						$sql = "SELECT SUM(sub_total) AS sub_total FROM mov_r WHERE documento = '".$documento["documento"]."' ".$con_emp;
						$sub = $oGlobals->verPorConsultaPor($sql, 0);

						$insr["documento"] 				= $documento["documento"];
						$insr["id_tipo_documento"] 		= $documento["id_tipo_documento"];
						$insr["tipo_documento"] 		= $documento["tipo_documento"];
						$insr["tipo_cuenta"] 		    = "CXP";
						$insr["year"] 					= $documento["year"];
						$insr["periodo"] 				= $documento["periodo"];
						$insr["obs"] 					= "";
						$insr["fecha_documento"] 		= $documento["fecha_documento"];
						$insr["fecha_vence"] 			= $documento["fecha_vence"];
						$insr["valor"] 					= $sub["sub_total"];
						$insr["dcto"] 					= 0;
						$insr["saldo"] 					= $sub["sub_total"];
						$insr["id_categoria"] 			= $documento["id_categoria"];
						$insr["cerrado"] 				= 0;
						

						$cartera = $oGlobals->verOpcionesPor("mov_cartera", " AND documento = '".$documento["documento"]."' ".$con_emp, 0);

						if($cartera == 2) {

							$insr['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
							$insr['id_usuario_creador'] 	= $_SESSION['idUsuario'];
							$insr['id_empresa'] 			= $documento["id_empresa"];
							$insr['fecha_registro'] 		= date("Y-m-d h:i:s");

							$insert = $oGlobals->insert_data_array($insr, "mov_cartera");
						}
						else {
							
							$insr['fecha_modificacion'] = date("Y-m-d h:i:s");
							$upp = $oGlobals->update_data_array($insr, "mov_cartera", "id", $cartera["id"]);
						}

						echo "<div class='exito'>El documento ha sido finalizado correctamente</div> <script>setTimeout('self.location=\"\"', 2000)</script></div>";
					}
					else echo "<div class='error'>No se ha podido guardar los cambios</div>";
				}
				else echo "<div class='error'>";


			if($table == "finalizar_factura_pos"){

				$doc 			= $_SESSION["ped_pos"];
				$documento      = $oGlobals->verOpcionesPor("mov_pedido", " AND documento = '$doc' ".$con_emp, 0);
				
				if($documento != 2){

					$detalle = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND documento = '$doc' ".$con_emp, 1);

					// datos totales de la factura
					$movimientos="SELECT sum(sub_pedido) as 'total', sum(cantidad_pedida) as 'unidades' FROM mov_r_pedidos
                    where documento = '$doc'";
                    $movimientos2 = $oGlobals->verPorConsultaPor($movimientos, 0);

                    // datos del cliente
			       $cliente="SELECT * FROM mov_pedido where documento = '$doc'";
                   $cliente2 = $oGlobals->verPorConsultaPor($cliente, 0);

                    

					if($detalle != 2){

						$upp_ped["valor_pedido"]    = $movimientos2['total'];
						$upp_ped["cantidad_pedido"] = $movimientos2['unidades'];
						$upp_ped["facturado"] 	  = 1;
						$upp_ped["cerrado"] 	  = 1;
						$upp_ped["fecha_cerrado"] = date("Y-m-d h:i:s");

						$upppp = $oGlobals->update_data_array($upp_ped, "mov_pedido", "documento", $doc);

     if($upppp == 1){

			$add_fac["valor"]    = $movimientos2['total'];
			$add_fac["cantidad"] = $movimientos2['unidades'];

			$add_fac["documento"] 				= $oGlobals->generarConsecutivoDe(" AND id = 14", "-", 1);
			$add_fac["id_tipo_documento"] 		= "14";
			$add_fac["tipo_documento"] 			= "RPS";
			$add_fac["obs"] 					= "Remsión POS";
			$add_fac["cerrado"] 				= 1;
			$add_fac["fecha_cerrado"] 			= date("Y-m-d");
			$add_fac["fecha_documento"] 		= date("Y-m-d");
			$add_fac["periodo"] 				= date("m");;
			$add_fac["year"] 					= date("Y");;
			$add_fac["pedido"] 					= $doc;
			$add_fac["vendedor"] 				= $_SESSION['idUsuario'];
			$add_fac["id_cliente"] 				= $cliente2['id_cliente'];
			$add_fac["cliente_codigo"] 			= $cliente2['cliente_codigo'];
			$add_fac["cliente_ciudad"] 			= $cliente2['cliente_ciudad'];
			$add_fac["cliente_direccion"] 		= $cliente2['cliente_direccion'];
		    $add_fac["cliente_email"] 			= $cliente2['cliente_email'];
			$add_fac["cliente_identificacion"] 	= $cliente2['cliente_identificacion'];
			$add_fac["cliente_nombre"] 			= $cliente2['cliente_nombre'];
			$add_fac["cliente_telefono"] 		= $cliente2['cliente_telefono'];
		    $add_fac["cliente_movil"] 			= $cliente2['cliente_movil'];
			$add_fac["bodega_entrada"] 			= "";
			$add_fac["bodega_salida"] 			= "01";
			$add_fac['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$add_fac['id_usuario_creador'] 		= $_SESSION['idUsuario'];
			$add_fac['id_empresa'] 				= $_SESSION["id_empresa"];
			$add_fac['fecha_registro'] 			= date("Y-m-d h:i:s");
            // datos del cajero
			$usuarios="SELECT * FROM config_usuarios
		                    where usuario='".$_SESSION["usuario"]."'";
		    $usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
		    $add_fac['cajero'] 				   =$usuario['usuario'];
		                    //traer cuadre, caja y almacen
		    $estado_caja="SELECT * FROM pos_cuadre
		        			where cajero='".$usuario['usuario']."' and cerrado='0'";
		    $estado_cajaa = $oGlobals->verPorConsultaPor($estado_caja, 0);
		    $add_fac['caja'] 				   =$estado_cajaa['caja'];
		    $add_fac['cod_almacen'] 		   =$estado_cajaa['almacen'];
		    $add_fac['cuadre'] 				   =$estado_cajaa['numero'];
                            
            $insert_Fac = $oGlobals->insert_data_array($add_fac, "mov");

							if($insert_Fac != 2){

								foreach ($detalle as $producto) {

									$add_fac_dt['documento'] 			= $add_fac["documento"] ;
									$add_fac_dt['tipo_documento'] 		= $add_fac["tipo_documento"] ;
									$add_fac_dt['codigo'] 				= $producto["codigo"];
									$add_fac_dt['referencia'] 			= utf8_encode($producto["referencia"]);
									$add_fac_dt['detalle'] 				= utf8_encode($producto["detalle"]);
									$add_fac_dt['can_ped'] 				= $producto["cantidad_pedida"];
									$add_fac_dt['salida'] 				= $producto["cantidad_pedida"];
									$add_fac_dt['entrada'] 				= 0;
									$add_fac_dt['valor_real'] 			= $producto["valor_real"];
									$add_fac_dt['valor_unitario'] 		= $producto["valor_unitario"];
									$add_fac_dt['sub_total'] 			= $producto["cantidad_pedida"] * $producto["valor_unitario"]; ;
									$add_fac_dt['sub_total_real'] 		= $producto["cantidad_pedida"] * $producto["valor_real"];
									$add_fac_dt['periodo'] 				= date("m");;
									$add_fac_dt['year'] 				= date("Y");;
									$add_fac_dt['dcto_comercial_porc'] 	= 0;
									$add_fac_dt['dcto_comercial'] 		= 0;
									$add_fac_dt['costo'] 				= 0;
									$add_fac_dt['bodega_entrada'] 		= "";
									$add_fac_dt['bodega_salida'] 		= "01";
									$add_fac_dt['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
									$add_fac_dt['id_usuario_creador'] 	= $_SESSION['idUsuario'];
									$add_fac_dt['id_empresa'] 			= $_SESSION["id_empresa"];
									$add_fac_dt['fecha_registro'] 		= date("Y-m-d h:i:s");

									// datos del cajero
							$usuarios="SELECT * FROM config_usuarios
		                    where usuario='".$_SESSION["usuario"]."'";
		                    $usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
		                    $add_fac_dt['cajero'] 				   =$usuario['usuario'];
		                    //traer cuadre, caja y almacen
		                    $estado_caja="SELECT * FROM pos_cuadre
		        			where cajero='".$usuario['usuario']."' and cerrado='0'";
		        			$estado_cajaa = $oGlobals->verPorConsultaPor($estado_caja, 0);
		        			$add_fac_dt['caja'] 				   =$estado_cajaa['caja'];
		        			$add_fac_dt['cod_almacen'] 		   =$estado_cajaa['almacen'];
		        			$add_fac_dt['cuadre'] 				   =$estado_cajaa['numero'];

									$insert_fac_dt = $oGlobals->insert_data_array($add_fac_dt, "mov_r");
									
									
								}
							}

							if($insert_fac_dt != 2) {

								$id=$documento["id"];
										
echo "<div class='exito'><br><br>El documento ha sido finalizado correctamente</div> 
	  <META HTTP-EQUIV='REFRESH' CONTENT='2;URL=../pos/ver-factura_".$id.".html'>";

								unset($_SESSION["ped_pos"]);
							}
							else echo "<div class='error'</div>";
						}
						else echo "<div class='error'>Ha ocurrido un error pagando</div>";
					}

				}
			}
			
			if($table == "finalizar_factura"){

				$documento      = $oGlobals->verOpcionesPor("mov", " AND id = '$id' ".$con_emp, 0);

				if($documento != 2){

					$upp["cerrado"] = $value;

					$update = $oGlobals->update_data_array($upp, "mov", "id", $documento["id"]);

					if($update != 2) {

						$con_emp = " AND id_empresa = ".$documento['id_empresa']; 
						
						$sql = "SELECT SUM(sub_total) AS sub_total FROM mov_r WHERE documento = '".$documento["documento"]."' ".$con_emp;
						$sub = $oGlobals->verPorConsultaPor($sql, 0);

						$insr["documento"] 				= $documento["documento"];
						$insr["id_tipo_documento"] 		= $documento["id_tipo_documento"];
						$insr["tipo_documento"] 		= $documento["tipo_documento"];
						$insr["tipo_cuenta"] 		    = "CXC";
						$insr["year"] 					= $documento["year"];
						$insr["periodo"] 				= $documento["periodo"];
						$insr["cliente"] 				= $documento["cliente_codigo"];
						$insr["cliente_nombre"] 		= utf8_encode($documento["cliente_nombre"]);
						$insr["cliente_identificacion"] = $documento["cliente_identificacion"];
						$insr["obs"] 					= "";
						$insr["fecha_documento"] 		= $documento["fecha_documento"];
						$insr["fecha_vence"] 			= $documento["fecha_vence"];
						$insr["valor"] 					= $sub["sub_total"];
						$insr["dcto"] 					= 0;
						$insr["saldo"] 					= $sub["sub_total"];
						$insr["id_categoria"] 			= $documento["id_categoria"];
						$insr["cerrado"] 				= 0;
						

						$cartera = $oGlobals->verOpcionesPor("mov_cartera", " AND documento = '".$documento["documento"]."' ".$con_emp, 0);

						if($cartera == 2) {

							$insr['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
							$insr['id_usuario_creador'] 	= $_SESSION['idUsuario'];
							$insr['id_empresa'] 			= $documento["id_empresa"];
							$insr['fecha_registro'] 		= date("Y-m-d h:i:s");

							$insert = $oGlobals->insert_data_array($insr, "mov_cartera");
						}
						else {
							
							$insr['fecha_modificacion'] = date("Y-m-d h:i:s");
							$upp = $oGlobals->update_data_array($insr, "mov_cartera", "id", $cartera["id"]);
						}

						echo "<div class='exito'>El documento se ha cerrado con éxito</div> <script>setTimeout('self.location=\"../documentos/menu_detalle-factura_$id.html\"', 2000)</script></div>";
					}
					else echo "<div class='error'>No se ha podido guardar los cambios</div>";
				}
				else echo "<div class='error'>No se ha podido finalizar el documento</div>";
			}

			if($table == "finalizar_rc"){

				$documento      = $oGlobals->verOpcionesPor("mov_cartera", " AND id = '$id' ".$con_emp, 0);
				$upp["cerrado"] = $value;

				$update = $oGlobals->update_data_array($upp, "mov_cartera", "id", $documento["id"]);

				if($update != 2) echo "<div class='exito'>El documento se ha cerrado con éxito</div> <script>setTimeout('self.location=\"\"', 2000)</script></div>";
				else echo "<div class='error'>No se ha podido guardar los cambios</div>";
			}

			if($table == "finalizar_devolucion"){

				$documento      = $oGlobals->verOpcionesPor("mov", " AND id = '$id' ".$con_emp, 0);
				
				if($documento != 2){

					$upp["cerrado"] = $value;

					$update = $oGlobals->update_data_array($upp, "mov", "id", $documento["id"]);

					if($update != 2) {

						$con_emp = " AND id_empresa = ".$documento['id_empresa'];

						$sql = "SELECT SUM(sub_total) AS sub_total FROM mov_r WHERE documento = '".$documento["documento"]."' ".$con_emp;
						$sub = $oGlobals->verPorConsultaPor($sql, 0);

						$_POST["tipo_movimiento"] 		= "Devolucion";
						$_POST["documento"] 		    = $documento["documento"];
						$_POST["documento_cruce"]       = $documento["remision"];
						$_POST["credito"] 		        = $sub["sub_total"];
						$_POST["tipo_documento"] 		= $documento["tipo_documento"];
						$_POST["id_tipo_documento"] 	= $documento["id_tipo_documento"];
						$_POST["cliente_codigo"] 		= $documento["cliente_codigo"];
						$_POST["cliente_identifiacion"] = $documento["cliente_identificacion"];
						$_POST["cliente_nombre"] 		= utf8_encode($documento["cliente_nombre"]);
						$_POST["fecha_vence"] 			= $documento["fecha_vence"];
						
						$cartera = $oGlobals->verOpcionesPor("mov_r_cartera", " AND documento = '".$documento["documento"]."' ".$con_emp, 0);

						if($cartera == 2) {

							$_POST["id_empresa"]     = $documento["id_empresa"];
							$_POST["fecha_creacion"] = date("Y-m-d h:i:s");
							$insert_mov_car = $oGlobals->insert_data_array($_POST, "mov_r_cartera");
						}
						else $upp = $oGlobals->update_data_array($_POST, "mov_r_cartera", "id", $cartera["id"]);

						if($update != 2) echo "<div class='exito'>El documento se ha cerrado con éxito</div> <script>setTimeout('self.location=\"\"', 2000)</script></div>";
						else echo "<div class='error'>No se ha podido guardar los cambios</div>";

					}
				}
				else echo "<div class='error'>No se ha podido finalizar el documento</div>";

			}
			
			if($table == "cerrar_venta_pos"){

				$upp["cerrado"] = $value;

				$update = $oGlobals->update_data_array($upp, "mov_pedido", "id", $id);

				echo "<div class='exito'>La venta se ha cerrado correctamente</div> <script>setTimeout('self.location=\"\"', 2000)</script>";
			}

			if($table == "cerrar_todas_venta_pos"){

				$apertura      = "SELECT * FROM pos_cuadre where cajero='".$_SESSION["usuario"]."' and cerrado='0'";
				$dato_apertura = $oGlobals->verPorConsultaPor($apertura, 0);
				
				$id     = $dato_apertura['id'];
				$numero = $dato_apertura['numero'];
				$caja   = $dato_apertura['caja'];
				$cajero = $dato_apertura['cajero'];
				
				$apertura      = "UPDATE mov_pedido SET cerrado = 1 WHERE caja='".$caja."' and cajero='".$cajero."' and cuadre='".$numero."' and cerrado='0' ";
       			$dato_apertura = $oGlobals->verPorConsultaPor($apertura, 0);

				echo "<div class='exito'>Las ventas se han cerrado correctamente</div> <script>setTimeout('self.location=\"\"', 2000)</script>";
			}

			

			

		} 

?>
