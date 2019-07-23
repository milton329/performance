  

  <div id="rspdasds"></div>

  <div class="table-responsive">
    <table class="table m-a-0 table-striped ">
      <thead>
        <tr class="bg-white darken">
          <th class="p-x-2">Movimiento</th>
          <th class="p-x-2" width="20%">Descripción</th>
          <th class="p-x-2">Débito</th>
          <th class="p-x-2">Crédito</th>
          <?php if($documento["cerrado"] == 0){?><th class="p-x-2">Opc</th><?php }?>
        </tr>
      </thead>
      <tbody id="tr_body_ref_rc" class="font-size-14">

        <?php 
            $movimientos = $oGlobals->verOpcionesPor("mov_r_cartera", "AND documento = '".$documento["documento"]."' AND id_empresa = ".$empresa["id"], 1);
            if($movimientos != 2){
              
              $linea          = 0;
              $t_subtotal_deb = 0;
              $t_subtotal_cre = 0;

              foreach ($movimientos as $movimiento) {

                $t_subtotal_deb += $movimiento["debito"];
                $t_subtotal_cre += $movimiento["credito"];
        ?>
                <tr id="trtcarr_<?= $movimiento["id"];?>">
                  <td class="p-a-1" align="center"><?= utf8_encode($movimiento["tipo_movimiento"]);?></td>
                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($movimiento["detalle"]);?></div></td>
                  <td class="p-a-1" align="right"><?= number_format($movimiento["debito"], 0, "", ".");?></td>
                  <td class="p-a-1" align="right"><?= number_format($movimiento["credito"], 0, "", ".");?></td>
                  <?php if($documento["cerrado"] == 0){?>
                        <td align="center" width="8%">
                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $movimiento["id"]."_".$id;?>', 'add_factura_a_rc', 'load_modulo', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>
                          <i onclick="Funciones.eliminar_registro('<?= $movimiento["id"];?>','mov_r_cartera','rspdasds', 'trtcarr_');" class="btn btn-xs fa fa-trash"></i>
                        </td>
                  <?php }?>
              </tr>
        <?php 
                $linea++;
              }
        ?>
          </tbody>
          <tbody class="font-size-14" style="border-top: 0px !important;">
            <tr>
                <td class="p-a-1" align="right"><strong>Totales:</strong></td>
                <td class="p-a-1" align="right"></td>
                <td class="p-a-1" align="right"><strong><?= number_format($t_subtotal_deb, 0, "", ".");?></strong></td>
                <td class="p-a-1" align="right"><strong><?= number_format($t_subtotal_cre, 0, "", ".");?></strong></td>
                <?php if($documento["cerrado"] == 0){?><td></td><?php }?>
            </tr>

          </tbody>
        <?php
            }
        ?>
      
    </table>
  </div>

  <script>$("#fact").text("$<?= number_format($t_subtotal_deb, 0, "", ".");?>");</script>