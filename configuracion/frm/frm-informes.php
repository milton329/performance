
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
          <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title">Informe</h4>
          </div>
          
          <div class="modal-body" style="padding:30px;">
    
                <form id="frm-modulo" name="frm-modulo" class="form_sdv form-horizontal" method="post" action="../process/config/accion-informe.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre de informe</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Módulos</label>
                        <select id="id_modulo" name="id_modulo" class="form-control form-group-margin">
                            <option value="">Seleccione</option>
                            <?php $modulos = $oGlobals->verOpcionesPor("config_modulos", "", 1);
                                  foreach($modulos as $modulo){
                            ?>
                                    <option value="<?= $modulo["id"];?>"><?= utf8_encode($modulo["modulo"]);?></option>
                            <?php		 
                                  }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Menú</label>
                        <select id="id_modulo_opcion" name="id_modulo_opcion" class="form-control form-group-margin">
                            <option value="">Seleccione</option>
                            <?php 
                                  if(isset($rsp)){
                                    $modulos = $oGlobals->verOpcionesPor("config_modulos_opciones", " ", 1);
                                    foreach($modulos as $modulo){
                            ?>
                                        <option value="<?= $modulo["id"];?>"><?= utf8_encode($modulo["opcion_modulo"]);?></option>
                            <?php		 
                                    }
                                  }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Tipo reporte</label>
                        <select id="tipo_reporte" name="tipo_reporte" class="form-control form-group-margin">
                            <option value="">Seleccione</option>
                            <option value="1">Consulta SQL</option>
                            <option value="2">Procedimiento Almacenado</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Contar</label>
                        <select id="contar" name="contar" class="form-control form-group-margin">
                            <option value="">Seleccione</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Conexión</label>
                        <select id="conexion" name="conexion" class="form-control form-group-margin">
                            <option value="">Seleccione</option>
                            <?php $conexiones = $oGlobals->verOpcionesPor("conexiones", "", 1);
								  foreach($conexiones as $conexion){
							?>
                            		<option value="<?= $conexion["id"];?>"><?= $conexion["nombre"];?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Instancia</label>
                        <input type="text" id="instancia" name="instancia" class="form-control form-group-margin" value="<?php if(isset($rsp)) echo (utf8_encode($rsp["instancia"]));?>" />
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Base de datos</label>
                        <input type="text" id="bd" name="bd" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Usuario</label>
                        <input type="text" id="usuario" name="usuario" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Clave</label>
                        <input type="text" id="clave" name="clave" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label">Consulta SQL 1</label>
                        <textarea id="sql_" name="sql_" class="form-control form-group-margin" rows="5"><?php if(isset($rsp)) echo trim(utf8_encode($rsp["sql_"]));?></textarea>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label">Consulta SQL 2</label>
                        <textarea id="sql_2" name="sql_2" class="form-control form-group-margin" rows="5"><?php if(isset($rsp)) echo trim(utf8_encode($rsp["sql_2"]));?></textarea>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label">Consulta SQL 3</label>
                        <textarea id="sql_3" name="sql_3" class="form-control form-group-margin" rows="5"><?php if(isset($rsp)) echo trim(utf8_encode($rsp["sql_3"]));?></textarea>
                    </div>
                    
                </div>
                
                <br />
                    
                <div id="rsp-frm-modulo"></div>
            
                <div class="text-center">
                    <button class="btn btn-danger" type="submit">Guardar</button>
                </div>            
                
            </form>
            
          </div>
        </div>
      </div>
