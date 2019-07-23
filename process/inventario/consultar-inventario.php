<?php
session_start();
	
	if((trim($_POST["txt_producto"]) != "" || trim($_POST["categoria"]) != "") || trim($_POST["id_empresa"]) != "" || trim($_POST["bodega"]) != ""){
				
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		
		$tipo_documento = "";
		
		$var        = explode("-", $oGlobals->iFilter->process($_POST['txt_producto']));
		$categoria  = $oGlobals->iFilter->process($_POST['categoria']);
		$bodega     = $oGlobals->iFilter->process($_POST['bodega']);
		$id_empresa = $oGlobals->iFilter->process($_POST['id_empresa']);
		$codigo     = trim($var[0]);

		$con_emp        = " AND MR.id_empresa = ".$id_empresa;

		$con_doc = "";

		if($codigo != "")		$con_doc .= " AND MR.codigo IN ($codigo)";
		if($categoria != "")	$con_doc .= " AND R.id_categoria = $categoria";
		
		$referencias = $oGlobals->verConsultaInventarioPor($con_doc.$con_emp, $bodega,  1);
		
		if($referencias != 2)	include '../../inventarios/tablas/tb-inventarios.php';
		else echo "<div class='error'>No se ha encontrado ningún resultado</div>";
		
	}
	else echo "<div class='error'>Debes seleccionar un criterio para la búsqueda</div>";

?>
