    
    <div class="modal-dialog " id="modal-default" style="display: block;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel">Roles</h4>
          </div>
          <div class="modal-body" style="padding:20px;">
          	
            	<form id="frm-roles" name="frm-roles" class="form_sdv form-horizontal" method="post" action="../process/config/accion-rol.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre rol</label>
                        <input type="text" id="rol" name="rol" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label">Empresa</label>
                        <select name="empresa" id="empresa" class="form-control form-group-margin">
                        	<option value="">Seleccione</option>
                        	<?php 
								$empresas = $oGlobals->verOpcionesPor("empresas", "", 1);
								if($empresas != 2){
									foreach($empresas as $empresa){
							?>
										<option value="<?= $empresa["id"];?>"><?= utf8_encode($empresa["nombre_empresa"]);?></option>
							<?php			
									}
								}
							?>
                        </select>
                    </div>

                </div>
				
                <br />
                	
                <div id="rsp-frm-roles"></div>
            
                <div class="text-center">
                    <button class="btn btn-danger" type="submit">Guardar</button>
                </div>            
                
            </form>
            
          </div>
        </div>
      </div>
    </div>
    
            
                