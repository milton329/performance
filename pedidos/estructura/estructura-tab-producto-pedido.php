	
    <br style="clear: both;">

    <div class="widget-pricing-inner "> 
	
		<?php 
			//if($entrada["entrada"] == 0) { echo "<div class='error'>NO hay unidades de esta referencia en la bodega</div>"; return;}
			
			foreach($productos as $producto){
		?>

                <!--<div class="col-md-5">
                	<p class="text-center"><strong><?= $producto["codigo"]." - ".$producto["referencia"]." - ".$producto["nombre"];?></strong></p>
                	<div class="row"> 
                    	<div class="producto-pedido an5x"><center><img src="../stactic-images/products/200x200/<?= $imagen;?>"/></center></div>
                        <div class="producto-pedido an5x">
                            
                            <p class="text-center"><strong>Precio: <?= number_format($precio["precio"], 0, "", ".");//;?></strong></p>
                            <p class="text-center"><strong>Disponible: <?= $disponible;?></strong></p>
                            <p class="text-center"><strong>Bulto: <?= $producto["cantidad_por_bulto"];?> - Display: <?= $producto["display"];?></strong></p>
                            
                            <div class="col-md-5 col-md-offset-3">
                                
                                <input type="text" id = "<?= $producto["cantidad_por_bulto"];?>" name = "text_bulto" class="txt_bulto form-control form-group-margin" placeholder="Bulto"/>
                                <input type="text" id = "text_cantidad" name = "text_cantidad" class="form-control form-group-margin" placeholder="Cantidad"/>
                                <input type="text" id = "text_sugerido" name = "text_sugerido" class="form-control form-group-margin" placeholder="Sugerido"/>
                            </div>
  							<br style="clear:both" />
                            
                            <div class="rspPed"></div>
                            
                            <p class="text-center"><img src="../resources/icons/shopping-cart_sticker.png" class="btnAdd imgBott" title="Agregar al carrito" id="<?php echo $producto["codigo"]; ?>" /></p>
                            
                        </div>
                    </div>
                </div>-->

                <div class="col-md-4">
                  <div class="widget-pricing-item widget-pricing-active" style="border: #DDDDDD 1px solid;">
                    <div class="label label-ribbon right label-primary" style="margin-top: 230px; height: 30px; width: 100px; padding-top: 3px;"><strong class="font-size-18">$<?= number_format($precio["precio"], 0, "", ".");?></strong></div>
                    <div class="widget-pricing-plan" style="margin-top: -30px; margin-bottom: -20px;"><?= $producto["codigo"]." - ".$producto["referencia"]." <br /> ".$producto["nombre"];?></div>
                    <div class="widget-pricing-section p-y-2 bg-white darker">
                      <img src="../static-pictures/products/200x200/<?= $imagen;?>" class="img-circle" width="200" height="200" />
                    </div>
                    <div class="widget-pricing-section">
                      Disponible <strong><?= $disponible;?></strong><br>
                      <!--Cant. Bulto <strong>100</strong><br>-->
                      <div class="col-md-12">
                        <input type="number" name="" class="form-control" placeholder="Sugerido" id="sugerido" name="sugerido" />
                      </div>
                      <div class="col-md-5" style="margin-top: 10px;">
                         <input type="number" name="" class="form-control" placeholder="Bulto" id="bulto" name="bulto" /> 
                      </div>
                      <div class="col-md-7" style="margin-top: 10px;">
                          <input type="number" name="" class="form-control" placeholder="Cantidad" value="1" id="cantidad" name="cantidad" />
                      </div>
                    </div>
                    <br style="clear: both;"><br style="clear: both;">
                    <center><button onclick="Funciones.add_car('<?= $producto["codigo"];?>', 'cantidad', 'sugerido', 'resp-asdfasd');" type="button" class="btn  btn-primary"><i class="fa fa-shopping-cart"></i> Agregar</button></center>
                    
                    <div id="resp-asdfasd">asdfasdf</div>

                  </div>
                </div>
    <?php }?>

    </div>
