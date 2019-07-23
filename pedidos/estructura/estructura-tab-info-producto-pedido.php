  
  <form class="form_sdv" method="post" action="../process/pedido/consultar-pedido-producto.php" id="frm-producto-pedido">

      <div class="col-md-4">
          <input placeholder="Ingrese la referencia" id="txt_producto" name="txt_producto" type="text" class="form-control form-group-margin">
      </div>

      <div class="col-md-2">

        <select class="form-control form-group-margin" id="bodega" name="bodega">
            <?php 
                $bodegas = $oGlobals->verOpcionesPor("bodegas", "", 1);
                foreach ($bodegas as $bodega) {
            ?>
                    <option value="<?= $bodega["codigo_bodega"];?>">Bodega <?= $bodega["nombre_bodega"];?></option>
            <?php
                }
            ?>
        </select>
      </div>

      <div class="col-md-1">
          <button type="submit" style="border: none; background: none;  font-size: 20px;"><i class="fa fa-search" aria-hidden="true"></i></button> 
      </div>

  </form>
  <br style="clear: both;">
  <div id="rsp-frm-producto-pedido"></div>
