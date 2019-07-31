<?php
session_start();
		

		require_once '../../class/classGlobal.php';

		$oGlobals 		= 	new Globals();
		$id_rol 		= $_POST['id_rol'];
		$tipo 		    = $_POST['tipo'];
        
        //consultar cuantos registros tengo en las competencias_1
        $sql 		= "SELECT count(* ) FROM competencias_1 where id_rol='".$id_rol."' and tipo='".$tipo."'";			
		$sql1 		= $oGlobals->verPorConsultaPor($sql, 0);
		$contador	= $sql1[0];

		//hacer un ciclo con el numero de registro del contador
		$num=0;
		$acu=0;
		for ($i = 1; $i <= $contador; $i++) {
        $i;
        $id 	=	$_POST["id".$i];
        $valor	=	$_POST["puntuacion".$i];
        $acu    =  $acu+$valor;
        if ($valor > 0) { $num=$num+1;}
        }

        if($num < $contador){
        	// tiene algun valor en 0
        	echo "<hr><div class='error'>No puedes tener ningun valor en 0.0 !</div>";
        }
        if($num == $contador){
        	// verificar si la cantidad da 100 o menos
        	if ($acu<100){
        		echo "<hr><div class='error'>La sumatoria no puede dar menos de 100 !</div>";
        	}
        	if ($acu>100){
        		echo "<hr><div class='error'>La sumatoria no puede dar mas de 100 !</div>";
        	}
        	if ($acu==100){
        		// actualizar en cascada los valores
        		for ($i = 1; $i <= $contador; $i++) {
		        $i;
		        $id 	=	$_POST["id".$i];
		        $valor	=	$_POST["puntuacion".$i];
		        //editar la tablas competencias_1
		        $_POST["valor"]    				= $valor;
				$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s");
				$update = $oGlobals->update_data_array($_POST, "competencias_1", "id", $id);
        	    }

        	    echo "<hr><div class='exito'>Los cambios se han guardado correctamente</div>";
            }
        }


?>