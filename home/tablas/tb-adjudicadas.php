<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="dash">
          <thead>
            <tr>
              <th>Entidad</th>
              <th>No. CCE</th>
              <th>Fecha cierre</th>
              <th>Valor</th>
              <th>Opc</th>
            </tr>
          </thead>
          <tbody class="valign-middle">
            <?php 
            
                if($cotizaciones != 2){
                    $estado = "";
					
					$total = 0;
                    
                    foreach($cotizaciones as $cotizacion){
						$total += $cotizacion["valor_total"];
            ?>
                        <tr id="rtr_<?= $cotizacion["id"];?>">
                          <td align="center"><?= utf8_encode($cotizacion["cliente_nombre"])?></td>
                          <td align="center"><?= utf8_encode($cotizacion["no_cce"])?></td>
                          <td align="center"><?= $oGlobals->fechaSinHora($cotizacion["fecha_entrega"])?></td>
                          <td align="right"><?= number_format($cotizacion["valor_total"], 0, "", ".")?></td>
                          <td align="center">
                            <a href="#load_cotttt" class="btn btn-xs" onClick="Funciones.cargar_modal_estructura(<?= $cotizacion["id"]?>, 'accion-cotizacion-info', 'load_cotttt', 2);" data-toggle='modal'><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
            <?php 
                    }
                }
            ?>
            			<tr>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td align="right"><strong><?= number_format($total, 0, "", ".");?></strong></td>
                            <td></td>
                        </tr>
          </tbody>
        </table>
    
</div>





