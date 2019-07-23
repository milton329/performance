<?php
session_start();
		

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$con_emp = ""; 

		if($_SESSION["tipo_rol"] != 1) $con_emp = " AND id_empresa = ".$_SESSION['id_empresa'];


		$var     = explode("-", $oGlobals->iFilter->process($_POST['text_cliente']));
		$codigo  = trim($var[0]);

		$tercero = $oGlobals->verOpcionesPor("terceros"," AND codigo = '$codigo'".$con_emp, 0);
		include ("../../cartera/estructura/estructura-tab-tercero.php");

?>
