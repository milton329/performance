<?php
session_start();
		
		if($_POST['id'] != "" && $_POST['table'] != ""){
								

			require_once '../../class/classGlobal.php';
			
			$oGlobals = new Globals();	
			
			$id    = $oGlobals->iFilter->process($_POST['id']);
			$table = $oGlobals->iFilter->process($_POST['table']);

			extract($_POST); 
			
			$carro 	   = $_SESSION[$table]; 
			unset($carro[$id]);
			$_SESSION[$table] = $carro;
			
			$tr = 'tr_user_';

			$cant = "";
			foreach($carro as $add){ $cant  += $add["UND"]; }
			
			echo "<script>$('#".$tr."".$id."').fadeOut();</script>";
			echo "<script>$('#totalInd').text('".$cant."');</script>";
	
		} 

?>
