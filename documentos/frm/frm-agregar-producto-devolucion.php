	    
    <div class="modal-dialog">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-danger" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Devolución <?= $documento["documento"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin" >	
               <div id="div-modulo-opcion">  
               		<form id="frm-agregar-a-factura" name="frm-agregar-a-factura" class="form_sdv form-horizontal" method="post" action="../process/documento/accion-documento-factura-detalle.php">
                        
                        
                        <input type="hidden" id="ref" name="id_prod" value="" />
                		<input type="hidden" id="id" name="id"/>
                        <input type="hidden" id="documento" name="documento" value="<?= $documento["id"];?>" />
                        <input type="hidden" id="salida" name="salida"/>

                        <div class="row">
                        
                            <div class="col-md-12">
                                <label class="control-label">Producto</label>
                                <input class=" form-control form-group-margin" id="txt_producto" name="txt_producto"/>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="control-label">Cantidad</label>
                                <input type="number" id="entrada" class="form-control form-group-margin" name="entrada"/>
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Valor</label>
                                <input type="number" id="valor_unitario" class="form-control form-group-margin" name="valor_unitario"/>
                            </div>

                             
                        </div>
        				
                        <br style="clear: both" />
                        <div id="rsp-frm-agregar-a-factura"></div>

                        <div class="text-center">
                            <a href="" class="btn btn-danger darker">Volver</a>
                            <button class="btn btn-danger darker" type="submit">Guardar</button>
                        </div>            
                        
                    </form>
               </div>	
        </div>
      
    </div>	

    

                