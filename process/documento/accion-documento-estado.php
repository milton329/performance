<?php
session_start();
	

	if(trim($_POST["id"]) != ""){	
		
			require_once('../../class/classGlobal.php');
		
			$oGlobals = new Globals();
			
			$id = $oGlobals->iFilter->process($_POST["id"]);

			$_POST['fecha_modificacion'] = date("Y-m-d h:i:s");
			
			$update = $oGlobals->update_data_array($_POST, "mov", "id", $id);
			
			if($update == 1) echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
			else echo "<div class='erro'>No se han podido guardar los cambios</div>";

	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
