<?php 	
    
	
	$factura = $oInventario->verMovPor(" AND mov.id = $id", 0);
	
	if($factura != 2){
		
			$facDt = $oInventario->verMovRPor(" AND mov_r.id_entrada = $id AND mov_r.tipo_documento = 'TRS'", 1);

			$html  = $html.'
						
				<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px; }.titu { font-size: 20px} .tb_desc{ margin: 0}</style>
				
				<table border="0" cellspacing="1" cellpadding="1">
					
					<tbody>
						<tr>
							<td>Traslado: <strong>'.$factura["documento"].'</strong></td> 
							<td>Fecha: <strong>'.$oGlobals->fecha($factura["fecha_documento"]).'</strong></td> 
							<td>Periodo: <strong>'.$factura["periodo"].'</strong></td> 
						</tr>
						
						<tr>
							<td>Tipo: <strong>'.$factura["documento"].'</strong></td> 
							<td>Bodega Salida: <strong>'.$factura["bodega_salida"].'</strong></td> 
							<td>Bodega Entrada: <strong>'.$factura["bodega_entrada"].'</strong></td> 
						</tr>
						
						<tr>
							<td colspan="3">Observaciones: <br /><strong>'.$factura["obs"].'</strong></td> 
						</tr>
						
						


					</tbody>
				</table>
			';
			
			if($facDt != 2){
				
				$html = $html.'
									<br><br>
									
									<table border="0" cellspacing="1" cellpadding="1">
										
										<thead> 
											<tr>	
												<th align="center" width="10%"><strong>Código.</strong></th>
												<th align="center" width="40%"><strong>Nombre</strong></th>
												<th align="center" width="20%"><strong>Ref.</strong></th>
												<th align="center" width="8%"><strong>Uds</strong></th>
												<th align="center" width="10%"><strong>Valor U.</strong></th> 
												<th align="center" width="10%" align="center"><strong>Total</strong></th>
											</tr>
											<tr>
												<td colspan="6"></td>
											</tr>
										</thead>
				
										<tbody>
								 ';
								 		 $total_uds      = 0;
										 $total_factura  = 0;
										 $dcto           = 0;
										 
								 		 foreach($facDt as $producto){
											 	
												$dcto           = $producto["dcto_finan_porc"];
											 	$total_uds     += $producto["entrada"];
								 				$total_factura += $producto["valor_unitario"] * $producto["entrada"];
								 
								 $html = $html.'
											<tr>
												<td width="10%" align="center">'.$producto["codigo"].'</td>
												<td width="40%">'.utf8_encode($producto["detalle"]).'</td>
												<td width="20%" align="center">'.$producto["referencia"].'</td>
												<td width="8%" align="right">'.round($producto["salida"]).'</td>
												<td width="10%" align="right">'.number_format($producto["valor_unitario"], 0, "", ".").'</td>
												<td width="10%" align="right">'.number_format($producto["valor_unitario"] * $producto["salida"], 0, "", ".").'</td>
		
											</tr>
								  ';
										 }
										 
								$html = $html.'
											<tr>
												<td colspan="6"></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td align="right"><strong>'.round($total_uds).'</strong></td>
												<td></td>
												<td align="right"><strong>'.number_format($total_factura, 0, "", ".").'</strong></td>
											</tr>
										</tbody>
									</table>
									<br/><br/><br/>
									';
									
								
				
			}
	}
						
?>