	    
    <div class="modal-dialog">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-<?= $color;?> darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF"><?= $titulo;?> <?= $documento["documento"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin" >	
               <div id="div-modulo-opcion">  
               		<form id="frm-agregar-a-rc" name="frm-agregar-a-rc" class="form_sdv form-horizontal" method="post" action="../process/finanzas/accion-documento-finanzas-detalle.php">
                        
                		<input type="hidden" id="id" name="id"/>
                        <input type="hidden" id="documento" name="documento" value="<?= $documento["id"];?>" />

                        <div class="row">
                        

                            <div class="col-md-6">
                                <label class="control-label">Movimiento</label>
                                <select class=" form-control form-group-margin" id="tipo_movimiento_" name="tipo_movimiento">
                                    <option value="">Seleccione</option>
                                    <?php $opciones = $oGlobals->verOpcionesPor("tipos_movimientos", " AND financiero = 1", 1);
                                          foreach($opciones as $opcion){
                                    ?>  
                                                <option value="<?= $opcion['tipo_movimiento']?>"><?= utf8_encode($opcion['tipo_movimiento']);?></option>      
                                    <?php }?>   
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Sub movimiento</label>
                                <select class=" form-control form-group-margin" id="sub_movimiento" name="sub_movimiento">
                                    <option value="">Seleccione</option>
                                    <?php $opciones = $oGlobals->verOpcionesPor("tipos_movimientos_subconceptos", "", 1);
                                          foreach($opciones as $opcion){
                                    ?>  
                                                <option value="<?= $opcion['sub_movimiento']?>"><?= utf8_encode($opcion['sub_movimiento']);?></option>      
                                    <?php }?>   
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="control-label">Concepto</label>
                                <input type="detalle" name="detalle" class="form-control form-group-margin">
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Débito</label>
                                <input class="form-control form-group-margin" name="debito" id="debito">
                            </div>  

                            <div class="col-md-6">
                                <label class="control-label">Crédito</label>
                                <input class="form-control form-group-margin" name="credito" id="credito">
                            </div>   

                             
                        </div>
        				
                        <br style="clear: both" />
                        <div id="rsp-frm-agregar-a-rc"></div>

                        <div class="text-center">
                            <a href="" class="btn btn-<?= $color?> darker">Volver</a>
                            <button class="btn btn-<?= $color?> darker" type="submit">Guardar</button>
                        </div>            
                        
                    </form>
               </div>	
        </div>
      
    </div>	

    

                