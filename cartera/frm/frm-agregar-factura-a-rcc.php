	    
    <div class="modal-dialog">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-warning darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Recibo de caja <?= $documento["documento"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin" >	
               <div id="div-modulo-opcion">  
               		<form id="frm-agregar-a-rc" name="frm-agregar-a-rc" class="form_sdv form-horizontal" method="post" action="../process/tercero/accion-documento-cartera-detalle.php">
                        
                		<input type="hidden" id="id" name="id"/>
                        <input type="hidden" id="documento" name="documento" value="<?= $documento["id"];?>" />

                        <div class="row">
                        
                            <div class="col-md-6">
                                <label class="control-label">Documento</label>
                                <select class=" form-control form-group-margin" id="documento_cruce" name="documento_cruce">
                                    <option value="">Seleccione</option>
                                    <?php $cartera = $oGlobals->verCarteraPor(" AND car.cliente = '".$documento["cliente"]."' ", 1);
                                          foreach($cartera as $opcion){
                                    ?>  
                                                <option value="<?= $opcion['documento']?>"><?= utf8_encode($opcion['documento']);?></option>      
                                    <?php }?>   
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="control-label">Cuenta</label>
                                <select class=" form-control form-group-margin" id="tipo_movimiento" name="tipo_movimiento">
                                    <option value="">Seleccione</option>
                                    <?php $opciones = $oGlobals->verOpcionesPor("tipos_movimientos", "", 1);
                                          foreach($opciones as $opcion){
                                    ?>  
                                                <option value="<?= $opcion['tipo_movimiento']?>"><?= utf8_encode($opcion['tipo_movimiento']);?></option>      
                                    <?php }?>   
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Débito</label>
                                <input class="form-control form-group-margi" name="debito" id="debito">
                            </div>  

                            <div class="col-md-6">
                                <label class="control-label">Crédito</label>
                                <input class="form-control form-group-margi" name="credito" id="credito">
                            </div>   

                             
                        </div>
        				
                        <br style="clear: both" />
                        <div id="rsp-frm-agregar-a-rc"></div>

                        <div class="text-center">
                            <a href="" class="btn btn-warning darker">Volver</a>
                            <button class="btn btn-warning darker" type="submit">Guardar</button>
                        </div>            
                        
                    </form>
               </div>	
        </div>
      
    </div>	

    

                