	<?php 
		if($producto != 2) {
				
				echo "<script>";
						foreach($producto as $key => $data){
							
							if($key != "descripcion" && $key != 4) echo '$("#'.$key.'").val("'.utf8_encode(str_replace('"', "'", $data)).'");';
						}						
				echo "</script>";
		}

        $imagen = $oGlobals->verOpcionesPor("referencias_imagenes", " AND codigo = '".$producto["codigo"]."' AND id_empresa = ".$_SESSION["id_empresa"]."", 0);
    
        $img = "foto.jpg";
        if($imagen != 2) $img = $imagen["imagen"];
    ?>
    <form class="form_sdv" action="../process/inventario/accion-referencia.php" method="post" id="frm-ficha-referencia">

        <div id="rsp-frm-ficha-referencia"></div>
        
        <div class="text-right">

        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i></button>
        
        <input id="id" name="id" type="hidden" class="form-control form-group-margin" >
        </div>
        
        <div class="row">
        
            <div class="col-md-3">
                <center><img src="../static-pictures/products/200x200/<?= $img?>" class="img-circle" width="200" height="200" /></center>
            </div>
        
            <div class="col-md-9">
              
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">Nombre</label>
                        <input id="nombre" name="nombre" type="text" class="form-control form-group-margin" >
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Nombre importador</label>
                        <input id="nombre_importado" name="nombre_importado" type="text" class="form-control form-group-margin" >
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">Código</label>
                        <input id="codigo" name="codigo" type="text" class="form-control form-group-margin" readonly >
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Referencia</label>
                        <input id="referencia" name="referencia" type="text" class="form-control form-group-margin" >
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">Grupo</label>               
                        <select id="id_categoria" name="id_categoria" class="form-control form-group-margin" >
                            <option value="">Seleccione</option>
                            <?php $grupos = $oGlobals->verOpcionesPor("categorias", "", 1);
                                  foreach($grupos as $grupo){
                            ?>  
                                        <option value="<?php echo $grupo[0]?>"><?php echo utf8_encode($grupo[1]);?></option>    
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Subgrupo</label>
                        <select id="id_subcategoria" name="id_subcategoria" class="form-control form-group-margin" >
                            <option value="">Seleccione</option>
                            <?php $grupos = $oGlobals->verOpcionesPor("subcategorias", "", 1);
                                  foreach($grupos as $grupo){
                            ?>  
                                        <option value="<?php echo $grupo[0]?>"><?php echo utf8_encode($grupo[1]);?></option>    
                            <?php }?>
                        </select>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">Línea</label>
                        <select id="id_linea" name="id_linea" class="form-control form-group-margin" >
                            <option value="">Seleccione</option>
                            <?php $grupos = $oGlobals->verOpcionesPor("lineas", "", 1);
                                  foreach($grupos as $grupo){
                            ?>  
                                        <option value="<?php echo $grupo[0]?>"><?php echo utf8_encode($grupo[1]);?></option>    
                            <?php }?>
                        </select> 
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Medida</label>
                        <select id="id_medida" name="id_medida" class="form-control form-group-margin" >
                            <option value="">Seleccione</option>
                            <?php $grupos = $oGlobals->verOpcionesPor("medidas", "", 1);
                                  foreach($grupos as $grupo){
                            ?>  
                                        <option value="<?php echo $grupo[0]?>"><?php echo utf8_encode($grupo[1]);?></option>    
                            <?php }?>
                        </select> 
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Marca</label>
                        <select id="id_marca" name="id_marca" class="form-control form-group-margin" >
                            <option value="">Seleccione</option>
                            <?php $grupos = $oGlobals->verOpcionesPor("marcas", "", 1);
                                  foreach($grupos as $grupo){
                            ?>  
                                        <option value="<?php echo $grupo[0]?>"><?php echo utf8_encode($grupo[1]);?></option>    
                            <?php }?>
                        </select> 
                    </div>
                    
                </div>             
            </div>

            <div class="col-md-12">
        
        <div class="col-md-2">
            <label class="control-label">Alto</label>
            <input id="alto" name="alto" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Ancho</label>
            <input id="ancho" name="ancho" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Largo</label>
            <input id="largo" name="largo" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Peso</label>
            <input id="peso" name="peso" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Cubicaje</label>
            <input id="cubicaje" name="cubicaje" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">IVA</label>
            <input id="IVA" name="IVA" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Dcto. Comercial</label>
            <input id="dcto_comercial" name="dcto_comercial" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Dcto. Financiero</label>
            <input id="dcto_financiero" name="dcto_financiero" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Display</label>
            <input id="display" name="display" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Cantidad. por Bulto</label>
            <input id="cantidad_por_bulto" name="cantidad_por_bulto" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-3">
            <label class="control-label">Proveedor</label>
            <input id="id_proveedor" name="id_proveedor" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-3">
            <label class="control-label">Manifiesto</label>
            <input id="manifiesto" name="manifiesto" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-3">
            <label class="control-label">Importador</label>
            <input id="importador" name="importador" type="text" class="form-control form-group-margin" >
        </div>

        
        <div class="col-md-3">
            <label class="control-label">Costo</label>
            <input id="costo" name="costo" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-2">
            <label class="control-label">Venta por unidad</label>
            <select class="form-control form-group-margin" name="vender_por_unidad" id="vender_por_unidad">
              <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </div>
        
        </div>
        
        </div>

        <br style="clear: both;">

        <div class="text-right">
            <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i></button>
        </div>

	</form>

    <style>

    /* Common styles */

    .box, .box-row, .box-cell { overflow: visible !important; -webkit-mask-image: none !important; }
    .page-messages-container > .box-row > .box-cell { display: block !important; }

    .page-messages-label {
      width: 8px;
      height: 8px;
      display: block;
      border-radius: 999px;
      float: left;
      margin-top: 6px;
      margin-right: 12px;
    }

    html[dir="rtl"] .page-messages-label {
      float: right;
      margin-left: 12px;
      margin-right: 0;
    }

    #page-messages-aside-nav {
      max-height: 0;
      overflow: hidden;
      -webkit-transition: max-height .3s;
      transition: max-height .3s;
    }

    #page-messages-aside-nav.show { max-height: 2000px; }

    @media (min-width: 768px) {
      .page-messages-container > .box-row > .box-cell {
        display: table-cell !important;
        padding-top: 15px;
      }
      .page-messages-aside { width: 200px; }
      .page-messages-content { padding-left: 20px; }

      html[dir="rtl"] .page-messages-content {
        padding-left: 0;
        padding-right: 20px;
      }

      #page-messages-aside-nav { max-height: none !important; }

      .page-messages-wide-buttons .btn { width: 60px; }
    }

    /* Special styles */

    .note-editor { margin: 0 !important; }
  </style>
        
        <script>

      $(function() {
        $('#page-messages-aside-nav-toggle').on('click', function() {
          $(this)[
            $('#page-messages-aside-nav').toggleClass('show').hasClass('show') ? 'addClass' : 'removeClass'
          ]('active');
        });

        $("#page-messages-new-to").select2({
          data: [ { id: 0, text: 'rjang@example.com' }, { id: 1, text: 'mbortz@example.com' }, { id: 2, text: 'towens@example.com' }, { id: 3, text: 'dsteiner@example.com' }, ],
          tags: true,
          tokenSeparators: [',', ' ']
        });

        $('.page-messages-new-text').summernote({
          height: 200,
          toolbar: [
            ['parastyle', ['style']],
            ['fontstyle', ['fontname', 'fontsize']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'video', 'table', 'hr']],
            ['history', ['undo', 'redo']],
            ['misc', ['codeview', 'fullscreen']],
            ['help', ['help']]
          ],
        });
      });

  </script>
    
    




