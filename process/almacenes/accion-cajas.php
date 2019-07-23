<?php
session_start();
	
		
		if(trim($_POST['nombre']) != ""){
				
					
				require_once '../../class/classGlobal.php';
	
				$oGlobals  = new Globals();	
				
				$id = $oGlobals->iFilter->process($_POST['id']);
				$insert = 0;
				$update = 2;
				
				if($id == "") {
					
					$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
					$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
					$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s");
					$_POST["activo"]   				 = '1';

					
					$insert = $oGlobals->insert_data_array($_POST, "pos_cajas");
					
					echo "<div class='exito'>El almacen fue creado correctamente</div>";
					?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../almacenes/ver-cajas.html"> <?php	
					
				} 
				else {
					
					$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
					$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
					$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s");					
			
					$update = $oGlobals->update_data_array($_POST, "pos_cajas", "id", $id);

					echo "<div class='exito'>Los cambios han sido guardado correctamente</div>";

					?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../almacenes/ver-cajas.html"> <?php

				}

		}
		else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";
		
?>
