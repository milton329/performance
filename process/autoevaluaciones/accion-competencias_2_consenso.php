<?php
session_start();
		
	if(trim($_POST["id_autoevaluaciones"])){	
	

		require_once '../../class/classGlobal.php';

		$oGlobals 				= 	new Globals();
		$id_autoevaluaciones	=	$_POST["id_autoevaluaciones"];
		$documento  			=   $_POST["documento"];

		//consultar el total de todas las auto_evaluaciones_r
		$sql2 		= "select count(a.valor_usuario) as total from auto_evaluaciones
					   INNER JOIN auto_evaluaciones_r as a ON a.id_autoevaluaciones = auto_evaluaciones.id
					   where auto_evaluaciones.documento='".$documento."'";			
		$sql3 		= $oGlobals->verPorConsultaPor($sql2, 0);
		$total		= $sql3[0];

    
	    //consultar cuantos registros tengo en la auto_evaluaciones_r 
        $sql 		= "SELECT count(* ) FROM auto_evaluaciones_r where id_autoevaluaciones='".$id_autoevaluaciones."'";			
		$sql1 		= $oGlobals->verPorConsultaPor($sql, 0);
		$contador	= $sql1[0];

		//hacer un ciclo con el numero de registro del contador
		for ($i = 1; $i <= $contador; $i++) {
        $i;
        $id 	=	$_POST["id".$i];
        $valor	=	$_POST["puntuacion".$i];
        //editar la tablas auto_evaluaciones_r
        $_POST["valor_usuario_consenso"]    		= $valor;
		$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s");
		$update = $oGlobals->update_data_array($_POST, "auto_evaluaciones_r", "id", $id);
        
        //consultar el total de todas las auto_evaluaciones_r con valor mayor a 0.0
		$sql4 		= "select count(a.valor_usuario_consenso) as total from auto_evaluaciones
					   INNER JOIN auto_evaluaciones_r as a ON a.id_autoevaluaciones = auto_evaluaciones.id
					   where auto_evaluaciones.documento='".$documento."' and a.valor_usuario_consenso>'0.0' ";			
		$sql5 		= $oGlobals->verPorConsultaPor($sql4, 0);
		$total_r	= $sql5[0];

		//Comparar si ya podemos cambiar el estado del documento
		if ( $total==$total_r ){
			//Cambiar el estado del mov a Completado Personal
			$_POST1["cerrado"]    		     = '7';
			$_POST1["fecha_modificacion"]    = date("Y-m-d h:i:s");
		    $update1 = $oGlobals->update_data_array($_POST1, "mov", "documento", $documento);
		    //pendiente para enviar correo de que ya esta listo para ser revisado por el jefe
		}
		else {
           //Cambiar el estado del mov a Proceso Personal
			$_POST1["cerrado"]    		     = '6';
			$_POST1["fecha_modificacion"]    = date("Y-m-d h:i:s");
		    $update1 = $oGlobals->update_data_array($_POST1, "mov", "documento", $documento);
		}
        }
        echo "<div class='exito'>El registro se guardo correctamente</div>";
    
		
        
}
?>
