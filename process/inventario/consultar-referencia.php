<?php
session_start();
		

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();
		
		if(trim($_POST['ref']) != ""){

			$con_emp = " AND id_empresa = ".$_SESSION['id_empresa'];

			$zona  = $iFilter->process($_POST['vari']);
			

			if($zona == 1) {

				$var        = explode("-", $oGlobals->iFilter->process($_POST['ref']));
				$referencia = trim($var[0]);
				
				$producto   = $oGlobals->verOpcionesPor("referencias", " AND codigo = '$referencia' ".$con_emp, 0);
				$id         = $producto["id"];
			}

			if($zona == 2) {

				$referencia = $oGlobals->iFilter->process($_POST['ref']);

				$var        = explode("-", $oGlobals->iFilter->process($_POST['ref']));
				$referencia = trim($var[0]);

				if(!empty($var)) $referencia = trim($var[0]);

				$sql = "SELECT referencias.codigo, referencias.nombre, referencias.referencia, referencias.descripcion 
						FROM referencias, referencias_barras 
						WHERE referencias.codigo LIKE '%$referencia%' OR referencias.nombre LIKE '%$referencia%' OR referencias.referencia LIKE '%$referencia%'
						OR referencias_barras.barra = $referencia AND referencias.codigo = referencias_barras.codigo ";
				
				$productos = $oGlobals->verPorConsultaPor($sql, 0);
				
				
				if($productos == 2) { 
					echo "<div class='error'>No se ha encontrado ningún resultado para esta búsquedas</div>"; 
					echo "<script> $('input[type=text]').val(''); </script>";
					return;
				}

			}
			
			if     ($zona == 1)	include ("../../inventarios/estructura/estructura-referencia.php");
			
			else if($zona == 2)	include ("../../inventarios/estructura/estructura-tab-referencia-pos.php");

		} 
		else echo "<div class='error'>Debes rellenar los campos obligatorios</div>";

?>
 <!-- ESTE ARCHIVO FUE EDITADO POR BRANDON EL 28/04/2019 AÑADIENDO LA ESTRUCTURA NUEVA DE LA CARGA DE PRODUCTOS (LINEA 48 EDITADA) -->
