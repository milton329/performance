<?php
session_start();
	
	if(trim($_POST["table"]) != "" && trim($_POST["id"]) != "" && trim($_POST["pos_id"]) != "" && trim($_POST["pos_val"]) != "" 
	   && trim($_POST["select_val"]) != ""){	
		
		
		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$table      = $oGlobals->iFilter->process($_POST["table"]);
		$id 	    = $oGlobals->iFilter->process($_POST["id"]);
		$pos_id     = $oGlobals->iFilter->process($_POST["pos_id"]);
		$pos_val    = $oGlobals->iFilter->process($_POST["pos_val"]);
		$select_val = $oGlobals->iFilter->process($_POST["select_val"]);

		$selects = $oGlobals->verOpcionesPor($table, " AND $select_val = $id", 1);	
		
		if($selects != 2){
			
			foreach($selects as $select){
				echo '<option value="'.$select[$pos_id].'">'.utf8_encode($select[$pos_val]).'</option>';
			}
			
		}
		

		
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
