  

  <div id="rspdasds"></div>

  <div class="table-responsive">
    <table class="table m-a-0 table-striped ">
      <thead>
        <tr class="bg-white darken">
          <th class="p-x-2">Código</th>
          <th class="p-x-2" width="35%">Producto</th>
          <th class="p-x-2">Cant</th>
          <th class="p-x-2">Valor</th>
          <th class="p-x-2">Total</th>
          <?php if($documento["cerrado"] == 0){?><th class="p-x-2">Opc</th><?php }?>
        </tr>
      </thead>
      <tbody id="tr_body_ref_fac" class="font-size-14">

        <?php 
            $productos = $oGlobals->verOpcionesPor("mov_r", "AND documento = '".$documento["documento"]."' AND tipo_documento = 'TRS'", 1);
            if($productos != 2){
              
              $linea      = 0;
              $t_subtotal = 0;
              $t_subcosto = 0;

              foreach ($productos as $producto) {

                $t_subtotal += $producto["sub_total"];
        ?>
                <tr id="trttrr_<?= $producto["id"];?>">
                  <td class="p-a-1" align="center"><?= utf8_encode($producto["codigo"]);?></td>
                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($producto["detalle"]);?></div></td>
                  <td class="p-a-1" align="right"><?= utf8_encode($producto["salida"]);?></td>
                  <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>
                  <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>
                  <?php if($documento["cerrado"] == 0){?>
                        <td align="center" width="8%">
                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $producto["id"]."_".$id;?>', 'add_producto_a_traslado', 'load_modulo', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>
                          <i onclick="Funciones.eliminar_registro('<?= $producto["id"];?>','eliminar_registro_traslado','rspdasds', 'trttrr_');" class="btn btn-xs fa fa-trash"></i>
                        </td>
                  <?php }?>
              </tr>
        <?php 
                $linea++;
              }

              $iva_sub = $t_subtotal * 0.19;
        ?>
          </tbody>
          <tbody class="font-size-14" style="border-top: 0px !important;">
            <?php /*<tr style="border-top: none;">
                <td class="p-a-1" colspan="4" align="right"><strong>Subtotal:</strong></td>
                <td class="p-a-1" align="right"><strong><?= number_format($t_subtotal, 0, "", ".");?></strong></td>
                <?php if($documento["cerrado"] == 0){?><td></td><?php }?>
            </tr>

            <tr>
                <td class="p-a-1" colspan="4" align="right"><strong>IVA:</strong></td>
                <td class="p-a-1" align="right"><strong><?= number_format($iva_sub, 0, "", ".");?></strong></td>
                <?php if($documento["cerrado"] == 0){?><td></td><?php }?>
            </tr> 

            <tr>
                <td class="p-a-1" colspan="4" align="right"><strong>Totales:</strong></td>
                <td class="p-a-1" align="right"><strong><?= number_format($t_subtotal + $iva_sub, 0, "", ".");?></strong></td>
                <?php if($documento["cerrado"] == 0){?><td></td><?php }?>
            </tr>*/?>

            <tr>
                <td class="p-a-1" colspan="4" align="right"><strong>Totales:</strong></td>
                <td class="p-a-1" align="right"><strong><?= number_format($t_subtotal, 0, "", ".");?></strong></td>
                <?php if($documento["cerrado"] == 0){?><td></td><?php }?>
            </tr>

          </tbody>
        <?php
            }
        ?>
      
    </table>
  </div>

  <script>$("#fact").text("$<?= number_format($t_subtotal, 0, "", ".");?>");</script>