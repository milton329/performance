<?php
session_start();
	
	if(trim($_POST["usuario"]) != "" || trim($_POST["total"]) != "" || trim($_POST["categoria"]) != ""){
				
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$tipo_documento = "";
		$con_emp        = " ";

		if($_SESSION["tipo_rol"] != 1) $con_emp = " AND car.id_empresa = ".$_SESSION['id_empresa']; 
		
		$var       = explode("-", $oGlobals->iFilter->process($_POST['usuario']));
		$tipo      = $oGlobals->iFilter->process($_POST['total']);
		$categoria = $oGlobals->iFilter->process($_POST['categoria']);
		$codigo    = trim($var[0]);

		$con_doc = "";
		//$con_emp = " AND mov.id_empresa = ".$_SESSION['id_empresa'];

		if($codigo != "") 		$con_doc .= "AND car.cliente  = '$codigo' ";
		if($categoria != "")	$con_doc .= "AND car.id_categoria  = '$categoria' ";

		if($_SESSION["tipo_rol"] == 1){

			$id_empresa = $oGlobals->iFilter->process($_POST['id_empresa']);
			if($id_empresa != "") $con_doc .= " AND car.tipo_cuenta='CXC' AND car.id_empresa = '$id_empresa'";
		}

		//echo $con_doc.$con_emp;

		$registros = $oGlobals->verCarteraPor($con_doc.$con_emp, 1);

		if($registros != 2) {

			$_SESSION["registros"] = $registros;

			include '../../cartera/estructura/estructura-tab-cartera.php';

		}
		else echo "<div class='error'>No se ha encontrado ningún resultado para esta búsqueda</div>";
		
	}
	else echo "<div class='error'>Debes seleccionar un criterio para la búsqueda</div>";

?>
