<?php
session_start();

		$close		= '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
		$espacio    = '&nbsp;';
		

	if(trim($_POST["id"]) != "" && trim($_POST["cant"]) != ""){
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$id       = $oGlobals->iFilter->process(utf8_decode($_POST['id']));
		$codigo   = $id;
		$cantidad = $oGlobals->iFilter->process(utf8_decode($_POST['cant']));

		$con_emp = " AND id_empresa = ".$_SESSION['id_empresa'];
		

		$producto   = $oGlobals->verOpcionesPor("referencias", " AND codigo = '$id' $con_emp", 0);
		$precio	    = $oGlobals->verOpcionesPor("precios", " AND codigo = '$codigo' AND lista = '02' $con_emp", 0);

		$disponible = 5;

		if($producto != 2){

			if($disponible > 0){

			//	unset($_SESSION["ped_pos"]);

				//echo "Variable ".$_SESSION["ped_pos"];

				if(!isset($_SESSION["ped_pos"]) || (isset($_SESSION["ped_pos"]) && trim($_SESSION["ped_pos"]) == '')){

					//echo "aquí 1";

					$add_pps["documento"] 				= $documento = $oGlobals->generarConsecutivoDe(" AND id = 13", "", 1);;
					$add_pps["id_tipo_documento"] 		= 13;
					$add_pps["tipo"] 					= "PPS";
					$add_pps["year"] 					= date("Y");
					$add_pps["fecha"] 					= date("Y-m-d");
					$add_pps["periodo"] 				= date("m");
					$add_pps["id_ciudad_pedido"] 		= 0;
					$add_pps["direccion"] 				= "";
					$add_pps["obs"] 					= "Pedido POS Caja 1";
					$add_pps["vendedor"] 				= $_SESSION["idUsuario"];
					$add_pps["valor_pedido"] 			= 0;
					$add_pps["documento_cruce"] 		= "";
					$add_pps["forma_pago"] 				= "";
					$add_pps["bodega"] 					= "01";
					$add_pps["cerrado"] 				= "0";
					$add_pps["facturado"] 				= "0";
					$add_pps["id_cliente"] 				= "";
					$add_pps["cliente_codigo"] 			= "";
					$add_pps["cliente_ciudad"] 			= "";
					$add_pps["cliente_direccion"] 		= "";
					$add_pps["cliente_email"] 			= "";
					$add_pps["cliente_identificacion"] 	= "";
					$add_pps["cliente_nombre"] 			= "";
					$add_pps["cliente_telefono"] 		= "";
					$add_pps["cliente_movil"] 			= "";
					$add_pps["estado_pedido"] 			= "";
					$add_pps["param_dcto"] 				= "";
					$add_pps["fecha_facturado"] 		= "";
					$add_pps['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
					$add_pps['id_usuario_creador'] 		= $_SESSION['idUsuario'];
					$add_pps['id_empresa'] 				= $_SESSION["id_empresa"];
					$add_pps['fecha_registro'] 			= date("Y-m-d h:i:s");

					// datos del cajero
					$usuarios="SELECT * FROM config_usuarios
                    where usuario='".$_SESSION["usuario"]."'";
                    $usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
                    $add_pps['cajero'] 				   =$usuario['usuario'];
                    //traer cuadre, caja y almacen
                    $estado_caja="SELECT * FROM pos_cuadre
        			where cajero='".$usuario['usuario']."' and cerrado='0'";
        			$estado_cajaa = $oGlobals->verPorConsultaPor($estado_caja, 0);
        			$add_pps['caja'] 				   =$estado_cajaa['caja'];
        			$add_pps['cod_almacen'] 		   =$estado_cajaa['almacen'];
        			$add_pps['cuadre'] 				   =$estado_cajaa['numero'];


					$ins_ped = $oGlobals->insert_data_array($add_pps, "mov_pedido");

					if($ins_ped != 0) $_SESSION["ped_pos"] = $add_pps["documento"];

				}

				if(isset($_SESSION["ped_pos"]) && trim($_SESSION["ped_pos"]) != ""){

					//echo "aquí 2";

					$pedido = $oGlobals->verOpcionesPor("mov_pedido", " AND documento = '".$_SESSION["ped_pos"]."'", 0);

					$add_pps_d["year"] 					= $pedido["year"];
					$add_pps_d["periodo"] 				= $pedido["periodo"];
					$add_pps_d["cantidad_cumplida"] 	= 0;
					$add_pps_d["cantidad_pedida"] 		= $cantidad;
					$add_pps_d["cantidad_baja"] 		= 0;
					$add_pps_d["cantidad_existencia"] 	= $disponible;
					$add_pps_d["valor_real"] 			= $precio["precio"];
					$add_pps_d["valor_unitario"] 		= $precio["precio"];
					$add_pps_d["valor_sugerido"] 		= 0;
					$add_pps_d["sub_sugerido"] 			= 0;
					$add_pps_d["sub_pedido"] 			= $precio["precio"] * $cantidad;
					$add_pps_d["sub_real"] 				= $precio["precio"] * $cantidad;
					$add_pps_d["IVA"] 					= 0;
					$add_pps_d["referencia"] 			= $producto["referencia"];
					$add_pps_d["codigo"] 				= $producto["codigo"];
					$add_pps_d["detalle"] 				= utf8_encode($producto["nombre"]);
					$add_pps_d["dcto"] 					= 0;
					$add_pps_d["documento"] 			= $pedido["documento"];
					$add_pps_d["id_tipo_documento"] 	= $pedido["id_tipo_documento"];
					$add_pps_d["tipo_documento"] 		= $pedido["tipo"];;
					$add_pps_d["bodega"] 				= "01";
					$add_pps_d['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
					$add_pps_d['id_usuario_creador'] 	= $_SESSION['idUsuario'];
					$add_pps_d['id_empresa'] 			= $_SESSION["id_empresa"];
					$add_pps_d['fecha_registro'] 		= date("Y-m-d h:i:s");

					// datos del cajero
					$usuarios="SELECT * FROM config_usuarios
                    where usuario='".$_SESSION["usuario"]."'";
                    $usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
                    $add_pps_d['cajero'] 				   =$usuario['usuario'];
                    //traer cuadre, caja y almacen
                    $estado_caja="SELECT * FROM pos_cuadre
        			where cajero='".$usuario['usuario']."' and cerrado='0'";
        			$estado_cajaa = $oGlobals->verPorConsultaPor($estado_caja, 0);
        			$add_pps_d['caja'] 				   =$estado_cajaa['caja'];
        			$add_pps_d['cod_almacen'] 		   =$estado_cajaa['almacen'];
        			$add_pps_d['cuadre'] 				   =$estado_cajaa['numero'];

					$ins_ped_dt = $oGlobals->insert_data_array($add_pps_d, "mov_r_pedidos");
					
					if($ins_ped_dt != 0){

						echo '<div class="cloudAlertProd alert alert-success">'.$close.'<strong>Producto agregado con éxito</strong>'.$espacio.' <script>$("#txt_producto").val("");</script></div> ';

						$sub_total = $precio["precio"] * $cantidad;

						$sql = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$pedido["documento"]."'";
						$total = $oGlobals->verPorConsultaPor($sql, 0);
?>
						<script>
					
							html = '<div class="tab bBS1 p10 deleteposall" id="tr_car_<?= $ins_ped_dt;?>">\
										<div class="tabIn" style="width:50px;">\
											<img src="../static-pictures/products/200x200/foto.jpg" class="rr50 bS1" alt="">\
										</div>\
										<div class="tabIn pLR10">\
											<div class="ff3 t16 color333"><a href="#load_talla" onclick="Funciones.cargar_modal_estructura(\'<?= $ins_ped_dt;?>\', \'cambiar_precio_venta_pos\', \'load_talla\', 2);" data-toggle="modal"><?= utf8_encode($producto["nombre"]);?></a></div>\
											<div class="color666">\
												$<span id="valor_<?= $ins_ped_dt;?>"><?= number_format($precio["precio"], 0, "", ".");?></span> |\
												<span class="colorVerde"><?= utf8_encode($producto["referencia"]);?></span> |\
												<span class="colorVerde"><?= utf8_encode($producto["codigo"]);?></span>\
											</div>\
										</div>\
										<div class="tabIn taC ff3 colorVerde2" style="width:50px;" id="cantidad_<?= $ins_ped_dt?>"><?= number_format($cantidad, 0, "", ".");?></div>\
										<div class="tabIn taR ff2 color666 t16" style="width:80px;">$<span id="sub_total_<?= $ins_ped_dt?>"><?= number_format($sub_total, 0, "", ".");?></span></div>\
										<div class="tabIn taR" style="width: 35px;">\
											<i onclick="Funciones.eliminar_registro(\'<?= $ins_ped_dt;?>\', \'eliminar_registro_pos\', \'rspdasds\', \'tr_car_\');" class="rr50 t12 colorfff bDelete fa fa-trash cP" style="padding: 5px 6px;"></i>\
										</div>\
									</div>';

							$("#tb_divi").append(html);
							$("#total_pos").text("<?= number_format($total["total"], 0, "", ".");?>");
						</script>			
<?php						
					}
				}
				else echo '<div class="cloudAlertProd alert alert-danger">'.$close.' <strong>Hubo problemas agregando el producto</strong>'.$espacio.'</div>';	
			}
			else echo '<div class="cloudAlertProd alert alert-danger">'.$close.' <strong>No hay unidades disponibles</strong>'.$espacio.'</div>';
		} 
		 else echo '<div class="cloudAlertProd alert alert-danger">'.$close.' <strong>Este producto NO se puede agregar</strong>'.$espacio.'</div>';
		
	}
	else echo '<div class="cloudAlertProd alert alert-danger">'.$close.' <strong>Debes colocar la cantidad</strong>'.$espacio.'</div>';

?>
<script>$(".cloudAlertProd").fadeOut(11000);</script>