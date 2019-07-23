<div id="ijjsd"></div>

<button class="btn btn-danger" style="float: right;" onclick="Funciones.cerrar_todas_venta_espera('cerrar_todas_venta_pos', 1, 1, 'ijjsd');">Cerrar todas</button>

<br style="clear: both" />
<br style="clear: both" />

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th scope="col" align="center" >Fecha</th>
                <th scope="col" align="center" >Documento</th>
                <th scope="col" align="center" >Cliente</th>
                <th scope="col" align="center" >Cantidad</th>
                <th scope="col" align="center" >Total</th>   
                <th scope="col" align="center" >Opc</th>                    
            </tr>
        </thead>
        
    <?php
        $total = 0;
        $t_total    = 0;
                $t_cantidad = 0;
		
		  if($documentos != 2){

                

       		   foreach($documentos as $documento){  

                    $t_total    += $documento["total_pedido"];
                    $t_cantidad += $documento["total_cantidad"];                      		
    ?> 	
    
                    <tr id="tr<?= $documento["id"];?>">
                        
                        <td width="18%" align="center"><?= $oGlobals->fecha($documento["fecha_registro"])." / ".$oGlobals->hora($documento["fecha_registro"]);?></td>
                        <td width="" align="center"><a href="" onclick="Funciones.abrir_doc_espera('<?= $documento["documento"]?>', 'ijjsd');"><?= $documento["documento"];?></a></td>
                        <td width="" align="center"><?= utf8_encode($documento["obs"]);?></td>
                        <td width="" align="center"><?= number_format($documento["total_cantidad"], 0, "", ".");?></td>
                        <td width="" align="right" ><?= number_format($documento["total_pedido"], 0, "", ".");?></td>
                        <td width="" align="center" ><button onclick="Funciones.cerrar_venta_espera('cerrar_venta_pos', '1', '<?= $documento['id']; ?>', 'ijjsd');" class="btn btn-xs btn-primary"><i class="fa fa-trash"></i></button></td>
                    </tr>        
        <?php 
                    $total++;
				}
			}
		?>
        
        		<tr>
                    <td align="center"><strong><?= $total;?></strong></td>
                	<td colspan="2"></td>
                    <td align="center"><strong><?= number_format($t_cantidad, 0, "", ".");?></strong></td>
                    <td align="right"><strong><?= number_format($t_total, 0, "", ".");?></strong></td>
                </tr>
                                   
    </table>

    
</div>

<div class="modal fade" id="load_modulo" role="dialog"></div>

