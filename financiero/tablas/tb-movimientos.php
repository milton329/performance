<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
            	<th width="" scope="col" align="center">Nombre.</th>
                <th width="" scope="col" align="center">Tipo.</th>
                <th width="" scope="col" align="center">Empresa</th>
                <th width="10%">Opc.</th>
                   
            </tr>
        </thead>
        
        <tbody id="tbody_fin_tip">
        
			<?php
            	if($movimientos != 2){
                	foreach($movimientos as $movimiento){     
                        $empresa = $oGlobals->verOpcionesPor("empresas", "  AND id = ".$movimiento["id_empresa"], 0);  
                        $clase   = $oGlobals->verOpcionesPor("con_clases", "  AND id = ".$movimiento["tipo_cuenta"], 0);                       		
            ?> 	
                        <tr id="tr_tte_<?= $movimiento["id"];?>">
                            <td width="" align="center"><?= utf8_encode($movimiento["tipo_movimiento"]);?></td>
                            <td width="" align="center"><?= utf8_encode($clase["clase"]);?></td>
                            <td width="" align="center"><?= utf8_encode($empresa["nombre_empresa"]);?></td>
                            <td width="" align="center">
                                <a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $movimiento["id"];?>, 'sub_movimientos', 'load_talla', 2);"><i class="btn btn-default btn-xs fa fa-bars" title="Agregar submovimiento"></i></a>
                                <a href="#load_talla" data-toggle="modal" onClick="Funciones.cargar_modal_estructura(<?= $movimiento["id"];?>, 'movimiento', 'load_talla', 2);"><i class="btn btn-default btn-xs fa fa-edit" title="Editar movimiento"></i></a>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $movimiento["id"];?>, 'tipos_movimientos', 'resp_status', 'tr_tte_');" title="Eliminar movimiento"></i>
                            </td>
                        </tr>        
            <?php
				 	}
				}
			?>
        
        </tbody>       
                   
    </table>
    
</div>

