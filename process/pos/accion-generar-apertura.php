<?php
session_start();
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	

		//Declarar variables de formulario
		$cajero			=	$_POST['cajero'];
		$almacen		=	$_POST['almacen'];
		$caja		    =	$_POST['caja'];
		$valor		    =	$_POST['valor'];
	
		//verificar que no este abierto la caja con otro usuario
        $estado_caja="SELECT * FROM pos_cuadre
        where almacen='".$almacen."' and caja='".$caja."' and cerrado='0'";
        $estado_cajaa = $oGlobals->verPorConsultaPor($estado_caja, 0);
        $estado_cajero= $estado_cajaa['cajero'];
        $estado_fecha= $estado_cajaa['fecha'];
        $estado_hora= $estado_cajaa['horaabierto'];

        if ($estado_cajero!= "")
        {

            include '../../pos/ver/ver-apertura-abierta-dark.php';
        }

        if ($estado_cajero== "")
        {
            //traer el consecutivo siguiente
            $consecutivo="SELECT numero FROM pos_cuadre
            where almacen='".$almacen."' and caja='".$caja."' order by id desc";
            $consecutivoo = $oGlobals->verPorConsultaPor($consecutivo, 0);
            $num= $consecutivoo['numero']+1;

            //hacer el insert del nuevo cuadre
            $_POST['fecha']              = date("Y-m-d");
            $_POST['tipo']               = 'FPV';
            $_POST['valor']              = $valor;
            $_POST['numero']             = $num;
            $_POST['cerrado']            = '0';
            $_POST['horaabierto']        = date("h:i:s");

            $array = $_POST;
            $insert = $oGlobals->insert_data_array($array, "pos_cuadre");

            if($insert != 0){
            include '../../pos/ver/ver-apertura-abierta-ok.php';
            }
            
        }

		
        
        
?>
