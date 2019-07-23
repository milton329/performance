<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th width="" scope="col" align="center">Codigo</th>
                <th width="" scope="col" align="center">Descripcion</th>
                <th width="10%">Opc.</th>
                   
            </tr>
        </thead>
        
        <tbody id="tr_body">
        
			<?php
            	if($bodegas != 2){
                	foreach($bodegas as $bodega){     
                        $empresa = $oGlobals->verOpcionesPor("ciuu", "", 0);                        		
            ?> 	
                        <tr id="tr_bodega_<?= $bodega["id"];?>">
                            <td width="" align="center"><?= utf8_encode($bodega["CODIGO"]);?></td>
                            <td width="" align="center"><?= utf8_encode($bodega["DESCRIPCION"]);?></td>
                            <td width="" align="center">
                                <a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $bodega["id"];?>, 'bodegas', 'load_talla', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar bodega"></i></a>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $bodega["id"];?>, 'bodegas', 'resp_status', 'tr_bodega_');" title="Eliminar bodega"></i>
                            </td>
                        </tr>        
            <?php
				 	}
				}
			?>
        
        </tbody>       
                   
    </table>
    
</div>

