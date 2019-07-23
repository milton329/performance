<?php
session_start();
	
	if((trim($_POST["fecha_inicial"]) != "" && trim($_POST["fecha_final"]) != "")){
				
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$tipo_documento = "";
		
		$in = explode("-", $oGlobals->iFilter->process($_POST['fecha_inicial']));
		$fn = explode("-", $oGlobals->iFilter->process($_POST['fecha_final']));

		$ini = $in[0].$in[1].$in[2];
		$fin = $fn[0].$fn[1].$fn[2];

		$con_doc = "";

		//if($ini != "")	$con_doc .= " AND codigo IN ($codigo)";
		//if($fin != "")	$con_doc .= " AND id_categoria = $categoria";
		
		$sql    = "SELECT * FROM con_clases ORDER BY id ASC";
		$clases = $oGlobals->verPorConsultaPor($sql, 1);
		
		if($clases != 2)	include '../../informes/tablas/tb-financiero-pyg.php';
		else echo "<div class='error'>No se ha encontrado ningún resultado</div>";
		
	}
	else echo "<div class='error'>Debes seleccionar un criterio para la búsqueda</div>";

?>
