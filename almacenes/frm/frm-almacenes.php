	
     
    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-danger" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Almacenes</strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        
            <form id="frm-almacenes" name="frm-almacenes" class="form_sdv form-horizontal" method="post" action="../process/almacenes/accion-almacenes.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-6">
                        <label class="control-label">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control form-group-margin" required>
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-group-margin" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Direccion</label>
                        <input type="text" id="direccion" name="direccion" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Telefono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Ciudad</label>
                        <input type="text" id="ciudad" name="ciudad" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Departamento</label>
                        <input type="text" id="departamento" name="departamento" class="form-control form-group-margin" />
                    </div>

                </div>
				
                
                <br />
                	
                <div id="rsp-frm-almacenes"></div>
            
                <div class="text-center">
                    <button class="btn btn-danger" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
    
    </div>        
                