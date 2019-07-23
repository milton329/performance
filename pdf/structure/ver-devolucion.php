<?php 	
    
	
	$factura = $oInventario->verMovPor(" AND mov.id = $id", 0);
	
	if($factura != 2){
		
			$facDt = $oInventario->verMovRPor(" AND mov_r.id_entrada = $id", 1);

			$html  = $html.'
						
				<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px; }.titu { font-size: 20px} .tb_desc{ margin: 0}</style>
				
				<table border="0" cellspacing="1" cellpadding="1">
					
					<tbody>
						<tr>
							
							<td width="12%">DEVOLUCIÓN: </td> 
							<td width="35%" ><strong>'.$factura["documento"].'</strong></td>
						</tr>
						
						<tr>
							<td width="12%">CLIENTE:</td>
							<td width="35%"><strong>'.utf8_encode($factura["cliente_nombre"]).'</strong></td>
							<td width="12%">VENDEDOR:</td>
							<td width="35%"><strong>'.utf8_encode($factura["nombre_vendedor"]).'</strong></td>	
						</tr>
						<tr>
							<td width="12%">FECHA:</td>
							<td><strong>'.$oGlobals->fecha($factura["fecha_documento"]).'</strong></td>
						</tr>
						<tr>
							<td width="12%">NIT: </td>
							<td><strong>'.utf8_encode($factura["cliente_identificacion"]).'</strong></td>
							<td width="12%">CÓDIGO:</td>
							<td><strong>'.utf8_encode($factura["cliente_codigo"]).'</strong></td>
						</tr>
						
						<tr>
							<td width="12%">DIRECCIÓN: </td>
							<td width="35%"><strong>'.utf8_encode($factura["cliente_direccion"]).'</strong> </td>
							<td colspan="2">
								TELÉFONO: <strong>'.utf8_encode($factura["cliente_telefono"]).'</strong> / 
								CIUDAD: <strong>'.utf8_encode($factura["ciudad"]).'</strong>
							</td>
						</tr>
						
						<tr>
							<td width="12%">
								OBS:
							</td>
							<td colspan="4">
							 <strong>'.utf8_encode($factura["obs"]).'</strong>
							
							</td>
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
												<th align="center" width="10%"><strong>CÓDIGO.</strong></th>
												<th align="center" width="40%"><strong>NOMBRE</strong></th>
												<th align="center" width="20%"><strong>REF.</strong></th>
												<th align="center" width="8%"><strong>UDS</strong></th>
												<th align="center" width="10%"><strong>VALOR U.</strong></th> 
												<th align="center" width="10%" align="center"><strong>TOTAL</strong></th>
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
												<td width="8%" align="right">'.round($producto["entrada"]).'</td>
												<td width="10%" align="right">'.number_format($producto["valor_unitario"], 0, "", ".").'</td>
												<td width="10%" align="right">'.number_format($producto["valor_unitario"] * $producto["entrada"], 0, "", ".").'</td>
		
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