
<div class="modal-dialog modal-lg lg-modal-mov">
    
  <div class="modal-content" >

    <?php

    $facturas="select * from mov where id='".$id."'";
    $facturass = $oGlobals->verPorConsultaPor($facturas, 0);

    ?>
    
    <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 style="color:#FFFFFF"> Factura No : <?= $facturass['documento'];?></strong></h3>
    </div>
    
    <div class="modal-body paddin" style=" background: #f6f6f6;">

      <table class="table table-striped" id="tbCarrito">   

        <thead>
            <tr>
                <th scope="col" align="center" >Fecha</th>
                <th scope="col" align="center" >Documento</th>
                <th scope="col" align="center" >Referencia</th>
                <th scope="col" align="center" >Detalle</th>
                <th scope="col" align="center" >Cantidad</th>
                <th scope="col" align="center" >Valor</th>                                  
            </tr>
        </thead>
    
    	<?php 
			
     $facturas_r="select * from mov_r where documento='".$facturass['documento']."' and caja='".$facturass['caja']."' and cajero='".$facturass['cajero']."' and cod_almacen='".$facturass['cod_almacen']."' and tipo_documento='RPS'";
     $facturass_r = $oGlobals->verPorConsultaPor($facturas_r, 1);

        $total      = 0;
        $t_cantidad = 0;
        $t_total    = 0;
        
      foreach($facturass_r as $documento){

                $t_cantidad += $documento["can_ped"];
                $t_total    += $documento["sub_total"];
			
       ?>	

       <tr id="tr<?= $documento["id"];?>">
                        
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_registro"]);?></td>
                        <td width="" align="center" ><?= $documento["documento"];?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["codigo"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["detalle"]);?></td>
                        <td width="" align="center" ><?= number_format($documento["can_ped"], 0, "", ".");?></td>
                        <td width="" align="right" ><?= number_format($documento["sub_total"], 0, "", ".");?></td>
                    </tr>        
        <?php 
                    $total++;
                }
        ?>
        
                <tr>
                    <td align="center"><strong><?= $total;?> Registros</strong></td>
                    <td colspan="3"></td>
                    <td align="center"><strong><?= $t_cantidad;?></strong></td>
                    <td align="right"><strong><?= number_format($t_total, 0, "", ".");?></strong></td>
                </tr>
                                   
    </table>

        </div>
        
        <div id="load-nivel-3" style=" display: none"></div> 

    </div>
  
</div>        
        
        
        