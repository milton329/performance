<?php
session_start();	
	if(isset($_FILES['archivo']['name']) && $_FILES['archivo']['name'] != "" && $_POST['id'] != ""){
		

		require_once '../../class/classGlobal.php';
		
		$oGlobals    = new Globals();
		
		$id       = $oGlobals->iFilter->process($_POST['id']);	
		$files    = $_FILES['archivo']['name'];

		$producto = $oGlobals->verOpcionesPor("referencias", " AND codigo = '$id'", 0);	
		$imagenes = $oGlobals->subirImagenesReferencia($files, $producto["codigo"], $_SESSION['nombre']." ".$_SESSION['apellido'], $_SESSION['idUsuario'], $_SESSION["id_empresa"]);
		
		if($imagenes == 1) echo "<div class='exito'>Las imágenes se han guarda correctamente</div>"; 	
		else echo "<div class='error'>No se puede crear la foto</div>";
	          
	}
	else echo "<div class='error'>Debes seleccionar la imágenes</div>"; 
?>
