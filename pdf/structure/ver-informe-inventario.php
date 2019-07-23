<?php 	
    
	$productos= $_SESSION["inventario"];
	
	if($productos != 2){
		
			$tercero = $oTercero->verTercerosPor(" AND codigo = '".$id."'", 0);

			$html  = $html.'
						
				<style> table  { font-size: 10px; margin-left: 200px;} .total { font-size: 13px;}</style>
				
				<table class="table table-striped" id="tbCarrito">                            
					<thead>
						<tr>
							<th width="30%" scope="col" align="center">Nombre.</th>
							<th scope="col" align="center" width="10%">Referencia</th>
							<th width="10%" align="right">Código.</th>
							<th width="12%" align="right">Precio.</th>
							<th width="" align="left">Bulto.</th>
							<th width="8%"><small>Exis.</small></th>
							<th width="8%"><small>Ped</small></th> 
							<th width="8%"><small>Disp.</small></th>
							   
						</tr>
					</thead>
	
			';
		
				
				$html = $html.'
								<tr valign="middle" id="tr<?php echo $producto["id"];?>">
                    
								<td width="" align="left">'.utf8_encode($producto["nombre"]).'</td>
								<td width="" align="left">'.utf8_encode($producto["referencia"]).'</td>
								<td width="" align="left">'.utf8_encode($producto["codigo"]).'</td>
								<td width="" align="right"></td>
								<td width="" align="right">'.number_format($producto["cantidad_por_bulto"]).'</td>
								<td width="" align="right">'.number_format($entrada["entrada"], 0, "", ".").'</td>
								<td width="" align="right">'.number_format($cant_ped["can_ped"], 0, "", ".").'</td>
								<td width="" align="right">'.number_format($disponible, 0, "", ".").'</td>
			 
							</tr> 	
							  
							  ';
	  			
				$html = $html.'</table>';


	}
						
?>