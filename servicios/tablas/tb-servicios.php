<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
                <th width="" scope="col" align="center">Código</th>
            	<th width="" scope="col" align="center">Nombre</th>
                <th width="" scope="col" align="center">Valor</th>                
                <th width="" scope="col" align="center">Estado</th>
                <th width="" scope="col" align="center">Empresa</th>
                <th width="10%">Opc.</th>
                   
            </tr>
        </thead>
        
        <tbody id="tr_body">
        
			<?php
            	if($servicios != 2){
                	foreach($servicios as $servicio){     
                        $empresa = $oGlobals->verOpcionesPor("empresas", " AND id = ".$servicio["id_empresa"], 0);
                        if ($servicio["servicio_activo"]==1) {$servicio_activo='Activo';} else {$servicio_activo='Inactivo';}                      		
            ?> 	
                        <tr id="tr_servicio_<?= $servicio["id"];?>">
                            <td width="" align="center"><?= utf8_encode($servicio["codigo_servicio"]);?></td>
                            <td width="" align="center"><?= utf8_encode($servicio["nombre_servicio"]);?></td>
                            <td width="" align="center">$ <?= number_format($servicio["valor_servicio"],0, "", ".");?></td>   
                            <td width="" align="center"><?= $servicio_activo;?></td>
                            <td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>
                            <td width="" align="center">
                                <a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $servicio["id"];?>, 'servicios', 'load_talla', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar bodega"></i></a>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $servicio["id"];?>, 'servicios', 'resp_status', 'tr_servicio_');" title="Eliminar bodega"></i>
                            </td>
                        </tr>        
            <?php
				 	}
				}
			?>
        
        </tbody>       
                   
    </table>
    
</div>

