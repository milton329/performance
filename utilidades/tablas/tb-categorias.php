<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th width="" scope="col" align="center">Nombre categoría</th>
                <th width="" scope="col" align="center">Empresa.</th>
                <th width="10%">Opc.</th>
                   
            </tr>
        </thead>
        
        <tbody id="tr_body">
        
			<?php
            	if($categorias != 2){
                	foreach($categorias as $categoria){  
                        $empresa = $oGlobals->verOpcionesPor("empresas", " AND id = ".$categoria["id_empresa"], 0);                              		
            ?> 	
                        <tr id="tr_categoria_<?= $categoria["id"];?>">
                            <td width="" align="center"><?= utf8_encode($categoria["categoria"]);?></td>
                            <td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>
                            <td width="" align="center">
                                <a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $categoria["id"];?>, 'categorias', 'load_talla', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar categoría"></i></a>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $categoria["id"];?>, 'categorias', 'resp_status', 'tr_categoria_');" title="Eliminar categoría"></i>
                            </td>
                        </tr>        
            <?php
				 	}
				}
			?>
        
        </tbody>       
                   
    </table>
    
</div>

