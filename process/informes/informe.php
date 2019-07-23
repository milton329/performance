<?php
session_start();
			
	if($_POST['id'] != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
		
		$id      = $oGlobals->iFilter->process($_POST['id']);
		$informe = $oGlobals->verOpcionesPor("informes", " AND id = $id", 0);
		
				
		if($informe != 2){
			
			$campos   = $oGlobals->verOpcionesPor("informes_campos", " AND id_informe = $id", 1);
			$titulos  = $oGlobals->verOpcionesPor("informes_titulos", " AND id_informe = $id ORDER BY id ASC", 1);
			$conexion = $oGlobals->verOpcionesPor("conexiones", " AND id = ".$informe["conexion"]."", 0);	
			$sql      = utf8_encode($informe["sql_"]);
			
			if($campos != 2){
				
				foreach($campos as $campo){
					
					$name  = $campo["input_name"];
					
					if($campo["tipo"] == 'datetime'){

						$fecha = explode("/", $_POST[$name]);
						
						if($_POST[$name] != "")		$_POST[$name] = $fecha[2]."".$fecha[0].$fecha[1];
					}
					
					$sql = $oGlobals->cambiarVariables($campo["campo"], "'".$_POST[$name]."'", $sql);
				}	
			}
			
			$conexion  = $conexion["conexion"];
			$instancia = $informe["instancia"];
			$bd 	   = $informe["bd"];
			$usuario   = $informe["usuario"];
			$pass	   = $informe["clave"];
			
			
			if($informe["tipo_reporte"] == 2){
				
				$sp = $sql;
				$consulta = $oGlobals->ejecutarSpConsultaPor($conexion, $instancia, $bd, $usuario, $pass, $sp, $informe["sql_2"], 1);
			}
			else  $consulta = $oGlobals->ejecutarConsultarPor($conexion, $instancia, $bd, $usuario, $pass, $sql, 1);	
			
			
			
			//if($informe["tipo_reporte"] == 2)	$consulta = $oGlobals->ejecutarConsultarPor($conexion, $instancia, $bd, $usuario, $pass, $informe["sql_2"], 1);
			
			
			
			if($consulta != 2) {
				
				$excel = 2;
				$_SESSION["consulta_informe"] = $consulta;
				
				echo '<a href="../excel/informe_'.$id.'.html" target="_blank" class="btn btn-danger" style="float: right"><i class="fa fa-file-excel-o"></i> Exportar</a>';
				echo '<br style="clear: both"/>';
				echo '<br style="clear: both"/>';
				
				include '../../informes/tablas/tabla-informes.php';
				
			} else echo "<div class='error'>No se ha encontrado ningún resultado para esta consulta</div>";
		}	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";

?>




