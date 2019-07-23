
   <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Inventarios / Precios /</span>
            <?= utf8_encode($producto["nombre"])." / REF: ".$producto["referencia"]." / COD: ".$producto["codigo"];?></h3>
          </h1>
        </div>
    </div>



    <a href="#add_talla_color" onclick="Funciones.cargar_modal_estructura('<?= $id;?>', 'add_referencia_precio', 'add_talla_color', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
      <span class="btn-label-icon left fa fa-plus"></span> Agregar precio
    </a>
   
   <br />
   <div id="resp_status"></div>
   <br />
   
   <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
                <th width="" scope="col" align="center">Nombre lista.</th>
                <th width="" scope="col" align="center">Lista</th>
                <th width="" scope="col" align="center">Precio</th>
                <th width="" scope="col" align="center">Fecha registro</th>
                <th width="" scope="col" align="center">Fijo</th>
                <th width="10%">Opc.</th>
                   
            </tr>
        </thead>
        
        <tbody id="tr_body_prec">
        
			<?php
				      if($precios != 2){
                	foreach($precios as $precio){                             		
            ?> 	
                        <tr id="tr_prec_<?= $precio["id"];?>">
                            <td width="" align="center"><?= utf8_encode($precio["nombre_lista"]);?></td>
                            <td width="" align="center"><?= utf8_encode($precio["lista"]);?></td>
                            <td width="" align="center"><?= number_format($precio["precio"], 0, "", ".");?></td>
                            <td width="" align="center"><?= $oGlobals->fecha($precio["fecha_registro"]);?></td>
                            <td width="" align="center"><?= ($precio["lista"]);?></td>
                            <td width="" align="center">
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $precio["id"];?>, 'precios', 'resp_status', 'tr_prec_');" title="Eliminar talla color"></i>
                            </td>
                        </tr>        
      <?php
					   }
				  }
			?>
        
        </tbody>       
                   
    </table>
   
   <div class="modal fade" id="add_talla_color" role="dialog"></div>