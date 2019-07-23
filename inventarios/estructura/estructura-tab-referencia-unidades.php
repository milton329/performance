
   <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Inventarios / Unidades /</span>
            <?= utf8_encode($producto["nombre"])." / REF: ".$producto["referencia"]." / COD: ".$producto["codigo"];?></h3>
          </h1>
        </div>
    </div>

   <table class="table table-striped" id="tbCarrito">                            
        <thead>
            <tr>
                <th width="" scope="col" align="center">Unidades</th>
                <th width="" scope="col" align="center">Cantidad</th>     
            </tr>
        </thead>
        
        <tbody id="tr_body">
              <tr id="tr_prec_<?= $precio["id"];?>">
                  <td width="" align="center">Unidades existencias</td>
                  <td width="" align="center"><strong><?= $unidad["entrada"] - $unidad["salida"];?></strong></td>
              </tr> 
              <tr id="tr_prec_<?= $precio["id"];?>">
                  <td width="" align="center">Unidades pedidas</td>
                  <td width="" align="center"><strong><?= $unidad["pedido"];?></strong></td>
              </tr> 
              <tr id="tr_prec_<?= $precio["id"];?>">
                  <td width="" align="center">Unidades disponibles</td>
                  <td width="" align="center"><strong><?= ($unidad["entrada"] - $unidad["salida"]) - $unidad["pedido"];?></strong></td>
              </tr>        
        </tbody>       
                   
    </table>
   
