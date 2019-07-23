<?php 	
    
	
	$productos = $_SESSION["inventario"];

			$html  = $html.'
						
				<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px;}</style>
				
				<table class="table table-striped" id="tbCarrito">                            
					<thead>
						<tr>
							<th width="40%" scope="col" align="center">Nombre.</th>
							<th width="12%" align="center">Referencia</th>
							<th width="10%" align="right">Código.</th>
							<th width="7%"  align="left">Bulto.</th>
							<th width="10%" align="center">EXIS.</th>
							<th width="10%" align="center">PED.</th> 
							<th width="10%" align="center">DISP.</th>
							   
						</tr>
					</thead>
			';
				
				
				  foreach($productos as $producto){   
			
						$codigo    = $producto["codigo"];
						
						$cant_ped   = $oPedido->cantidadPedida(" AND codigo = '$codigo'", 0);
						$entrada    = $oInventario->verEntradasPor(" AND codigo = '$codigo'", 0);    
						$salida     = $oInventario->verSalidasPor(" AND codigo = '$codigo'", 0);
						$disponible = ($entrada["entrada"] - $salida["salida"]) - $cant_ped["can_ped"];
						
						
						$existencia = $entrada["entrada"] - $salida["salida"];  
						
						if($disponible > 0){  
			 
			 $html = $html.'
						<tr valign="middle">
                    
							<td width="40%" align="left">'.utf8_encode($producto["nombre"]).'</td>
							<td width="12%" align="center">'.utf8_encode($producto["referencia"]).'</td>
							<td width="10%" align="center">'.utf8_encode($producto["codigo"]).'</td>
							<td width="7%" align="right">'.number_format($producto["cantidad_por_bulto"]).'</td>
							<td width="10%" align="right">'.number_format($existencia, 0, "", ".").'</td>
							<td width="10%" align="right">'.number_format($cant_ped["can_ped"], 0, "", ".").'</td>
							<td width="10%" align="right">'.number_format($disponible, 0, "", ".").'</td>
		 
						</tr> 
				 ';
						 }
				}
				
				$html  = $html.'</table>';
				
?>