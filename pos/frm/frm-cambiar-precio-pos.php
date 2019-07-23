    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-success darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF"><?= utf8_encode($rsp["detalle"]);?></strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-marca" name="frm-marca" class="form_sdv form-horizontal" method="post" action="../process/documento/accion-precio-pos.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">

                    <div class="col-md-3">
                        <label class="control-label">Cantidad</label>
                        <input style="text-align: right;" type="text" id="cantidad_pedida" name="cantidad_pedida" class="form-control form-group-margin" />
                    </div>
                
                    <div class="col-md-3">
                        <label class="control-label">Precio</label>
                        <input style="text-align: right;" type="text" id="valor_unitario" name="valor_unitario" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">% Dcto</label>
                        <input style="text-align: right;" type="text" id="por_dcto" name="por_dcto" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">% Valor</label>
                        <input style="text-align: right;" type="text" id="dcto" name="dcto" class="form-control form-group-margin" />
                    </div>
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-marca"></div>
            
                <div class="text-center">
                    <a href="" class="btn btn-success">Cerrar</a>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                