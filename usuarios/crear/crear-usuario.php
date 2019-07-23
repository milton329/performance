	<div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
          	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-user"></i>Usuarios / </span>
            Crear usuario
          </h1>
        </div>
    </div> 
    
    <div class="panel">
      <div class="panel-body">
        	<div class="table-danger">

					<form action="../process/config/accion-usuario.php" id="frm-crear-usuario" name="frm-crear-usuario" method="post"  class="form_sdv form-horizontal"> 
						
                        <input type="hidden" name="id" id="id">
                        
						<div class="row">                            
							
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
                            
                            <div class="col-md-6">
								<label class="control-label">Usuario</label>
								<input class="form-control form-group-margin" type="text" id="usuario" name="usuario"/>
							</div>
                            
                            <div class="col-md-6">
								<label class="control-label">Clave</label>
								<input class="form-control form-group-margin" type="text" id="clave" name="clave"/>
							</div>
							
						</div>
                        
                        <br />
                        
						<div id="rsp-frm-crear-usuario"></div>
						<div class="panel-footer text-right">
							<button class="btn btn-danger" type="button" onClick="location.href='../usuarios'">Volver</button>
							<button class="btn btn-danger" type="submit">Guardar cambios</button>
						</div>
						
					</form>         
					<br style="clear:both;" />
			</div>
     	</div>
    </div>
