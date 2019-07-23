    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Bodegas</strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-bodega" name="frm-bodega" class="form_sdv form-horizontal" method="post" action="../process/utilidad/accion-bodega.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre de bodega</label>
                        <input type="text" id="nombre_bodega" name="nombre_bodega" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-12">
                        <label class="control-label">Descripción</label>
                        <input type="text" id="descripcion_bodega" name="descripcion_bodega" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Código</label>
                        <input type="text" id="codigo_bodega" name="codigo_bodega" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Estado</label>
                        <select class="form-control form-group-margin" id="inventario_activo" name="inventario_activo">
                            <option value="">Seleccione</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="control-label">Empresa</label>
                        <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
                            <option value="">Seleccione</option>
                            <?php 
                                $empresas = $oGlobals->verOpcionesPor("empresas", "", 1);
                                foreach ($empresas as $empresa) {
                            ?>
                                    <option value="<?= $empresa["id"];?>"><?= $empresa["nombre_empresa"];?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-bodega"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                