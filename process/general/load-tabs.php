<?php
session_start();
		
	if($_POST['tab'] != "" && $_POST['id'] != ""){
							

		require_once '../../class/classGlobal.php';
		
		$oGlobals    = new Globals();
		
		
		$id  = $oGlobals->iFilter->process($_POST["id"]);
		$tab = $oGlobals->iFilter->process($_POST["tab"]);
		
		if($tab == 'informe_campos') { 
			
			$campos   = $oGlobals->verOpcionesPor("informes_campos", " AND id_informe = '$id'", 1);
			
			include '../../configuracion/tablas/tabla-informe-campos.php';
		}
		
		if($tab == 'informe_resultado') { 
			
			$titulos   = $oGlobals->verOpcionesPor("informes_titulos", " AND id_informe = '$id'", 1);
			
			include '../../configuracion/tablas/tabla-informe-resultados.php';
		}
		
		if($tab == 'informe_resultado') { 
			
			$titulos   = $oGlobals->verOpcionesPor("informes_titulos", " AND id_informe = '$id'", 1);
			
			include '../../configuracion/tablas/tabla-informe-resultados.php';
		}

		if($tab == 'referencia') { 
				
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id = '$id'", 0);
			
			include '../../inventarios/frm/frm-referencia.php';
		}
		if($tab == 'referencia_precios') {
			
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id= '$id' ", 0);

			$sql = "SELECT P.*, PL.nombre_lista 
					FROM precios AS P LEFT JOIN precios_lista AS PL ON P.lista = PL.codigo 
					WHERE P.codigo = '".$producto["codigo"]."'";

			$precios   = $oGlobals->verPorConsultaPor($sql, 1);
			
			include '../../inventarios/estructura/estructura-tab-referencia-precios.php';
		}

		if($tab == 'referencia_unidades') { 
				
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id = '$id'", 0);
			$codigo   = $producto["codigo"];
			$unidad   = $oGlobals->verConsultaInventarioPor(" AND MR.codigo = '$codigo'", "", 0);

			include '../../inventarios/estructura/estructura-tab-referencia-unidades.php';
		}

		if($tab == 'referencia_entradas') { 
			
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id = '$id'", 0);
			$codigo   = $producto["codigo"];

			$sql = "SELECT mov_r.*, mov.cliente_nombre, mov.cliente_codigo, mov.pedido, b_entrada.nombre_bodega AS nombre_bodega_entrada,
						   b_salida.nombre_bodega AS nombre_bodega_salida
					FROM mov_r LEFT JOIN mov ON mov_r.documento = mov.documento
					LEFT JOIN bodegas AS b_salida  ON mov_r.bodega_salida  = b_salida.codigo_bodega
					LEFT JOIN bodegas AS b_entrada ON mov_r.bodega_entrada = b_entrada.codigo_bodega
					WHERE mov_r.id != '' AND mov_r.codigo = '$codigo' AND mov_r.entrada > 0 ORDER BY mov_r.fecha_registro DESC";

			$detalles = $oGlobals->verPorConsultaPor($sql, 1);
			
			include '../../inventarios/estructura/estructura-tab-referencia-entradas.php';
		}

		if($tab == 'referencia_salidas') { 
				
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id = '$id'", 0);
			$codigo   = $producto["codigo"];

			$sql = "SELECT mov_r.*, mov.cliente_nombre, mov.cliente_codigo, mov.pedido, b_entrada.nombre_bodega AS nombre_bodega_entrada,
						   b_salida.nombre_bodega AS nombre_bodega_salida
					FROM mov_r LEFT JOIN mov ON mov_r.documento = mov.documento
					LEFT JOIN bodegas AS b_salida  ON mov_r.bodega_salida  = b_salida.codigo_bodega
					LEFT JOIN bodegas AS b_entrada ON mov_r.bodega_entrada = b_entrada.codigo_bodega
					WHERE mov_r.id != '' AND mov_r.codigo = '$codigo' AND mov_r.salida > 0 ORDER BY mov_r.fecha_registro DESC";

			$detalles = $oGlobals->verPorConsultaPor($sql, 1);
			
			include '../../inventarios/estructura/estructura-tab-referencia-salidas.php';
		}

		if($tab == 'referencia_pedidos') { 
				
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id = '$id'", 0);
			$codigo   = $producto["codigo"];

			$sql = "SELECT mov_r_pedidos.*, mov_pedido.cliente_nombre, mov_pedido.cliente_codigo
					FROM mov_r_pedidos LEFT JOIN mov_pedido ON mov_r_pedidos.documento = mov_pedido.documento
					WHERE mov_r_pedidos.id != '' AND mov_r_pedidos.codigo = '$codigo'";

			$detalles = $oGlobals->verPorConsultaPor($sql, 1);
			
			include '../../inventarios/estructura/estructura-tab-referencia-pedidos.php';
		}
		
		if($tab == 5) include '../../pedidos/estructura/estructura-tab-info-producto-pedido.php';

		if($tab == 'referencia_fotos') { 
				
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id = '$id'", 0);
			
			include '../../inventarios/estructura/estructura-tab-referencia-fotos.php';
		}
		if($tab == 'referencia_cod-barras'){
			$producto = $oGlobals->verOpcionesPor("referencias", " AND id = '$id'", 0);
			$producto_ref = $producto['codigo'];
			
			$sql = "SELECT * 
					FROM referencias_barras
					WHERE referencias_barras.codigo = $producto_ref";

			$barras   = $oGlobals->verPorConsultaPor($sql, 1);

			include '../../inventarios/estructura/estructura-tab-referencia-cod-barras.php';
		}
		if($tab == 'conocimientos_principales') {
			
			$sql = "SELECT * FROM competencias_1 where tipo='CON'";      
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
			$tipo_detalle='Conocimientos Principales';

			include '../../competencias/tablas/tabla-competencias_1.php';
		}		
		

	}

?>
