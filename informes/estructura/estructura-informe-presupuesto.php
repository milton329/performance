
<div class="modal-dialog modal-lg lg-modal-mov">
    
  <div class="modal-content" >
    
    <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 style="color:#FFFFFF"> Consultar presupuesto / Tienda: <?= $tienda;?></strong></h3>
    </div>
    
    <div class="modal-body paddin" style=" background: #f6f6f6;">	
    
		<?php 
				
				//Consulta parte 1

					$sql   = "Consulta_presupuesto_1 $mes, '$fecha_inicial','$fecha_corte', '$tienda'";
					$sql_t = "Consulta_presupuesto_1_t $mes, '$fecha_inicial','$fecha_corte'";
				
					if($empresa == 1) {
						
						if($tienda != "TODOS") $consulta_1 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql, 1);
						else                   $consulta_1 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql_t, 1);
					
					}
					else $consulta_1 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "Zeus\losangeles", "BdSistemabarranca", "sa", 'Pa$$w0rd', $sql, 1);

					
					if($consulta_1 != 2) include '../../informes/tablas/tabla-informe-presupuesto-1.php';
					
					echo "<br/><br/>";
				
				//Consulta parte 3

					$sql   = "Consulta_presupuesto_3 $mes, '$fecha_inicial','$fecha_corte', '$tienda'";
					$sql_t = "Consulta_presupuesto_3_t $mes, '$fecha_inicial','$fecha_corte'";	
					
					if($empresa == 1){
						
						if($tienda != "TODOS") $consulta_3 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql, 1);
						else                   $consulta_3 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql_t, 1);
					
					}	
					else $consulta_3 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "Zeus\losangeles", "BdSistemabarranca", "sa", 'Pa$$w0rd', $sql, 1);

					
					if($consulta_3 != 2) include '../../informes/tablas/tabla-informe-presupuesto-3.php';
					
					echo "<br/><br/>";
					
				//Consulta parte 4
				
					$sql   = "Consulta_presupuesto_4 $mes, '$fecha_inicial','$fecha_corte', '$tienda'";
					$sql_t = "Consulta_presupuesto_4_t $mes, '$fecha_inicial','$fecha_corte'";
					
					if($empresa == 1) 	{
						
						if($tienda != "TODOS") $consulta_4 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql, 1);
						else                   $consulta_4 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql_t, 1);
					
					} else $consulta_4 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "Zeus\losangeles", "BdSistemabarranca", "sa", 'Pa$$w0rd', $sql, 1);

					
					if($consulta_4 != 2) include '../../informes/tablas/tabla-informe-presupuesto-4.php';
					
					echo "<br/><br/>";
					
				//Consulta parte 2
				
					$sql   = "Consulta_presupuesto_2   $mes, '$fecha_inicial','$fecha_corte', '$tienda'";
					$sql_t = "Consulta_presupuesto_2_t $mes, '$fecha_inicial','$fecha_corte'";
					
					if($empresa == 1) 	{
						
						if($tienda != "TODOS") $consulta_2 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql, 1);
						else                   $consulta_2 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql_t, 1);
						
					}
					else $consulta_2 = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "Zeus\losangeles", "BdSistemabarranca", "sa", 'Pa$$w0rd', $sql, 1);

				
					if($consulta_2 != 2) include '../../informes/tablas/tabla-informe-presupuesto-2.php';
					
					echo "<br/><br/>";

		
		?>

    </div>
  
</div>        
        
        
        