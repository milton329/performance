    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Actividad Economica</strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-ciiu" name="frm-ciiu" class="form_sdv form-horizontal" method="post" action="../process/utilidad/accion-ciiu.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Grupo</label>
                        <input type="text" id="grupo" name="grupo" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-12">
                        <label class="control-label">Descripcion</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-group-margin" />
                    </div>

                </div>
				
                <br />
                	
                <div id="rsp-frm-ciiu"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                