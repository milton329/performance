<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th width="" scope="col" align="center">Nombre marca</th>
                <th width="" scope="col" align="center">Empresa</th>
                <th width="10%">Opc.</th>
            </tr>
        </thead>
        
        <tbody id="tr_body">
        
			<?php
            	if($marcas != 2){
                	foreach($marcas as $marca){ 

                        $empresa = $oGlobals->verOpcionesPor("empresas", " AND id = ".$marca["id_empresa"], 0);                             		
            ?> 	
                        <tr id="tr_categoria_<?= $marca["id"];?>">
                            <td width="" align="center"><?= utf8_encode($marca["marca"]);?></td>
                            <td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>
                            <td width="" align="center">
                                <a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $marca["id"];?>, 'marcas', 'load_talla', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar marcas"></i></a>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $marca["id"];?>, 'marcas', 'resp_status', 'tr_categoria_');" title="Eliminar marcas"></i>
                            </td>
                        </tr>        
            <?php
				 	}
				}
			?>
        
        </tbody>       
                   
    </table>
    
</div>

