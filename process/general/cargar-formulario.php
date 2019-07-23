<?php
session_start();

	if($_POST['id'] != "" && $_POST['table'] != ""){
			

		require_once '../../class/classGlobal.php';

		$oGlobals  = new Globals();	

		$id     = $oGlobals->iFilter->process($_POST['id']);
		$tabla  = $oGlobals->iFilter->process($_POST['table']);
		
		$rsp   = $oGlobals->verOpcionesPor($tabla, " AND id = $id", 0);
		$array = array();
		
		foreach($rsp as $key => $data){
		
			if(!is_numeric($key)) $array[$key] = utf8_encode($data); 
		}
			
		if($rsp != 2)	echo json_encode($array);
		else echo json_encode(2);

	} 
	 else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";
?>
