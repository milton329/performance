    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Movimiento</strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-tip" name="frm-tip" class="form_sdv form-horizontal" method="post" action="../process/finanzas/accion-tipo-movimientos.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre de movimiento</label>
                        <input type="text" id="tipo_movimiento" name="tipo_movimiento" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Clase</label>
                        <select class="form-control form-group-margin" id="tipo_cuenta" name="tipo_cuenta">
                            <option value="">Seleccione</option>
                            <?php 
                                $clases = $oGlobals->verOpcionesPor("con_clases", "", 1);
                                foreach ($clases as $clase) {
                            ?>
                                    <option value="<?= $clase["id"];?>"><?= $clase["clase"];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Empresa</label>
                        <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
                            <option value="">Seleccione</option>
                            <?php 
                                $empresas = $oGlobals->verOpcionesPor("empresas", "", 1);
                                foreach ($empresas as $empresa) {
                            ?>
                                    <option value="<?= $empresa["id"];?>"><?= utf8_encode($empresa["nombre_empresa"]);?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-tip"></div>
            
                <div class="text-center">
                    <a class="btn btn-primary" href="../financiero/tipos-movimientos.html">Finalizar</a>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                