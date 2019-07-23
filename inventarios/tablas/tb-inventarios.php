<div id="rspCar"></div>

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th scope="col" align="center">Código</th>
                <th scope="col" align="center">Nombre</th>
                <th scope="col" align="center">Referencia</th>
                <th scope="col" align="center">Precio</th>
                <th scope="col" align="center">Existencia</th> 
                <th scope="col" align="center">Pedidas</th> 
                <th scope="col" align="center">Disponible</th>                        
            </tr>
        </thead>
        
    <?php

            $total         = 0;
            $t_existencia  = 0;
            $t_pedido      = 0;
            $t_disponible  = 0;

		  if($referencias != 2){
       		   foreach($referencias as $referencia){    

                    $t_existencia += $referencia["entrada"] - $referencia["salida"];                    	
                    $t_pedido     += $referencia["pedido"];
                    $t_disponible += ($referencia["entrada"] - $referencia["salida"]) - $referencia["pedido"];

    ?> 	
                <tr>
                    <td width="" align="center" ><?= utf8_encode($referencia["codigo"]);?></td>
                    <td width="" align="center" ><?= utf8_encode($referencia["detalle"]);?></td>
                    <td width="" align="center" ><?= utf8_encode($referencia["referencia"]);?></td>
                    <td width="" align="center" ><?= utf8_encode($referencia["referencia"]);?></td>
                    <td width="" align="right" ><?= ($referencia["entrada"] - $referencia["salida"]);?></td>
                    <td width="" align="right" ><?= ($referencia["pedido"]);?></td>
                    <td width="" align="right" ><?= ($referencia["entrada"] - $referencia["salida"]) - $referencia["pedido"];?></td>
                </tr>        
        <?php 
                    $total++;
				}
			}
		?>
        
        		<tr>
                    <td align="center"><strong><?= $total;?></strong></td>
                	<td colspan="3"></td>
                    <td align="right"><strong><?= $t_existencia;?></strong></td>
                    <td align="right"><strong><?= $t_pedido;?></strong></td>
                    <td align="right"><strong><?= $t_disponible;?></strong></td>
                </tr>
                                   
    </table>

    
</div>

<div class="modal fade" id="load_modulo" role="dialog"></div>

 