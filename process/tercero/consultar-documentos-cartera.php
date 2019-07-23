<?php
session_start();
	
	if(trim($_POST["cliente"]) != "" || trim($_POST["documento"]) != "" || trim($_POST["tipo_documento"]) != "" || (trim($_POST["fecha_inicial"]) != "" && trim($_POST["fecha_final"]) != "")){
				
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$tipo_documento = "";
		$con_emp        = " AND id_empresa = ".$_SESSION['id_empresa'];
		
		$documento 		= $oGlobals->iFilter->process($_POST['documento']);
		$fecha_inicial  = $oGlobals->iFilter->process($_POST['fecha_inicial']);
		$fecha_final  	= $oGlobals->iFilter->process($_POST['fecha_final']);
		$tipo_documento = $oGlobals->iFilter->process($_POST['tipo_documento']);
		$cliente        = $oGlobals->iFilter->process($_POST['cliente']);

		$con_doc = "";

		if($documento != "")		$con_doc .= " AND documento = '$documento'";
		if($fecha_inicial != "")	$con_doc .= " AND fecha_documento >= '$fecha_inicial'";
		if($fecha_final != "")		$con_doc .= " AND fecha_documento <= '$fecha_final'";
		if($tipo_documento != "")	$con_doc .= " AND tipo_documento IN ('$tipo_documento')";
		if($cliente != ""){

			$cli      = explode("-", $cliente);
			$codigo   = trim($cli[0]);
			$con_doc .= " AND cliente = '$codigo'";
		}
		
		$con_doc .= $con_emp." ORDER BY fecha_documento DESC";

		$documentos = $oGlobals->verOpcionesPor("mov_cartera", $con_doc, 1);
		
		if($tipo_documento == 'RC') 		$enlace  = "../cartera/detalle-rcc_";
		else if($tipo_documento == 'NB')    $enlace  = "../financiero/detalle-nb_";
		else 					 	 		$enlace  = "../cartera/menu_detalle-documento_";
		
		if($documentos != 2)	include '../../cartera/tablas/tb-documentos.php';
		else echo "<div class='error'>No se ha encontrado ningún resultado</div>";
		
	}
	else echo "<div class='error'>Debes seleccionar un criterio para la búsqueda</div>";

?>
