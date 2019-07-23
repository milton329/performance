<?php 	
    
	
	$condicion = $_SESSION["condicion"];
	$clientes  = $oTercero->verClientesConCartera($condicion, 1);
	
	$total = 0;
	
	if($clientes != 2){
	
		 foreach($clientes as $cliente){
			 
			 $cartera = $oTercero->verCarteraPor(" AND car.cliente = '".$cliente["codigo"]."' AND car.id_tipo_documento IN (1,9)", 1);
			 
			if($cartera != 2){
				
				$html  = $html."<h4>".$cliente["codigo"] ." - ". utf8_encode($cliente["nombre"])." ".utf8_encode($cliente["apellido"])." - ".$cliente["ciudad"]."</h4>" ;
				
				$html = $html.'
									<br><br>
									<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px;}</style>
									<table border="0"> 
        
										<thead> 
											<tr>
												<th scope="col" align="center" width="5%">Tipo</th>
												<th scope="col" align="center" width="11%">Documento.</th>
												<th scope="col" align="center" width="12%">Vr. Pedido</th>
												<th scope="col" align="center" width="12%">Vr. Rem</th>
												<th scope="col" align="center" width="11%">Fecha</th>
												<th scope="col" align="center" width="11%">Vence</th>
												<th scope="col" align="center" width="12%">Vencido</th>
												<th scope="col" align="center" width="12%">Por Vencer</th>
												<th scope="col" align="center" width="5%">Dcto.</th>
												<th scope="col" align="center" width="12%">Saldos</th>

											</tr>

										</thead>
				
										<tbody>
								 ';
								 		 $cant     = 0;
										 $t_saldo  = 0;
										 $saldo_v  = 0;
										 $saldo_pv = 0; 
										 $t_saldo_por_v = 0;
										 $t_saldo_ven   = 0;
										 
										 foreach($cartera as $cartera){
											 
											 $cant++;
											 $t_saldo += $cartera["saldo"];
											 
											 if(strtotime($cartera["fecha_vence"]) < strtotime( date('Y-m-d'))) { $saldo_pv = $cartera["saldo"]; $t_saldo_por_v += $saldo_pv;}
											 if(strtotime(date('Y-m-d')) <= strtotime($cartera["fecha_vence"])) { $saldo_v  = $cartera["saldo"]; $t_saldo_ven   += $saldo_v;}
								 
								 $html = $html.'
											<tr>
												<td align="center" width="5%">REM</td>
												<td align="center" width="11%">'.$cartera["documento"].'</td>
												<td align="right"  width="12%">'.number_format($cartera["valor_pedido"], 0, "", ".").'</td>
												<td align="right"  width="12%">'.number_format($cartera["valor"], 0, "", ".").'</td>
												<td align="center" width="11%">'.$oGlobals->fecha($cartera["fecha_documento"]).'</td>
												<td align="center" width="11%">'.$oGlobals->fecha($cartera["fecha_vence"]).'</td>
												<td align="right"  width="12%">'.number_format($saldo_pv, 0, "", ".").'</td>
												<td align="right"  width="12%">'.number_format($saldo_v, 0, "", ".").'</td>
												<td align="right"  width="5%">'.$cartera["dcto"].'</td>
												<td align="right"  width="12%">'.number_format($cartera["saldo"], 0, "", ".").'</td>
											</tr>
								  ';
										 }
										 
								$html = $html.'
											
											<tr>
												<td colspan="10"></td>
											</tr>
											
											<tr>
												<td align="center"></td>
												<td align="center"><strong>'.$cant.'</strong></td>
												<td align="center"></td>
												<td align="center"></td>
												
												<td align="center"></td>
												<td align="center"></td>
												<td align="right"><strong>'.number_format($t_saldo_por_v, 0, "", ".").'</strong></td>
												<td align="right"><strong>'.number_format($t_saldo_ven, 0, "", ".").'</strong></td>
												<td align="center"></td>
												<td align="right"><strong>'.number_format($t_saldo, 0, "", ".").'</strong></td>
				
											</tr>   
											
										</tbody>
									</table>
									<br><br>
									
								  ';
	
			}
		 }
	}
?>