    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Categorías</strong></h3>
        </div>
        
        <div class="modal-body paddin">	
        
            <form id="frm-categoria" name="frm-categoria" class="form_sdv form-horizontal" method="post" action="../process/utilidad/accion-categoria.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-12">
                        <label class="control-label">Nombre categoría</label>
                        <input type="text" id="categoria" name="categoria" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-12">
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
                	
                <div id="rsp-frm-categoria"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
            
                