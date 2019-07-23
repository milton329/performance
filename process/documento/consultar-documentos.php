<?php
session_start();
	
	if(trim($_POST["cliente"]) != "" || trim($_POST["documento"]) != "" || trim($_POST["tipo_documento"]) != "" || (trim($_POST["fecha_inicial"]) != "" && trim($_POST["fecha_final"]) != "")){
				
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$tipo_documento = "";
		$con_emp        = " ";

		if($_SESSION["tipo_rol"] != 1) $con_emp = " AND M.id_empresa = ".$_SESSION['id_empresa']; 
		
		$tipo    		= $oGlobals->iFilter->process($_POST['tipo']);
		$documento 		= $oGlobals->iFilter->process($_POST['documento']);
		$fecha_inicial  = $oGlobals->iFilter->process($_POST['fecha_inicial']);
		$fecha_final  	= $oGlobals->iFilter->process($_POST['fecha_final']);
		$tipo_documento = $oGlobals->iFilter->process($_POST['tipo_documento']);
		$cliente        = $oGlobals->iFilter->process($_POST['cliente']);
		

		$con_doc = "";

		if($documento != "")		$con_doc .= " AND M.documento = '$documento'";
		if($fecha_inicial != "")	$con_doc .= " AND M.fecha_documento >= '$fecha_inicial'";
		if($fecha_final != "")		$con_doc .= " AND M.fecha_documento <= '$fecha_final'";
		if($tipo_documento != "")	$con_doc .= " AND M.tipo_documento = '$tipo_documento'";
		
		if($_SESSION["tipo_rol"] == 1){

			$id_empresa = $oGlobals->iFilter->process($_POST['id_empresa']);
			if($id_empresa != "") $con_doc .= " AND M.id_empresa = '$id_empresa'";
		}

		

		if($tipo == 1)	$con_doc .= " AND M.tipo_documento IN ('COM', 'AI', 'DVS', 'TRS')";
		if($tipo == 3)	$con_doc .= " AND M.tipo_documento IN ('DVS')";

		if($cliente != ""){

			$cli      = explode("-", $cliente);
			$codigo   = trim($cli[0]);
			$con_doc .= " AND M.cliente_codigo = '$codigo'";
		}
		
		$con_doc_order = " ORDER BY M.fecha_documento DESC, M.id DESC";

		$sql = "SELECT M.*, SUM(MR.sub_total) AS total, SUM(MR.salida) AS t_cantidad
				FROM mov AS M LEFT JOIN mov_r AS MR ON M.documento = MR.documento AND M.id = MR.id_entrada
				WHERE 1=1 $con_doc $con_emp
				GROUP BY M.id
				$con_doc_order";

		$documentos = $oGlobals->verPorConsultaPor($sql, 1);
		
		if     ($tipo_documento == 'REM' || $tipo_documento == 'RPS') $enlace = "menu_detalle-factura_";
		else if($tipo_documento == 'DVS') $enlace = "menu_detalle-devolucion_";
		else 					 	      $enlace = "menu_detalle-documento_";
		
		if($documentos != 2)	include '../../documentos/tablas/tb-documentos.php';
		else echo "<div class='error'>No se ha encontrado ningún resultado</div>";
		
	}
	else echo "<div class='error'>Debes seleccionar un criterio para la búsqueda</div>";

?>
