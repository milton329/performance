<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="dash">
          <thead>
            <tr>
              <th>Producto</th>
              <th>NO. CCE</th>
              <th>Cantidad</th>
              <th>Vr. adjudicado</th>
              <th>T. adjudicado</th>
              <th>Opc</th>
            </tr>
          </thead>
          <tbody class="valign-middle">
            <?php 
            
                if($productos != 2){

					$total = 0;
					$cant  = 0;
                    
                    foreach($productos as $producto){
						$total += $producto["sub_total_adjudicado"];
						$cant  += $producto["cantidad"];
            ?>
                        <tr id="rtr_<?= $cotizacion["id"];?>">
                          <td align="center"><?= utf8_encode($producto["producto_nombre"])?></td>
                          <td align="center"><?= utf8_encode($producto["no_cce"])?></td>
                          <td align="center"><?= ($producto["cantidad"])?></td>
                          <td align="right"><?= number_format($producto["precio_adjudicado"], 0, "", ".")?></td>
                          <td align="right"><?= number_format($producto["sub_total_adjudicado"], 0, "", ".")?></td>
                          <td align="center">
                            <a href="#load_cot" class="btn btn-xs" onClick="Funciones.cargar_modal_estructura(<?= $cotizacion["id"]?>, 'accion-cotizacion', 'load_cot', 2);" data-toggle='modal'><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
            <?php 
                    }
                }
            ?>
            			<tr>
                        	<td></td>
                            <td></td>
                            <td align="center"><strong><?= number_format($cant, 0, "", ".");?></strong></td>
                            <td></td>
                            <td align="right"><strong><?= number_format($total, 0, "", ".");?></strong></td>
                            
                        </tr>
          </tbody>
        </table>
    
</div>

