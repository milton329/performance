<div id="rspCar"></div>
	
<div id="resp_status"></div>
    
<div id='load_ped' class="tabletable fadeOut">

    <table class="table table-striped" id="dash">
          <thead>
            <tr>
              <th>Posición</th>
              <th>Competidor</th>
              <th>Ganadas</th>
              <th>Valor</th>
              <th>Opc</th>
            </tr>
          </thead>
          <tbody class="valign-middle">
            <?php 
            
                if($competidores != 2){
                    $estado = "";
					
					$total = 0;
					$i = 1;
					$t_cant  = 0;
                    
                    foreach($competidores as $competidor){
						
						$total += $competidor["total_adjudicado"];
						$sql  = "SELECT COUNT(*) AS cantidad_gan FROM documentos WHERE tipo_documento = 'COT' AND adjudicada = 1 AND adjudicada_a = '".$competidor["id"]."' ";
						$cant = $oGlobals->verPorConsultaPor($sql, 0);
						
						$t_cant += $cant["cantidad_gan"];
						
            ?>
                        <tr id="rtr_<?= $cotizacion["id"];?>">
                        	<td align="center"><?= $i?></td>
                          <td align="center"><?= utf8_encode($competidor["competidor"])?></td>
                          <td align="center"><?= number_format($cant["cantidad_gan"], 0, "", ".")?></td>
                          <td align="right"><?= number_format($competidor["total_adjudicado"], 0, "", ".")?></td>
                          <td align="center">
                            <a href="#load_cot" class="btn btn-xs" onClick="Funciones.cargar_modal_estructura(<?= $competidor["id"]?>, 'estadistica-competidor', 'load_cot', 2);" data-toggle='modal'><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
            <?php 
						$i++;
                    }
                }
            ?>
            			<tr>
                        	<td></td>
                            <td></td>
							<td align="center"><strong><?= number_format($t_cant, 0, "", ".");?></strong></td>
                            <td align="right"><strong><?= number_format($total, 0, "", ".");?></strong></td>
                            <td></td>
                        </tr>
          </tbody>
        </table>
    
</div>

