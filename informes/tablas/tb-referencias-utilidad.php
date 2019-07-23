<div id="rspCar"></div>

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th scope="col" align="center">Código</th>
                <th scope="col" align="center">Nombre</th>
                <th scope="col" align="center">Referencia</th>
                <th scope="col" align="center">P. Costo.</th> 
                <th scope="col" align="center">P. Venta</th> 
                <!--<th scope="col" align="center">Uds. Venta</th> 
                <th scope="col" align="center">T. Costo</th>
                <th scope="col" align="center">T. Venta</th>-->
                <th scope="col" align="center">Utilidad</th>
                <th scope="col" align="center">%</th>                        
            </tr>
        </thead>
        
    <?php

            $total         = 0;
            $t_p_costo     = 0;
            $t_p_venta     = 0;
            $t_disponible  = 0;

		  if($referencias != 2){
       		   foreach($referencias as $referencia){   

                    $codigo = $referencia["codigo"];

                    $sql_venta = "SELECT (SUM(valor_unitario) / COUNT(*)) as valor_venta FROM mov_r WHERE codigo = '$codigo' AND tipo_documento = 'REM'";
                    $sql_costo = "SELECT (SUM(valor_unitario) / COUNT(*)) as valor_costo FROM mov_r WHERE codigo = '$codigo' AND tipo_documento = 'COM'"; 

                    $p_venta = $oGlobals->verPorConsultaPor($sql_venta, 0);
                    $p_costo = $oGlobals->verPorConsultaPor($sql_costo, 0);

                    $porcentaje = 0;

                    if($p_venta["valor_venta"] > $p_costo["valor_costo"])$porcentaje = 100 - ($p_venta["valor_venta"] / $p_costo["valor_costo"]) * 100;

                    $t_p_costo += $p_costo["valor_costo"];
                    $t_p_venta += $p_venta["valor_venta"];
    ?> 	
                <tr>
                    <td width="" align="center" ><?= utf8_encode($referencia["codigo"]);?></td>
                    <td width="" align="center" ><?= utf8_encode($referencia["nombre"]);?></td>
                    <td width="" align="center" ><?= utf8_encode($referencia["referencia"]);?></td>
                    <td width="" align="right" ><?= number_format($p_costo["valor_costo"], 0, "", ".");?></td>
                    <td width="" align="right" ><?= number_format($p_venta["valor_venta"], 0, "", ".");?></td>
                    <td width="" align="right" ><?= number_format($p_venta["valor_venta"] - $p_costo["valor_costo"], 0, "", ".");?></td>
                    <td width="" align="right" ><?= number_format($porcentaje, 1, ".", ".");?></td>
                </tr>        
        <?php 
                    $total++;
				}
			}
		?>
        
        		<tr>
                    <td align="center"><strong><?= $total;?></strong></td>
                	<td colspan="3"></td>
                    <td align="right"><strong><?= number_format($t_p_costo, 0, "", ".");?></strong></td>
                    <td align="right"><strong><?= number_format($t_p_venta, 0, "", ".");?></strong></td>
                </tr>
                                   
    </table>

    
</div>

<div class="modal fade" id="load_modulo" role="dialog"></div>

 