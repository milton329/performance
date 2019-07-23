<div id="rspCar"></div>

<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th scope="col" align="center" >Fecha</th>
                <th scope="col" align="center" >Documento</th>
                <th scope="col" align="center" >Entidad</th>
                <th scope="col" align="center" >Uds</th>
                <th scope="col" align="center" >Cerr.</th>
                <th scope="col" align="center" >Opc.</th>
                     
            </tr>
        </thead>
        
        <?php
        	
			$validado = '<i class="fa fa-check-square" title="Terminado"></i>';
			$no_vali  = '<i class="fa fa-circle-o" aria-hidden="true" title="Pendiente"></i>';
			
			foreach($documentos as $mov){                             		
		?> 	
    
                <tr valign="middle" id="rtr_<?php echo $mov["id"];?>">
                    
                    <td width=""><?= $oGlobals->fecha($mov["fecha_documento"]);?></td>
                    <td width=""><?= $mov["documento"];?></td>
                    <td width=""><?= utf8_encode($mov["cliente_nombre"]);?></td>
                    <td width="" align="right"><?= number_format($mov["cantidad_productos"], 0, "", ".");?></td>
                    <td align="center"><?php if($mov["cerrado"]   == 1) echo $validado; else echo $no_vali;?></td>
                    <td align="center">
                        <a onClick="Funciones.cargar_modal_estructura(<?= $mov["id"];?>, 'security_doc', 'security_fac', 2);" href="#security_fac" data-toggle='modal' id="<?php echo $mov["id"];?>" class="btn btn-default btn-xs btn-labeled fa fa-edit" title="Modificar factura"></a>
                        <a href="#" class="btn btn-xs" onClick="Funciones.eliminar_registro(<?= $mov["id"]?>, 'documentos', 'rspCar');"><i class="fa fa-trash"></i></a>
                 	</td>
                    
                </tr>        
        <?php }?>
                
                   
    </table>
    
    <div class="modal fade" id="security_fac" role="dialog"></div>
    
</div>

