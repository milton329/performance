    
    <div class="modal-dialog " id="modal-default" style="display: block;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel">Módulo</h4>
          </div>
          <div class="modal-body" style="padding:20px;">
          	
            	<form id="frm-modulo" name="frm-modulo" class="form_sdv form-horizontal" method="post" action="../process/config/accion-modulo.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre de módulo</label>
                        <input type="text" id="modulo" name="modulo" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Icono</label>
                        <input type="text" id="icono" name="icono" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Orden</label>
                        <input type="text" id="orden" name="orden" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-4">
                        <label class="control-label">Mostrar en menú</label>
                        <input type="text" id="principal" name="principal" class="form-control form-group-margin" />
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
    </div>
    
            
                