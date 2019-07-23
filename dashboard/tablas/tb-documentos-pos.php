<div class="panel-body">
                <div class="table-primary">

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
        
$ventas="select m.fecha_registro as 'fecha_registro',m.documento,m.cliente_identificacion,m.cliente_nombre, sum(r.sub_pedido) as 'total',   sum(r.cantidad_pedida) as 't_cantidad' 
     FROM mov_pedido m LEFT JOIN mov_r_pedidos r ON m.documento = r.documento where m.tipo='PPS' and m.periodo='".date("m")."' 
     group by m.documento order by m.fecha_registro DESC";
        $variable2 = $oGlobals->verPorConsultaPor($ventas, 1);

        $total      = 0;
        $t_cantidad = 0;
        $t_total    = 0;
        
               foreach($variable2 as $documento){

                    $t_cantidad += $documento["t_cantidad"];
                    $t_total    += $documento["total"];                             
    ?>  
    
                    <tr id="tr<?= $documento["id"];?>">
                        
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_registro"]);?></td>
                        <td width="" align="center" ><?= $documento["documento"];?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_identificacion"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_nombre"]);?></td>
                        <td width="" align="center" ><?= number_format($documento["t_cantidad"], 0, "", ".");?></td>
                        <td width="" align="right" ><?= number_format($documento["total"], 0, "", ".");?></td>
                        <td align="center">
                            
                              <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $documento["id"];?>', 'estado_documento', 'load_modulo', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-unlock"></i></a>  
                              <i onclick="Funciones.eliminar_registro('<?= $documento["id"];?>', 'eliminar_documento', 'rspCar', 'tr');" class="btn btn-xs fa fa-trash"></i></a>
                           </td>
                    </tr>        
        <?php 
                    $total++;
                }

        ?>
        
                <tr>
                    <td align="center"><strong><?= $total;?></strong></td>
                    <td colspan="3"></td>
                    <td align="center"><strong><?= $t_cantidad;?></strong></td>
                    <td align="right"><strong><?= number_format($t_total, 0, "", ".");?></strong></td>
                </tr>
                                   
    </table>    
</div>
</div>
</div>

 