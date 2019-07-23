    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Servicios</strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-servicios" name="frm-servicios" class="form_sdv form-horizontal" method="post" action="../process/servicios/accion-servicios.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre del Servicio</label>
                        <input type="text" id="nombre_servicio" name="nombre_servicio" class="form-control form-group-margin" required/>
                    </div>

                   <div class="col-md-12">
                        <label class="control-label">Descripción</label>
                        <input type="text" id="descripcion_servicio" name="descripcion_servicio" class="form-control form-group-margin" required/>
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Valor del Servicio</label>
                        <input type="number" id="valor_servicio" name="valor_servicio" class="form-control form-group-margin" required/>
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Código</label>
                        <input type="text" id="codigo_servicio" name="codigo_servicio" class="form-control form-group-margin" required/>
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Estado</label>
                        <select class="form-control form-group-margin" id="iservicio_activo" name="servicio_activo">
                            <option value="">Seleccione</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-servicios"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                