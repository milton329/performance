    
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content" >
        
        <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Editar usuario <?= utf8_encode($usuario["nombre"]);?></strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="div-modulo-opcion">
               
               		<form action="../process/config/accion-usuario.php" id="frm-crear-usuario" name="frm-crear-usuario" method="post"  class="form_sdv form-horizontal"> 
						
                        <input type="hidden" name="id" id="id">
                        
						<div class="row">                            
							
                            <?php if($tipo == 1){?>
                            
                                    <div class="col-md-6">
                                        <label class="control-label">Nombre</label>
                                        <input class="form-control form-group-margin" type="text" id="nombre" name="nombre"/>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="control-label">Apellido</label>
                                        <input class="form-control form-group-margin" type="text" id="apellido" name="apellido"/>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="control-label">Identificación</label>
                                        <input class="form-control form-group-margin" type="text" id="identificacion" name="identificacion"/>
                                    </div>
        
                                    <div class="col-md-4">
                                        <label class="control-label">E-mail</label>
                                        <input class="form-control form-group-margin" type="text" id="email" name="email"/>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="control-label">Rol</label>
                                        <select class="form-control form-group-margin" id="id_rol" name="id_rol">
                                            <option value="">Seleccione</option>
                                            <?php 
                                                $rol = $oGlobals->verOpcionesPor("config_roles", "", 1);
                                                foreach($rol as $roles){
                                            ?>
                                                    <option value="<?= $roles["id"]?>"><?= utf8_encode($roles["rol"]);?></option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                    </div>
                            
                            <?php } else {?>
                            
                                    <div class="col-md-6">
                                        <label class="control-label">Usuario</label>
                                        <input class="form-control form-group-margin" type="text" id="usuario" name="usuario" value="<?= utf8_encode($usuario["usuario"]);?>"/>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="control-label">Nueva clave</label>
                                        <input class="form-control form-group-margin" type="text" id="clave_nueva" name="clave"/>
                                    </div>
                                    
                            <?php }?>
							
						</div>
                        
                        <br />
                        
						<div id="rsp-frm-crear-usuario"></div>
						<div class="panel-footer text-right" style="background: none !important;">
							<button class="btn btn-danger" type="button" onClick="location.href='../usuarios'">Volver</button>
							<button class="btn btn-danger" type="submit">Guardar cambios</button>
						</div>
						
					</form>
                    
               </div>	
        </div>
      
    </div>	
            
                