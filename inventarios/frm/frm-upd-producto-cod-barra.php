<!-- 
    Archivo que contiene la modal la cual registra los nuevos codigos de barras
    este archivo es llamado desde el archivo "carga-estructura.php en la linea 193"

 -->
 <!-- 
    Archivo que contiene la modal la cual registra los nuevos codigos de barras
    este archivo es llamado desde el archivo "carga-estructura.php en la linea 193"

 -->

 <?php

    $sql = "SELECT * FROM referencias_barras WHERE id = ".$id."";
    $viewform = $oGlobals->verPorConsultaPor($sql, 1);
    $var = $viewform[0];

 ?>


 <div class="modal-dialog page-profile">
    
    <div class="modal-content" >
      
      <div class="modal-header bg-primary darker" style="text-align:center;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 style="color:#FFFFFF">Actualizar codigo de barras  <?= $referencia["nombre"];?></strong></h3>
      </div>
      
      <div class="modal-body paddin">	

          <div id="rspasdf"></div>
      
          <form id="frm-producto-ref" name="frm-producto-ref" class="form_sdv form-horizontal" method="post" action="../process/inventario/accion-referencia-upd-cod-barras.php">

                      <input type="hidden" id="codigo" name="codigo" class="form-control form-group-margin" value="<?= $referencia["codigo"];?>" /> 
                      <input type="hidden" id="id" name="id" value="<?php echo $var['id']; ?>" class="form-control form-group-margin"/>

              <div class="row">
              
                  <div class="col-md-6">
                      <label class="control-label">Codigo</label>
                      <input id="codigo" name="codigo" value="<?php echo $var['codigo']; ?>" class="form-control form-group-margin"/> 
                  </div><br>

                  <div class="col-md-6">
                      <label class="control-label">Tipo</label>
                      <input id="tipo" name="tipo" class="form-control form-group-margin" value="<?php echo $var['tipo']; ?>"/> 
                  </div><br>

                  <div class="col-md-6">
                      <label class="control-label">Talla</label>
                      <input id="talla" name="talla" class="form-control form-group-margin" value="<?php echo $var['talla']; ?>"/> 
                  </div><br>

                  <div class="col-md-6">
                      <label class="control-label">Color</label>
                      <input id="color" name="color" class="form-control form-group-margin" value="<?php echo $var['color']; ?>"/> 
                  </div><br>

                  <div class="col-md-6">
                      <label class="control-label">Barra</label>
                      <input id="barra" name="barra" class="form-control form-group-margin" value="<?php echo $var['barra']; ?>"/> 
                  </div><br>

                  <div class="col-md-6">
                      <label class="control-label">Creado por</label>
                      <input id="creador_por" name="creador_por" class="form-control form-group-margin" value="<?php echo $var['creado_por']; ?>"/> 
                  </div><br>


                  <input type="hidden" id="fecha_modificado" type="fecha" name="fecha_modificado" class="form-control form-group-margin"value=""/>                   
                  <input id="fecha_registro" type="hidden" name="fecha_registro" class="form-control form-group-margin"value="<?php echo $var['fecha_registro']; ?>"/> 
                  <input id="id_usuario_creador" type="hidden" name="id_usuario_creador" class="form-control form-group-margin" value="<?php echo $var['id_usuario_creador']; ?>"/> 

              </div>
              
              <br />
                  
              <div id="rsp-frm-producto-ref"></div>
          
              <div class="text-center">
                  <button class="btn btn-primary" type="button">Volver</button>
                  <button class="btn btn-primary" type="submit">Guardar</button>
              </div>            

          </form>

      </div>
    
  </div>	
          
              

    
            
                