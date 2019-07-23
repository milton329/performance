
    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Agregar precio a <?= $referencia["nombre"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin">	

            <div id="rspasdf"></div>
        
            <form id="frm-producto-ref" name="frm-producto-ref" class="form_sdv form-horizontal" method="post" action="../process/inventario/accion-referencia-precio.php">
                        
                        <input type="hidden" id="codigo" name="codigo" class="form-control form-group-margin" value="<?= $referencia["codigo"];?>" /> 

                <div class="row">
                
                    <div class="col-md-6">
                        <label class="control-label">Precio</label>
                        <input id="precio" name="precio" class="form-control form-group-margin"/> 
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Lista</label>
                        <select id="lista" name="lista" class="form-control form-group-margin">
                            <?php 
                                $precios = $oGlobals->verOpcionesPor("precios_lista", "", 1);
                                foreach ($precios as $precio) {
                            ?>
                                    <option value="<?= $precio["codigo"];?>"><?= $precio["nombre_lista"];?></option>
                            <?php
                                }
                            ?>
                            
                        </select>
                    </div>
                        
                    
                </div>
                
                <br />
                    
                <div id="rsp-frm-producto-ref"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="button">Volver</button>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                