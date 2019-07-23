	
     
    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-danger" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Empresas</strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        
            <form id="frm-empresa" name="frm-empresa" class="form_sdv form-horizontal" method="post" action="../process/config/accion-empresa.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre</label>
                        <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label">Título en navegador</label>
                        <input type="text" id="titulo_html" name="titulo_html" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label">Imagen</label>
                        <input class="form-control form-group-margin" type="file" id="archivo" name="archivo[]"/>
                    </div>
                    

                </div>
				
                
                <br />
                	
                <div id="rsp-frm-empresa"></div>
            
                <div class="text-center">
                    <button class="btn btn-danger" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
    
    </div>        
                