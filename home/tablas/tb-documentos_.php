<div id="rspCar"></div>

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th scope="col" align="center" >Entidad</th>
                <th scope="col" align="center" >No. CCE</th>
                <th scope="col" align="center" >F. Cierre</th>
                <th scope="col" align="center" >Valor</th>
                <th scope="col" align="center" >Fecha R.</th>
                <th scope="col" align="center" >Opc</th>                         
            </tr>
        </thead>
        
    <?php
          $total       = 0;
          $t_documento = 0;	

		  if($documentos != 2){

       		   foreach($documentos as $documento){  

                    $t_documento += $documento["total_documento"];    

                    $estao = "";

                    if($documento["estado"] == 2)  $estao = 'style="background: #2DA703 !important; color:#FFFFFF;"';
                    if($documento["estado"] == 3)  $estao = 'style="background: #d94d3c !important; color:#FFFFFF;"';                   		
    ?> 	
                    <tr id="tr<?= $documento["id"];?>" <?= $estao;?> >
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_nombre"]);?></td>
                        <td width="" align="center" ><?= $documento["no_cce"];?></td>
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_entrega"]);?></td>
                        <td width="" align="right" ><?= number_format($documento["total_documento"], 0, "", ".");?></td>
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_creacion"]);?></td>
                        <td width="" align="center" >
                            <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $documento["id"]."_".$ope;?>', 'ver_cotizacion', 'load_modulo', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-eye"></i></a>
                        </td>
                    </tr>        
        <?php 
                    $total++;
				}
			}
		?>
        
        		<tr>
                    <td align="center"><strong><?= $total;?></strong></td>
                    <td></td>
                    <td></td>
                	<td><strong><?= number_format($t_documento, 0, "", ".");?></strong></td>
                    <td></td>
                    <td></td>
                </tr>
                                   
    </table>

    
</div>

<div class="modal fade" id="load_modulo" role="dialog"></div>

