<!--
  PENDIENTE: - Declarar variable del foreach linea 44
             - Revisar que la consulta este buena
             - Revisar si la consulta trae los datos correctos
  -->

   <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Inventarios /Codigo de barras /</span>
            <?= utf8_encode($producto["nombre"])." / REF: ".$producto["referencia"]." / COD: ".$producto["codigo"];?></h3>
          </h1>
        </div>
    </div>



    <a href="#add_talla_color" onclick="Funciones.cargar_modal_estructura('<?= $id;?>', 'add_referencia_cod-barra', 'add_talla_color', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
      <span class="btn-label-icon left fa fa-plus"></span> Agregar codigo de barras
    </a>
   
   <br />
   <div id="resp_status"></div>
   <br />
   
   <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
                <th width="" scope="col" align="center">Codigo</th>
                <th width="" scope="col" align="center">Tipo</th>
                <th width="" scope="col" align="center">Talla</th>
                <th width="" scope="col" align="center">Color</th>
                <th width="" scope="col" align="center">Codigo de barras</th>
                <th width="" scope="col" align="center">Creado por</th>
                <th width="" scope="col" align="center">Fecha registro</th>
                <th width="" scope="col" align="center">Fecha de Modificación</th>
                <th width="10%">Opc.</th>
                   
            </tr>
        </thead>
        
        <tbody id="tr_body_cod">
        
			<?php
				    if($barras != 2){
                	foreach($barras as $barra){                             		
            ?> 	
                        <tr id="tr_cod_<?= $barra["id"];?>">
                            <td width="" align="center"><?= utf8_encode($barra["codigo"]);?></td>
                                <td width="" align="center"><?= utf8_encode($barra["tipo"]);?></td>
                                <td width="" align="center"><?= utf8_encode($barra["talla"]);?></td>
                                <td width="" align="center"><?= utf8_encode($barra["color"]);?></td>
                                <td width="" align="center"><?= utf8_encode($barra["barra"]);?></td>
                                <td width="" align="center"><?= utf8_encode($barra["creado_por"]);?></td>
                                <td width="" align="center"><?= $oGlobals->fecha($barra["fecha_registro"]);?></td>
                                <td width="" align="center"><?= $oGlobals->fecha($barra["fecha_modificado"]);?></td>
                                <td width="" align="center">  
                                  <button href="#upd_cod_barra" onclick="Funciones.cargar_modal_estructura('<?= $barra['id'];?>', 'upd-cod-barra', 'upd_cod_barra', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
                                    Editar
                                  </button>
                                  <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $barra["id"];?>, 'referencias_barras', 'resp_status', 'tr_cod_');" title="Eliminar"></i>
                                </td>
                        </tr>        
      <?php
					   }
				  }
			?>
        
        </tbody>       
                   
    </table>
   
   <div class="modal fade" id="add_talla_color" role="dialog"></div>
   <div class="modal fade" id="upd_cod_barra" role="dialog"></div>