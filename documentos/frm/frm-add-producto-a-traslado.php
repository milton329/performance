
    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-info darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Agregar producto a documento: <?= $documento["documento"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin">	

            <div id="rspasdf"></div>
        
            <form id="frm-producto-ref" name="frm-producto-ref" class="form_sdv form-horizontal" method="post" action="../process/documento/accion-documento-traslado-detalle.php">
                
                <input type="hidden" id="ref" name="id_prod" value="" />
                <input type="hidden" id="id" name="id" />
                <input type="" id="documento" name="documento" value="<?= $documento["id"];?>" />
                <input type="hidden" id="entrada" name="entrada"/>
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre de producto</label>
                        <input id="txt_producto" name="txt_producto" class="form-control form-group-margin"/> 
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Cantidad</label>
                        <input id="salida" name="salida" class="form-control form-group-margin"/>
                    </div>
                        
                    <div class="col-md-6">
                        <label class="control-label">Costo unitario</label>
                        <input id="valor_unitario" name="valor_unitario" class="form-control form-group-margin"/>
                    </div>
                    
                </div>
                
                <br />
                    
                <div id="rsp-frm-producto-ref"></div>
            
                <div class="text-center">
                    <button class="btn btn-info" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                