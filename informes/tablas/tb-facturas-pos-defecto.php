<div class="panel-body">
                <div class="table-primary">

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
                <th scope="col" align="center" >Fecha</th>
                <th scope="col" align="center" >Almacen</th>
                <th scope="col" align="center" >Caja</th>
                <th scope="col" align="center" >Cajero</th>
                <th scope="col" align="center" >Documento</th>
                <th scope="col" align="center" >Cliente</th>
                <th scope="col" align="center" >Unidades</th>
                <th scope="col" align="center" >Valor</th>
             

                
                <th scope="col" align="center" width="15%" >Opc</th>                         
            </tr>
        </thead>
        
    <?php
        
$ventas="select * from mov where tipo_documento='RPS' and cerrado='1' order by id DESC LIMIT 40 ";
$variable2 = $oGlobals->verPorConsultaPor($ventas, 1);

        $total      = 0;
        $t_cantidad = 0;
        $t_total    = 0;
        
               foreach($variable2 as $documento){

                    $t_cantidad += $documento["cantidad"];
                    $t_total    += $documento["valor"];                             
    ?>  
    
                    <tr id="tr<?= $documento["id"];?>">
                        
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_documento"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cod_almacen"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["caja"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cajero"]);?></td>
                        <td width="" align="right" ><center><?= utf8_encode($documento["documento"]);?></center></td>
                        <td width="" align="right" ><center><?= utf8_encode($documento["cliente_nombre"]);?></center></td>
                        
                        <td width="" align="right" ><center><?= number_format($documento["cantidad"], 0, "", ".");?></center></td>
                        <td width="" align="right" >$ <?= number_format($documento["valor"], 0, "", ".");?></td>
                        
                            <td align="center">
                              <a href="#load_informe" onClick="Funciones.cargar_modal_estructura('<?= $documento["id"];?>', 'ver_facturas_pos', 'load_informe', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-eye"></i></a>  
                              
                              <a href="../pos/ver-factura_<?=$id;?>.html"><i class="btn btn-xs fa fa-print"></i></a>
                           </td>
                    </tr>        
        <?php 
                    $total++;
                }

        ?>
        
                <tr>
                    <td align="center"><strong><?= $total;?> Registros</strong></td>
                    <td colspan="5"></td>

                    <td align="center"><strong><?= $t_cantidad;?></strong></td>
                    <td align="right"><strong>$ <?= number_format($t_total, 0, "", ".");?></strong></td>
                    <td></td>
                    
                </tr>
                                   
    </table>    
</div>
</div>
</div>

 