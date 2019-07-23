<?php
	
		
		require_once('../../../class/classGlobal.php');

		$oGlobals    = new Globals();
		
		
		if($action == "ver-pedido")				include 'structure/ver-pedido.php';
		if($action == "ver-factura")			include 'structure/ver-factura.php';
		if($action == "ver-rc")					include 'structure/ver-rc.php';
		if($action == "consultar-cartera")		include 'structure/ver-cartera-cliente.php';
		if($action == "informe-inventario")		include 'structure/ver-inventario.php';
		
		if($action == "ver-devolucion")			include 'structure/ver-devolucion.php';
		if($action == "ver-traslado")			include 'structure/ver-traslado.php';
		if($action == "ver-cotizacion")			include 'structure/ver-cotizacion.php';

				
		
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->lastPage();
		$pdf->Output($get.date("Y-m-d-h:i:s").".pdf", 'I');


?>