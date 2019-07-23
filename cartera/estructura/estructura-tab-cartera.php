  
  

  <a href="../genera-pdf/consultar-cartera.html" target="_blank" class="pull-right btn btn-primary" title="Finalizar factura">
    <i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir
  </a>

  <br style="clear: both;">
  <br style="clear: both;">

  <div id="rspdasds"></div>

  <div class="table-responsive">
    <table class="table m-a-0 table-striped ">
      <thead>
        <tr class="bg-white darken">
          <th class="p-x-2">Nombre</th>
          <th class="p-x-2">Tipo</th>
          <th class="p-x-2">Documento</th>
          <th class="p-x-2">Valor</th>
          <th class="p-x-2">Fecha</th>
          <th class="p-x-2">Vence</th>
          <th class="p-x-2">Vr. Vencido</th>
          <th class="p-x-2">Por vencer</th>
          <!--<th class="p-x-2">Dcto</th>-->
          <th class="p-x-2">Saldo</th>
        </tr>
      </thead>
      <tbody id="tr_body_ref_rc" class="font-size-14">

        <?php 

              $linea          = 0;
              $t_saldo        = 0;
              $t_saldo_por_v  = 0;
              $t_saldo_ven    = 0;

              foreach ($registros as $movimiento) {

                $t_saldo += $movimiento["saldo"];
               
                 if(strtotime($movimiento["fecha_vence"]) < strtotime( date('Y-m-d'))) $t_saldo_por_v += $movimiento["saldo"];
                 if(strtotime(date('Y-m-d')) <= strtotime($movimiento["fecha_vence"])) $t_saldo_ven   += $movimiento["saldo"];
                 
        ?>
                <tr id="trtcarr_<?= $movimiento["id"];?>">
                  <td class="p-a-1" align="center"><?= utf8_encode($movimiento["cliente_nombre"]);?></td>
                  <td class="p-a-1" align="center"><?= utf8_encode($movimiento["tipo_documento"]);?></td>
                  <td class="p-a-1" align="center"><a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $movimiento["documento"];?>', 'ver_factura', 'load_modulo', 2);" data-toggle="modal"><div class="font-weight-semibold"><?= utf8_encode($movimiento["documento"]);?></div></a></td>
                  <td class="p-a-1" align="right"><div class="font-weight-semibold"><?= number_format($movimiento["valor"], 0, "", ".");?></div></td>
                  <td class="p-a-1" align="right"><?= $oGlobals->fecha($movimiento["fecha_documento"]);?></td>
                  <td class="p-a-1" align="right"><?php if($movimiento["fecha_vence"] != "") echo $oGlobals->fecha($movimiento["fecha_vence"]);?></td>
                  <td class="p-a-1" align="right"><div class="font-weight-semibold"><?php if(strtotime($movimiento["fecha_vence"]) < strtotime( date('Y-m-d'))) echo number_format($movimiento["saldo"], 0, "", ".");?></div></td>
                  <td class="p-a-1" align="right"><div class="font-weight-semibold"><?php if(strtotime(date('Y-m-d')) <= strtotime($movimiento["fecha_vence"])) echo number_format($movimiento["saldo"], 0, "", ".");?></div></td>
                  <!--<td class="p-a-1" align="right"><?= number_format($movimiento["dcto"], 0, "", ".");?></td>-->
                  <td class="p-a-1" align="right"><div class="font-weight-semibold"><?= number_format($movimiento["saldo"], 0, "", ".");?></div></td>
              </tr>
        <?php 
                $linea++;
              }
        ?>
              <tr>
                  <td class="p-a-1" align="center"><strong><?= $linea;?></strong></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="p-a-1" align="right"><strong><?= number_format($t_saldo_por_v, 0, "", ".");?></strong></td>
                  <td class="p-a-1" align="right"><strong><?= number_format($t_saldo_ven, 0, "", ".");?></strong></td>
                  <!--<td></td>-->
                  <td class="p-a-1" align="right"><strong><?= number_format($t_saldo, 0, "", ".");?></strong></td>
              </tr>
    </table>
  </div>

  <div class="modal fade" id="load_modulo" role="dialog" ></div> <!-- data-backdrop="static" data-keyboard="false"-->