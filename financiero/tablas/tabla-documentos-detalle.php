	
    <div id="rspCadell"></div>
    
    <div id="load_ped">
    
        <table class="table table-bordered" id="tbCarrito"> 
            
            <thead> 
                <tr>
                    <th scope="col" align="center" width="3%">Tipo</th>
                    <th scope="col" align="center" width="10%">Documento.</th>
                    <th scope="col" align="center" width="40%">Nombre</th>
                    <th scope="col" align="center" width="10%">Código</th>
                    <th scope="col" align="center" width="10%">Fecha</th>
                    <th scope="col" align="center" width="8%">Opc</th>
    
    
                </tr>
            </thead>
            <tbody>
                <?php 
                         $cant    = 0;
                         $t_saldo = 0;
						 $t_saldo_por_v = 0;
						 $t_saldo_ven   = 0;
                         
                         foreach($cartera as $cartera){
                             
                             $cant++;
                ?> 
    
                            <tr>
                                <td align="center"><?php echo $cartera["tipo_documento"];?></td>
                                <td align="center"><a href="" class="btn_view_rem" id="<?php echo $cartera["documento"];?>"><?php echo $cartera["documento"];?></a></td>
                                <td align="center"><?php echo utf8_encode($cartera["cliente_nombre"]);?></td>
                                <td align="center"><?php echo utf8_encode($cartera["cliente"]);?></td>
                                <td align="center"><?php echo $oGlobals->fecha($cartera["fecha_documento"]);?></td>
                                <td align="center">
                                	<div>  
										<?php if($cartera["cerrado"] == 0) $icono = "fa fa-edit"; else $icono = "fa fa-eye";?>
                                        <a href="detalle-documento-de-cartera_<?php echo $cartera["id"];?>.html" target="_blank"><i class="<?php echo $icono;?>" title="Modificar recibo "></i></a>
                                    </div>
                                </td>
                            </tr>        
                <?php 
                        }		
                ?>  
                            <tr>
                                <td align="center"></td>
                                <td align="center"><strong><?php echo $cant;?></strong></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>         
            </tbody>
        </table>
    
    </div>