 <!-- ESTE ARCHIVO FUE EDITADO POR BRANDON EL 28/04/2019 AÑADIENDO LA ESTRUCTURA NUEVA DE LA CARGA DE PRODUCTOS -->
<!-- Vosotros el que estais leyendo esto... Ni que os oscurra borrar este script -->

<script>
$("#carga").load("carga", function(){
  Funciones.add_car_pos('<?= $productos["codigo"];?>', 'c_<?= $productos["codigo"];?>', 'rspdasf');
})

</script>

<!-- fin  -->

      <div id="rspdasf"></div>

  <?php 
if ($productos){
  
      if($productos != 2){
        
          foreach ($productos as $producto) {

              $codigo = $productos["codigo"];
              $foto   = $oGlobals->verOpcionesPor("referencias_imagenes", " AND codigo = '$codigo'", 0);

              $imagen = "foto.jpg";

              if($foto != 2) $imagen = $foto["imagen"];
  ?>
    				<p style="font-size: 18px; text-align:center; font-weight:600; color:#00A9F1;">BUSQUEDA PRODUCTOS / COD BARRAS</p>

                    <div id="carga" class="col-sm-4 col-xs-12 mb30">
                          <img src="../static-pictures/products/200x200/<?= $imagen;?>" alt="">
                      </div>                
                    <div class="col-sm-8 col-xs-12 mb30">
                        <label class="control-label"><?= utf8_encode($productos["nombre"]);?> / <?= $productos["referencia"];?></label>
                                   
                        <div class="desc-pos">
                          <?= $productos['descripcion']; ?>       
                        </div>

                        <span>CANTIDAD</span><br>
                         <input id="c_<?= $producto["codigo"];?>" type="number" min="1" max="30" value="1" class="p10 taC">
                        <button class="btn btn-primary" onclick="Funciones.add_car_pos('<?= $productos["codigo"];?>', 'c_<?= $productos["codigo"];?>', 'rspdasf');"> <i class="fa fa-cart-plus" aria-hidden="true"></i> &nbsp; Agregar </button>
                    </div>
        
  <?php 
  break;
          }
      } 
    }
  ?>