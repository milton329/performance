<?php
session_start();
		
	if($_POST["text_cliente"] != ""){	       
	

		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();		
		$con_emp = ""; 
    $var     = explode("-", $oGlobals->iFilter->process($_POST['text_cliente']));
    $codigo  = trim($var[0]);
    $tercero = $oGlobals->verOpcionesPor("terceros"," AND codigo = '$codigo'".$con_emp, 0);

    $_POST['id_cliente']                = $tercero['id'];
    $_POST['cliente_codigo']            = $tercero['codigo'];
    $_POST['cliente_identificacion']    = $tercero['identificacion'];
    $_POST['cliente_direccion']         = $tercero['direccion'];
    $_POST['cliente_nombre']            = $tercero['nombre']." ".$tercero['apellido'];
       
    $update = $oGlobals->update_data_array($_POST, "mov_pedido", "documento", $_SESSION["ped_pos"]);

include ("../../pos/tablas/tb-cliente-factura-pos.php");
  }
?>




