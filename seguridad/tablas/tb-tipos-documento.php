
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th width="" scope="col" align="center">Tipo de documento</th>
                <th width="" scope="col" align="center">Prefijo</th>
                <th width="" scope="col" align="center">Consecutivo</th>
                <th width="10%">Opc.</th>
                   
            </tr>
        </thead>
        
        <tbody id="tr_body">
        
			<?php
            	if($tipos != 2){
                	foreach($tipos as $tipo){                             		
            ?> 	
                        <tr id="tr_tipo_<?= $tipo["id"];?>">
                            <td width="" align="center"><?= utf8_encode($tipo["tipo_documento"]);?></td>
                            <td width="" align="center"><?= utf8_encode($tipo["codigo"]);?></td>
                            <td width="" align="center"><?= utf8_encode($tipo["consecutivo"]);?></td>
                            <td width="" align="center">
                                <a href="#load_color" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $tipo["id"];?>, 'tipos_documento', 'load_color', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar talla"></i></a>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $tipo["id"];?>, 'tipos_documento', 'resp_status', 'tr_tipo_');" title="Eliminar talla"></i>
                            </td>
                        </tr>        
            <?php
				 	}
				}
			?>
        
        </tbody>       
                   
    </table>
    
</div>

