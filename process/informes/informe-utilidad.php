<?php
session_start();
	
	if((trim($_POST["txt_producto"]) != "" || trim($_POST["categoria"]) != "")){
				
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$tipo_documento = "";
		
		$var       = explode("-", $oGlobals->iFilter->process($_POST['txt_producto']));
		$categoria = $oGlobals->iFilter->process($_POST['categoria']);
		$codigo    = trim($var[0]);

		$con_doc = "";

		if($codigo != "")		$con_doc .= " AND codigo IN ($codigo)";
		if($categoria != "")	$con_doc .= " AND id_categoria = $categoria";
		
		$referencias = $oGlobals->verOpcionesPor("referencias", $con_doc, 1);
		
		if($referencias != 2)	include '../../informes/tablas/tb-referencias-utilidad.php';
		else echo "<div class='error'>No se ha encontrado ningún resultado</div>";
		
	}
	else echo "<div class='error'>Debes seleccionar un criterio para la búsqueda</div>";

?>
