<div id="rspCar"></div>

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
                <th scope="col" align="center" >Fecha</th>
                <th scope="col" align="center" >Documento</th>
                <th scope="col" align="center" >Identificación</th>
                <th scope="col" align="center" >Cliente</th>
                <th scope="col" align="center" >Cantidad</th>
                <th scope="col" align="center" >Valor</th>
                <th scope="col" align="center" width="15%" >Opc</th>                         
            </tr>
        </thead>
        
    <?php
        
        $total      = 0;
        $t_cantidad = 0;
        $t_total    = 0;
        
          if($cotizaciones != 2){
               foreach($cotizaciones as $documento){

                    $doc=$documento["documento"];
                    $id_empresa = $_SESSION["id_empresa"];

                    $cotizaciones_r = "SELECT sum(salida), sum(sub_total) FROM mov_r where id_empresa='$id_empresa' AND tipo_documento='COT' AND documento='$doc'";
                    $variable = $oGlobals->verPorConsultaPor($cotizaciones_r, 0); 

                    $cantidad = $variable[0];
                    $valor    = $variable[1];      

                    $t_cantidad =  $t_cantidad+ $cantidad;
                    $t_total    =  $t_total+$valor;

    ?>  
    
                    <tr id="tr<?= $documento["id"];?>">
                        
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_documento"]);?></td>
                        <td width="" align="center" ><?= $documento["documento"];?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_identificacion"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_nombre"]);?></td>
                        <td width="" align="center" ><?= number_format($cantidad, 0, "", ".");?></td>
                        <td width="" align="right" >$ <?= number_format($valor, 0, "", ".");?></td>
                        <td align="center">
                            <?php if($documento["cerrado"] == 0) $icono = "btn btn-xs btn-primary fa fa-edit"; else $icono = "btn btn-xs fa fa-eye";?>
                            <a href="../documentos/menu_detalle-cotizacion_<?= $documento["id"];?>.html" target="_blank"><i class="<?= $icono;?>" title=""></i></a>
                              <a href="../genera-pdf-cotizacion/ver-cotizacion_<?= $documento["id"];?>.html" target="_blank"><i class="btn btn-xs fa fa-print"></i></a>
                            <i onclick="Funciones.eliminar_registro('<?= $documento["id"];?>', 'eliminar_documento', 'rspCar', 'tr');" class="btn btn-xs fa fa-trash"></i>
                        </td>
                    </tr>        
        <?php 
                    $total++;
                }
            }
        ?>
        
                <tr>
                    <td align="center"><strong><?= $total;?></strong></td>
                    <td colspan="3"></td>
                    <td align="center"><strong><?= $t_cantidad;?></strong></td>
                    <td align="right"><strong>$ <?= number_format($t_total, 0, "", ".");?></strong></td>
                    <td></td>
                </tr>
                  
    </table>

    
</div>

<div class="modal fade" id="load_modulo" role="dialog"></div>

