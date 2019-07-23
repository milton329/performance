<?php
session_start();
	
	if(trim($_POST["documento"]) != ""){
				
		require_once('../../class/classGlobal.php');
	
		$oGlobals    = new Globals();
		
		$con_emp   = " AND id_empresa = ".$_SESSION['id_empresa'];
		$documento = $oGlobals->iFilter->process($_POST['documento']);

		$con_doc = "";

		if($documento != "") $con_doc .= " AND documento = '$documento'";

		$documento = $oGlobals->verOpcionesPor("mov", $con_doc.$con_emp, 0);
		
		if($documento != 2){


			$tercero = $oGlobals->verOpcionesPor("terceros", " AND codigo = '".$documento["cliente_codigo"]."'", 0);
			$cliente = $documento["cliente_codigo"]." - ".$documento["cliente_nombre"];

?>
			<script>
				$("#cliente_id").val("<?= $tercero["id"];?>");
				$("#text_cliente").val("<?= utf8_encode($cliente);?>");
				$("#identificacion").val("<?= utf8_encode($documento["cliente_identificacion"]);?>");
				$("#bodega_entrada").val("<?= utf8_encode($documento["bodega_entrada"]);?>");
			</script>
<?php

		}
		else echo "<div class='error'>No se ha encontrado ningún resultado</div>";
		
	}
	else echo "<div class='error'>Debes seleccionar un criterio para la búsqueda</div>";

?>
