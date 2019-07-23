  
    
      <div id="rspdasf"></div>

  <?php 
      $productos = $oGlobals->verOpcionesPor("referencias", "".$con_emp." LIMIT 6", 1);

      if($productos != 2){
          foreach ($productos as $producto) {

              $codigo = $producto["codigo"];
              $foto   = $oGlobals->verOpcionesPor("referencias_imagenes", " AND codigo = '$codigo'", 0);

              $imagen = "foto.jpg";

              if($foto != 2) $imagen = $foto["imagen"];
  ?>
                  <div class="col-sm-2 col-xs-6 mb30">
                    <div class="bS1 posR taC production cP">
                      <div class="posA w100 h100p capaHover">
                        <div class="tabAll">
                          <div class="tabIn">
                            <div class="tab">
                              <div class="tabIn taC">
                                <div class="mb10">
                                  <input id="c_<?= $producto["codigo"];?>" type="number" min="1" max="30" value="1" class="p10 taC">
                                </div>
                                <div class="p510 dIB bVerde colorfff tU" onclick="Funciones.add_car_pos('<?= $producto["codigo"];?>', 'c_<?= $producto["codigo"];?>', 'rspdasf');">
                                  <i class="fa fa-cart-plus" aria-hidden="true"></i> &nbsp;
                                  Agregar
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <img src="../static-pictures/products/200x200/<?= $imagen;?>" alt="">
                      <label class="control-label"><?= utf8_encode($producto["nombre"]);?> / <?= $producto["referencia"];?></label>
                    </div>
                  </div>
  <?php 
          }
      } 
  ?>