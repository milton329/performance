<div id="rspCar"></div>

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th scope="col" align="center" >Fecha</th>
                <th scope="col" align="center" >Documento</th>
                <th scope="col" align="center" >Identificación</th>
                <th scope="col" align="center" >Cliente</th>
                <th scope="col" align="center" width="15%" >Opc</th>                         
            </tr>
        </thead>
        
    <?php
        $total = 0;
		
		  if($documentos != 2){
       		   foreach($documentos as $documento){                        		
    ?> 	
    
                    <tr id="tr<?= $documento["id"];?>">
                        
                        <td width="" align="center" ><?= $oGlobals->fecha($documento["fecha_documento"]);?></td>
                        <td width="" align="center" ><?= $documento["documento"];?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_identificacion"]);?></td>
                        <td width="" align="center" ><?= utf8_encode($documento["cliente_nombre"]);?></td>
                        <td align="center">
                            <?php if($documento["cerrado"] == 0) $icono = "fa fa-edit"; else $icono = "fa fa-eye";?>
                            <a href="../cartera/<?= $enlace.$documento["id"];?>.html" target="_blank"><i class="btn btn-xs <?= $icono;?>" title=""></i></a>                           
                            <?php if(isset($_POST["seguridad"])){?>
                              <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $documento["id"];?>', 'estado_documento_cartera', 'load_modulo', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-unlock"></i></a>  
                              <i onclick="Funciones.eliminar_registro('<?= $documento["id"];?>', 'eliminar_documento_cartera', 'rspCar', 'tr');" class="btn btn-xs fa fa-trash"></i></a>
                            <?php }?>
                        </td>
                    </tr>        
        <?php 
                    $total++;
				}
			}
		?>
        
        		<tr>
                    <td align="center"><strong><?= $total;?></strong></td>
                	<td colspan="4"></td>
                    
                </tr>
                                   
    </table>

    
</div>

<div class="modal fade" id="load_modulo" role="dialog"></div>

