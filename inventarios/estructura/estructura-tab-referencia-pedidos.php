
   <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Inventarios / Pedidos /</span>
            <?= utf8_encode($producto["nombre"])." / REF: ".$producto["referencia"]." / COD: ".$producto["codigo"];?></h3>
          </h1>
        </div>
    </div>

   
   <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
                <th width="" scope="col" align="center">Fecha</th>
                <th width="" scope="col" align="center">Documento</th>
                <th width="" scope="col" align="center">Nombre</th>
                <th width="" scope="col" align="center">Código</th>
                <th width="" scope="col" align="center">Pedidas</th>
                <th width="" scope="col" align="center">Cumplidas</th>
                <th width="" scope="col" align="center">Precio</th>
                <th width="" scope="col" align="center">Total</th>
                <!--<th width="10%">Opc.</th>-->   
            </tr>
        </thead>
        
        <tbody id="tr_body">
        
			<?php
				if($detalles != 2){

                    $t_cantidad = 0;
                    $t_total    = 0;

                	foreach($detalles as $detalle){

                        $t_cantidad += $detalle["cantidad_pedida"];
                        $t_total    += $detalle["sub_pedido"];                              		
            ?> 	
                        <tr id="tr_prec_">
                            <td width="" align="center"><?= $oGlobals->fecha($detalle["fecha_creacion"]);?></td>
                            <td width="" align="center"><?= utf8_encode($detalle["documento"]);?></td>
                            <td width="" align="center"><?= utf8_encode($detalle["cliente_nombre"]);?></td>
                            <td width="" align="center"><?= utf8_encode($detalle["cliente_codigo"]);?></td>
                            <td width="" align="center"><?= utf8_encode($detalle["cantidad_pedida"]);?></td>
                            <td width="" align="center"><?= utf8_encode($detalle["cantidad_cumplida"]);?></td>
                            <td width="" align="right"><?= number_format($detalle["valor_unitario"], 0, "", ".");?></td>
                            <td width="" align="right"><?= number_format($detalle["sub_pedido"], 0, "", ".");?></td>
                            
                        </tr>        
            <?php
					   }
            ?>
                        <tr>
                            <td colspan="4"></td>
                            <td align="center"><strong><?= $t_cantidad;?></strong></td>
                            <td></td>
                            <td></td>
                            <td align="right"><strong><?= number_format($t_total, 0, "", ".");?></strong></td>
                        </tr>
            <?php           
				  }
			?>
        
        </tbody>       
                   
    </table>
   
   <div class="modal fade" id="add_talla_color" role="dialog"></div>