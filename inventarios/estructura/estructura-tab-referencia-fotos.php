
   <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Inventarios / Fotos /</span>
            <?= utf8_encode($producto["nombre"])." / REF: ".$producto["referencia"]." / COD: ".$producto["codigo"];?></h3>
          </h1>
        </div>
    </div>

    <form class="form_sdv form-horizontal" method="post" action="../process/inventario/crear-imagenes-inventario.php" id="frm-imagen-modelo" enctype="multipart/form-data">
                        
            <input type="hidden" id="id" name="id" value="<?= $producto["codigo"];?>" />
            
        <div class="row">   
                                 
             <div class="col-md-12">
                <input type="file" class="form-control form-group-margin" name="archivo[]" multiple>
                <br>
             </div>
             
             <div id="rsp-frm-imagen-modelo"></div>
            
             <div class="col-md-12 text-center">

                <button class="btn btn-primary" type="submit">Guardar</button>
             </div> 
             
        </div>
    </form>

    <br style="clear: both;" />
    <br style="clear: both;" />

    <div class="row">
        <div id="asdfsdf"></div>
        <?php 
            
            $codigo = $producto["codigo"];
            
            $imagenes = $oGlobals->verOpcionesPor("referencias_imagenes", " AND codigo = '$codigo' AND id_empresa = ".$_SESSION["id_empresa"]."", 1);
            if($imagenes != 2){
                
                foreach($imagenes as $imagen){
        ?>
                    <div class="col-md-4"  id="div_img_<?= $imagen["id"];?>">
                        <i onClick="Funciones.eliminar_registro(<?= $imagen["id"];?>, 'referencias_imagenes', 'asdfsdf', 'div_img_');" class=" fa fa-times" style=" float: right;"></i>
                        <img src="../static-pictures/products/370x500/<?= $imagen["imagen"];?>" />
                    </div>
        <?php                   
                }
            }
        ?>
    </div>

