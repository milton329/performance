    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Documento <?= $rsp["documento"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-talla" name="frm-talla" class="form_sdv form-horizontal" method="post" action="../process/documento/accion-documento-estado.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Cerrado</label>
                        <select id="cerrado" name="cerrado" class="form-control form-group-margin">
                            <option value="0">Pendiente</option>
                            <option value="1">Cerrado</option>
                        </select>
                    </div>
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-talla"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                