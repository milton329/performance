<?php
session_start();


	if(trim($_POST["documento"]) != ""){
		
		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();
		
		$documento = $oGlobals->iFilter->process(utf8_decode($_POST['documento']));
		
		$doc = $oGlobals->verOpcionesPor("mov_pedido", " AND documento = '$documento' AND id_empresa = '".$_SESSION["id_empresa"]."' AND cerrado = 0", 0);
		
		if($doc != 2){

			$_SESSION["ped_pos"] = $documento;
			echo "<script>setTimeout('self.location=\"../pos/vender-pos.html\"', 1)</script>";
		}
	}
	else echo '<div class="cloudAlertProd alert alert-danger">'.$close.' <strong>Debes colocar la cantidad</strong>'.$espacio.'</div>';

?>
