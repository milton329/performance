
<div class="modal-dialog modal-lg lg-modal-mov">
    
  <div class="modal-content" >
    
    <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 style="color:#FFFFFF"> Facturas del Cuadre No : <?= $id;?></strong></h3>
    </div>
    
    <div class="modal-body paddin" style=" background: #f6f6f6;">

      <table class="table table-striped" id="tbCarrito">   

        <thead>
            <tr>
                <th scope="col" align="center" >Fecha</th>
                <th scope="col" align="center" >Documento</th>
                <th scope="col" align="center" >Identificación</th>
                <th scope="col" align="center" >Cliente</th>
                <th scope="col" align="center" >Cantidad</th>
                <th scope="col" align="center" >Valor</th>                                  
            </tr>
        </thead>
    
    	<?php 


     //datos del cuadre
     $cuadre="select * from pos_cuadre where id='".$id."'";
     $cuadres = $oGlobals->verPorConsultaPor($cuadre, 0);

			
     $facturas="select * from mov where cuadre='".$cuadres["numero"]."' and cajero='".$cuadres["cajero"]."' and caja='".$cuadres["caja"]."' and cod_almacen='".$cuadres["almacen"]."'";
     $facturass = $oGlobals->verPorConsultaPor($facturas, 1);

        $total      = 0;
        $t_cantidad = 0;
        $t_total    = 0;
        
      foreach($facturass as $documento){

                $t_cantidad += $documento["cantidad"];
                $t_total    += $documento["valor"];
			
       ?>	

       <tr id="tr<?= $documento["id"];?>">
                        
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_documento"]);?></td>
                        <td width="" align="center" ><?= $documento["documento"];?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_identificacion"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_nombre"]);?></td>
                        <td width="" align="center" ><?= number_format($documento["cantidad"], 0, "", ".");?></td>
                        <td width="" align="right" ><?= number_format($documento["valor"], 0, "", ".");?></td>
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
        
        
        