    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Cuentas</strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-puc" name="frm-puc" class="form_sdv form-horizontal" method="post" action="../process/utilidad/accion-puc.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Cuenta</label>
                        <input type="text" id="cuenta" name="cuenta" class="form-control form-group-margin" />
                    </div>
                    
                   <div class="col-md-12">
                        <label class="control-label">Descripcion</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control form-group-margin" />
                    </div>

               </div>
				
                <br />
                	
                <div id="rsp-frm-puc"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                