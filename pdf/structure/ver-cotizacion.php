<?php 	
    
	
	$factura = $oGlobals->verOpcionesPor("mov", " AND id = '$id'", 0);
	
	if($factura != 2){
			$documento = $factura["documento"];
			$facDt     = $oGlobals->verOpcionesPor("mov_r", " AND documento = '$documento'", 1);

			$html  = $html.'
						
				<style> table  { font-size: 11px; margin-left: 200px;} .total { font-size: 13px; }.titu { font-size: 20px} .tb_desc{ margin: 0}</style>
				<table border="0" cellspacing="1" cellpadding="1">
					
					<tbody>
						<tr width="100%">							
							<td width="8%">Cotización : </td> 
							<td width="72%" ><strong>'.$factura["documento"].'</strong></td>
                            <td width="12%">Fecha documento : </td> 
							<td width="25%" ><strong>'.$factura["fecha_documento"].'</strong></td>
						</tr>
                        <br>
						<tr width="100%">							
							<td colspan="4" >Datos del cliente <br></td> 
						</tr>


						
						<tr>
							<td width="14%">Cliente:</td>
							<td width="35%"><strong>'.utf8_encode($factura["cliente_nombre"]).'</strong></td>	
						</tr>
						<tr>
							<td width="14%">Fecha:</td>
							<td><strong>'.$factura["fecha_documento"].'</strong></td>
							
						</tr>
						<tr>
							<td width="14%">Identificación: </td>
							<td><strong>'.utf8_encode($factura["cliente_identificacion"]).'</strong></td>
							<td width="12%">Código:</td>
							<td><strong>'.utf8_encode($factura["cliente_codigo"]).'</strong></td>
						</tr>
						
						<tr>
							<td width="14%">Dirección: </td>
							<td width="35%"><strong>'.utf8_encode($factura["cliente_direccion"]).'</strong> </td>
							<td colspan="2">
								Teléfono: <strong>'.utf8_encode($factura["cliente_telefono"]).'</strong> / 
								Ciudad: <strong>'.utf8_encode($factura["cliente_ciudad"]).'</strong>
							</td>
						</tr>

					</tbody>
				</table>
			';
			
			if($facDt != 2){
				
				$html = $html.'
									<br><br>
									
									<table border="1" cellspacing="1" cellpadding="1">
										
										<thead> 
											<tr>	
												<th align="center" width="10%"><strong>Código.</strong></th>
												<th align="center" width="40%"><strong>Nombre</strong></th>
												<th align="center" width="15%"><strong>Referncia.</strong></th>
												<th align="center" width="10%"><strong>Cantidad</strong></th>
												<th align="center" width="12%"><strong>Valor U.</strong></th> 
												<th align="center" width="13%" align="center"><strong>Total</strong></th>
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
										 $subtotal       = 0;
										 
								 		 foreach($facDt as $producto){
											 	
												$dcto           = $producto["dcto_finan_porc"];
											 	
								 				
								 				$cantidad = $producto["salida"];

								 				if($factura["tipo_documento"] == "COT") $cantidad = $producto["salida"];

								 				$subtotal = $producto["valor_unitario"] * $cantidad;

								 				$total_uds     += $cantidad;
								 				$total_factura += $subtotal ;

								 $html = $html.'
											<tr>
												<td width="10%" align="center">'.$producto["codigo"].'</td>
												<td width="40%" align="center">'.utf8_encode($producto["detalle"]).'</td>
												<td width="15%" align="center">'.$producto["referencia"].'</td>
												<td width="10%"  align="right">'.round($cantidad).'</td>
												<td width="12%" align="right">'.number_format($producto["valor_unitario"], 0, "", ".").'</td>
												<td width="13%" align="right">'.number_format($subtotal, 0, "", ".").'</td>
		
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