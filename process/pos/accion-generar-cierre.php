<?php
session_start();
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	
	
		//verificar si el usuario tiene un cuadre abierto en el sistema
        $apertura      = "SELECT * FROM pos_cuadre where cajero='".$_SESSION["usuario"]."' and cerrado='0'";
        $dato_apertura = $oGlobals->verPorConsultaPor($apertura, 0);
        
        $id     = $dato_apertura['id'];
        $numero = $dato_apertura['numero'];
        $caja   = $dato_apertura['caja'];
        $cajero = $dato_apertura['cajero'];

        //if ($estado_cajero== "")
        //{

        //include '../../pos/ver/ver-apertura-abierta-dark.php';
        //}

        if ($numero!= "")
        {

            //verificar que no haya facturas en espera
            $facturas_pendientes="SELECT * FROM mov_pedido where caja='".$caja."' and cajero='".$cajero."' and cuadre='".$numero."' and cerrado='0'";
            $facturas_pendientess = $oGlobals->verPorConsultaPor($facturas_pendientes, 0);
            $documentos_pendientes=$facturas_pendientess['documento'];

             if ($documentos_pendientes!= "")
             {
             include '../../pos/ver/ver-cierre-dark.php';
             echo "<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=../pos/menu_ventas-en-espera-pos.html'>";   
             }

             if ($documentos_pendientes== "")
             {

            //traer valor y cantidades 
            $totales="SELECT sum(valor) as 'valor', sum(cantidad) as 'cantidad' FROM mov where caja='".$caja."' and cajero='".$cajero."' and cuadre='".$numero."'";
            $totaless = $oGlobals->verPorConsultaPor($totales, 0);
           
            //consultar base
            $base="SELECT base FROM pos_cajas where codigo='".$caja."'";
            $bases = $oGlobals->verPorConsultaPor($base, 0);           


            $insr['valor']                  = $totaless['valor']+$bases['base'];
            $insr['unidades']               = $totaless['cantidad'];
            $insr['cerrado']                = 1;
            $insr['horacierre']             = date("h:i:s");

            $update = $oGlobals->update_data_array($insr, "pos_cuadre", "id", $id);
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=../pos/ver-cuadre_".$id.".html'>";
             }




            
        }

		
        
        
?>
