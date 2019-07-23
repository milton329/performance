<?php 	
    
	
	$pedido = $oPedido->verMovPedidosPor(" AND mov_pedido.id = $id", 0);
	
	if($pedido != 2){
		
			$pedDt = $oPedido->verMovRPedidosPor(" AND mov_pedido.documento = '".$pedido["documento"]."'", 1);
			$ciudad = $oGlobals->verOpcionesPor("ciudades", " AND id = ".$pedido["cliente_ciudad"]."", 0);

			$html  = $html.'
						
				<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px;}</style>
				
				<table border="0" cellspacing="1" cellpadding="1">
					
					<tbody>
						<tr>
							<td width="13%">Fecha</td>
							<td width="50%" align="left"><strong>'.$oGlobals->fecha($pedido["fecha_creacion"]).'</strong></td>
							<td width="30%" align="left"><strong>'.$pedido["documento"].'</strong></td>
						</tr>
						<tr>
							<td>NIT:</td>
							<td width="50%" align="left"><strong>'.utf8_encode($pedido["cliente_identificacion"]).'</strong></td>
							<td width="30%" align="left"><strong>'.utf8_encode($pedido["cliente_codigo"]).'</strong></td>
						</tr>
						<tr>
							<td>Cliente:</td>
							<td width="50%" align="left"><strong>'.utf8_encode($pedido["cliente_nombre"]).'</strong></td>
							<td><strong>'.utf8_encode($ciudad["ciudad"]).'</strong></td>
						</tr>
						<tr>
							<td>Dirección:</td>
							<td align="left"><strong>'.utf8_encode($pedido["cliente_direccion"]).'</strong></td>
							<td></td>
						</tr>
						<tr>
							<td >
								Observaciones: 
							</td>
							<td colspan="2">
							 '.utf8_encode($pedido["obs"]).'
							
							</td>
						</tr>
					</tbody>
				</table>
			';
			
			if($pedDt != 2){
				
				$html = $html.'
									<br><br>
									
									<table border="0" cellspacing="1" cellpadding="1">
										
										<thead> 
											<tr>	
												<th align="center" width="10%"><strong>CÓDIGO.</strong></th>
												<th align="center" width="10%"><strong>REF.</strong></th>
												<th align="center" width="28%"><strong>NOMBRE</strong></th>
												<th align="center" width="5%"><strong>C.B.</strong></th>
												<th align="center" width="6%"><strong>TOT B</strong></th>
												<th align="center" width="8%"><strong>UDS</strong></th>
												<th align="center" width="8%" ><strong>SUGE.</strong></th>
												<th align="center" width="10%"><strong>TOTAL S.</strong></th> 
												<th align="center" width="8%" align="right"><strong>VALOR.</strong></th>
												<th align="center" width="10%" align="center"><strong>TOTAL</strong></th>
											</tr>
											<tr>
												<td colspan="10"></td>
											</tr>
										</thead>
				
										<tbody>
								 ';
								 		 $total_bulto  = 0;
										 $total_suger  = 0;
								 		 $total_pedido = 0;
										 
								 		 foreach($pedDt as $producto){
											 	
											 	$total_bulto  += $producto["cantidad_pedida"] / $producto["cantidad_por_bulto"];
												$total_suger  += $producto["sub_sugerido"];
								 				$total_pedido += $producto["sub_pedido"];
								 
								 $html = $html.'
											<tr>
												<td width="10%" align="center">'.$producto["codigo"].'</td>
												<td width="10%" align="center">'.$producto["referencia"].'</td>
												<td width="28%">'.utf8_encode($producto["detalle"]).'</td>
												<td width="5%" align="center">'.$producto["cantidad_por_bulto"].'</td>
												<td width="6%" align="right">'.round($producto["cantidad_pedida"] / $producto["cantidad_por_bulto"]).'</td>
												<td width="8%" align="right">'.$producto["cantidad_pedida"].'</td>
												<td width="8%" align="right">'.number_format($producto["valor_sugerido"], 0, "", ".").'</td>
												<td width="10%" align="right">'.number_format($producto["sub_sugerido"], 0, "", ".").'</td>
												<td width="8%" align="right">'.number_format($producto["valor_unitario"], 0, "", ".").'</td>
												<td width="10%" align="right">'.number_format($producto["sub_pedido"], 0, "", ".").'</td>
												
											</tr>
								  ';
										 }
										 
								$html = $html.'
											<tr>
												<td colspan="10"></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td align="right"><strong>'.round($total_bulto).'</strong></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td align="right"><strong>'.number_format($total_pedido, 0, "", ".").'</strong></td>
											</tr>
										</tbody>
									</table>
																		
									<h3>Manifiestos</h3>
									
								  ';
								  
								  
								  $pedDt = $oPedido->verMovRPedidosReferenciaPor(" AND mov_r_pedidos.documento = '".$pedido["documento"]."'", 1);
								  $count = count($pedDt);
								  $cant  = 1;
								  
								  
								  foreach($pedDt as $producto){
									 
									 if($count > $cant) $separador = ", "; else $separador = "";					 
									 $html = $html.'' .$producto["manifiesto"].$separador.''; 
								  	 $cant ++;
								  
								  }

				
			}
	}
						
?>