<?php
session_start();

	if($_POST['id'] != "" && $_POST['action'] != "" && $_POST['tipo'] != ""){
			

		require_once '../../class/classGlobal.php';

		$oGlobals   = new Globals();	

		$id     = $iFilter->process($_POST['id']);
		$tabla  = $iFilter->process($_POST['action']);
		$tipo   = $iFilter->process($_POST['tipo']);

		$con_emp = "";

		if($_SESSION["tipo_rol"] != 1) $con_emp = " AND id_empresa = ".$_SESSION['id_empresa']; 
		
		if($tipo == 1){
		
			$rsp = $oGlobals->verOpcionesPor($tabla, " AND id = $id", 0);
			if($rsp != 2) { 
				echo "<script>"; 
						foreach($rsp as $key => $data){ 
							if($key != "sql_" && $key != "sql_2" && $key != "sql_3" && $key != 1 && $key != 2 && $key != 3 && $key != 4 &&
							   $key != "instancia"  && $key != 8) echo "$('#".$key."').val('".utf8_encode($data)."');";
						} 
				echo "</script>"; 
			
			}
			
			include '../../configuracion/frm/frm-'.$tabla.'.php';	
		
		} else {
			
			if($tabla == "info-modulo"){ 
				
				$modulo   = $oGlobals->verOpcionesPor("config_modulos", " AND id = $id", 0);	
				$opciones = $oGlobals->verOpcionesPor("config_modulos_opciones", " AND id_modulo = $id", 1);				
				
				include '../../configuracion/estructura/estructura-modulo.php'; 
			}
			
			if($tabla == "informe-opciones"){ 
				
				$informe  = $oGlobals->verOpcionesPor("informes", " AND id = $id", 0);	
				$campos   = $oGlobals->verOpcionesPor("informes_campos", " AND id_informe = $id", 1);					
				
				include '../../configuracion/estructura/estructura-informe.php'; 
			}
			
			if($tabla == "conf-rol"){ 
				
				$rol      = $oGlobals->verOpcionesPor("config_roles", " AND id = $id", 0);	
				$modulos  = $oGlobals->verOpcionesPor("config_modulos", "", 1);					
				
				include '../../configuracion/estructura/estructura-rol.php'; 
			}
			
			if($tabla == "opciones-modulo"){ 
				
				$var = explode("_", $id);
				
				$id_modulo = $var[0];
				$id_rol    = $var[1];
				
				$modulo   = $oGlobals->verOpcionesPor("config_modulos", " AND id = $id_modulo", 0);	
				$opciones = $oGlobals->verOpcionesPor("config_modulos_opciones", " AND id_modulo = $id_modulo", 1);					
				
				include '../../configuracion/estructura/estructura-rol-permisos.php'; 
			}
			
			if($tabla == "opciones-tres-modulo"){ 
				
				$var = explode("_", $id);
				
				$id_opcion = $var[0];
				$id_rol    = $var[1];
				
				$opcion      = $oGlobals->verOpcionesPor("config_modulos_opciones", " AND id = $id_opcion", 0);	
				$opcion_tres = $oGlobals->verOpcionesPor("config_modulos_opciones_tres", " AND id_opcion = $id_opcion", 1);					
				
				include '../../configuracion/estructura/estructura-rol-permisos.php'; 
			}
			
			
			if($tabla == "conf-usuario"){ 
				
				$usuario    = $oGlobals->verOpcionesPor("config_usuarios", " AND id = $id", 0);	
				$almacenes  = $oGlobals->verOpcionesPor("almacenes", "", 1);					
				
				include '../../usuarios/estructura/estructura-usuario-almacen.php'; 
			}
			
			if($tabla == "edit-usuario"){ 
				
				$usuario    = $oGlobals->verOpcionesPor("config_usuarios", " AND id = $id", 0);	
				if($usuario != 2) { 
					echo "<script>"; 
							foreach($usuario as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}
				$tipo = 1;
				include '../../usuarios/estructura/estructura-usuario.php';  
			}
			
			if($tabla == "clave-usuario"){ 
				
				$usuario = $oGlobals->verOpcionesPor("config_usuarios", " AND id = $id", 0);	
				$tipo    = 2;
				if($usuario != 2) { 
					echo "<script>"; 
							foreach($usuario as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}
				
				include '../../usuarios/estructura/estructura-usuario.php';  
			}
			
			if($tabla == "empresa"){
				
				
				$rsp = $oGlobals->verOpcionesPor("config_informacion_empresa", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../almacenes/frm/frm-empresas.php';
			}


			if($tabla == "add_producto_a_compra") {

				$var = explode("_", $id);

				$id_reg = $var[0];
				$id     = $var[1];


				if($_SESSION["tipo_rol"] == 1) $con_emp = ""; 
				
				$documento = $oGlobals->verOpcionesPor("mov", " AND id = '$id' ".$con_emp, 0);
				$rsp       = $oGlobals->verOpcionesPor("mov_r", " AND id = '$id_reg' ".$con_emp, 0);

				include '../../documentos/frm/frm-add-producto-a-compra.php';	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
							echo "$('#txt_producto').val('".utf8_encode($rsp["codigo"]." - ".$rsp["detalle"])."');";
							echo "$('#documento').val('".utf8_encode($documento["id"])."');";
					echo "</script>"; 
				}

			}

			if($tabla == "add_producto_a_cotizacion") {

				$var = explode("_", $id);

				$id_reg = $var[0];
				$id     = $var[1];


				if($_SESSION["tipo_rol"] == 1) $con_emp = ""; 
				
				$documento = $oGlobals->verOpcionesPor("mov", " AND id = '$id' ".$con_emp, 0);
				$rsp       = $oGlobals->verOpcionesPor("mov_r", " AND id = '$id_reg' ".$con_emp, 0);

				include '../../documentos/frm/frm-add-producto-a-cotizacion.php';	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
							echo "$('#txt_producto').val('".utf8_encode($rsp["codigo"]." - ".$rsp["detalle"])."');";
							echo "$('#documento').val('".utf8_encode($documento["id"])."');";
					echo "</script>"; 
				}

			}

			if($tabla == "add_servicio_a_cotizacion") {

				$var = explode("_", $id);

				$id_reg = $var[0];
				$id     = $var[1];


				if($_SESSION["tipo_rol"] == 1) $con_emp = ""; 
				
				$documento = $oGlobals->verOpcionesPor("mov", " AND id = '$id' ".$con_emp, 0);
				$rsp       = $oGlobals->verOpcionesPor("mov_r", " AND id = '$id_reg' ".$con_emp, 0);

				include '../../documentos/frm/frm-add-servicio-a-cotizacion.php';	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
							echo "$('#txt_servicio').val('".utf8_encode($rsp["codigo"]." - ".$rsp["detalle"])."');";
							echo "$('#documento').val('".utf8_encode($documento["id"])."');";
					echo "</script>"; 
				}

			}

			if($tabla == "add_producto_a_pedidos") {

				$var = explode("_", $id);

				$id_reg = $var[0];
				$id     = $var[1];


				if($_SESSION["tipo_rol"] == 1) $con_emp = ""; 
				
				$documento = $oGlobals->verOpcionesPor("mov_pedido", " AND id = '$id' ".$con_emp, 0);
				$rsp       = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND id = '$id_reg' ".$con_emp, 0);

				include '../../pedidos/frm/frm-add-producto-a-pedidos.php';	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
							echo "$('#txt_producto').val('".utf8_encode($rsp["codigo"]." - ".$rsp["detalle"])."');";
							echo "$('#documento').val('".utf8_encode($documento["id"])."');";
					echo "</script>"; 
				}

			}

			if($tabla == "add_producto_a_traslado") {

				$var = explode("_", $id);

				$id_reg = $var[0];
				$id     = $var[1];

				
				$documento = $oGlobals->verOpcionesPor("mov", " AND id = '$id' ".$con_emp, 0);
				$rsp       = $oGlobals->verOpcionesPor("mov_r", " AND id = '$id_reg' ".$con_emp, 0);
				$referen   = $oGlobals->verOpcionesPor("referencias", " AND codigo = '".$rsp["codigo"]."' ".$con_emp, 0);

				include '../../documentos/frm/frm-add-producto-a-traslado.php';	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
							echo "$('#txt_producto').val('".utf8_encode($rsp["codigo"]." - ".$rsp["detalle"])."');";
							echo "$('#ref').val('".utf8_encode($referen["codigo"])."');";
					echo "</script>"; 
				}

			}

			

			if($tabla == "add_referencia_precio") {

				$referencia = $oGlobals->verOpcionesPor("referencias", " AND id = $id ".$con_emp, 0);
				include '../../inventarios/frm/frm-add-producto-precios.php';	

			}
			
			if($tabla == "add_referencia_cod-barra"){
				$referencia = $oGlobals->verOpcionesPor("referencias", " AND id = $id ".$con_emp, 0);				
				include '../../inventarios/frm/frm-add-producto-cod-barra.php';
			}
			
			if($tabla == "upd-cod-barra"){
				$referencia = $oGlobals->verOpcionesPor("referencias", " AND id = $id ".$con_emp, 0);
				include '../../inventarios/frm/frm-upd-producto-cod-barra.php';
			}

			if($tabla == 'add_producto_a_factura') {

				$var = explode("_", $id);
				
				$id           = $var[0];
				$id_documento = $var[1];

				$documento = $oGlobals->verOpcionesPor("mov", " AND id = $id_documento ".$con_emp, 0);
				$rsp       = $oGlobals->verOpcionesPor("mov_r", " AND id = $id ".$con_emp, 0);
				$prodd     = $oGlobals->verOpcionesPor("referencias", " AND codigo = '".$rsp["codigo"]."' ".$con_emp, 0);

				if($rsp != 2) { echo "<script>"; foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} echo " $('#ref').val('".$prodd["codigo"]."'); $('#txt_producto').val('".$prodd["nombre"]."');</script>"; echo "$('#documento').val('".utf8_encode($documento["id"])."');"; }
			

				include '../../documentos/frm/frm-agregar-producto-factura.php';
			}

			if($tabla == 'add_factura_a_rc') {

				$var = explode("_", $id);
				
				$id           = $var[0];
				$id_documento = $var[1];

				$documento = $oGlobals->verOpcionesPor("mov_cartera", " AND id = $id_documento ".$con_emp, 0);
				include '../../cartera/frm/frm-agregar-factura-a-rcc.php';

			}

			if($tabla == 'ver_factura') {


				$abonos    = 1;
				$documento = $oGlobals->verOpcionesPor("mov", " AND documento = '$id' ".$con_emp, 0);
				$id        = $documento["id"];

				include '../../documentos/estructura/estructura-factura.php';

			}


			if($tabla == 'add_producto_a_devolucion') {

				$var = explode("_", $id);
				
				$id           = $var[0];
				$id_documento = $var[1];

				$documento = $oGlobals->verOpcionesPor("mov", " AND id = $id_documento ".$con_emp, 0);
				$rsp       = $oGlobals->verOpcionesPor("mov_r", " AND id = $id ".$con_emp, 0);
				$prodd     = $oGlobals->verOpcionesPor("referencias", " AND codigo = '".$rsp["codigo"]."' ".$con_emp, 0);

				if($rsp != 2) { echo "<script>"; foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} echo " $('#ref').val('".$prodd["codigo"]."'); $('#txt_producto').val('".$prodd["nombre"]."');</script>"; }
			

				include '../../documentos/frm/frm-agregar-producto-devolucion.php';
			}

			if($tabla == "estado_documento"){ 
				
				$rsp = $oGlobals->verOpcionesPor("mov", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}			
				
				include '../../documentos/frm/frm-documento.php'; 
			}

			if($tabla == "estado_documento_cartera"){ 
				
				$rsp = $oGlobals->verOpcionesPor("mov_cartera", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}			
				
				include '../../cartera/frm/frm-documento-cartera.php'; 
			}

			if($tabla == "tipos_documento"){ 

				$rsp = $oGlobals->verOpcionesPor("tipos_documentos", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}

				include '../../seguridad/frm/frm-tipos-documento.php';


			}

			if($tabla == "bodegas"){ 

				$rsp = $oGlobals->verOpcionesPor("bodegas", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}

				include '../../utilidades/frm/frm-bodegas.php';
			}

			if($tabla == "servicios"){ 

				$rsp = $oGlobals->verOpcionesPor("servicios", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}

				include '../../servicios/frm/frm-servicios.php';
			}

			if($tabla == "objetivos"){				
				
				$rsp = $oGlobals->verOpcionesPor("objetivos", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../objetivos/estructura/estructura-objetivos.php';
			}

			if($tabla == "escala_puntuaciones"){				
						
				include '../../puntuaciones/estructura/estructura-escala-puntuaciones.php';
			}

			if($tabla == "competencias_1"){

			    $var 	= explode("_", $id);				
				$tipo 	= $var[1];
				$id 	= $var[2];

				if  ($tipo=='CON') { $tipo_detalle='Conocimientos Principales'; }
				if  ($tipo=='HAB') { $tipo_detalle='Habiliadades Principales'; }
				if  ($tipo=='ACT') { $tipo_detalle='Actitudes Principales'; }		
				
				$rsp = $oGlobals->verOpcionesPor("competencias_1", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../competencias/estructura/estructura-competencias_1.php';
			}

			if($tabla == "competencias_2"){

			    $var 				= explode("_", $id);				
				$tipo 				= $var[1];
				$id 				= $var[2];
				$id_competencias_1 	= $var[3];

				if  ($tipo=='CON') { $tipo_detalle='Conocimientos Secundarios'; }
				if  ($tipo=='HAB') { $tipo_detalle='Habiliadades Secundarios'; }
				if  ($tipo=='ACT') { $tipo_detalle='Actitudes Secundarios'; }		
				
				$rsp = $oGlobals->verOpcionesPor("competencias_2", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../competencias/estructura/estructura-competencias_2.php';
			}

			if($tabla == "puntuaciones"){
				
				
				$rsp = $oGlobals->verOpcionesPor("puntuaciones", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../puntuaciones/estructura/estructura-puntuaciones.php';
			}

			if($tabla == "evaluaciones"){
				
				
				$rsp = $oGlobals->verOpcionesPor("mov", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../competencias/estructura/estructura-evaluaciones.php';
			}

			if($tabla == "categorias"){ 

				$rsp = $oGlobals->verOpcionesPor("categorias", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}

				include '../../utilidades/frm/frm-categoria.php';
			}
			
			if($tabla == "marcas"){ 

				$rsp = $oGlobals->verOpcionesPor("marcas", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}

				include '../../utilidades/frm/frm-marcas.php';
			}

			
			if($tabla == "cerrar_pedido_pos"){

				include '../../pos/estructura/estructura-pos-pagar.php';
			}

			if($tabla == "cambiar_precio_venta_pos"){

				$rsp = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND id = $id ".$con_emp, 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}

				include '../../pos/frm/frm-cambiar-precio-pos.php';
			}

			if($tabla == 'add_registro_nb') {

				$var = explode("_", $id);
				
				$id           = $var[0];
				$id_documento = $var[1];

				$titulo = "Nota bancaria";
				$color  = "warning";

				$documento = $oGlobals->verOpcionesPor("mov_cartera", " AND id = $id_documento ".$con_emp, 0);
				include '../../financiero/frm/frm-agregar-registro-nb.php';


			}

			if($tabla == "movimiento"){ 

				echo " AND id = $id ".$con_emp;

				$rsp = $oGlobals->verOpcionesPor("tipos_movimientos", " AND id = $id ".$con_emp." ORDER BY tipo_cuenta ASC", 0);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 
				}

				include '../../financiero/frm/frm-movimientos.php';
			}

			if($tabla == 'add_registro_cg') {

				$var = explode("_", $id);
				
				$id           = $var[0];
				$id_documento = $var[1];

				$titulo = "Causación bancaria";
				$color  = "danger";

				$documento = $oGlobals->verOpcionesPor("mov_cartera", " AND id = $id_documento ".$con_emp, 0);
				include '../../financiero/frm/frm-agregar-registro-nb.php';

			}

			if($tabla == 'sub_movimientos'){

				$movimiento     = $oGlobals->verOpcionesPor("tipos_movimientos", " AND id = $id", 0);
				$submovimientos = $oGlobals->verOpcionesPor("tipos_movimientos_subconceptos", " AND id_movimiento = $id", 1);

				include '../../financiero/estructura/estructura-ml-sub-movimiento.php';

			}

			if($tabla == 'nuevo_cliente'){

				include '../../cartera/estructura/estructura-ml-cliente.php';

			}

			if($tabla == 'nuevo_bodega'){

				include '../../cartera/estructura/estructura-ml-bodega.php';

			}

			if($tabla == 'nuevo_proveedor'){

				include '../../cartera/estructura/estructura-ml-proveedor.php';

			}

			if($tabla == 'nuevo_puc'){

				include '../../utilidades/frm/frm-puc.php';

			}

			if($tabla == 'nuevo_ciiu'){

				include '../../utilidades/frm/frm-ciiu.php';

			}


			if($tabla == "almacenes"){
				
				
				$rsp = $oGlobals->verOpcionesPor("almacenes", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../almacenes/frm/frm-almacenes.php';
			}

			if($tabla == "ver_facturas_cuadre"){

				$rsp = $oGlobals->verOpcionesPor("mov", " AND cuadre = $id ".$con_emp, 1);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 

				}
				include '../../informes/estructura/estructura-facturas-cuadre-pos.php';
			}

			if($tabla == "ver_facturas_pos"){

				$rsp = $oGlobals->verOpcionesPor("mov_r", " AND id = $id ".$con_emp, 1);	

				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>"; 

				}
				include '../../informes/estructura/estructura-facturas-pos.php';
			}

			if($tabla == "cajas"){
				
				
				$rsp = $oGlobals->verOpcionesPor("pos_cajas", " AND id = $id", 0);
				if($rsp != 2) { 
					echo "<script>"; 
							foreach($rsp as $key => $data){ echo "$('#".$key."').val('".utf8_encode($data)."');";} 
					echo "</script>";
				
				}
				
				include '../../almacenes/frm/frm-cajas.php';
			}
			
			

		}
		
	} 
	 else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";
?>
