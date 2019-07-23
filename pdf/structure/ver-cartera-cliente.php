<?php 	
    

	if(isset($_SESSION["registros"])){

			$cartera = $_SESSION["registros"];

			$html  = $html.'
						
				<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px;}</style>
				
			';
			

				
				$html = $html.'
									<br><br>
									
									<table border="0"> 
        
										<thead> 
											<tr>
												<th scope="col" align="center" width="20%">NOMBRE</th>
												<th scope="col" align="center" width="12%">DOCUMENTO.</th>
												<th scope="col" align="center" width="12%">VR. REM</th>
												<th scope="col" align="center" width="11%">FECHA</th>
												<th scope="col" align="center" width="11%">VENCE</th>
												<th scope="col" align="center" width="12%">VENCIDO</th>
												<th scope="col" align="center" width="12%">POR VENCER</th>
												<th scope="col" align="center" width="12%">SALDO</th>

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
										 $dcto = 0;

										 
										 
										 foreach($cartera as $cartera){

										 	$saldo_v  = '';
										 	$saldo_pv = ''; 
											 
											 $cant++;
											 $t_saldo += $cartera["saldo"];
											 
											 if($cartera["fecha_vence"] != "") { if(strtotime($cartera["fecha_vence"]) < strtotime( date('Y-m-d'))) { $saldo_pv = $cartera["saldo"]; $t_saldo_por_v += $saldo_pv;}}
											 if($cartera["fecha_vence"] != "") { if(strtotime(date('Y-m-d')) <= strtotime($cartera["fecha_vence"])) { $saldo_v  = $cartera["saldo"]; $t_saldo_ven   += $saldo_v;}}
											 
								 $html = $html.'
											<tr>
												<td align="center" width="20%">'.$cartera["cliente_nombre"].'</td>
												<td align="center" width="12%">'.$cartera["documento"].'</td>
												<td align="right"  width="12%">'.number_format($cartera["valor"], 0, "", ".").'</td>
												<td align="center" width="11%">'.$oGlobals->fecha($cartera["fecha_documento"]).'</td>
												<td align="center" width="11%">'.$oGlobals->fecha($cartera["fecha_vence"]).'</td>
												<td align="right"  width="12%">'.number_format($saldo_pv, 0, "", ".").'</td>
												<td align="right"  width="12%">'.number_format($saldo_v, 0, "", ".").'</td>
												<td align="right"  width="12%">'.number_format($cartera["saldo"], 0, "", ".").'</td>
											</tr>
								  ';
										 }
										 
								$html = $html.'
											
											<tr>
												<td colspan="8"></td>
											</tr>
											
											<tr>
												<td align="center"></td>
												<td align="center"><strong>'.$cant.'</strong></td>
												<td align="center"></td>
												
												<td align="center"></td>
												<td align="center"></td>
												<td align="right"><strong>'.number_format($t_saldo_por_v, 0, "", ".").'</strong></td>
												<td align="right"><strong>'.number_format($t_saldo_ven, 0, "", ".").'</strong></td>
												<td align="right"><strong>'.number_format($t_saldo, 0, "", ".").'</strong></td>
				
											</tr>   
											
										</tbody>
									</table>

									
								  ';
	  


	}						
?>