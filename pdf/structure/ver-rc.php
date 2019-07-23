<?php 	
    
	$documento = $oTercero->verMovCarteraPor(" AND id = ".$id."", 0);
	
	if($documento != 2){
		
			$cartera_r = $oTercero->verCarteraMovRPor(" AND documento = '".$documento["documento"]."'", 1);


			$html  = $html.'
						
				<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px;}</style>
				
				<table border="0" cellspacing="1" cellpadding="1" width="85%">
                                
					<tbody>
					
						<tr>
							<td align="left" width="50%">Documento: <strong>'.utf8_encode($documento["documento"]).'</strong></td>
							<td align="left">Fecha: <strong>'.$oGlobals->fecha($documento["fecha_documento"]).'</strong></td>
							<td align="left">Periodo: <strong>'.utf8_encode($documento["periodo"]).'</strong></td>
						</tr>
						
						<tr>
							<td >Cliente: <strong>'.utf8_encode($documento["cliente_nombre"]).'</strong></td>
							<td align="left">Identificación: <strong>'.utf8_encode($documento["cliente_identificacion"]).'</strong></td>
							<td >Código: <strong>'.utf8_encode($documento["cliente"]).'</strong></td>
						</tr>
						
						
						<tr>
							<td colspan="3">Observaciones: <br/>
								<strong>'.utf8_encode($documento["obs"]).'</strong> 
							</td>
						</tr>
						
						
					</tbody>
				
				</table>
			';
			
			if($cartera_r != 2){
				
				$html = $html.'
									<br><br>
									
									<table border="0"> 
        
										<thead> 
											<tr>
												<th scope="col" align="center" width="12%">Movimiento</th>
												<th scope="col" align="center" width="20%">Descripción</th>
												<th scope="col" align="center" width="5%">Tipo</th>
												<th scope="col" align="center" width="11%">Remisión</th>
												<th scope="col" align="center" width="10%">Débito</th>
												<th scope="col" align="center" width="10%">Crédito</th>
												<th scope="col" align="center" width="8%">Cliente</th>
												<th scope="col" align="center" width="12%">Identificación</th>
												<th scope="col" align="center" width="12%">Fecha Vence</th>
		
											</tr>
										</thead>
				
										<tbody>
								 ';
								 		  $sum_debito  = 0;
					 					  $sum_credito = 0;
										 
								 		 foreach($cartera_r as $cartera){
											 	
											$sum_debito  += $cartera["debito"];
											$sum_credito += $cartera["credito"];
								 
								 $html = $html.'
								 			<tr>
												<td colspan="9"></td>
											</tr>
											<tr>
												<td width="12%" align="center">'.$cartera["tipo_movimiento"].'</td>
												<td width="20%" align="center">'.$cartera["cliente_nombre"].'</td>
												<td width="5%">'.utf8_encode($cartera["tipo_documento"]).'</td>
												<td width="11%" align="center">'.$cartera["documento_cruce"].'</td>
												<td width="10%" align="right">'.number_format($cartera["debito"], 0, "", ".").'</td>
												<td width="10%" align="right">'.number_format($cartera["credito"], 0, "", ".").'</td>
												<td width="8%" align="center">'.$cartera["cliente_codigo"].'</td>
												<td width="12%" align="center">'.$cartera["cliente_identifiacion"].'</td>
												<td width="12%" align="center">'.$oGlobals->fecha($cartera["fecha_vence"]).'</td>
												
											</tr>
								  ';
										 }
										 
								$html = $html.'
											<tr>
												<td colspan="9"></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td align="right"><strong id="tot_debito">'.number_format($sum_debito, 0, "", ".").'</strong></td>
												<td align="right"><strong id="tot_credito">'.number_format($sum_credito, 0, "", ".").'</strong></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</tbody>
									</table>

									
								  ';
	  

				
			}
	}
						
?>