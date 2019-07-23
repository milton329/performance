  

  <div id="rspdasds"></div>

  <div class="table-responsive">
    <table class="table m-a-0 table-striped ">
      <thead>
        <tr class="bg-white darken">
          <th class="p-x-2">Código</th>
          <th class="p-x-2" width="35%">Productos o Servicios</th>
          <th class="p-x-2">Referencia</th>
          <th class="p-x-2">Cantidad.</th>
          <th class="p-x-2">Costo U.</th>
          <th class="p-x-2">Costo T.</th>
          <?php if($documento["cerrado"] == 0){?><th class="p-x-2">Opc</th><?php }?>
        </tr>
      </thead>
      <tbody id="tr_body_ref_com" class="font-size-14">

        <?php 
            $productos = $oGlobals->verOpcionesPor("mov_r", "AND documento = '".$documento["documento"]."' AND id_entrada = $id", 1);
            if($productos != 2){
              
              $linea      = 0;
              $t_subtotal = 0;
              $t_subcosto = 0;
              $t_cantidad = 0;

              foreach ($productos as $producto) {

                $t_subtotal += $producto["sub_total"];
                $t_cantidad += $producto["salida"];
        ?>
                <tr id="tradfasasdf_<?= $producto["id"];?>">
                  <td class="p-a-1" align="center"><?= utf8_encode($producto["codigo"]);?></td>
                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($producto["detalle"]);?></div></td>
                  <td class="p-a-1" align="right"><?= utf8_encode($producto["referencia"]);?></td>
                  <td class="p-a-1" align="right"><?= number_format($producto["salida"], 0, "", ".");?></td>
                  <td class="p-a-1" align="right"><?= number_format($producto["valor_unitario"], 0, "", ".");?></td>
                  <td class="p-a-1" align="right"><?= number_format($producto["sub_total"], 0, "", ".");?></td>
                  <?php if($documento["cerrado"] == 0){
                        if($producto["referencia"] == 'SERVICIO'){                    
                    ?>
                       <td align="center">
                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $producto["id"]."_".$id;?>', 'add_servicio_a_cotizacion', 'load_modulo', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>
                          <i onclick="Funciones.eliminar_registro('<?= $producto["id"];?>','mov_r','rspdasds', 'tradfasasdf_');" class="btn btn-xs fa fa-trash"></i>
                        </td>
                  <?php }
                       if($producto["referencia"] != 'SERVICIO'){ 
                  ?>
                       <td align="center">
                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $producto["id"]."_".$id;?>', 'add_producto_a_cotizacion', 'load_modulo', 2);" data-toggle="modal"><i class="btn btn-xs fa fa-edit"></i></a>
                          <i onclick="Funciones.eliminar_registro('<?= $producto["id"];?>','mov_r','rspdasds', 'tradfasasdf_');" class="btn btn-xs fa fa-trash"></i>
                        </td>
                  <?php }} 
                  ?>
              </tr>
        <?php 
                $linea++;
              }

              $iva_sub = $t_subtotal * 0.19;
              $iva_cos = $t_subcosto * 0.19;
        ?>
          </tbody>
          <tbody class="font-size-14" style="border-top: 0px !important;">
            <tr style="border-top: none;">

                <td class="p-a-1" colspan="3" align="right"><strong>Total Cantidad:</strong></td>
                <td class="p-a-1" align="right"><strong><?= number_format($t_cantidad, 0, "", ".");?></strong></td>
                <td class="p-a-1" align="right"><strong>Subtotal:</strong></td>
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