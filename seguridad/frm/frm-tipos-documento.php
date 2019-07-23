    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Tipos de documento</strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-tipo-documento" name="frm-tipo-documento" class="form_sdv form-horizontal" method="post" action="../process/utilidad/accion-tipos-documento.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Tipo de documento</label>
                        <input type="text" id="tipo_documento" name="tipo_documento" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Prefijo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Consecutivo</label>
                        <input type="text" id="consecutivo" name="consecutivo" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Consecutivo</label>
                        <select class="form-control form-group-margin" id="naturaleza" name="naturaleza">
                            <option value="">Seleccione</option>
                            <option value="1">Entrada</option>
                            <option value="0">Salida</option>
                        </select>
                    </div>
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-tipo-documento"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                